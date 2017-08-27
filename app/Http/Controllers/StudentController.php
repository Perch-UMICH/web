<?php

namespace App\Http\Controllers;

use App\Resume;
use App\Skill;
use App\Student_Skill;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class StudentController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkRole:student')->only(['index', 'edit', 'update']);
        $this->middleware('checkPermission')->only(['edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /students url
        return redirect('student/' . Auth::user()->username);

        // Handled by middleware
        /*
        // If logged in and a student, redirect to their profile page
        // else, redirect home
        if (!Auth::guest() && Auth::user()->hasRole('student')) {
            return redirect('student/' . Auth::user()->username);
        }
        else {
            return redirect('home');
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO(?)
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
     * @param  int  $username
     * @return View
     */
    public function show($username)
    {
        // Middleware ensures only student may view this page
            // * Moved middleware to constructor to protect the entire StudentController

        // Get user id by username
        $user = User::where('username', '=', $username)->first();

        // Get student data by id
        $student = Student::where('user_id', '=', $user->id)->first();

        // Get student skills
        $skills = array();
        foreach (Student_Skill::where('user_id', '=', $user->id)->get() as $skill) {
            $skills[] = Skill::find($skill->skill_id)->name;
        }

        //Get student resume
        $resume = Resume::where('user_id', '=', $user->id)->first();

        // Return student profile home page
        return view('student.show')->with('username', $username)->with('student', $student)
            ->with('resume', $resume)->with('skills', $skills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $username
     * @return View
     */
    public function edit($username) {
        // asserting that user is editing their own profile, routing is handled by middleware
        assert($username == Auth::user()->username);
        // find the student and return view
        $student = Student::where('user_id', '=', Auth::id())->first();
        return view('student.edit')->with('username', $username)->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // validate form
        $this->validate(request(), [
            'major' => 'required',
            'bio' => 'max:400',
            'linkedin' => 'active_url|nullable',
            'gpa' => 'numeric|min:0|max:4|nullable',
        ]);

        // update database
        // $user = User::find(Auth::id())->student; // not sure why this line doesn't work
        $student = Student::where('user_id','=',Auth::id())->first();
        $student->major = $request->major;
        $student->year = $request->standing;
        $student->gpa = $request->gpa;
        $student->linkedin_user = $request->linkedin;
        $student->bio = $request->bio;
        $student->save();

        // redirect
         return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO(?)
    }

}
