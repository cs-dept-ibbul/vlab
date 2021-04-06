<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageDepartmentController extends Controller
{
    //
    public function index()
    {
    	return view('admin.manage_department');
    }
}
