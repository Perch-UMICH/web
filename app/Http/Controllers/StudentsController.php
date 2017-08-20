<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /students url

        // If logged in and a student, redirect to their profile page
        // else, redirect home
        if (!Auth::guest() && Auth::user()->hasRole('student')) {
            return redirect('student/' . Auth::user()->username);
        }
        else {
            return redirect('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO(?)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        // Middleware ensures only student may view this page

        // Get user id by username
        $user = User::where('username', '=', $username)->first();

        // Get student data by id
        $student = Student::where('user_id', '=', $user->id)->first();

        // Return student profile home page
        return view('student.show')->with(['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO
    }

//    public function __construct()
//    {
//        $this->middleware('permission:access_student', ['only' => ['show', 'index', 'create']]);
//    }
}
