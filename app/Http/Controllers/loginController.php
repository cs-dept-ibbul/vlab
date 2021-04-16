<?php


namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Route;

class loginController extends Controller
{  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
   public function index(){
        return view('login');
    } 

    public function process_login(Request $request)
    {
        
        $info = json_decode($request->get('data'));      
        session(['info' => $info]);        
        return redirect('/UserDashboard');
    }

    public function logout(Request $request)
    {
        //\Auth::logout();
        $request->session()->flush();
        $route = app('router')->getRoutes(url()->previous())->match(app('request')->create(url()->previous()))->getName();        
        if ($route == 'home') {
            return redirect('/');        
        }
        return redirect()->route('login');
    }
}