<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('Admin.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categories.create');
    }


    public function store(Request $request)
    {

         $rules = [
             'name' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
             'image' => 'required|image|mimes:jpeg,png,jpg,JPG|max:2048',
         ];

         $this->validate($request,$rules);

         $image = $request->file('image');

        $filename = $image->getClientOriginalName();
        $fileextension = $image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;

        $image->move('category_images', $file_to_store);

         $category = Category::create([
             'name' => $request->name,
             'image'=> $file_to_store
         ]);

         if ($category) {
             return redirect()->route('admin-categories.index')->withStatus('لقد تم إضافة قسم بنجاح');
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
        $category = Category::find($id);

        if($category)
        {
            return view('Admin.categories.create',compact('category'));
        }
        else
        {
            return redirect('admin/categories')->withStatus('ليس هناك قسم بهذا الرقم التعريفي');
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

        $category = Category::find($id);

        $rules = [
            'name' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,JPG|max:2048',
        ];


        $this->validate($request,$rules);

        if ($category) {

            $file_to_store = null;

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $fileextension = $image->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
                $image->move('category_images', $file_to_store);
                unlink('category_images/' . $category->image);
            }

            $file_to_store = $file_to_store != null ? $file_to_store : $category->image;

            $category->update([
                'name' => $request->name,
                'image'=> $file_to_store
            ]);
            return redirect()->route('admin-categories.index')->withStatus('لقد تم تعديل بيانات القسم بنجاح');
        } else {
            return redirect()->route('admin-categories.index')->withStatus('ليس هناك قسم بهذا الرقم التعريفي');
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

        $category = Category::find($id);

        if($category)
        {
            if($category->image != null) {
                unlink('category_images/' . $category->image);
            }

            $category->delete();

            return redirect()->route('admin-categories.index')->withStatus('لقد تم حذف القسم بنجاح');
        } else {
            return redirect()->route('admin-categories.index')->withStatus('ليس هناك قسم بهذا الرقم التعريفي');
        }
    }
}
