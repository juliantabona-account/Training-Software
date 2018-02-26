<?php

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

use Illuminate\Mail\Mailable;
use App\Mail\AccountActivated;
use App\Mail\EnrollStudent;
use App\User;


Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

/* 
	COURSES - CREATE, INDEX, SHOW, EDIT, UPDATE, DELETE
*/

//[REMOVE THIS CODE IT JUST FOR TESTING EMAILS]
//[REMOVE THIS CODE IT JUST FOR TESTING EMAILS]
//[REMOVE THIS CODE IT JUST FOR TESTING EMAILS]	
Route::get('/sendmail', function(){

	$user = User::find(1);

	echo 'Preparing to send...';

    //Mail user to activate account 
    Mail::to('brandontabona@gmail.com')->send(new AccountActivated($user));

    echo 'Email sent successfully';

});

Route::get('/error', function(){

	return view('error.connection_fail');

}); 

Route::get('/support', function(){

	return view('/support');

})->middleware('guest');

Route::get('/sendsms', function(){
	
	echo 'Preparing to send...';

	Nexmo::message()->send([
	    'to'   => '26775993221',
	    'from' => '26776710242',
	    'text' => 'Hi Julian, Our Saleschief team has sent you an email to enroll into our sales class. See you there :)'
	]);

    echo 'SMS sent successfully';

});

Route::middleware(['auth'])->group(function () {
	Route::group(['prefix' => 'messages'], function () {
	    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
	    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
	    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
	    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
	    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
	});
});


Route::get('/courses', 'CourseController@index')->name('course-list');
Route::post('/courses', 'CourseController@store')->name('course-save')->middleware('onlyadmin');
Route::get('/courses/enroll', 'CourseController@enroll')->name('course-enroll')->middleware('onlyadmin');
Route::get('/courses/create', 'CourseController@create')->name('course-create')->middleware('onlyadmin');
Route::get('/courses/{course_id}', 'CourseController@show')->middleware('auth');
Route::put('/courses/{course_id}', 'CourseController@update')->middleware('onlyadmin');
Route::delete('/courses/{course_id}', 'CourseController@delete')->middleware('onlyadmin');
Route::get('/courses/{course_id}/edit', 'CourseController@edit')->middleware('onlyadmin');
Route::get('/courses/{course_id}/clients/create', 'UserController@enroll')->name('client-enroll')->middleware('onlyadmin');


/* 
	MODULES - ADD, EDIT, UPDATE, DELETE
*/

Route::post('/courses/{id}/module', 'ModuleController@store')->middleware('onlyadmin');
Route::put('/courses/{course_id}/module/{module_id}', 'ModuleController@update')->middleware('onlyadmin');
Route::delete('/courses/{course_id}/module/{module_id}', 'ModuleController@delete')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/edit', 'ModuleController@edit')->middleware('onlyadmin');

/* 
	LESSONS - ADD, EDIT, UPDATE, DELETE
*/
Route::post('/courses/{course_id}/module/{module_id}/lesson/notes', 'LessonController@notesImageUpload')->middleware('onlyadmin');
Route::post('/courses/{course_id}/module/{module_id}/lesson', 'LessonController@store')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/create', 'LessonController@create')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}', 'LessonController@show')->middleware('auth');
Route::put('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}', 'LessonController@update')->middleware('onlyadmin');
Route::delete('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}', 'LessonController@delete')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/edit', 'LessonController@edit')->middleware('onlyadmin');
Route::post('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/video', 'LessonController@videoUpload')->name('lesson-video-save')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/video', 'LessonController@video')->name('lesson-video')->middleware('onlyadmin');

/* 
	LESSON NOTES - ADD, EDIT, UPDATE, DELETE
*/



