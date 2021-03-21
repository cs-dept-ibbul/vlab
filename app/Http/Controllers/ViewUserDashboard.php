<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewUserDashboard extends Controller
{
    public function index(){
    	$user = session('info')->data->user;    
        return view('UserDashboard', compact(['user']));
    }

}
