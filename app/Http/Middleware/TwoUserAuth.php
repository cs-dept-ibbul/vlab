<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class TwoUserAuth
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
            if ($role == '3e836670-a9d5-4c78-bfb8-0bdcda27263c' || $role == '9260655c-6933-45a0-8d01-6de3d6a52657') {
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
