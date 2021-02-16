<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCourses extends Controller
{
    public function index(){
        return view('mycourses');
    }

    
}
?>