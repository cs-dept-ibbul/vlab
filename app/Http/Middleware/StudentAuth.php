<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('info')){
            $userData = session('info')->data->user ?? '';
            $role = $userData->role_id ?? '';            
            $studentRole =  config('calculations.default_roles.student');
            
            if ($role == $studentRole) {
                return $next($request);                
            }else{
                return redirect('/login');
            }
        }
        else {
            return redirect('/login');
        }
        
    
    }
}
