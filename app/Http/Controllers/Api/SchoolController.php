<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    
    public function create(Request $request)
    {
        $id = Util::uuid();
        $schoolName = $request->get('schoolName');
        $schoolCode = $request->get('schoolCode');
        $status = $request->get('status') ?? 'Active';
        $school = new School();
        $school->id = $id;
        $school->name = $schoolName;
        $school->code = $schoolCode;
        $school->status = $status;

        $checkSchool = School::where(['name' => $schoolName])->first();
        if(empty($checkSchool)){
            if($school->save()){
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 400);
        }
        return response()->json(['error' => 'This school already exist'], 409);
    }

    public function getAllSchools()
    {
        $schools =  School::all();
        return response()->json($schools, 200);
    }
    
    public function getSchool(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'school_id' => 'required|max:36',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $schoolId = $request->get('school_id');
        $school = School::where(['id' => $schoolId])->first();
        
        if(!empty($school)){
            return response()->json($school, 200);
        } else {
            return response()->json(['error' => 'School not found'], 404);
        }
    }

}
