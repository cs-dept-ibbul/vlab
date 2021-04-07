<?php

use App\Http\Controllers\Api\ExperimentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\Util;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
            Route::post('faculty', [FacultyController::class, 'getFaculty']);
            Route::get('faculties', [FacultyController::class, 'getAllFaculties']);
            Route::get('faculty_courses', [FacultyController::class, 'facultiesWithCourses']);
            Route::get('faculty_course_student', [FacultyController::class, 'getFacultyWithCourseAndStudentCount']);
        });

        Route::group([
            'prefix' => 'experiments'
        ], function () {
            Route::post('create', [ExperimentController::class, 'create']);
            Route::post('experiment', [ExperimentController::class, 'getExperiment']);
            Route::get('experiments', [ExperimentController::class, 'getAllExperiment']);
        });

        Route::group([
            'prefix' => 'courses'
        ], function () {
            Route::post('create', [CourseController::class, 'create']);
            Route::post('delete', [CourseController::class, 'deleteCourse']);
            Route::post('update', [CourseController::class, 'updateCourse']);
            Route::post('course', [CourseController::class, 'getCourse']);
            Route::get('courses', [CourseController::class, 'getAllCourses']);

            Route::post('add_course_resources', [CourseController::class, 'addCourseResources']);
            Route::post('assign_course_instructor', [CourseController::class, 'assignCourseInstructor']);
            Route::post('assign_course_experiment', [CourseController::class, 'assignCourseExperiment']);
            Route::post('add_student_course', [CourseController::class, 'addStudentCourse']);
            Route::post('bulk_course_assign', [CourseController::class, 'bulkCourseAssign']);
            Route::get('enrolledCourses', [CourseController::class, 'getStudentEnrolledCourses']);
        });
    });
});
