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


Route::get('/explore', 'App\Http\Controllers\ExploreController@index');

Route::get('/simple-pendulum','App\Http\Controllers\experimentController@simplePendulum');

Route::get('/simplependulumEquipment', function ()
{
	return view('experiment.simplependulumEquipment');
})->name('simplependulumEquipment');


Route::get('/vernier-caliper','App\Http\Controllers\experimentController@vernierCaliper');
Route::get('/vernierEquipment', function ()
{
	return view('experiment.vernierEquipment');
})->name('vernierEquipment');


Route::get('/micrometer','App\Http\Controllers\experimentController@micrometerScrewGuage');
Route::get('/micrometerEquipment', function ()
{
	return view('experiment.micrometerEquipment');
})->name('micrometerEquipment');

Route::get('/vewCourse', 'App\Http\Controllers\ViewCourseController@index');
Route::get('/', 'App\Http\Controllers\PagesController@index');

	