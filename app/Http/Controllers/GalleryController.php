<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function foto(){
    	return view('front.gfoto');
    }

    public function video(){
    	return view('front.gvideo');
    }
}
