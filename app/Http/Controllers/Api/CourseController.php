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
            'resource_size' => 'required',
            'experiment_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }
     

        $course_uuid = Util::uuid();
        $title = $request->get('title');
        $code = $request->get('code');
        $description = $request->get('description');
        $sessionId = $this->currentSession;;
        $enrollment_code = $request->get('enrollment_code');    
        $video_url = $request->get('video_url');    
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
                'enrollment_code'=> $enrollment_code,
                'session_id' => $sessionId,
                'status'      => $status,
                'video_url'   => $video_url
            );
            /*creating course resources*/
            $resource = array();

            for ($i=0; $i < $request->get('resource_size'); $i++) {  
                if ($i == 0) {
                    $caption = $request->get('caption1');
                    $file = $request->file('file1');                                  
                }
                if ($i == 1) {
                    $caption = $request->get('caption2');                    
                    $file = $request->file2;                                  
                }
                if ($i == 2) {
                    $file = $request->file3;                                  
                    $caption = $request->get('caption3');                    
                }
                if ($i == 3) {
                    $file = $request->file4;                                  
                    $caption = $request->get('caption4');                    
                }

                //$file_size = round($file->getSize() / 1024);
                $file_ex = explode('.', $file->getClientOriginalName());                    
                $ext = $file_ex[sizeof($file_ex)-1];                            
                if (!in_array(strtolower($ext) , array('mp4','3gp','jpg','jpg', 'gif', 'png','pdf', 'doc', 'docx','xlsx')))
                {
                    return response()->json(['error' => 'invalid resources'], 401);
                }else{
                    $resource_uuid = Util::uuid();                   
                    $name = $i.'_'.date('m-d-Y-ha');
                    $resourceName = $name.'.'.$ext;                    
                    $resourceUrl= 'images/resources/'.$resourceName;
                    //$file->move(base_path().$path, $resourceUrl);
                    $file->move(public_path('images/resources'), $resourceName);

                   array_push( $resource , array(
                        'id'         => $resource_uuid,
                        'course_id'  => $course_uuid,
                        'caption'    => $caption,
                        'resourceUrl' => $resourceUrl,
                    ));
                }
            }

            /*resource data*/

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
        //return dd($experiments_to_add);        
        $courseId = $request->get('course_id');        
        $course = Course::find($courseId);
        if ($course) {
            $request->get('title') != null ? $course->title = $request->get('title') : null;
            $request->get('code') != null ? $course->code = $request->get('code') : null;
            $request->get('description') != null ? $course->description = $request->get('description') : null;
            $request->get('enrollment_code') != null ? $course->enrollment_code = $request->get('enrollment_code') : null;
            $save = $course->save();                
        }

        if ($save) {
            return response()->json(['success' => true], 200);
        }
        else {
            return response()->json(['error' => 'No course with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function getAllCourses()
    {
        $course = Course::with(['faculty','weekly_work.weekly_work_experiments.experiments','course_experiment'=>function($query){
                     $query->with('experiments:id,name,page');
                  },'course_resources','course_student.students'])->where(['faculty_id'=>$this->facultyId])->get();
        return response()->json($course, 200);
    }

    public function allCourses()
    {
        $course = Course::with(['faculty','weekly_work.weekly_work_experiments.experiments','course_experiment'=>function($query){
                               $query->with('experiments:id,name,page');
                  },'course_resources','course_student.students'])->get();
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
        $courses = Course::with(['experiments','weekly_work'=>function($query){
                    $query->where('session_id',$this->currentSession);
                }])->withCount('experiments')->where('faculty_id', $facultyId)->get();

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

    public function addStudentCourse(Request $request)
    {
        $sessionId = $this->currentSession;
        $course_id = $request->get('course_id');
        $faculty_id = $request->get('faculty_id');
        $user_id   = $request->get('user_id');
        


        $checkStudentCourse = CourseStudents::where([
            'course_id' => $course_id, 
            'user_id' => $user_id, 
            'session_id' => $sessionId
        ])->first();

        if ($checkStudentCourse != null) {
            return response()->json(['error' => 'This course has already been assigned to this student'], 409);
        }
        
        $userCourses = new CourseStudents();
        $userCourses->id = Util::uuid();
        $userCourses->course_id = $course_id;
        $userCourses->user_id = $user_id;
        $userCourses->school_id = $this->schoolId;
        $userCourses->faculty_id = $faculty_id;
        $userCourses->session_id = $sessionId;

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

    public function getStudentEnrolledCourses(Request $request)
    {
        $user_id = $request->get('user_id');
        $enrolledCourses = CourseStudents::with(['course','weekly_work_experiment'=>function($query) use($user_id){
                    $query->with(['result'=>function($query){
                        $query->where('user_id',$this->userId);
                    }])->where('weekly_work_experiments.status','Active');
                }])->where('user_id', $this->userId)->get();        
        return response()->json($enrolledCourses, 200);
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
        $courseStudent = Course::with(['course_experiment.experiments','course_resources'])->where('id', $courseId)->get();
        if ($courseStudent) {
            return response()->json($courseStudent[0], 200);
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
    public function uploadResources(Request $request){
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'file' => 'required'
        ]);
        
         if ($validator->fails()) {
            return response()->json(['error' => "course_id field is required"], 400);
        }


        $course_id = $request->get('course_id');
        $caption = $request->get('caption');
        $file = $request->file;

         //$file_size = round($file->getSize() / 1024);
        $file_ex = explode('.', $file->getClientOriginalName());                    
        $ext = $file_ex[sizeof($file_ex)-1];                            
        if (!in_array(strtolower($ext) , array('mp4','3gp','jpg','jpg', 'gif', 'png','pdf', 'doc', 'docx','xlsx')))
        {
            return response()->json(['error' => 'invalid resources'], 401);
        }else{
            $resource_uuid = Util::uuid();     
            $i = mt_rand(1,100);              
            $name = $i.'_'.date('m-d-Y-ha');
            $resourceName = $name.'.'.$ext;                    
            $resourceUrl= 'images/resources/'.$resourceName;
            //$file->move(base_path().$path, $resourceUrl);
            $file->move(public_path('images/resources'), $resourceName);

            CourseResources::insert(array('id'=> Util::uuid(),'course_id'  => $course_id,'caption'    => $caption,'resourceUrl' => $resourceUrl));

            return response()->json(['success' => true], 200);
        }
        //return response()->json(['error' => "All fields are required"], 400);
    }
    public function addExperiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'experiment_id' => 'required'
        ]);
        
         if ($validator->fails()) {
            return response()->json(['error' => "all field are required"], 400);
        }


        $course_id = $request->get('course_id');
        $experiment_id = $request->get('experiment_id');        
        //return response()->json(['error' => [$experiment_id,$course_id]], 400);

         $CourseExperiment = new CourseExperiment;
         $CourseExperiment->id = Util::uuid();
         $CourseExperiment->experiment_id = $experiment_id;
         $CourseExperiment->course_id = $course_id;
         $CourseExperiment->save();
        return response()->json(['success' => true], 200);         
        
    }

    public function deleteExperiment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'course_experiment_id' => 'required'            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "id field is required"], 400);
        }
        $course_experiment_id = $request->get('course_experiment_id');
        $check = DB::table('course_experiment','c')->join('user_courses','user_courses.course_id','c.course_id')->join('weekly_works','weekly_works.course_id','c.course_id')->where(['c.id'=>$course_experiment_id,'user_courses.status'=>'Inactive','weekly_works.status'=>'Inactive'])->first();

        if (is_null($check)) {
            //delete
            CourseExperiment::where('id', $course_experiment_id)->delete();      
            return response()->json(['success' => true], 200);
        }else{
            //cant delete 
            return response()->json(['error' => "can't delete this faculty"], 409);                    
        }
        
    }

    public function deleteResources(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_resourses_id' => 'required'            
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => "id field is required"], 400);
        }
        $course_resourses_id = $request->get('course_resourses_id');

        $CourseResources =  CourseResources::where('id', $course_resourses_id)->first();
        
        $rname = explode('/', $CourseResources->resourceUrl);
        $rname = $rname[sizeof($rname)-1];
        $path = public_path('images/resources').'/'.$rname;
        if(file_exists($path)){
          rename($path, public_path('recycle').'/'.$rname);
        }        

        CourseResources::where('id', $course_resourses_id)->delete();

        return response()->json(['success' => true], 200);
    }


}
