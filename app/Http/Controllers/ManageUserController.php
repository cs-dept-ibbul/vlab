<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    
    public function index()
    {
    	return view('admin.manage_user');
    }
}
