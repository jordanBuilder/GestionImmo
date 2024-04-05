<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $properties = Property::OrderBy('created_at','desc')->limit(4)->get();
        return view('home',['properties'=>$properties]);
    }
}
