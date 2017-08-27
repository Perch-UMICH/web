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

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('student', 'StudentController', ['only' => [
    'show', 'index'
]]);

Route::resource('student', 'StudentController', ['except' => [
    'create', 'store', 'destroy'
]]);

Route::resource('lab', 'LabController', ['only' => [
    'show', 'index'
]]);

Route::resource('resume', 'ResumeController', ['only' => [
    'show', 'store'
]]);

Route::resource('photo', 'ProfilePictureController', ['only' => [
    'show', 'store'
]]);