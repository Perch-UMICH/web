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
        $this->middleware('checkRole:faculty')->only(['edit', 'update', 'create', 'store']);
        $this->middleware('editLabPermission')->only(['edit','update', 'store']);
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
        return view('lab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'lab_name' => 'required',
            'department_name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'research_areas' => 'required',
        ]);

        $name = $request['lab_name'];
        $department = $request['department_name'];
        $loc = $request['location'];
        $res_areas = $request['research_areas'];
        $des = $request['description'];

        $lab = new Lab;
        $lab->name = $name;
        $lab->department = $department;
        $lab->location = $loc;
        $lab->researchAreas = $res_areas;
        $lab->description = $des;

        $lab->save();

        // redirect
        return redirect('lab/' . $lab->id);
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
        // Lab PI (first one)
        $PI = $lab->faculties()->wherePivot('PI','=',1)->first();
        // Get PI username for profile picture
        $username = User::find($PI->user_id)->username;

        // Find all student and faculty members of this lab, PI first
        $faculties = $lab->faculties()->orderByDesc('lab_faculties.PI')->get();
        $students = $lab->students()->get();

        // Find faculties' user id for displaying edit button
        $facultyid = array();
        foreach ($faculties as $faculty) {
            $facultyid[] = $faculty->user->id;
        }

        // Find skills
        $required = $lab->skills()->wherePivot('required', '=',1)->get();
        $preferred = $lab->skills()->wherePivot('required', '=',0)->get();

        return view('lab.show')->with('lab', $lab)->with('students', $students)->with('faculty', $faculties)
            ->with('facultyid', $facultyid)->with('PI', $PI)->with('username', $username)
            ->with('requiredSkills', $required)->with('prefSkills', $preferred);
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
        $PI = $lab->faculties()->wherePivot('PI','=',1)->first();
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
