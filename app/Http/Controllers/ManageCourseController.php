<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageCourseController extends Controller
{
    public function index(){
        return view('instructor.createCourse');
    }

	public function viewCourse(){
        return view('instructor.view_created_course');
    }
    
}
