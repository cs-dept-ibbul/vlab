<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class NextIfLoggedIn
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
            return redirect('/');
        }
        else {
            return $next($request);                            
        }
        
    
    }
}
