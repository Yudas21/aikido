<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use App\VideoGallery;


class GalleryController extends Controller
{
    public function foto(){
    	$data = ImageGallery::where('publish', '1')->orderBy('id', 'desc')->paginate(12);
    	return view('front.gfoto', compact('data'));
    }

    public function video(){
    	$data = VideoGallery::where('publish', '1')->orderBy('id', 'desc')->paginate(12);
    	return view('front.gvideo', compact('data'));
    }
}
