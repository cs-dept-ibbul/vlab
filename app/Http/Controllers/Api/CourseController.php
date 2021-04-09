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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    private $currentUser;
    private $schoolId;
    private $facultyId;
    private $userId;

    public function __construct()
    {
        if(Auth::check()){
            $this->currentUser = Auth::user();
            $this->schoolId = $this->currentUser->school_id;
            $this->facultyId = $this->currentUser->faculty_id;
            $this->userId = $this->currentUser->id;
        }
    }

    public function create(Request $request)
    {
        $course = new Course();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $title = $request->get('title');
        $code = $request->get('code');
        $description = $request->get('description');
        $status = $request->get('status') ?? 'Active';

        $course->id = $id;
        $course->school_id = $this->schoolId;
        $course->faculty_id = $this->facultyId;
        $course->title = $title;
        $course->code = $code;
        $course->description = $description;
        $course->status = $status;

        $checkCourse = Course::where(['code' => $code])->first();
        if (empty($checkCourse)) {
            if ($course->save()) {
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 400);
        }
        return response()->json(['error' => 'This course already exist'], 409);
    }

    public function deleteCourse(Request $request)
    {
        $courseId = $request->get('course_id');
        $course = Course::find($courseId);
        if($course){
            $course->status = 'Inactive';
            $save = $course->save();
            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No course with this id'], 404);
        }
        return response()->json(['error' => 'something went wrong'], 400);
    }

    public function updateCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');
        $course = Course::find($courseId);
        if($course){
            $request->get('title') != null ? $course->title = $request->get('title') : null;
            $request->get('code') != null ? $course->code = $request->get('code') : null;
            $request->get('description') != null ? $course->description = $request->get('description') : null;
    
            if(empty($request->get('title')) && empty($request->get('code'))){
                return response()->json(['error' => 'All field is null'], 400);
            } else {
                $save = $course->save();
            }
    
            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'No course with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function getAllCourses()
    {
        $course = Course::with('school')->with('faculty')->get();
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
        $course = Course::with('school')->with('faculty')->find($courseId);

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
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'data_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $file = public_path($request->get('data_url'));
        $course_id = $request->get('course_id');

        $students = Util::csvToArray($file);

        foreach ($students as $student) {
            $userId = UserController::studentByMatricNumber($student['matric_number'])['id'];
            //Todo: Handle exception where student does not exist.
            if ($userId != null) {
                $this->addStudentCourse($userId, $course_id);
            }
        }
    }

    public function addStudentCourse($user_id, $course_id)
    {
        $userCourses = new CourseStudents();
        $userCourses->id = Util::uuid();
        $userCourses->course_id = $course_id;
        $userCourses->user_id = $user_id;
        $userCourses->school_id = $this->schoolId;
        $userCourses->faculty_id = $this->facultyId;

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
        return response()->json(['error' => false], 400);
    }

    public function getStudentEnrolledCourses()
    {
        $enrolledCourses = CourseStudents::where('user_id', $this->userId)->get();
        $data = [];
        foreach ($enrolledCourses as $enrolledCourse) {
            $courseId = $enrolledCourse->course_id;
            $courseObject = Course::where('id', $courseId)->withCount('course_experiment')->get();
            if (sizeof($courseObject) > 0) {
                $data[] = ['course' => $courseObject];
            }
        }
        return response()->json(['enrolledCourses' => $data], 200);
    }

    public function allIsNull(Array $arrays)
    {
        $allIsNull = false;
        foreach ($arrays as $value) {

            if(empty($value)){
                $allIsNull = true;
            }

        }
        return $allIsNull;
    }
}
