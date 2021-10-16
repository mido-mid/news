<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sponsors = Sponsor::orderBy('id', 'desc')->get();
        return view('Admin.sponsors.index',compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'link' => ['required','url'],
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG|max:2048',
        ];

        $this->validate($request,$rules);

        $image = $request->file('image');

        $filename = $image->getClientOriginalName();
        $fileextension = $image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;

        $image->move('sponsor_images', $file_to_store);

        $category = Sponsor::create([
            'link' => $request->link,
            'image'=> $file_to_store
        ]);

        if ($category) {
            return redirect()->route('admin-sponsors.index')->withStatus('لقد تم إضافة معلن بنجاح');
        } else {
            return redirect()->route('admin-sponsors.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
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
        $sponsor = Sponsor::find($id);

        if($sponsor)
        {
            return view('Admin.sponsors.create',compact('sponsor'));
        }
        else
        {
            return redirect('admin/sponsors')->withStatus('ليس هناك معلن بهذا الرقم التعريفي');
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

        $sponsor = Sponsor::find($id);

        $rules = [
            'link' => ['required','url'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,JPG|max:2048',
        ];


        $this->validate($request,$rules);

        if ($sponsor) {

            $file_to_store = null;

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $fileextension = $image->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
                $image->move('sponsor_images', $file_to_store);
                unlink('sponsor_images/' . $sponsor->image);
            }

            $file_to_store = $file_to_store != null ? $file_to_store : $sponsor->image;

            $sponsor->update([
                'link' => $request->link,
                'image'=> $file_to_store
            ]);
            return redirect()->route('admin-sponsors.index')->withStatus('لقد تم تعديل بيانات المعلن بنجاح');
        } else {
            return redirect()->route('admin-sponsors.index')->withStatus('ليس هناك معلن بهذا الرقم التعريفي');
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

        $sponsor = Sponsor::find($id);

        if($sponsor)
        {
            if($sponsor->image != null) {
                unlink('sponsor_images/' . $sponsor->image);
            }

            $sponsor->delete();

            return redirect()->route('admin-sponsors.index')->withStatus('لقد تم حذف المعلن بنجاح');
        } else {
            return redirect()->route('admin-sponsors.index')->withStatus('ليس هناك معلن بهذا الرقم التعريفي');
        }
    }
}
