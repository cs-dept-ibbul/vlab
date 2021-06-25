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

Route::view('forgot_password', 'reset_password')->name('password.reset');


Route::get('/', 'App\Http\Controllers\PagesController@index')->name('home');
Route::get('/explore', 'App\Http\Controllers\ExploreController@index')->name('explore');
Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('logout');
Route::get('/contributors', function(){
	return view('contributors');
})->name('contributors');

Route::get('/faculty-survey', function(){
	return view('faculty-survey');
})->name('faculty-survey');

Route::get('/student-survey', function(){
	return view('student-survey');
})->name('student-survey');

Route::get('/usability', function(){
	return view('usability');
})->name('usability
');


Route::get('/feedbacks', function(){
	return view('feedbacks');
});

Route::post('/ajax-logout', 'App\Http\Controllers\loginController@ajaxlogout');
Route::post('/ajax-check-login', 'App\Http\Controllers\loginController@ajaxchecklogin');
/*Route::middleware(['cors'])->group(function(){
});*/
Route::post('/get_user_department', 'App\Http\Controllers\PagesController@getFacultyName');

Route::middleware(['is_loggedin'])->group(function(){
	Route::get('/login', 'App\Http\Controllers\loginController@index')->name('login');
	Route::post('/proccess-login', 'App\Http\Controllers\loginController@process_login');
});


//AMDIN
Route::middleware(['adminauth'])->group(function(){
	Route::get('/admin-settings', function(){
		return view('admin.admin_profile');
	})->name('sprofile');
	Route::get('/manage-faculty', 'App\Http\Controllers\ManageFacultyController@index')->name('manage-faculty');
	Route::get('/manage-department', 'App\Http\Controllers\ManageDepartmentController@index')->name('manage-department');
	Route::get('/manage-session', 'App\Http\Controllers\ManageSessionController@index')->name('manage-session');
	Route::get('/manage-user', 'App\Http\Controllers\ManageUserController@index')->name('manage-user');
});

Route::middleware(['studentauth'])->group(function(){
	Route::get('/UserDashboard', 'App\Http\Controllers\ViewUserDashboard@index')->name('sdashboard');
	Route::get('/settings', function(){
		return view('student_profile');
	})->name('sprofile');
	Route::get('/my-courses', 'App\Http\Controllers\StudentCourses@index')->name('courses');
	Route::middleware(['is_enrolled'])->group(function(){
		Route::get('/my-course-review/{id}', 'App\Http\Controllers\StudentCourses@review')->name('my-course-review');
	});
	Route::get('/view-Students-dashboard', 'App\Http\Controllers\adminViewStudentsdashboard@index')->name('view-Students-dashboard');
	Route::get('/viewCourse/{id?}', 'App\Http\Controllers\ViewCourseController@index')->name('viewCourse');

	/*where to go*/
	Route::get('/my-practicals', 'App\Http\Controllers\MyPracticals@index')->name('my-practicals');
	Route::get('/my-Practical', 'App\Http\Controllers\ViewMyPracticalController@index');
	/*end where to go*/

	Route::get('/course-activities', 'App\Http\Controllers\adminViewCourses@index')->name('course-activities');
	Route::get('/course-resources', 'App\Http\Controllers\adminCourseResources@index')->name('course-resources');
	Route::get('/course-experiments', 'App\Http\Controllers\adminCourseExperiments@index')->name('course-experiments');

});


Route::middleware(['instructorauth'])->group(function(){
	Route::get('/view-course/{id?}', 'App\Http\Controllers\ViewCourseController@forInstructor')->name('view-course');

	Route::get('/profile', function(){
		return view('instructor.instructor_settings');
	})->name('iprofile');
	Route::get('/view-created-course', 'App\Http\Controllers\ManageCourseController@viewCourse')->name('view-created-course');
	Route::get('/manage-task', 'App\Http\Controllers\InstructorController@task')->name('manage-task');
	Route::get('/create-course', 'App\Http\Controllers\ManageCourseController@index')->name('create-courses');
	Route::get('/add-experiment', 'App\Http\Controllers\AddExperimentController@index')->name('add-experiment');
	Route::get('/view-created-experiment', 'App\Http\Controllers\AddExperimentController@createdexperiment')->name('view-created-experiment');
	Route::get('/view-student', 'App\Http\Controllers\InstructorController@viewstudent')->name('view-student');

	Route::get('/course-experiments', 'App\Http\Controllers\ViewCourseController@courseExperiments');
	Route::get('/course-resources', 'App\Http\Controllers\ViewCourseController@courseResources');
	
});

Route::middleware(['twouserauth'])->group(function(){
	Route::get('/unauthorized-e', function(){return view('unAuthorized.NotEnrolled');});
	Route::get('/no-access', function(){return view('unAuthorized.noAccess');});
	Route::get('/closed-409', function(){return view('unAuthorized.closed-409');});
	 /*series and parallel*/
	Route::get('/circuitconnection-sap','App\Http\Controllers\experimentController@circuitconnection1')->name('circuitconnection1');
	Route::get('/simpleCircuit', function (){return view('experiment.simpleCircuit');})->name('simpleCircuit');
	Route::get('/simplependulumEquipment', function (){return view('experiment.simplependulumEquipment');})->name('simplependulumEquipment');
	Route::get('/vernierEquipment', function (){return view('experiment.vernierEquipment');})->name('vernierEquipment');
	Route::get('/micrometerEquipment', function (){return view('experiment.micrometerEquipment');})->name('micrometerEquipment');
	Route::get('/resistorExperiment', function (){return view('experiment.resistorExperiment');})->name('resistorExperiment');


    Route::middleware(['whoareyou'])->group(function(){

		Route::get('/simple-circuit/{id?}','App\Http\Controllers\experimentController@simpleCircuit')->name('simple-circuit');
		Route::get('/simple-pendulum/{id?}','App\Http\Controllers\experimentController@simplePendulum')->name('simple-pendulum');
		Route::get('/circuitconnection/{id?}','App\Http\Controllers\experimentController@circuitconnection2')->name('circuitconnection2');
		Route::get('/vernier-caliper/{id?}','App\Http\Controllers\experimentController@vernierCaliper')->name('vernier-caliper');
		Route::get('/micrometer/{id?}','App\Http\Controllers\experimentController@micrometerScrewGuage')->name('micrometer');
		/*Resistors color code this might change late to Electricity circuit construction */
		Route::get('/resistor-color-code/{id?}','App\Http\Controllers\experimentController@resistor')->name('resistors');
		/*end resistors color code*/
    });

});
