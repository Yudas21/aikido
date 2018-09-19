<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Kurikulum;
use App\Organization;

class AboutController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
    	$about = Page::where('name', 'Tentang Kami')->limit(1)->first();
    	$kurikulum = Kurikulum::all();
    	$organization = Organization::all();
        return view('front.about', compact('about','kurikulum', 'organization'));
    }
}
