<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeeklyWork;
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
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $title = $request->get('title');
        $experimentId = $request->get('experiment_id');
        $dateOpen = $request->get('date_open');
        $dateClose = $request->get('date_close');
        $accessCode = $request->get('access_code');
        $limitation = $request->get('limitation') ?? '0';

        $weeklyWork->id = $id;
        $weeklyWork->title = $title;
        $weeklyWork->experiment_id = $experimentId;
        $weeklyWork->date_open = $dateOpen;
        $weeklyWork->date_close = $dateClose;
        $weeklyWork->access_code = $accessCode;
        $weeklyWork->limitation = $limitation;
        $weeklyWork->school_id = $this->schoolId;
        $weeklyWork->faculty_id = $this->facultyId;
        $weeklyWork->session_id = $this->currentSession;

        if ($weeklyWork->save()) {
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

        if($weeklyWork){
            $weeklyWork->status = 'Inactive';
           if ($weeklyWork->save()) {
               return response()->json(['success' => true], 200);
           }
        } else {
            return response()->json(['error' => 'Weekly work Not found'], 404);
        }
        return response()->json(['success' => false], 400);
    }

    public function getWeeklyWorks()
    {
        $weeklyWorks = WeeklyWork::all();
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
            return response()->json($weeklyWork, 200);
        } else {
            return response()->json(['error' => 'Weekly Work not found'], 404);
        }
    }
}
