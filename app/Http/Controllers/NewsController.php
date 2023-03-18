<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
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
        $new = News::find($id);

        $body_sponsor = DB::table('sponsors')->where('type','body')->first();

        $sponsors = Sponsor::whereNotIn('type',['footer','body'])->get();

        $footer_sponsor = DB::table('sponsors')->where('type','footer')->first();

        if($new){
            $new->media = DB::table('media')->where('news_id',$new->id)->get();

            $category_news = DB::table('news')->where('category_id',$new->category_id)
                ->where('state',"approved")
                ->orderBy('created_at','desc')->limit(6)->get();

            foreach ($category_news as $category_new){
                $category_new->media = DB::table('media')->where('news_id',$category_new->id)->get();
            }

            return view('show',compact('new','category_news','sponsors','body_sponsor','footer_sponsor'));
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
