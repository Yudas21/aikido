<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index(){
    	$data = News::where('news_publish', 1)->orderBy('id', 'desc')->paginate(6);
    	return view('front.news', compact('data'));
    }

    public function detail($slug){
    	$data = News::where('news_slug', $slug)->get();
    	return view('front.news_detail', compact('data'));
    }
}
