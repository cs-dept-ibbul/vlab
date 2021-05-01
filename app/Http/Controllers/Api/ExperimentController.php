<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseExperiment;
use App\Models\Experiment;
use App\Models\ExperimentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use \DB;

class ExperimentController extends Controller
{

    private $currentUser;
    private $schoolId;
    private $facultyId;
    private $userId;
    private $currentSession;

    public function __construct()
    {
        if (Auth::check()) {
            $this->currentUser = Auth::user();
            $this->schoolId = $this->currentUser->school_id;
            $this->facultyId = $this->currentUser->faculty_id;
            $this->userId = $this->currentUser->id;
            $this->currentSession = SessionController::getCurrentSessionId();
        }
    }

    public function getCourseExperiments()
    {
        $experiments = DB::select('SELECT c.id as course_id, e.id as experiment_id,e.name as name FROM course_experiment AS c INNER JOIN experiments as e on c.experiment_id = e.id');
        return response()->json($experiments, 200);
    }

    public function create(Request $request)
    {
        $experiment = new Experiment();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'experiment_number' => 'required',
            'experiment_intro' => 'required',
            'experiment_goal' => 'required',
            'experiment_mock' => 'required',
            'apparatus' => 'required',
            'procedures' => 'required',
            'exercise' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $name = $request->get('name');
        $experiment_number = $request->get('experiment_number');
        $experiment_intro = $request->get('experiment_intro');
        $experiment_goal = $request->get('experiment_goal');
        $experiment_mock = $request->get('experiment_mock');
        $apparatus = $request->get('apparatus');
        $experiment_resource = $request->get('experiment_resource');
        $procedures = $request->get('procedures');
        $exercise = $request->get('exercise');
        $required = $request->get('required');
        $theory = $request->get('theory');
        $tables = $request->get('tables');
        $graph = $request->get('graph');
        $status = $request->get('status') ?? 'Active';

        $experiment->id = $id;
        $experiment->name = $name;
        $experiment->experiment_number = $experiment_number;
        $experiment->experiment_intro = $experiment_intro;
        $experiment->experiment_goal = $experiment_goal;
        $experiment->experiment_mock = $experiment_mock;
        $experiment->apparatus = $apparatus;
        $experiment->experiment_resource = $experiment_resource;
        $experiment->procedures = $procedures;
        $experiment->exercise = $exercise;
        $experiment->required = $required;
        $experiment->theory = $theory;
        $experiment->faculty_id = $this->facultyId;
        $experiment->tables = $tables;
        $experiment->graph = $graph;
        $experiment->status = $status;

        if ($experiment->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function deleteExperiment(Request $request)
    {
        $experimentId = $request->get('experiment_id');
        $experiment = Experiment::find($experimentId);
        if ($experiment) {
            $experiment->status = 'Inactive';
            $save = $experiment->save();
            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No Experiment with this id'], 404);
        }
        return response()->json(['success' => false], 400);
    }

    public function updateExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "experiment_id field is required"], 400);
        }

        $experimentId = $request->get('experiment_id');
        $experiment = Experiment::find($experimentId);

        if ($experiment) {
            $request->get('name') != null ? $experiment->name = $request->get('name') : null;
            $request->get('experiment_number') != null ? $experiment->experiment_number = $request->get('experiment_number') : null;
            $request->get('experiment_intro') != null ? $experiment->experiment_intro = $request->get('experiment_intro') : null;
            $request->get('experiment_goal') != null ? $experiment->experiment_goal = $request->get('experiment_goal') : null;
            $request->get('experiment_mock') != null ? $experiment->experiment_mock = $request->get('experiment_mock') : null;
            $request->get('apparatus') != null ? $experiment->apparatus = $request->get('apparatus') : null;
            $request->get('experiment_resource') != null ? $experiment->experiment_resource = $request->get('experiment_resource') : null;
            $request->get('procedures') != null ? $experiment->procedures = $request->get('procedures') : null;
            $request->get('exercise') != null ? $experiment->exercise = $request->get('exercise') : null;
            $request->get('required') != null ? $experiment->required = $request->get('required') : null;
            $request->get('theory') != null ? $experiment->theory = $request->get('theory') : null;
            $request->get('tables') != null ? $experiment->tables = $request->get('tables') : null;
            $request->get('graph') != null ? $experiment->graph = $request->get('graph') : null;
            //$request->get('description') != null ? $experiment->description = $request->get('description') : null;

            $save = $experiment->save();

            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No Experiment with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }


    public function getAllExperiment()
    {
        $experiments = Experiment::all();
        return response()->json($experiments, 200);
    }

    public function getAllCourseExperiment()
    {
        $experiments = CourseExperiment::with('experiments')->get();
        return response()->json($experiments, 200);
    }

    public function getExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "experiment_id field is required"], 400);
        }

        $experimentId = $request->get('experiment_id');
        $experiment = Experiment::find($experimentId);

        if (!empty($experiment)) {
            return response()->json($experiment, 200);
        } else {
            return response()->json(['error' => 'Experiment not found'], 404);
        }
    }

    public function saveExperimentResult(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
            'result_json' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $experimentResult = new ExperimentResult();

        $experimentId = $request->get('experiment_id');
        $timeStarted = $request->get('time_started');
        $timeSubmitted = $request->get('time_submitted');
        $timeLeft = $request->get('time_left');
        $sessionId = $this->currentSession;
        $weeklyWork = $request->get('weekly_work_id');
        $resultJson = $request->get('result_json');

        $completionStatus = $request->get('completion_status');

        $checkDuplicate = ExperimentResult::where([
            'user_id' => $this->userId,
            'session_id' => $sessionId,
            'experiment_id' => $experimentId
        ]);

        if (!empty($checkDuplicate)) {

            $experimentResultId = $checkDuplicate->first()->id;
            $upsertResult = ExperimentResult::find($experimentResultId);
            $upsertResult->result_json = $resultJson;
            $upsertResult->weekly_work_id = $weeklyWork;
            
            $upsertResult->time_submitted = $timeSubmitted;
            $upsertResult->time_left = $timeLeft;
            $upsertResult->completion_status = $completionStatus;

            if($upsertResult->save()){
                return response()->json(['message' => "Experiment Result has been updated"], 200);
            }
        }

        $experimentResult->id = Util::uuid();
        $experimentResult->user_id = $this->userId;
        $experimentResult->experiment_id = $experimentId;

        $experimentResult->time_started = $timeStarted;
        $experimentResult->time_submited = $timeSubmitted;
        $experimentResult->time_left = $timeLeft;

        $experimentResult->session_id = $sessionId;
        $experimentResult->result_json = $resultJson;

        $saveResult = $experimentResult->save();
        if ($saveResult) {
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 400);
    }

    public function getExperimentResultsByExpSessId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "experiment_id field is required"], 400);
        }

        $experimentId = $request->get('experiment_id');

        $experimentResult = ExperimentResult::where([
            'session_id' => $this->currentSession,
            'experiment_id' => $experimentId
        ])->get();

        if (!empty($experimentResult)) {
            return response()->json($experimentResult, 200);
        } else {
            return response()->json(['error' => 'Experiment not found'], 404);
        }
    }

    public function getExperimentResultsByCourseSessId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');
        return $this->experimentResults($courseId);
    }

    public function getExperimentResultsByCourseUserSessId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');

        $result = collect($this->experimentResults($courseId));
        $result = $result->where('user_id', $this->userId);

        return response()->json($result, 200);
    }

    public function experimentResults($courseId)
    {
        $experiments = [];
        $results = [];
        $courseExperiments = Course::where('id',$courseId)->with('experiments')->get();

        if(sizeof($courseExperiments) > 0){
            foreach ($courseExperiments as $courseExperiment) {
                $experiments[] = $courseExperiment['experiments'];
            }
            foreach ($experiments as $experiment) {
                foreach ($experiment as $result) {
                    $experimentResults = ExperimentResult::where(['experiment_id' => $result->id, 'session_id' => $this->currentSession])->get();
                    if (sizeof($experimentResults) > 0) {
                        array_push($results, $experimentResults);
                    }
                }
            }
            if(sizeof($results) > 0){
                return $results[0];
            }
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }

        return response()->json(['success' => false], 400);
    }
    
}
