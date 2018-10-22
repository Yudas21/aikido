<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends Controller
{
    public function index(){
    	$data = DB::table('news as a')->select('a.id','a.news_title', 'a.news_content', 'a.news_image','a.news_slug','a.created_at','b.name as author')->join('users as b', 'b.id', '=', 'a.created_by')->where('a.news_publish', '1')->orderBy('a.created_at', 'desc')->paginate(6);
    	return view('front.news', compact('data'));
    }

    public function detail($slug){
    	$pecah = explode('-', $slug);
    	$data = DB::table('news as a')->select('a.id','a.news_title', 'a.news_content', 'a.news_image','a.news_slug','a.created_at','b.name as author')->join('users as b', 'b.id', '=', 'a.created_by')->where('a.news_publish', '1')->where('a.id', $pecah[0])->get();
    	$other = News::where('news_publish', '1')->where('id', '!=',$pecah[0])->orderBy('id', 'desc')->get();
    	return view('front.news_detail', compact('data','other'));
    }
}
