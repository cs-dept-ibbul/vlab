<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCourses extends Controller
{
    public function index(){
        return view('mycourses');
    }

    public function review(Request $request){
    	//return dd($request->id);
    	if ($request->id != null) {
        	return view('reviewcourse');    		
    	}else{
    		return abort(404);
    	}
    }
    
}
?>