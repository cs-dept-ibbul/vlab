<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \DB;
use App\Models\WeeklyWork;
use Session;
class WhoAreYou
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
            $user_id = $userData->id;
            $role = $userData->role_id ?? '';            
            $weeklyExperimentWorkId =  $request->route()->parameter('id');
            $page = explode('/', $request->route()->uri)[0];
            //if its instructor allow experiment without saving;                            
            if ($role == config('calculations.default_roles.student')) {    


                $currentSession = DB::table('session')->where(['is_current'=>1,'status'=>'Active'])->first()->id;
                $existInDB = WeeklyWork::join('weekly_work_experiments','weekly_work_experiments.weekly_work_id', 'weekly_works.id')->join('experiments', 'weekly_work_experiments.experiment_id','experiments.id')->join('user_courses', 'user_courses.course_id','weekly_works.course_id')->leftJoin('experiment_results', function($query){
                    $query->on(['user_courses.user_id'=>'experiment_results.user_id','weekly_work_experiments.id'=>'experiment_results.weekly_work_id']);
                })->where([
                        'weekly_works.session_id'=>$currentSession,                        
                        'weekly_work_experiments.id'=>$weeklyExperimentWorkId,
                        'experiments.page'=>$page,
                        'user_courses.user_id'=>$user_id,   
                        'user_courses.session_id'=>$currentSession                     
                    ])->first();                
                if ($existInDB->completion_status != null) {
                    $time= explode(':', $existInDB->time_left);                    
                }else{
                    $time= explode(':', $existInDB->limitation);                                        
                }
                $time_left = [
                    'hour'=> (int)($time[0]),
                    'minute'=>(int)($time[1])
                ];
                session(['time_left'=>$time_left]);                
                session(['access_code'=>$existInDB->access_code]);                
                session(['experimentMode'=>$existInDB->mode]);                
                session(['setdata'=>$existInDB->setdata]);     
                session(['user_type'=>'student']);      
                $expired = $existInDB->expired?? true;                
                if(!$expired){
                    if ($existInDB->mode != 1) {
                        //allow re-attempt                        
                        $time= explode(':', $existInDB->limitation);                                        
                        $time_left = [
                            'hour'=> (int)($time[0]),
                            'minute'=>(int)($time[1])
                        ];
                        session(['time_left'=>$time_left]);                
                        return $next($request);                                                                                
                    }else{
                        //does not allow re-attempt except if reset from instructor to reatempt                        
                        if ($existInDB->restart??'' != '') {
                            # code...
                            if($existInDB->restart == "Allow") {
                                if ($existInDB->time_left != '00:00') {
                                    return $next($request);                                                        
                                }else{
                                    return redirect('/closed-409')->with(['weekly_work_id'=>$existInDB->weekly_work_id, 'reattempt_page'=>$existInDB->page]);                                                                                                               
                                }                                                     
                            }else{
                                return redirect('/closed-409')->with(['weekly_work_id'=>$existInDB->weekly_work_id, 'reattempt_page'=>$existInDB->page]);                                                                                                               
                                                                                        
                            }
                        }else{
                            return $next($request);
                        }
                    }
                }else{
                    return redirect('/no-access');
                }
            }else if($role == config('calculations.default_roles.instructor')){                                
                $page = explode('/', $request->route()->uri);
                $weeklyExperimentWorkId = DB::table('experiments', 'e')->join('weekly_work_experiments', 'weekly_work_experiments.experiment_id', 'e.id')->select('weekly_work_experiments.id as weeklyExperimentWorkId')->where('e.page',$page[0])->first()->weeklyExperimentWorkId;                
                 $currentSession = DB::table('session')->where(['is_current'=>1,'status'=>'Active'])->first()->id;
                 $existInDB = WeeklyWork::join('weekly_work_experiments','weekly_work_experiments.weekly_work_id', 'weekly_works.id')->join('experiments', 'weekly_work_experiments.experiment_id','experiments.id')->join('user_courses', 'user_courses.course_id','weekly_works.course_id')->leftJoin('experiment_results', function($query){
                    $query->on(['user_courses.user_id'=>'experiment_results.user_id','weekly_work_experiments.id'=>'experiment_results.weekly_work_id']);
                })->where([
                        'weekly_work_experiments.id'=>$weeklyExperimentWorkId,
                        'experiments.page'=>$page[0],                                                
                    ])->first();                    
                $time_left = [
                    'hour'=> 3,
                    'minute'=>20
                ];
                session(['time_left'=>$time_left]);                
                session(['access_code'=>'free']);                
                session(['experimentMode'=>false]);                
                session(['setdata'=>$existInDB->setdata]);    
                session(['time_left'=>$time_left]);          
                session(['user_type'=>'instructor']);          
                                
                if ($request->route()->parameter('id') == null) {
                    return redirect($page[0].'/'.$weeklyExperimentWorkId);
                }                
                return $next($request);        
                /*if(!$expired){
                }else{
                    return redirect('/no-access');
                }*/
            }else{
                return redirect('/no-access');                
            }
        }
        else {
            return redirect('/login');
        }
        
    
    }
}
