<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddExperimentController extends Controller
{
    //
    public function index()
    {
    	return view('instructor.add_experiment');
    }

    public function createdexperiment(){

    	return view('instructor.viewcreatedexperiment');

    }
}
