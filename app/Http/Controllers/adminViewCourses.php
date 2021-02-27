<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminViewCourses extends Controller
{
    public function index(){
        return view('admin/viewcourses');
    }
}
