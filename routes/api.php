<?php
use App\Http\Controllers\Api\ExperimentController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeeklyWorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('password/forgot', [ForgotPasswordController::class, 'forgot']);
Route::post('password/reset', [ForgotPasswordController::class, 'reset']);

Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::get('faculty_course_student', [FacultyController::class, 'getFacultyWithCourseAndStudentCount']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('feedback', [FeedbackController::class, 'feedback']);
    Route::get('getfeedbacks', [FeedbackController::class, 'getFeedback']);
    Route::get('check', [FacultyController::class, 'checkFacultyExist']);

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('verify_user', [AuthController::class, 'verifyUser']);
    Route::get('current_session', [SessionController::class, 'getCurrentSession']);

    Route::group(['middleware' => ['jwt.auth']], function () {

        Route::group([
            'prefix' => 'users'
        ], function () {
            Route::post('change_school_info', [UserController::class, 'changeSchoolInfo']);
            Route::post('change_user_info', [UserController::class, 'changeUserInfo']);
            Route::post('change_password', [UserController::class, 'changePassword']);
            Route::post('changeEmail', [UserController::class, 'changeEmail']);

            Route::post('students', [UserController::class, 'getStudents']);
            Route::get('users', [UserController::class, 'getAllUsers']);
            Route::post('by_search', [UserController::class, 'getAllUsersBySearch']);

            Route::post('faculty_admins', [UserController::class, 'getFacultyAdmins']);
            Route::post('delete', [UserController::class, 'delete']);
            Route::post('update', [UserController::class, 'update']);
            Route::post('create', [UserController::class, 'create']);
            Route::post('import_students', [UserController::class, 'importStudents']);
            Route::post('update_password', [UserController::class, 'updatePassword']);
        });

        Route::group([
            'prefix' => 'schools'
        ], function () {
            Route::post('create', [SchoolController::class, 'create']);
            Route::get('school', [SchoolController::class, 'getSchool']);
            Route::get('schools', [SchoolController::class, 'getAllSchools']);
        });

        Route::group([
            'prefix' => 'faculties'
        ], function () {
            Route::post('create', [FacultyController::class, 'create']);
            Route::post('update', [FacultyController::class, 'updateFaculty']);
            Route::post('delete', [FacultyController::class, 'deleteFaculty']);
            Route::post('faculty', [FacultyController::class, 'getFaculty']);
            Route::get('faculties', [FacultyController::class, 'getAllFaculties']);
            Route::get('faculty_courses', [FacultyController::class, 'facultiesWithCourses']);
            Route::get('faculty_course_student', [FacultyController::class, 'getFacultyWithCourseAndStudentCount']);
        });

        Route::group([
            'prefix' => 'departments'
        ], function () {
            Route::post('create', [DepartmentController::class, 'create']);
            Route::post('delete', [DepartmentController::class, 'deleteDepartment']);
            Route::post('update', [DepartmentController::class, 'updateDepartment']);
            Route::post('department', [DepartmentController::class, 'getDepartment']);
            Route::get('departments', [DepartmentController::class, 'getAllDepartments']);
        });

        Route::group([
            'prefix' => 'experiments'
        ], function () {
            
            Route::post('create', [ExperimentController::class, 'create']);
            Route::post('update', [ExperimentController::class, 'updateExperiment']);
            Route::post('delete', [ExperimentController::class, 'deleteExperiment']);
            Route::post('save_experiment_result', [ExperimentController::class, 'saveExperimentResult']);
            Route::post('experiment_results_esid', [ExperimentController::class, 'getExperimentResultsByExpSessId']);
            Route::post('experiment_results_csid', [ExperimentController::class, 'getExperimentResultsByCourseSessId']);
            Route::post('experiment_results_cusid', [ExperimentController::class, 'getExperimentResultsByCourseUserSessId']);
            Route::post('course_experiments', [ExperimentController::class, 'getAllCourseExperiment']);
            Route::post('experiment', [ExperimentController::class, 'getExperiment']);
            Route::get('experiments', [ExperimentController::class, 'getAllExperiment']);
            Route::post('experiment_by_weekly_experiment_id', [ExperimentController::class, 'getExperimentByWeeklyExperimentId']);
            Route::post('allow_reattempt_by_result_id', [ExperimentController::class, 'reattemptExperimentbyrid']);

        });

        Route::group([
            'prefix' => 'session'
        ], function () {
            Route::post('create', [SessionController::class, 'create']);
            Route::post('update', [SessionController::class, 'update']);
            Route::post('set_session', [SessionController::class, 'setSession']);
            Route::post('delete', [SessionController::class, 'delete']);
            Route::post('set_session', [SessionController::class, 'setCurrentSession']);
            Route::get('all_session', [SessionController::class, 'getAllSession']);
        });

        Route::group([
            'prefix' => 'works'
        ], function () {
            Route::post('create', [WeeklyWorkController::class, 'create']);
            Route::post('update', [WeeklyWorkController::class, 'update']);
            Route::post('delete', [WeeklyWorkController::class, 'delete']);
            Route::post('assign_work_experiment', [WeeklyWorkController::class, 'assignWeeklyWorkExperiment']);
            Route::post('weekly_work', [WeeklyWorkController::class, 'getWeeklyWork']);
            Route::get('weekly_works', [WeeklyWorkController::class, 'getWeeklyWorks']);
            Route::get('weekly_works_only', [WeeklyWorkController::class, 'getOnlyWeeklyWorks']);
            Route::post('student_task', [WeeklyWorkController::class, 'getStudentWeeklyWork']);
            Route::post('student_task2', [WeeklyWorkController::class, 'getStudentWeeklyWork2']);
            
            Route::post('delete_work_expetiment', [WeeklyWorkController::class, 'deleteWorkExperiment']);
            Route::post('update_work_experiment', [WeeklyWorkController::class, 'updateWorkExperiment']);
            Route::post('work_experiment', [WeeklyWorkController::class, 'getWeeklyWorkExperiment']);
            Route::get('work_experiments', [WeeklyWorkController::class, 'getWeeklyWorkExperiments']);
        });

        Route::group([
            'prefix' => 'courses'
        ], function () {
            Route::post('create', [CourseController::class, 'create']);
            Route::post('update', [CourseController::class, 'updateCourse']);
            Route::post('delete', [CourseController::class, 'deleteCourse']);
            Route::post('course', [CourseController::class, 'getCourse']);
            Route::get('courses', [CourseController::class, 'getAllCourses']);
            Route::get('allcourses', [CourseController::class, 'allCourses']);            
            Route::post('enroll_student', [CourseController::class, 'enrollStudent']);
            Route::get('courses_students', [CourseController::class, 'courseStudents']);
            Route::post('course_students', [CourseController::class, 'courseStudentById']);//consume
            Route::post('faculty_courses', [CourseController::class, 'getCoursesByFacultyId']);//consume
            Route::post('faculty_course_students', [CourseController::class, 'courseStudentByFacultyId']); //not requested
            Route::get('student_courses', [CourseController::class, 'studentCourses']);
            Route::post('student_courses', [CourseController::class, 'studentCoursesById']);
            Route::post('add_course_resources', [CourseController::class, 'addCourseResources']); //not requested
            Route::post('assign_course_instructor', [CourseController::class, 'assignCourseInstructor']); //not requested
            Route::post('assign_course_experiment', [CourseController::class, 'assignCourseExperiment']); //not requested
            Route::post('add_student_course', [CourseController::class, 'addStudentCourse']);//not clear
            Route::post('bulk_course_assign', [CourseController::class, 'bulkCourseAssign']); //not requested
            Route::post('enrolledCourses', [CourseController::class, 'getStudentEnrolledCourses']);//not clear
            Route::post('course_experiments', [CourseController::class, 'courseExperiments']); //consume
            Route::post('upload_resources', [CourseController::class, 'uploadResources']); //consume
            Route::post('add_experiment', [CourseController::class, 'addExperiment']); //consume
            Route::post('delete_resources', [CourseController::class, 'deleteResources']); //consume
            Route::post('delete_experiment', [CourseController::class, 'deleteExperiment']); //consume

        });
    });
});
