<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['except' => ['store','create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $approved = true;
        $news = News::where('state',"approved")->orderBy('id', 'desc')->get();
        foreach ($news as $new){
            $new->category = DB::table('categories')->where('id',$new->category_id)->first();
        }
        return view('Admin.news.index',compact('news','approved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('categories')->get();

        return view('Admin.news.create',compact('categories'));
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
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'body' => ['required'],
            'author' => ['required', 'string', 'max:100', 'min:3','not_regex:/([%\$#\*<>]+)/'],
            'media' => 'required',
            'media.*' => 'image|mimes:jpeg,png,jpg,JPG|max:100040',
            'category_id' => ['required', 'integer'],
        ];

        $this->validate( $request, $rules );

        $state = auth()->user()->type == "publisher" ? "pending" : "approved";

        $new = News::create([
            "title" => $request->title,
            "body" => strip_tags($request->body),
            "author" => $request->author,
            "state" => $state,
            "category_id" => $request->category_id
        ]);

        if ($new) {

            if ($request->hasFile('media')) {

                $files = $request->file('media');

                foreach ($files as $file) {

                    $fileextension = $file->getClientOriginalExtension();

                    $filename = $file->getClientOriginalName();
                    $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;


                    if ($file->move('media', $file_to_store)) {
                        Media::create([
                            'filename' => $file_to_store,
                            'news_id' => $new->id,
                        ]);
                    }
                }

            }

            if(auth()->user()->type == "publisher"){
                return redirect()->route('admin-news.create')->withStatus('لقد تم إضافة خبر بنجاح');
            }
            else{
                return redirect()->route('admin-news.index')->withStatus('لقد تم إضافة خبر بنجاح');
            }

        } else {
            return redirect()->route('admin-news.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
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
        $new = News::find($id);

        if($new){
            $new->media = DB::table('media')->where('news_id',$new->id)->get();

            return view('Admin.news.show',compact('new'));
        }
        else{
            return redirect()->route('admin-news.index')->withStatus('ليس هناك خبر بهذا الرقم التعريفي');
        }
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
        $new = News::find($id);
        $categories = DB::table('categories')->get();

        if($new)
        {
            $new->media = DB::table('media')->where('news_id',$new->id)->get();
            return view('Admin.news.create',compact('new','categories'));
        }
        else
        {
            return redirect()->route('admin-news.index')->withStatus('ليس هناك قسم بهذا الرقم التعريفي');
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

        $new = News::find($id);

        $rules = [
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'body' => ['required'],
            'author' => ['required', 'string', 'max:100', 'min:3','not_regex:/([%\$#\*<>]+)/'],
            'media' => 'nullable',
            'media.*' => 'image|mimes:jpeg,png,jpg,JPG|max:100040',
            'category_id' => ['required', 'integer'],
        ];

        $this->validate($request, $rules);

        if ($new) {

            $new->update([
                "title" => $request->title,
                "body" => strip_tags($request->body),
                "author" => $request->author,
                "category_id" => $request->category_id
            ]);

            $medias = [];

            $new_media = DB::table('media')->where('news_id',$new->id)->get()->toArray();

            foreach ($new_media as $media) {
                array_push($medias, $media->filename);
            }

            $checkedimages = $request->input('checkedimages');


            if ($checkedimages != null) {
                $deleted_media = array_diff($medias, $checkedimages);
            } else {
                $deleted_media = $medias;
            }


            if (!empty($deleted_media)) {
                foreach ($deleted_media as $media) {
                    DB::table('media')->where('filename', $media)->delete();
                    unlink('media/' . $media);
                }
            }

            if ($request->hasFile('media')) {

                $files = $request->file('media');

                foreach ($files as $file) {

                    $fileextension = $file->getClientOriginalExtension();

                    $filename = $file->getClientOriginalName();
                    $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;


                    if ($file->move('media', $file_to_store)) {
                        Media::create([
                            'filename' => $file_to_store,
                            'news_id' => $new->id,
                        ]);
                    }
                }

            }
            if($new->state == "pending"){
                return redirect()->route('admin.pending_news')->withStatus('لقد تم تعديل بيانات الخبر بنجاح');
            }
            else{
                return redirect()->route('admin-news.index')->withStatus('لقد تم تعديل بيانات الخبر بنجاح');
            }
        }
        else{
            return redirect()->route('admin-news.index')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
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

        $new = News::find($id);

        if ($new) {
            $new_media = DB::table('media')->where('news_id',$new->id)->get();

            foreach ($new_media as $media) {
                DB::table('media')->where('id', $media->id)->delete();
                unlink('media/' . $media->filename);
            }

            $new->delete();

            if($new->state == "pending"){
                return redirect()->route('admin.pending_news')->withStatus('لقد تم حذف الخبر بنجاح');
            }
            else{
                return redirect()->route('admin-news.index')->withStatus('لقد تم حذف الخبر بنجاح');
            }
        } else {
            return redirect()->route('admin-news.index')->withStatus('ليس هناك خبر بهذا الرقم التعريفي');
        }
    }

    public function getPendingNews()
    {
        //
        $approved = false;
        $news = News::where('state',"pending")->orderBy('id', 'desc')->get();
        foreach ($news as $new){
            $new->category = DB::table('categories')->where('id',$new->category_id)->first();
        }
        return view('Admin.news.index',compact('news','approved'));
    }

    public function approveNew($id)
    {
        //
        $new = News::find($id);
        if($new)
        {
            $new->update(['state' => "approved"]);
            return redirect()->route('admin.pending_news')->withStatus('لقد تم قبول هذا الخبر بنجاح');
        }
        else
        {
            return redirect()->route('admin-news.index')->withStatus('ليس هناك قسم بهذا الرقم التعريفي');
        }
    }
}
