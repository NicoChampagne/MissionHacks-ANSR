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

Route::get('/mentors','MentorController@index' , function () {
    return view('mentors');
});

Route::get('/exams','ExamsController@index' , function () {
    return view('exams');
});

Route::get('/tester','JobController@suggestJob');

Route::get('/tester/{id}','JobController@suggestJob');

Auth::routes();

Route::get('/profile/{id}', 'HomeController@index')->name('home');
