<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SchoolController;
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
    });

    Route::group(['prefix' => 'faculties'
    ], function() {
        Route::post('create', [FacultyController::class, 'create']);
    });

});
