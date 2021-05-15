<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeeklyWork;
use App\Models\CourseStudents;
use App\Models\WeeklyWorkExperiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WeeklyWorkController extends Controller
{

    private $currentUser;
    private $schoolId;
    private $facultyId;
    private $currentSession;

    public function __construct()
    {
        if (Auth::check()) {
            $this->currentUser = Auth::user();
            $this->schoolId = $this->currentUser->school_id;
            $this->facultyId = $this->currentUser->faculty_id;
            $this->currentSession = SessionController::getCurrentSessionId();
        }
    }

    public function create(Request $request)
    {
        $weeklyWork = new weeklyWork();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date_open' => 'required',
            'date_close' => 'required',
            'experiment_ids' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $title = $request->get('title');
        $experimentIds = $request->get('experiment_ids');
        $dateOpen = $request->get('date_open');
        $dateClose = $request->get('date_close');
        $accessCode = $request->get('access_code');
        $limitation = $request->get('limitation') ?? '0';

        $experimentIds = explode(',', $experimentIds);
        
        $weeklyWork->id = $id;
        $weeklyWork->title = $title;
        $weeklyWork->date_open = $dateOpen;
        $weeklyWork->date_close = $dateClose;
        $weeklyWork->access_code = $accessCode;
        $weeklyWork->limitation = $limitation;
        $weeklyWork->school_id = $this->schoolId;
        $weeklyWork->faculty_id = $this->facultyId;
        $weeklyWork->session_id = $this->currentSession;
        
        if ($weeklyWork->save()) {
            foreach ($experimentIds as $experimentId) {
                $this->assignWeeklyWorkExperiment($id, $experimentId);
            }
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_id field is required"], 400);
        }

        $workId = $request->get('work_id');
        $weeklyWork = WeeklyWork::find($workId);

        if ($weeklyWork) {

            $request->get('title') != null ? $weeklyWork->title = $request->get('title') : null;
            $request->get('experiment_id') != null ? $weeklyWork->experiment_id = $request->get('experiment_id') : null;
            $request->get('date_open') != null ? $weeklyWork->date_open = $request->get('date_open') : null;
            $request->get('date_close') != null ? $weeklyWork->date_close = $request->get('date_close') : null;
            $request->get('access_code') != null ? $weeklyWork->access_code = $request->get('access_code') : null;
            $request->get('limitation') != null ? $weeklyWork->limitation = $request->get('limitation') : null;

            $save = $weeklyWork->save();

            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No weekly work with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_id field is required"], 400);
        }

        $workId = $request->get('work_id');
        $weeklyWork = WeeklyWork::find($workId);

        if ($weeklyWork) {            
            $weeklyWork->status = 'Inactive';
            if ($weeklyWork->save()) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'Weekly work Not found'], 404);
        }
        return response()->json(['success' => false], 400);
    }

    public function getStudentWeeklyWork(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_id field is required"], 400);
        }

        $session_id = $this->currentSession;
        $course_id = $request->get('course_id');
        $user_id = $request->get('user_id');
