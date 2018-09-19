<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $latest_news = News::where('news_publish', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $latest_foto = ImageGallery::orderBy('created_at', 'desc')->limit(3)->get();
        return view('front.home', compact('latest_news', 'latest_foto'));
    }
}
