<?php

use Illuminate\Support\Facades\Request;
use App\Lab;

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

Route::get('about', function () {
    return view('about');
});

Route::get('team', function () {
    return view('team');
});

Route::get('timeline', function () {
    return view('timeline');
});

Route::get('search', function () {
    return view('search');
});

Route::any('/search_lab', function() {
//    $labs = Lab::all();
//    $labs->tags()->wherePivot('tag','LIKE','%'.$q.'%')->get();
    $q = Request::input('q');
    $lab_q = Lab::query();
    $lab_q->whereHas('tags', function($query) use($q) {
        $query->where('tag','LIKE','%'.$q.'%');
    });

    $labs = $lab_q->get();

    return view('search_results')->with('lab_results', $labs);

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
    'show', 'index', 'edit', 'update', 'create', 'store'
]]);

Route::resource('resume', 'ResumeController', ['only' => [
    'show', 'store'
]]);

Route::resource('photo', 'ProfilePictureController', ['only' => [
    'show', 'store'
]]);

Route::resource('faculty', 'FacultyController', ['only' => [
    'show', 'index'
]]);

Route::resource('faculty', 'FacultyController', ['except' => [
    'create', 'store', 'destroy'
]]);

Route::resource('skills', 'SkillController', ['only' => [
    'index', 'store'
]]);

Route::resource('studentskills', 'StudentSkillController', ['only' => [
    'show', 'edit', 'update'
]]);

Route::resource('studenttags', 'StudentTagsController', ['only' => [
    'show', 'edit', 'update'
]]);

Route::resource('interested', 'NewsletterController', ['only' => [
    'index', 'store'
]]);