<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ExperimentController extends Controller
{

    public function create(Request $request)
    {
        $experiment = new Experiment();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'experiment_number'=>'required',
            'experiment_intro'=>'required',
            'experiment_goal'=>'required',
            'experiment_mock'=>'required',
            'aparatus'=>'required',
            'experiment_resource'=>'required',
            'procedures'=>'required',
            'exercise'=>'required',
            'required'=>'required',
            'theory'=>'required',
            'faculty_id'=>'required',
            'tables'=>'required',
            'graph'=>'required',
            'status'=>'required'
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
        $aparatus = $request->get('aparatus');
        $experiment_resource = $request->get('experiment_resource');
        $procedures = $request->get('procedures');
        $exercise = $request->get('exercise');
        $required = $request->get('required');
        $theory = $request->get('theory');
        $faculty_id = $request->get('faculty_id');
        $tables = $request->get('tables');
        $graph = $request->get('graph');
        $status = $request->get('status');

        $experiment->id = $id;
        $experiment->name = $name;
        $experiment->experiment_number = $experiment_number;
        $experiment->experiment_intro = $experiment_intro;
        $experiment->experiment_goal = $experiment_goal;
        $experiment->experiment_mock = $experiment_mock;
        $experiment->aparatus = $aparatus;
        $experiment->experiment_resource = $experiment_resource;
        $experiment->procedures = $procedures;
        $experiment->exercise = $exercise;
        $experiment->required = $required;
        $experiment->theory = $theory;
        $experiment->faculty_id = $faculty_id;
        $experiment->tables = $tables;
        $experiment->graph = $graph;
        $experiment->status = $status;

            if($experiment->save()){
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 401);
    }
    
    public function getAllExperiment()
    {
        $experiments = Experiment::all();
        return response()->json($experiments, 200);

    }

    public function getExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $experimentId = $request->get('experiment_id');
        $experiment = Experiment::where(['id' => $experimentId])->first();

        if(!empty($experiment)){
            return response()->json($experiment, 200);
        } else {
            return response()->json(['error' => 'Experiment not found'], 404);
        }
    }
}
