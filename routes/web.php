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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mentors','MentorController@index' , function () {
    return view('mentors');
});

Route::get('/exams','ExamsController@index' );
Route::post('/exams/store','ExamsController@store' )->name('bookExam');

Route::get('/profile/', 'HomeController@index');
Route::get('/profile/{id}', 'HomeController@show')->name('home');
Route::get('/profile/{id}/exams', 'ExamsController@show');

Auth::routes();

Route::get('/profile/{id}', 'HomeController@index')->name('home');
Route::get('/profile/{id}/{subjectid}', 'HomeController@subject');
Route::get('/admin','AdminController@index');
Route::post('/admin/store','AdminController@store')->name('passOrFail');

Route::get('/jobs','JobController@index');