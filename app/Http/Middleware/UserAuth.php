<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class UserAuth
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
            if ($role == 1) {
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
