<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCourseController extends Controller
{
    public function index(){
        return view('viewCourse');
    }

    
}
?>