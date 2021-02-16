<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class experimentController extends Controller
{
    public function vernierCaliper()
    {
    	return view('experiment/vernier_caliper');
    }
    public function micrometerScrewGuage()
    {
    	return view('experiment/micrometer');    	
    }
    public function simplePendulum()
    {
    	return view('experiment/simple_pendulum');
    }
}
