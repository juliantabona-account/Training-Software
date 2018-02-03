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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* 
	COURSES - CREATE, INDEX, SHOW, EDIT, UPDATE, DELETE
*/
Route::get('/courses', 'CourseController@index')->name('course-list');
Route::post('/courses', 'CourseController@store')->name('course-save');
Route::get('/courses/create', 'CourseController@create')->name('course-create');
Route::get('/courses/{course_id}', 'CourseController@show');
Route::put('/courses/{course_id}', 'CourseController@update');
Route::delete('/courses/{course_id}', 'CourseController@delete');
Route::get('/courses/{course_id}/edit', 'CourseController@edit');
Route::get('/courses/{course_id}/clients/create', 'UserController@enroll')->name('client-enroll');


/* 
	MODULES - ADD, EDIT, UPDATE, DELETE
*/

Route::post('/courses/{id}/module', 'ModuleController@store');
Route::put('/courses/{course_id}/module/{module_id}', 'ModuleController@update');
Route::delete('/courses/{course_id}/module/{module_id}', 'ModuleController@delete');
Route::get('/courses/{course_id}/module/{module_id}/edit', 'ModuleController@edit');

/* 
	LESSONS - ADD, EDIT, UPDATE, DELETE
*/

Route::post('/courses/{course_id}/module/{module_id}/lesson', 'LessonController@store');
Route::get('/courses/{course_id}/module/{module_id}/lesson/create', 'LessonController@create');
Route::put('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}', 'LessonController@update');
Route::delete('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}', 'LessonController@delete');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/edit', 'LessonController@edit');
Route::post('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/video', 'LessonController@videoUpload')->name('lesson-video-save');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/video', 'LessonController@video')->name('lesson-video');


/* 
	TESTS - ADD, EDIT, UPDATE, DELETE
*/
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests', 'TestController@index')->name('test-list');
Route::post('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests', 'TestController@store')->name('test-save');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/create', 'TestController@create')->name('test-create');
Route::put('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}', 'TestController@create');
Route::get('/courses/{course_id}/module/{module_id}/lesson/{lesson_id}/tests/{test_id}/edit', 'TestController@edit');


/* 
	CLIENTTS - ADD, EDIT, UPDATE, DELETE
*/

Route::get('/clients', 'UserController@index')->name('client-list');
Route::post('/clients', 'UserController@store')->name('client-save');
Route::get('/clients/create', 'UserController@create')->name('client-create');
Route::get('/clients/{client_id}', 'UserController@show')->name('client-show');

/* 
	COMPANIES - ADD, EDIT, UPDATE, DELETE
*/

Route::get('/companies', 'CompanyController@index')->name('company-list');
Route::post('/companies', 'CompanyController@store')->name('company-save');
Route::get('/companies/create', 'CompanyController@create')->name('company-create');
Route::get('/companies/{company_id}', 'CompanyController@show')->name('company-show');
Route::put('/companies/{company_id}', 'CompanyController@update');
Route::delete('/companies/{company_id}', 'CompanyController@delete');
Route::get('/companies/{company_id}/edit', 'CompanyController@edit');

/* 
	COMPANIES - ADD, EDIT, UPDATE, DELETE
*/

Route::get('/admins/{admin_id}', 'AdminController@show')->name('admin-show');

/* 
	SEARCH - ADD, EDIT, UPDATE, DELETE
*/

Route::post('/search/{id}/module', 'ModuleController@store');




//Route::get('/courses/{course_id}/add', 'HomeController@addLessson')->name('add-lesson');
//Route::post('/courses/{course_id}/add', 'HomeController@saveArrangement')->name('save-arrangement');
//Route::get('/courses/{course_id}/edit', 'HomeController@edit')->name('edit-course');
//Route::get('/courses/{course_id}/preview', 'HomeController@show')->name('courses');
//Route::get('/courses/{course_id}/{module_id}/lessons/add', 'HomeController@createLesson')->name('create-lesson');
//Route::post('/courses/{course_id}/{module_id}/lessons/add', 'HomeController@uploadVideo')->name('upload');
//Route::get('/courses/{course_id}/lessons/{lesson_id}', 'HomeController@displayLesson')->name('display-lesson');
//Route::get('/courses/{course_id}/lessons/{lesson_id}/edit', 'HomeController@editLesson')->name('edit-lesson');

