<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(){
        //return view('');
    }

    public function viewstudent(){
        return view('instructor.view_student');
    }

    
}
?>