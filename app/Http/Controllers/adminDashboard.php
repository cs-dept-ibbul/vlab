<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminDashboard extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    
}
?>