<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewMyPracticalController extends Controller
{
    public function index(){
        return view('MyPractical');
    }
}