/*
        $weeklyWorks = WeeklyWork::select('weekly_works.*')->with(['weekly_work_experiments.experiments'])->join('courses','courses.id','weekly_works.course_id')->where(['weekly_works.session_id'=>$session_id, 'weekly_works.course_id'=>$course_id,'weekly_works.status'=>'Active'])->get();
        //return dd($weeklyWorks);

        $studentResult = CourseStudents::with(['course.results'=>function($query) use($user_id){
                            $query->where(['experiment_results.session_id'=>$this->currentSession,'experiment_results.user_id'=>$user_id]);
                        }])->get();*/

        $allData = array();
        $weeklyWorks = CourseStudents::with(['course','weekly_work.weekly_work_experiments.experiments','weekly_work.weekly_work_experiments.result'=>function($query)use($user_id){
            $query->where('user_id',$user_id);
        }])->where(['session_id'=>$this->currentSession,'user_id'=>$user_id])->get();
        $allData = [];
        foreach ($weeklyWorks as $key => $value) {
            $save =[];
            $experiments =[];                
            if ($value->weekly_work[0]??'' != '') {
                $weekly_work_experiments = $value->weekly_work[0]->weekly_work_experiments;
                foreach ($weekly_work_experiments as $key1 => $value1) {                                           
                    $experiments[]=[
                        'weekly_experiment_work_id'=>$value1->id,
                        'id'=>$value1->experiments->id,
                        'name'=>$value1->experiments->name,
                        'page'=>$value1->experiments->page,
                        'experiment_results'=> $value1->result                
                    ];
                }
                //$save =  unset($value->weekly_work[0]['weekly_work_experiments']);                                
                //$save[$key3] = $value3;
                
                $allData[] = [            
                    'access_code'=> $value->weekly_work[0]->access_code,
                    'course_id'  =>  $value->weekly_work[0]->course_id,
                    'date_close'  =>  $value->weekly_work[0]->date_close,
                    'date_open'  =>  $value->weekly_work[0]->date_open,
                    'expired'  =>  $value->weekly_work[0]->expired,
                    'faculty_id'  =>  $value->weekly_work[0]->faculty_id,
                    'limitation'  =>  $value->weekly_work[0]->limitation,
                    'school_id'  =>  $value->weekly_work[0]->school_id,
                    'session_id'  =>  $value->weekly_work[0]->session_id,
                    'title'       =>  $value->weekly_work[0]->title,
                    'course'=>$value->course,
                    'experiments'=>$experiments
                ];
            }   

        }
        return $allData;
     /*   //get out only courses which include result in it
        $courseWithResultFiltered = array();

        for ($i=0; $i < sizeof($studentResult) ; $i++) { 
            array_push($courseWithResultFiltered, $studentResult[$i]['course']);
        }
               
        function filter_get_and_result($array, $experimentID, $courseID,$weeklyWorkId){
            $output='';
            $a1=$a2="";
            
            foreach ($array as $key => $value) { 

            //loop into user courses                 
                if ($value->id === $courseID) {                                        
                    if (!is_null($value->results)) {
                        //$toArray =json_decode(json_encode($value->results),true);   
                        foreach ($value->results as $key2 => $value2) {
                             if ($value2->weekly_work_id === $weeklyWorkId && $experimentID === $value2->experiment_id) {
                                 $output = $value2;
                                 break;
                             }
                         } 
                    }
                }
                if ($output != '') {
                    break;
                }
            }
            return $output;
        }

        foreach ($weeklyWorks as $key => $week) {
            //$week = $weekly->attributesToArray();                        
            $allData[$key] = $week->getOriginal();                                            
            $allData[$key]['course'] = $week->course;                                            
            $allData[$key]['experiments']= [];                  
            foreach ($week->weekly_work_experiments as $key2 => $experiment) {

                $experimentId = $experiment->experiment_id;
                $courseId = $week->course_id;                                
                $gg = '';
                $gg = filter_get_and_result($courseWithResultFiltered, $experimentId, $courseId, $experiment->id);
                $rr = [];
                if ($gg != "") {
                   //$weeklyExperimentResult[] = $gg[0]; 
                    $rr = $gg;

                }                
                $allData[$key]['experiments'][$key2] =array(
                    'experiment_results'=> $rr,'weekly_experiment_work_id'=>$experiment->id,'experiment'=>$experiment->experiments);                
            } 


        }
                    
        return response()->json($allData, 200);*/
    }

    public function getWeeklyWorks()
    {

        $weeklyWorks = WeeklyWork::select(['id as work_id','id','course_id','access_code','date_open','date_close','session_id','limitation','title'])->with(['course','weekly_work_experiments.experiments'])->where('status','Active')->get();
        return response()->json($weeklyWorks, 200);
    }

    public function getWeeklyWork(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_id field is required"], 400);
        }

        $workId = $request->get('work_id');
        $weeklyWork = WeeklyWork::find($workId);

        if ($weeklyWork) {
            return response()->json($weeklyWork->with('experiments')->get(), 200);
        } else {
            return response()->json(['error' => 'Weekly Work not found'], 404);
        }
    }

    public function assignWeeklyWorkExperiment($workId, $experimentId)
    {
       
        $weeklyWorkExperiment = new WeeklyWorkExperiment();
        $id = Util::uuid();
        $weeklyWorkExperiment->id = $id;
        $weeklyWorkExperiment->weekly_work_id = $workId;
        $weeklyWorkExperiment->experiment_id = $experimentId;

        $checkWork = WeeklyWorkExperiment::where(['weekly_work_id' => $workId, 'experiment_id' => $experimentId])->first();
        if ($checkWork) {
            return response()->json(['error' => 'This experiment has already been assigned to this work'], 409);
        }

        if ($weeklyWorkExperiment->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function deleteWorkExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_experiment_id field is required"], 400);
        }

        $workExperimentId = $request->get('work_experiment_id');
        $weeklyWorkExperiment = WeeklyWorkExperiment::find($workExperimentId);

        if ($weeklyWorkExperiment) {
            $weeklyWorkExperiment->status = 'Inactive';
            if ($weeklyWorkExperiment->save()) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'Weekly Work Experiment Not found'], 404);
        }
        return response()->json(['success' => false], 400);
    }

    public function updateWorkExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_experiment_id field is required"], 400);
        }

        $workExperimentId = $request->get('work_experiment_id');
        $weeklyWorkExperiment = WeeklyWorkExperiment::find($workExperimentId);

        if ($weeklyWorkExperiment) {

            $request->get('weekly_work_id') != null ? $weeklyWorkExperiment->weekly_work_id = $request->get('weekly_work_id') : null;
            $request->get('experiment_id') != null ? $weeklyWorkExperiment->experiment_id = $request->get('experiment_id') : null;

            $save = $weeklyWorkExperiment->save();

            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No weekly Work Experiment with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function getWeeklyWorkExperiments()
    {
        $weeklyWorkExperiments = WeeklyWorkExperiment::with('weeklyWork')->with('experiments')->get();
        return response()->json($weeklyWorkExperiments, 200);
    }

    public function getWeeklyWorkExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "work_experiment_id field is required"], 400);
        }

        $workExperimentId = $request->get('work_experiment_id');
        $weeklyWorkExperiment = WeeklyWorkExperiment::where('id', $workExperimentId)->with('weeklyWork')->with('experiments')->get();

        if (sizeof($weeklyWorkExperiment) > 0) {
            return response()->json($weeklyWorkExperiment, 200);
        } else {
            return response()->json(['error' => 'Weekly Work Experiment not found'], 404);
        }
    }
}
