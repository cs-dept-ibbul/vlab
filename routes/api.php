<?php

use App\Http\Controllers\Api\ExperimentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\SchoolController;
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

Route::group(['middleware' => 'api',
], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['prefix' => 'schools'
    ], function() {
        Route::post('create', [SchoolController::class, 'create']);
        Route::post('school', [SchoolController::class, 'getSchool']);
        Route::get('schools', [SchoolController::class, 'getAllSchools']);
    });

    Route::group(['prefix' => 'faculties'
    ], function() {
        Route::post('create', [FacultyController::class, 'create']);
        Route::post('faculty', [FacultyController::class, 'getFaculty']);
        Route::get('faculties', [FacultyController::class, 'getAllFaculties']);
    });

    Route::group(['prefix' => 'experiments'
    ], function() {
        Route::post('create', [ExperimentController::class, 'create']);
        Route::post('experiment', [ExperimentController::class, 'getExperiment']);
        Route::get('experiments', [ExperimentController::class, 'getAllExperiment']);
    });

});
