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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkRole:faculty')->only(['edit', 'update']);
        $this->middleware('editLabPermission')->only(['edit','update']);
    }

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
        $lab = Lab::find($id);
        // Lab PI
        $PI = Faculty::find($lab->PI);
        // Get PI username for profile picture
        $username = User::find($PI->user_id)->username;

        // Find all student and faculty members of this lab
        $faculty = $lab->faculties;
        $students = $lab->students;

        // Find faculties' user id for displaying edit button
        $facultyid = array();
        foreach ($faculty as $faculty_member) {
            $facultyid[] = $faculty_member->user->id;
        }

        return view('lab.show')->with('lab', $lab)->with('students', $students)->with('faculty', $faculty)
            ->with('facultyid', $facultyid)->with('PI', $PI)->with('username', $username);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lab = Lab::find($id);
        // Lab PI
        $PI = Faculty::find($lab->PI);
        // Get PI username for profile picture
        $username = User::find($PI->user_id)->username;

        return view('lab.edit')->with('lab', $lab)->with('PI', $PI)->with('username', $username);
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
        // validate form
        $this->validate(request(), [
            'labName' => 'required',
            'department' => 'required',
            'description' => 'required',
            'publications' => 'required',
            'location' => 'required',
            'researchAreas' => 'required',
            'url' => 'active_url|nullable',
        ]);

        // update database
        $lab = Lab::find($id);
        $lab->name = $request->labName;
        $lab->department = $request->department;
        $lab->description = $request->description;
        $lab->publications = $request->publications;
        $lab->location = $request->location;
        $lab->researchAreas = $request->researchAreas;
        $lab->url = $request->url;
        $lab->save();

        // redirect
        return redirect('lab/' . $id);
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
