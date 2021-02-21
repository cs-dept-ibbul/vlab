<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', 'App\Http\Controllers\loginController@index');
Route::get('/', 'App\Http\Controllers\PagesController@index')->name('home');
Route::get('/explore', 'App\Http\Controllers\ExploreController@index')->name('explore');
Route::get('/my-courses', 'App\Http\Controllers\StudentCourses@index')->name('courses');
Route::get('/my-course-review/{id?}', 'App\Http\Controllers\StudentCourses@review')->name('my-course-review')->where('id', '[0-9]+');;
//{name?}





Route::get('/simple-pendulum','App\Http\Controllers\experimentController@simplePendulum')->name('simple-pendulum');

Route::get('/simplependulumEquipment', function ()
{
	return view('experiment.simplependulumEquipment');
})->name('simplependulumEquipment');


Route::get('/vernier-caliper','App\Http\Controllers\experimentController@vernierCaliper')->name('vernier-caliper');
Route::get('/vernierEquipment', function ()
{
	return view('experiment.vernierEquipment');
})->name('vernierEquipment');


Route::get('/micrometer','App\Http\Controllers\experimentController@micrometerScrewGuage')->name('micrometer');
Route::get('/micrometerEquipment', function ()
{
	return view('experiment.micrometerEquipment');
})->name('micrometerEquipment');

Route::get('/vewCourse', 'App\Http\Controllers\ViewCourseController@index');
Route::get('/UserDashboard', 'App\Http\Controllers\ViewUserDashboard@index');



	