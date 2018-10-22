<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\ImageGallery;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_news = DB::table('news as a')->select('a.id','a.news_title', 'a.news_content', 'a.news_image','a.news_slug','a.created_at','b.name as author')->join('users as b', 'b.id', '=', 'a.created_by')->where('a.news_publish', '1')->orderBy('a.created_at', 'desc')->limit(3)->get();
        $latest_foto = ImageGallery::orderBy('created_at', 'desc')->limit(3)->get();
        return view('front.home', compact('latest_news', 'latest_foto'));
    }
}
