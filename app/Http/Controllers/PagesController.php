<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function index(){
        return view('root');
    }

    public function getFacultyName(Request $requset){
    	return DB::table('faculties')->where('id', $requset->get('faculty_id'))->first();
    }
}
