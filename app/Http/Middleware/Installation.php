<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Route;
class Installation
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

        if(!file_exists(storage_path('installed'))){
            $route =explode('/',$request->path())[0];
            if($route != 'update' && $route != 'install'){                
                return redirect('/update');
            }
            return $next($request);   
        }else{        
            return $next($request);   
        }
    
    }
}
