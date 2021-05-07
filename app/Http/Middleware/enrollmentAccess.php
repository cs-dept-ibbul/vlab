<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Models\CourseStudents;
class EnrollmentAccess
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
        $course_id =  $request->route()->parameter('id');
        $userData = session('info')->data->user ?? '';
        if($course_id != '' ){
            $enrolled = CourseStudents::where(['course_id'=>$course_id, 'user_id'=>$userData->id, 'session_id'=>$userData->session_id])->first();                    
            if ($enrolled != null) {
                return $next($request);                
            }else{
                return redirect('/unauthorized-e');
            }
        }
        else {
            return redirect('/my-course');
        }
        
    
    }
}
