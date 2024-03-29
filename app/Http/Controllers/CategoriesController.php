<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $category = Category::find($id);

        $sponsors = Sponsor::whereNotIn('type',['footer','body'])->get();

        if($category){
            $category_latest_news = DB::table('news')->where('category_id',$category->id)
                ->where('state',"approved")
                ->limit(4)
                ->get();

            foreach ($category_latest_news as $new) {
                $new->media = DB::table('media')->where('news_id', $new->id)->get();
            }

            $category->news = DB::table('news')->where('category_id',$category->id)
                ->where('state',"approved")
                ->orderBy('created_at','desc')->paginate(5);

            if(count($category->news) > 0){
                foreach ($category->news as $new){
                    $new->media = DB::table('media')->where('news_id',$new->id)->get();
                }
            }

            return view('category',compact('category_latest_news','category','sponsors'));
        }
        else{
            return redirect()->route('main')->withStatus('ليس هناك خبر بهذا الرقم التعريفي');
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
    }
}
