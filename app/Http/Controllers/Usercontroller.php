<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function dashboard(){
        return view('frontend.dashboard');
    }
}
