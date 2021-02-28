<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewUserDashboard extends Controller
{
    public function index(){
        return view('UserDashboard');
    }

}
