<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index(){

        $categories = DB::table('categories')->get();

        $body_sponsor = DB::table('sponsors')->where('type','body')->first();

        $employees = Employee::all();

        $sponsors = Sponsor::all();

        $latest_news = DB::table('news')->where('state',"approved")->orderBy('created_at','desc')->limit(7)->get();

        $latest_four_news = DB::table('news')->where('state',"approved")->orderBy('created_at','desc')->limit(4)->get();

        foreach ($categories as $category){
            $category->news = DB::table('news')->where('category_id',$category->id)
                ->where('state',"approved")
                ->orderBy('created_at','desc')->limit(3)->get();

            if(count($category->news) > 0){
                foreach ($category->news as $new){
                    $new->media = DB::table('media')->where('news_id',$new->id)->get();
                }
            }
        }

        if(count($latest_news) > 0) {
            foreach ($latest_news as $new) {
                $new->media = DB::table('media')->where('news_id', $new->id)->get();
            }
        }

        if(count($latest_four_news) > 0) {
            foreach ($latest_four_news as $new) {
                $new->media = DB::table('media')->where('news_id', $new->id)->get();
            }
        }

        return view('welcome',compact('categories','latest_news','latest_four_news','sponsors','body_sponsor','employees'));
    }
}
