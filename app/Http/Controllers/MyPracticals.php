<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myPracticals extends Controller
{
    public function index(){
        return view('admin.myPracticals');
    }

    
}
?>