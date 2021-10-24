<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('Admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'position' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG|max:2048',
        ];

        $this->validate($request,$rules);

        $image = $request->file('image');

        $filename = $image->getClientOriginalName();
        $fileextension = $image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;

        $image->move('employee_images', $file_to_store);

        $employee = Employee::create([
            'name' => $request->name,
            'position' => $request->position,
            'image'=> $file_to_store
        ]);

        if ($employee) {
            return redirect()->route('admin-employees.index')->withStatus('لقد تم إضافة موظف بنجاح');
        } else {
            return redirect()->route('admin-categories.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);

        if($employee)
        {
            return view('Admin.employees.create',compact('employee'));
        }
        else
        {
            return redirect('admin/employees')->withStatus('ليس هناك موظف بهذا الرقم التعريفي');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = Employee::find($id);

        $rules = [
            'name' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'position' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,JPG|max:2048',
        ];


        $this->validate($request,$rules);

        if ($employee) {

            $file_to_store = null;

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $fileextension = $image->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
                $image->move('employee_images', $file_to_store);
                unlink('employee_images/' . $employee->image);
            }

            $file_to_store = $file_to_store != null ? $file_to_store : $employee->image;

            $employee->update([
                'name' => $request->name,
                'position' => $request->position,
                'image'=> $file_to_store
            ]);
            return redirect()->route('admin-employees.index')->withStatus('لقد تم تعديل بيانات الموظف بنجاح');
        } else {
            return redirect()->route('admin-employees.index')->withStatus('ليس هناك موظف بهذا الرقم التعريفي');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);

        if($employee)
        {
            if($employee->image != null) {
                unlink('employee_images/' . $employee->image);
            }

            $employee->delete();

            return redirect()->route('admin-employees.index')->withStatus('لقد تم حذف الموظف بنجاح');
        } else {
            return redirect()->route('admin-employees.index')->withStatus('ليس هناك موظف بهذا الرقم التعريفي');
        }
    }
}
