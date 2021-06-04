<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCourseController extends Controller
{
    public function index(){
            
        return view('viewCourse');
    }
	public function forInstructor(){
        return view('instructor.view_course');
    }
    public function courseExperiments()
    {
        return view('instructor.course_experiment');    	
    }

    public function courseResources()
    {
        return view('instructor.course_resources');    	
    }
    
}
?>