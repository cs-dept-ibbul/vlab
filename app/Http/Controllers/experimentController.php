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
    public function circuitconnection1()
    {
        return view('experiment/circuitconnection1');
    }
    public function circuitconnection2()
    {
        return view('experiment/circuitconnection2');
    }
    public function simpleCircuit(){
        return view('experiment/simple_circuit');        
    }
    public function resistor(){
        return view('experiment/resistor_color_code');
    }
}
