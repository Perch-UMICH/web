<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePictureController extends Controller {
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

        $user = User::find(Auth::id());
        // if there is existing file, delete it
        if ($user->picture) {
            $toDelete = explode('/', $user->picture);
            Storage::delete('public/profile_pic/' . end($toDelete));
        }

        // save to db
        $user->picture = $path;
        $user->save();

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
        $user = User::find($userid);

        // profile picture exist, serve it
        if ($user->picture) {
            $path = explode('/', $user->picture);
            $path = 'app/public/profile_pic/' . end($path);
            return response()->file(storage_path($path));
        }

        // profile picture does not exist, serve default
        $path = 'app/public/profile_pic/default_avatar.svg';
        return response()->file(storage_path($path), ['Content-type' => 'image/svg+xml']);
    }
}
