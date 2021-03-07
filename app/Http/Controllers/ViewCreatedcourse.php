<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Viewcreatedcourse extends Controller
{
    public function index(){
        return view('admin/Viewcreatedcourse');
    }
}
