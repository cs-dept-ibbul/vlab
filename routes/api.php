<?php
use App\Http\Controllers\Api\ExperimentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\UserController;
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


Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::get('faculty_course_student', [FacultyController::class, 'getFacultyWithCourseAndStudentCount']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => ['jwt.auth']], function () {

        Route::group([
            'prefix' => 'users'
        ], function () {
            Route::post('import_students', [UserController::class, 'importStudents']);
            Route::post('update_password', [UserController::class, 'updatePassword']);
        });

        Route::group([
            'prefix' => 'schools'
        ], function () {
            Route::post('create', [SchoolController::class, 'create']);
            Route::post('school', [SchoolController::class, 'getSchool']);
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
            Route::post('save_experiment_result', [ExperimentController::class, 'saveExperimentResult']);
            Route::post('experiment_results_esid', [ExperimentController::class, 'getExperimentResultsByExpSessId']);
            Route::post('experiment_results_csid', [ExperimentController::class, 'getExperimentResultsByCourseSessId']);
            Route::post('experiment', [ExperimentController::class, 'getExperiment']);
            Route::get('experiments', [ExperimentController::class, 'getAllExperiment']);
        });

        Route::group([
            'prefix' => 'session'
        ], function () {
            Route::post('create', [SessionController::class, 'create']);
            Route::post('update', [SessionController::class, 'update']);
            Route::post('delete', [SessionController::class, 'delete']);
            Route::get('all_session', [SessionController::class, 'getAllSession']);
        });

        Route::group([
            'prefix' => 'courses'
        ], function () {
            Route::post('create', [CourseController::class, 'create']);
            Route::post('update', [CourseController::class, 'updateCourse']);
            Route::post('delete', [CourseController::class, 'deleteCourse']);
            Route::post('course', [CourseController::class, 'getCourse']);
            Route::get('courses', [CourseController::class, 'getAllCourses']);
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
            Route::get('enrolledCourses', [CourseController::class, 'getStudentEnrolledCourses']);//not clear
            Route::post('course_experiments', [CourseController::class, 'courseExperiments']); //consume
        });
    });
});
