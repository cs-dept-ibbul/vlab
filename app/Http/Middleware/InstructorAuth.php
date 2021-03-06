<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class InstructorAuth
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
            $instructorRole =  config('calculations.default_roles.instructor');
            if ($role == $instructorRole) {
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
