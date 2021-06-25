<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
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

    public function create(Request $request)
    {
        $id = Util::uuid();
        $facultyName = $request->get('faculty_name');
        $facultyCode = $request->get('faculty_code');        
        
        $description = $request->get('description');
        $file = $request->file;

        $file_ex = explode('.', $file->getClientOriginalName());                    
        $ext = $file_ex[sizeof($file_ex)-1];   
        $i = mt_rand(1,100);              
        $name = $i.'_'.date('m-d-Y-ha');
        $pictureName = $name.'.'.$ext;                    
        $pictureUrl= 'images/'.$pictureName;
        $file->move(public_path('images/'), $pictureName);

        $schoolID = Auth::user()->school_id;
        $status = $request->get('status') ?? 'Active';
        $faculty = new Faculty();
        $faculty->id = $id;
        $faculty->name = $facultyName;
        $faculty->picture = $pictureUrl;
        $faculty->description = $description;
        $faculty->code = $facultyCode;
        $faculty->school_id = $schoolID;
        $faculty->status = $status;


        $checkSchool = Faculty::where(['name' => $facultyName])->first();
        if (empty($checkSchool)) {
            if ($faculty->save()) {
                return response()->json(['success' => true], 201);
            }
            return response()->json(['success' => false], 400);
        }
        return response()->json(['error' => 'This faculty already exist'], 409);
    }

    public function checkFacultyExist()
    {
        $faculties =  Faculty::all();
        if (sizeof($faculties)>0) {
            return response()->json(['success' => true], 200);            
        }
        return response()->json(['error' => 'Not found'], 404);                
    }
    public function deleteFaculty(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "faculty_id field is required"], 400);
        }

        $facultyId = $request->get('faculty_id');
        $faculty = Faculty::find($facultyId);
        $check  = DB::table('departments')->where(['faculty_id'=> $facultyId, 'status'=>'Active'])->first();
        $check1  = DB::table('courses')->where(['faculty_id'=> $facultyId, 'status'=>'Active'])->first();
        if (is_null($check) && is_null($check1)) {
            //delete
            if($faculty){
                $faculty->status = 'Inactive';
                $save = $faculty->save();
                if ($save) {
                    return response()->json(['success' => true], 200);
                }
            } else {
                return response()->json(['error' => 'No faculty with this id'], 404);
            }          
        }else{
            //cant delete
            return response()->json(['error' => "can't delete this faculty"], 409);
            
        }
        return response()->json(['error' => 'something went wrong'], 400);
    }

    public function updateFaculty(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "faculty_id field is required"], 400);
        }

        $facultyName = $request->get('faculty_name');
        $facultyCode = $request->get('faculty_code');

        $description = $request->get('description');
        $file = $request->file;        
        if ($file != '/no-pic' && !empty($file)) {            
            $file_ex = explode('.', $file->getClientOriginalName());                    
            $ext = $file_ex[sizeof($file_ex)-1];   
            $i = mt_rand(1,100);              
            $name = $i.'_'.date('m-d-Y-ha');
            $pictureName = $name.'.'.$ext;                    
            $pictureUrl= 'images/'.$pictureName;
            $file->move(public_path('images/'), $pictureName);
        }else{
            $pictureUrl= '';            
        }

        $facultyId = $request->get('faculty_id');
        $faculty = Faculty::find($facultyId);
        if($faculty){
            $facultyName != null ? $faculty->name = $facultyName : null;
            $facultyCode != null ? $faculty->code = $facultyCode : null;
            $faculty->description = $description;
            $faculty->picture = $pictureUrl;
    
            if(empty($facultyName) && empty($facultyCode) && empty($schoolID)){
                return response()->json(['message' => 'Nothing to update'], 200);
            } else {
                $save = $faculty->save();
            }
    
            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No faculty with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function getAllFaculties()
    {
        $faculties =  Faculty::with('department')->get();
        return response()->json($faculties, 200);
    }

    public function facultiesWithCourses()
    {
        $data = [];
        $faculties =  Faculty::all();
        foreach ($faculties as $faculty) {
            $facultyId = $faculty->id;
            $courses = Course::where(['faculty_id' => $facultyId])->get();
            $data[] = [
                'faculty' => $faculty,
                'courses' => $courses,
                'totalNumberOfCourses' => count($courses)
            ];
        }
        return response()->json($data, 200);
    }

    public function getFaculty(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required|max:36',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $facultyId = $request->get('faculty_id');
        $faculty = Faculty::where(['id' => $facultyId])->first();

        if (!empty($faculty)) {
            return response()->json($faculty, 200);
        } else {
            return response()->json(['error' => 'Faculty not found'], 404);
        }
    }

    public function getFacultyWithCourseAndStudentCount()
    {
        $faculties = Faculty::withCount(['courses_students'=>function($query){
            $query->where('session_id',$this->currentSession);
        }])->withCount('courses')->withCount('students')->get();
        return response()->json(['faculties' => $faculties], 200);
    }
}
