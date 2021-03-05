<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminViewStudentsdashboard extends Controller
{
    public function index(){
        return view('admin/ViewStudentsdashboard');
    }
}
