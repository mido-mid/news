<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = auth()->user();
        return view('Admin.profile.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $rules =  [
            'name' => ['required','string','min:3','max:200','not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'string', 'email', 'max:200', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];

        $this->validate($request, $rules);

        $admin = User::findOrFail($id);

        if ($admin) {
            $old_password = $admin->password;

            $password = $request->password != null ? Hash::make($request->password) : $old_password;

            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $password,
            ]);

            return redirect()->route('admin.profile')->withStatus('لقد تم تعديل بياناتك بنجاح');
        } else {
            return redirect()->route('admins.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
    }

}
