<?php

namespace App\Http\Controllers;

use App\Student_Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentSkillController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkRole:student')->only(['edit', 'update']);
        $this->middleware('checkPermission')->only(['edit']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $username
     * @return View
     */
    public function show($username)
    {
        $skills = array();
        $student_skills = User::where('username','=', $username)->first()->student_skills;
        foreach ($student_skills as $skill) {
            $skills[$skill->skill->id] = $skill->skill->name;
        }
        return json_encode($skills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $username
     * @return View
     */
    public function edit($username)
    {
        // asserting that user is editing their own profile, routing is handled by middleware
        assert($username == Auth::user()->username);
        // find the student and return view
        $student = User::find(Auth::id())->student;
        $skills = array();
        $student_skills = User::find(Auth::id())->student_skills;
        foreach ($student_skills as $skill) {
            $skills[] = $skill->skill->name;
        }
        //$student = Student::where('user_id', '=', Auth::id())->first();
        return view('student.editSkills')->with('username', $username)->with('student', $student)
            ->with('skills', $skills);
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
        // decode request
        $skills = json_decode($request->skills);

        // delete
        $student_skills = User::find(Auth::id())->student_skills;
        foreach ($student_skills as $skill) {
            if (!in_array($skill->skill_id, $skills))
                Student_Skill::find($skill->id)->delete();
        }

        // reinsert
        foreach ($skills as $skillId) {
            Student_Skill::firstOrCreate( ['user_id' => Auth::id(), 'skill_id' => $skillId] );
        }

        // redirect
        return redirect('student/' . Auth::user()->username);
    }

}
