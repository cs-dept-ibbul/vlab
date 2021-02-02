<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class experimentController extends Controller
{
    public function vernierCaliper()
    {
    	return view('experiment/vernier_caliper');
    }
}
