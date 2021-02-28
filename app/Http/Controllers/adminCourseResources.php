<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminCourseResources extends Controller
{
    public function index(){
        return view('admin/CourseResources');
    }
}
