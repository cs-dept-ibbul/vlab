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
            'experiment_number' => 'required',
            'experiment_intro' => 'required',
            'experiment_goal' => 'required',
            'experiment_mock' => 'required',
            'aparatus' => 'required',
            'procedures' => 'required',
            'exercise' => 'required',
            'faculty_id' => 'required',
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
        $status = $request->get('status') ?? 'Active';

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
            $request->get('aparatus') != null ? $experiment->aparatus = $request->get('aparatus') : null;
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

    public function getExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 409);
        }

        $experimentId = $request->get('experiment_id');
        $experiment = Experiment::find($experimentId);

        if (!empty($experiment)) {
            return response()->json($experiment, 200);
        } else {
            return response()->json(['error' => 'Experiment not found'], 404);
        }
    }
}
