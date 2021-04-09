<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateCourseController extends Controller
{
    public function index(){
        return view('admin.createCourse');
    }

    
}
?>