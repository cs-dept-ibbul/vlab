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
        $course_id = $request->get('course_id');
        $dateOpen = $request->get('date_open');
        $dateClose = $request->get('date_close');
        $accessCode = $request->get('access_code');
        $mode = $request->get('mode');
        $setdata = json_decode($request->get('setdata'));
        $limitation = $request->get('limitation') ?? '0';

        $experimentIds = explode(',', $experimentIds);
        
        $weeklyWork->id = $id;
        $weeklyWork->title = $title;
        $weeklyWork->course_id = $course_id;
        $weeklyWork->date_open = $dateOpen;
        $weeklyWork->date_close = $dateClose;
        $weeklyWork->access_code = $accessCode;
        $weeklyWork->mode = $mode;
        $weeklyWork->limitation = $limitation;
        $weeklyWork->school_id = $this->schoolId;
        $weeklyWork->faculty_id = $this->facultyId;
        $weeklyWork->session_id = $this->currentSession;
        
        if ($weeklyWork->save()) {
            foreach ($experimentIds as $experimentId) {
                $this->assignWeeklyWorkExperiment($id, $experimentId,$setdata);
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
        $mode = $request->get('mode');
        $setdata = json_decode($request->get('setdata'));        

        if ($weeklyWork) {

            $request->get('title') != null ? $weeklyWork->title = $request->get('title') : null;
            $request->get('experiment_id') != null ? $weeklyWork->experiment_id = $request->get('experiment_id') : null;
            $request->get('date_open') != null ? $weeklyWork->date_open = $request->get('date_open') : null;
            $request->get('date_close') != null ? $weeklyWork->date_close = $request->get('date_close') : null;
            $request->get('access_code') != null ? $weeklyWork->access_code = $request->get('access_code') : null;
            $request->get('limitation') != null ? $weeklyWork->limitation = $request->get('limitation') : null;
            $weeklyWork->mode = $mode;
            $save = $weeklyWork->save();
            $experimentIds = json_decode($request->get('experiment_ids'));            
            if ($save) {
                 foreach ($experimentIds as $experimentId) {
                        $this->assignWeeklyWorkExperiment($workId, $experimentId,$setdata);
                 }
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


        $allData = array();
        $weeklyWorks = CourseStudents::with(['course','weekly_work.weekly_work_experiments.experiments','weekly_work.weekly_work_experiments.result'=>function($query)use($user_id){
            $query->where('user_id',$user_id);
        }])->where(['session_id'=>$this->currentSession,'user_id'=>$user_id,'course_id'=>$course_id])->get();
        
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
                    'mode'=> $value->weekly_work[0]->mode,
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

    }

    public function getStudentWeeklyWork2(Request $request)
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


        $allData = array();
        $weeklyWorks = CourseStudents::with(['course'=>function($query){
            $query->with('course_resources');
        },'weekly_work.weekly_work_experiments.experiments','weekly_work.weekly_work_experiments.result'=>function($query)use($user_id){
            $query->where('user_id',$user_id);
        }])->where(['session_id'=>$this->currentSession,'user_id'=>$user_id,'course_id'=>$course_id])->first();

        $allData = [];        
        for ($i=0; $i < sizeof($weeklyWorks->weekly_work) ; $i++) { 
            $value = $weeklyWorks;
            $save =[];
            $experiments =[];                            
            if ($value->weekly_work[$i]??'' != '') {
                $weekly_work_experiments = $value->weekly_work[$i]->weekly_work_experiments;
                foreach ($weekly_work_experiments as $key1 => $value1) {                                           
                    $experiments[]=[
                        'weekly_experiment_work_id'=>$value1->id,
                        'id'=>$value1->experiments->id,
                        'name'=>$value1->experiments->name,
                        'page'=>$value1->experiments->page,
                        'resourceUrl'=>$value1->experiments->resourceUrl,
                        'experiment_results'=> $value1->result                
                    ];
                }
            
                $allData[] = [            
                    'access_code'=> $value->weekly_work[$i]->access_code,
                    'mode'=> $value->weekly_work[$i]->mode,
                    'course_id'  =>  $value->weekly_work[$i]->course_id,
                    'date_close'  =>  $value->weekly_work[$i]->date_close,
                    'date_open'  =>  $value->weekly_work[$i]->date_open,
                    'expired'  =>  $value->weekly_work[$i]->expired,
                    'faculty_id'  =>  $value->weekly_work[$i]->faculty_id,
                    'limitation'  =>  $value->weekly_work[$i]->limitation,
                    'school_id'  =>  $value->weekly_work[$i]->school_id,
                    'session_id'  =>  $value->weekly_work[$i]->session_id,
                    'title'       =>  $value->weekly_work[$i]->title,
                    'course'=>$value->course,
                    'experiments'=>$experiments
                ];
            }               
        }
        foreach ($weeklyWorks as $key => $value) {

        }
        return $allData;

    }

    public function getWeeklyWorks()
    {

        $weeklyWorks = WeeklyWork::select(['id as work_id','id','mode','course_id','access_code','date_open','date_close','session_id','limitation','title'])->with(['course','weekly_work_experiments.experiments'])->where('status','Active')->get();
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

    public function assignWeeklyWorkExperiment($workId='', $experimentId, $data)
    {
        $setData = '[]';
        
        //str_replace('"','',str_replace('["','', $experimentId));
        if (json_encode($data) != '[]' && json_encode($data) !='[[]]' && json_encode($data) !='' ) {
            foreach ($data as $key => $value) {     
                if ($key  === $experimentId) {
                    $setData = json_encode($value);
                }
            }        
        }

  
        $check = WeeklyWorkExperiment::where(['experiment_id'=>$experimentId, 'weekly_work_id'=>$workId])->first();
        if (is_null($check)) {
            $weeklyWorkExperiment = new WeeklyWorkExperiment();
            $id = Util::uuid();
            $weeklyWorkExperiment->id = $id;
            $weeklyWorkExperiment->weekly_work_id = $workId;
            $weeklyWorkExperiment->experiment_id = $experimentId;
            $weeklyWorkExperiment->setdata = $setData;                
        }else{
            $weeklyWorkExperiment = WeeklyWorkExperiment::find($check->id);
            $weeklyWorkExperiment->setdata = $setData;
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
