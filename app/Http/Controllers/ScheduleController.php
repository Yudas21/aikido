<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index(){
    	$data = Schedule::all();
    	return view('front.schedule', compact('data'));
    }
}
