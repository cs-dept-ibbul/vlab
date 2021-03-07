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
    public function vicelabexp2()
    {
        return view('experiment/vicelabexp2');
    }
    public function vicelabexp3()
    {
        return view('experiment/vicelabexp3');
    }
}
