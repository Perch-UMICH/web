<?php

namespace App\Http\Controllers;

use App\Resume;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate
        $this->validate(request(), [
            'resume' => 'required|file|mimes:pdf|max:10000'
        ]);

        // save to local
        $resume = $request->resume;
        $filename = $resume->getClientOriginalName();
        $resume->store('public/resumes');
        $path = 'storage/resumes/' . $resume->hashName();

        $resume = Resume::where('user_id', '=', Auth::id())->first();
        // if there is existing file, delete it
        if ($resume) {
            $toDelete = explode('/',$resume->resume_link);
            Storage::delete('public/resumes/' . end($toDelete));
        } else {
            $resume = new Resume();
            $resume->user_id = Auth::id();
        }

        // save to db
        $resume->resume_name = $filename;
        $resume->resume_link = $path;
        $resume->save();

        // redirect
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username) {
        $userid = User::where('username', '=', $username)->first()->id;
        $resume = Resume::where('user_id', '=', $userid)->first();
        if ($resume) {
            // local
            $path = explode('/',$resume->resume_link);
            $path = 'app/public/resumes/' . end($path);

            // s3
            // $path = explode('/',$resume->resume_link);
            // $resume = Storage::url(end($path));

            return response()->download(storage_path($path), $resume->resume_name);
        }
        return null;
    }

}
