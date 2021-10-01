<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view("Admin.admins.index", compact("admins"));
    }


    public function create()
    {
		return view('Admin.admins.create');
	}

    public function store(Request $request)
    {
		$rules =  [
            'name' => ['required','string','min:3','max:255','not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string'],
        ];

		$this->validate( $request, $rules );

		$admin = User::create([
			"name" => $request->name,
			"email" => $request->email,
			"password" => Hash::make($request->password),
			"type" => $request->type
		]);

        if ($admin) {
            return redirect()->route('admins.index')->withStatus('لقد تم إضافة مشرف بنجاح');
        } else {
            return redirect()->route('admins.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
    }

    public function show($id)
    {
		$admin = User::select("users.*", "states.name AS state")
			->join("states", "users.stateId", "=", "states.id")
			->where("users.id", "=", $id)
			->firstOrFail();

		return view("admin.admins.show", compact("admin"));
	}

    public function edit($id)
    {
		$admin = User::findOrFaIL($id);

		return view("Admin.admins.create", compact("admin"));
	}

    public function update(Request $request, $id)
    {
        $rules =  [
            'name' => ['required','string','min:3','max:255','not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string'],
        ];

        $this->validate($request, $rules);

		$admin = User::findOrFail($id);


		$admin->save();

        if ($admin) {
            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "type" => $request->type
            ]);

            if ($request->profile){
                return redirect()->route('admin.profile')->withStatus('لقد تم تعديل بياناتك بنجاح');
            }
            return redirect()->route('admins.index')->withStatus('لقد تم تعديل بيانات مشرف بنجاح');
        } else {
            return redirect()->route('admins.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
	}

    public function destroy($id)
    {
		$admin = User::findOrFail($id);
		if ( $admin ) {
			$admin->delete();
            return redirect()->route('admins.index')->withStatus('لقد تم حذف بيانات مشرف بنجاح');
		}
		else
         {
            return redirect()->route('admins.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
	}

}
