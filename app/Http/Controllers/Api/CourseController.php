<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\CourseExperiment;
use App\Models\CourseInstructor;
use App\Models\CourseResources;
use App\Models\CourseStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function create(Request $request)
    {
        $course = new Course();

        $validator = Validator::make($request->all(), [
            'school_id' => 'required',
            'faculty_id' => 'required',
            'title' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $school_id = $request->get('school_id');
        $faculty_id = $request->get('faculty_id');
        $title = $request->get('title');
        $code = $request->get('code');
        $status = $request->get('status') ?? 'Active';

        $course->id = $id;
        $course->school_id = $school_id;
        $course->faculty_id = $faculty_id;
        $course->title = $title;
        $course->code = $code;
        $course->status = $status;

        $checkCourse = Course::where(['code' => $code])->first();
        if (empty($checkCourse)) {
            if ($course->save()) {
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 401);
        }
        return response()->json(['error' => 'This course already exist'], 409);
    }

    public function getAllCourses()
    {
        $course = Course::all();
        return response()->json($course, 200);
    }

    public function getCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id is required"], 400);
        }

        $courseId = $request->get('course_id');
        $course = Course::where(['id' => $courseId])->first();

        if (!empty($course)) {
            return response()->json($course, 200);
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }
    }

    public function assignCourseInstructor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'instructor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "Both course_id and instructor_id field are required"], 400);
        }

        $instructor = new CourseInstructor();
        $id = Util::uuid();
        $courseId = $request->get('course_id');
        $instructorId = $request->get('instructor_id');

        $instructor->id = $id;
        $instructor->course_id = $courseId;
        $instructor->instructor_id = $instructorId;

        $checkInstructor = CourseInstructor::where(['course_id' => $courseId, 'instructor_id' => $instructorId])->first();
        if (!empty($checkInstructor)) {
            return response()->json(['error' => 'This course has already been assigned to this instructor'], 409);
        }

        if ($instructor->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function bulkCourseAssign(Request $request)
    {
        $file = public_path($request->get('data_url'));

        $validator = Validator::make($request->all(), [
            'data_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "data_url field is required"], 400);
        }
        $customerArr = Util::csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i++) {
            $userId = UserController::getStudentByMatricNumber($customerArr[$i]['matric_number'])['id'];
           $this->addStudentCourse($request, $userId);
        }
    }

    public function addStudentCourse(Request $request, String $user_id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            // 'user_id' => 'required',
            'school_id' => 'required',
            'faculty_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        // $user_id = $request->get('user_id');
        $course_id = $request->get('course_id');
        $school_id = $request->get('school_id');
        $faculty_id = $request->get('faculty_id');


        $userCourses = new CourseStudents();
        $userCourses->id = Util::uuid();
        $userCourses->course_id = $course_id;
        $userCourses->user_id = $user_id;
        $userCourses->school_id = $school_id;
        $userCourses->faculty_id = $faculty_id;

        $checkStudentCourse = CourseStudents::where(['course_id' => $course_id, 'user_id' => $user_id,])->first();

        if ($checkStudentCourse != null) {
            return response()->json(['error' => 'This course has already been assigned to this student'], 409);
        }

        if ($userCourses->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function assignCourseExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'experiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "Both course_id and experiment_id field are required"], 400);
        }

        $experiment = new CourseExperiment();
        $id = Util::uuid();
        $courseId = $request->get('course_id');
        $experimentId = $request->get('experiment_id');

        $experiment->id = $id;
        $experiment->course_id = $courseId;
        $experiment->experiment_id = $experimentId;

        $checkInstructor = CourseExperiment::where(['course_id' => $courseId, 'experiment_id' => $experimentId])->first();
        if (!empty($checkInstructor)) {
            return response()->json(['error' => 'This experiment has already been assigned to this course'], 409);
        }

        if ($experiment->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function addCourseResources(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'resource_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "Both course_id and resourceUrl field are required"], 400);
        }

        $resource = new CourseResources();
        $id = Util::uuid();
        $courseId = $request->get('course_id');
        $resourceUrl = $request->get('resource_url');

        $resource->id = $id;
        $resource->course_id = $courseId;
        $resource->resourceUrl = $resourceUrl;
        if ($resource->save()) {
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false], 400);
    }
}
