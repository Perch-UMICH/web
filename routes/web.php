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

Route::get('/', 'StaticController@getIndex');
Route::get('about', 'StaticController@getAbout');
Route::get('profile', 'ProfileController@getProfile')->name('profile');
Route::post('upload', 'ProfileController@updateResume');
Route::post('change_profile_picture', 'ProfileController@updateProfilePic');
