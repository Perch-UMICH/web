<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\User;
use Illuminate\Http\Request;
use App\Lab;
use App\Student;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lab = Lab::where('id', '=', $id)->first();

        // Lab PI
        $PI = Faculty::find($lab->PI);
        // Get PI username
        $username = User::find($PI->user_id)->username;

        // Find all student and faculty members of this lab
        $faculty = array();

        foreach (Faculty::where('lab_id', '=', $lab->id)->get() as $faculty_member) {
            $faculty[] = $faculty_member;
        }

        $students = array();

        foreach (Student::where('lab_id', '=', $lab->id)->get() as $student) {
            $students[] = $student;
        }

        return view('lab.show')->with('lab', $lab)->with('students', $students)
            ->with('faculty', $faculty)->with('PI', $PI)->with('username', $username);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
