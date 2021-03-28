<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{

    public function create(Request $request)
    {
        $id = Util::uuid();
        $facultyName = $request->get('faculty_name');
        $facultyCode = $request->get('faculty_code');
        $schoolID = $request->get('school_id');
        $status = $request->get('status') ?? 'Active';
        $faculty = new Faculty();
        $faculty->id = $id;
        $faculty->name = $facultyName;
        $faculty->code = $facultyCode;
        $faculty->school_id = $schoolID;
        $faculty->status = $status;


        $checkSchool = Faculty::where(['name' => $facultyName])->first();
        if (empty($checkSchool)) {
            if ($faculty->save()) {
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 200);
        }
        return response()->json(['error' => 'This faculty already exist'], 409);
    }

    public function getAllFaculties()
    {
        $faculties =  Faculty::all();
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
}
