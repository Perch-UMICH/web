<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePictureController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = 'app/public/profile_pic/default_avatar.svg';
        return response()->file(storage_path($path), ['Content-type' => 'image/svg+xml']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate(request(), [
            'profile_picture' => 'required|image|max:10000'
        ]);

        // save to local
        $picture = $request->profile_picture;
        $picture->store('public/profile_pic');
        $path = 'storage/profile_pic/' . $picture->hashName();

        $student = Student::where('user_id', '=', Auth::id())->first();
        // if there is existing file, delete it
        if ($student->profile_pic_link) {
            $toDelete = explode('/', $student->profile_pic_link);
            Storage::delete('public/profile_pic/' . end($toDelete));
        }

        // save to db
        $student->profile_pic_link = $path;
        $student->save();

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
        $student = Student::where('user_id', '=', $userid)->first();

        $path = explode('/',$student->profile_pic_link);
        $path = 'app/public/profile_pic/' . end($path);
        return response()->file(storage_path($path));
    }
}
