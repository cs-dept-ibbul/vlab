<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\CourseExperiment;
use App\Models\CourseInstructor;
use App\Models\CourseResources;
use App\Models\CourseStudents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            'resource_url' => 'required',
            'experiment_id' => 'required',
            'instructor_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }


        $course_uuid = Util::uuid();
        $title = $request->get('title');
        $code = $request->get('code');
        $description = $request->get('description');
        $sessionId = $request->get('session_id');
        $status = $request->get('status') ?? 'Active';

        $checkCourse = Course::where(['code' => $code])->first();

        if (empty($checkCourse) || is_null($checkCourse)) {

            $course = array(
                'id'          => $course_uuid,
                'school_id'   => $this->schoolId,
                'faculty_id'  => $this->facultyId,
                'title'       => $title,
                'code'        => $code,
                'description' => $description,
                'session_id' => $sessionId,
                'status'      => $status,
            );
            /*creating course resources*/

            $resource_uuid = Util::uuid();
            $resourceUrl = $request->get('resource_url');

            /*resource data*/
            $resource = array(
                'id'         => $resource_uuid,
                'course_id'  => $course_uuid,
                'resourceUrl' => $resourceUrl,
            );

            /*add experiment to a course*/
            $experimentIds = explode(',', $request->get('experiment_id'));
            $experiments = array();
            for ($x = 0; $x < sizeof($experimentIds); $x++) {
                array_push($experiments, array(
                    'id'            => Util::uuid(),
                    'course_id'     => $course_uuid,
                    'experiment_id' => $experimentIds[$x],
                ));
            };

            /*add instructors to a course*/
            $instructorIds = explode(',', $request->get('instructor_id'));
            $instructors = array();
            for ($x = 0; $x < sizeof($instructorIds); $x++) {
                array_push($instructors, array(
                    'id'            => Util::uuid(),
                    'course_id'     => $course_uuid,
                    'instructor_id' => $experimentIds[$x],
                ));
            };

            DB::transaction(function () use ($course, $resource, $experiments, $instructors) {
                Course::insert($course);
                CourseResources::insert($resource);
                CourseExperiment::insert($experiments);
                CourseInstructor::insert($instructors);
            }, 5);
            return response()->json(['success' => true], 200);
        }
        return response()->json(['error' => 'This course already exist'], 409);
    }


    public function deleteCourse(Request $request)
    {
        $courseId = $request->get('course_id');
        $course = Course::find($courseId);
        if ($course) {
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
        if ($course) {
            $request->get('title') != null ? $course->title = $request->get('title') : null;
            $request->get('code') != null ? $course->code = $request->get('code') : null;
            $request->get('description') != null ? $course->description = $request->get('description') : null;

            if (empty($request->get('title')) && empty($request->get('code'))) {
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

    public function getCoursesByFacultyId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "faculty_id is required"], 400);
        }

        $facultyId = $request->get('faculty_id');
        $courses = Course::where('faculty_id', $facultyId)->with('experiments')->withCount('experiments')->get();

        if (!empty($courses)) {
            return response()->json($courses, 200);
        } else {
            return response()->json(['error' => 'faculty not found'], 404);
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

    public function enrollStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');
        $enrolmentCode = $request->get('enrollment_code');

        $course = Course::find($courseId);

        if (!empty($course)) {
            if (!empty($course->enrollment_code)) {
                if ($course->enrollment_code == $enrolmentCode) {
                    return $this->addStudentCourse($this->userId, $courseId);
                } else {
                    return response()->json(['error' => 'Invalid Enrollment Code'], 400);
                }
            } else {
                return $this->addStudentCourse($this->userId, $courseId);
            }
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function addStudentCourse($user_id, $course_id)
    {
        $userCourses = new CourseStudents();
        $userCourses->id = Util::uuid();
        $sessionId = $this->currentSession;
        
        $userCourses->course_id = $course_id;
        $userCourses->user_id = $user_id;
        $userCourses->school_id = $this->schoolId;
        $userCourses->faculty_id = $this->facultyId;
        $userCourses->session_id = $sessionId;

        $checkStudentCourse = CourseStudents::where([
            'course_id' => $course_id, 
            'user_id' => $user_id, 
            'session_id' => $sessionId
        ])->first();

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

    public function courseStudents()
    {
        $courseStudents = Course::with('students')->get();
        return response()->json($courseStudents, 200);
    }

    public function courseStudentById(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');
        $courseStudent = Course::where('id', $courseId)->with('students')->withCount('students')->get();
        if ($courseStudent) {
            return response()->json($courseStudent, 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function courseStudentByFacultyId()
    {
        $courseStudent = Course::where('faculty_id', $this->facultyId)->with('faculty')->withCount('students')->get();
        if ($courseStudent) {
            return response()->json($courseStudent, 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function courseExperiments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }

        $courseId = $request->get('course_id');
        $courseStudent = Course::where('id', $courseId)->with('experiments')->withCount('experiments')->get();
        if ($courseStudent) {
            return response()->json($courseStudent, 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function studentCourses()
    {
        $studentCourse = User::where('id', $this->userId)->with('courses')->withCount('courses')->get();
        return $studentCourse;
    }

    //Should incase a user's courses needs to be fetched without a token
    public function studentCoursesById(Request $request)
    {
        $userId = $request->get('user_id');
        $studentCourse = User::where('id', $userId)->with('courses')->get();
        if ($studentCourse) {
            return response()->json($studentCourse, 200);
        }
        return response()->json(['success' => false], 400);
    }

    public function allIsNull(array $arrays)
    {
        $allIsNull = false;
        foreach ($arrays as $value) {

            if (empty($value)) {
                $allIsNull = true;
            }
        }
        return $allIsNull;
    }
}