/* 
	TESTS - ADD, EDIT, UPDATE, DELETE
*/
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests', 'TestController@index')->name('test-list')->middleware('auth');
Route::post('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests', 'TestController@store')->name('test-save')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/create', 'TestController@create')->name('test-create')->middleware('onlyadmin');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}', 'TestController@taketest')->middleware('auth');
Route::put('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}', 'TestController@update')->middleware('onlyadmin');
Route::delete('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}', 'TestController@delete')->middleware('onlyadmin');
Route::post('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}/mark', 'TestController@markTest')->middleware('auth');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}/edit', 'TestController@edit')->middleware('onlyadmin');

//markTtest
//mark

/* 
	CLIENTS - ADD, EDIT, UPDATE, DELETE
*/

Route::get('/clients', 'UserController@index')->name('client-list')->middleware('onlyadmin');
Route::post('/clients', 'UserController@store')->name('client-save')->middleware('onlyadmin');
Route::get('/clients/create', 'UserController@create')->name('client-create')->middleware('onlyadmin');
Route::get('/clients/{client_id}', 'UserController@show')->name('client-update')->middleware('onlyadmin');
Route::put('/clients/{client_id}', 'UserController@update')->name('client-save-update');

Route::get('/clients/activate/{client_email}/{client_token}', 'UserController@activate')->name('client-activate');
Route::get('/clients/account/setup/{client_email}', 'UserController@setup')->name('client-setup');

Route::get('/users/{user_id}', 'UserController@profile')->name('user-profile')->middleware('auth');
Route::put('/users/{user_id}/password/update', 'UserController@updatePassword')->name('user-password-update')->middleware('auth');

/* 
	COMPANIES - ADD, EDIT, UPDATE, DELETE
*/

Route::get('/companies', 'CompanyController@index')->name('company-list')->middleware('onlyadmin');
Route::post('/companies', 'CompanyController@store')->name('company-save')->middleware('onlyadmin');
Route::get('/companies/create', 'CompanyController@create')->name('company-create')->middleware('onlyadmin');
Route::get('/companies/{company_id}', 'CompanyController@show')->name('company-show')->middleware('onlyadmin');
Route::put('/companies/{company_id}', 'CompanyController@update')->middleware('onlyadmin');
Route::delete('/companies/{company_id}', 'CompanyController@delete')->middleware('onlyadmin');
Route::get('/companies/{company_id}/edit', 'CompanyController@edit')->middleware('onlyadmin');
Route::get('/companies/{company_id}/clients/create', 'CompanyController@enroll')->name('company-enroll')->middleware('onlyadmin');
Route::post('/companies/{company_id}/clients/create', 'CompanyController@enrollSave')->name('company-enroll-save')->middleware('onlyadmin');

/* 
	ADMINS - ADD, EDIT, UPDATE, DELETE
*/



/* 
	SEARCH - ADD, EDIT, UPDATE, DELETE
*/

Route::post('/search/{id}/module', 'ModuleController@store');

Route::get('/notifications', 'NotificationController@getAllNotifications')->name('get-all-notifications');
Route::post('/notifications/mark', 'NotificationController@markAllAsRead')->name('mark-as-read');




//Route::get('/courses/{course_id}/add', 'HomeController@addLessson')->name('add-lesson');
//Route::post('/courses/{course_id}/add', 'HomeController@saveArrangement')->name('save-arrangement');
//Route::get('/courses/{course_id}/edit', 'HomeController@edit')->name('edit-course');
//Route::get('/courses/{course_id}/preview', 'HomeController@show')->name('courses');
//Route::get('/courses/{course_id}/{module_id}/lessons/add', 'HomeController@createLesson')->name('create-lesson');
//Route::post('/courses/{course_id}/{module_id}/lessons/add', 'HomeController@uploadVideo')->name('upload');
//Route::get('/courses/{course_id}/lessons/{lesson_id}', 'HomeController@displayLesson')->name('display-lesson');
//Route::get('/courses/{course_id}/lessons/{lesson_id}/edit', 'HomeController@editLesson')->name('edit-lesson');

