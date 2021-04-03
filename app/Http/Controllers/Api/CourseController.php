<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\CourseExperiment;
use App\Models\CourseInstructor;
use App\Models\CourseResources;
use App\Models\CourseStudents;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Auth;

class CourseController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [                        
            'title' => 'required',
            'code' => 'required',
            'resource_url' => 'required',
            'experiment_id' => 'required',
            'instructor_id' => 'required',
        ]);
        $school_id = School::first()->id;                
        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }


        $course_uuid = Util::uuid();        
        $faculty_id = 1;//please get the faculty id of the logged in user
        $title = $request->get('title');
        $code = $request->get('code');
        $description = $request->get('description');
        $status = $request->get('status') ?? 'Active';
        
        //return response()->json(['error' => Course::where(['code'=>$code])->first()], 200);
        $checkCourse = Course::where(['code'=>$code])->first();

        if (empty($checkCourse) || is_null($checkCourse)) {
            
            $course = array(
            'id'          => $course_uuid,
            'school_id'   => $school_id,
            'faculty_id'  => $faculty_id,
            'title'       => $title,
            'code'        => $code,
            'description' => $description,
            'status'      => $status,
            );
            /*creating course resources*/
            
            $resource_uuid = Util::uuid();
            $resourceUrl = $request->get('resource_url');

            /*
            list($type, $img_data)  = explode(';', $resourceUrl);
            list(, $img_data)  = explode(',', $img_data);
            $decode_img = base64_decode($img_data);
            $path = public_path().'/images/resources/';
            if (!is_dir($path)){
                File::makeDirectory($path,$mode =0777, true, true);
            }
            $filename = $path.'img_'.$course_uuid.'.png';
            if ($decode_img !== false) {                
                file_put_contents($filename, $decode_img);                            
            }else{
                return response()->json(['error'=>'invalid image type'], 409);
            }
            */
            /*resource data*/
            $resource = array(
                'id'         => $resource_uuid,
                'course_id'  => $course_uuid,
                'resourceUrl'=> $resourceUrl,
            );

            /*add experiment to a course*/            
            $experimentIds = explode(',', $request->get('experiment_id'));           
            $experiments = array();
            for($x =0; $x < sizeof($experimentIds); $x++){
               array_push($experiments, array(
                'id'            => Util::uuid(),
                'course_id'     => $course_uuid,
                'experiment_id' => $experimentIds[$x],
               ));
            };
            
            /*add instructors to a course*/            
            $instructorIds = explode(',', $request->get('instructor_id'));           
            $instructors = array();
            for($x =0; $x < sizeof($instructorIds); $x++){
               array_push($instructors, array(
                'id'            => Util::uuid(),
                'course_id'     => $course_uuid,
                'instructor_id' => $experimentIds[$x],
               ));
            };
 
            DB::transaction(function () use($course,$resource, $experiments, $instructors) {
                Course::insert($course);
                CourseResources::insert($resource);
                CourseExperiment::insert($experiments);
                CourseInstructor::insert($instructors);
            },5);            
            return response()->json(['success' => true], 200);            
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
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'school_id' => 'required',
            'faculty_id' => 'required',
            'data_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $file = public_path($request->get('data_url'));
        $course_id = $request->get('course_id');
        $school_id = $request->get('school_id');
        $faculty_id = $request->get('faculty_id');

        $students = Util::csvToArray($file);

        foreach ($students as $student) {
            $userId = UserController::studentByMatricNumber($student['matric_number'])['id'];
            //Todo: Handle exception where student does not exist.
            if ($userId != null) {
                $this->addStudentCourse($userId, $course_id, $school_id, $faculty_id);
            }
        }
    }

    public function addStudentCourse($user_id, $course_id, $school_id, $faculty_id)
    {
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
        return response()->json(['error' => false], 400);
    }

    public function getStudentEnrolledCourses()
    {
        $user = Auth::user();
        $userId = $user->id;
        $enrolledCourses = CourseStudents::where('user_id', $userId)->get();
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
}
