<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageFacultyController extends Controller
{
    //
    public function index()
    {
    	return view('admin.manage_faculty');
    }
}
