<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 7/29/17
 * Time: 4:33 PM
 */

namespace App\Http\Controllers;

use App\Perch_User;
use App\Resume;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller {

    public function getProfile() {
        // create sample user if it doesn't exist
        $user = Perch_User::find(1);
        $student = Student::find(1);
        if (!$user) {
            $user = new Perch_User();
            $user->uniqname = 'perch';
            $user->role = 'student';
            $user->first_name = 'Perch';
            $user->last_name = 'User';
            $user->save();
            $student = new Student();
            $student->user_id = $_SESSION['user'];
            $student->major = 'Biology';
            $student->save();
        }

        return view('profile')->with('user', $user)->with('student', $student);
    }

    public function updateResume(Request $request) {
        if ($request->hasFile('resume')) {
            // get the file from request
            $file = $request->file('resume');
            $filename = $file->getClientOriginalName();
            $path = $file->store('resumes');

            // save into mysql
            $resume = Resume::where('user_id', '=', $_SESSION['user'])->first();

            if ($resume) {
                $resume->resume_name = $filename;
                $resume->resume_link = $path;
                $resume->save();
                return redirect()->route('profile')->with('status', 'successfully updated resume.');
            } else {
                $resume = new Resume();
                $resume->user_id = $_SESSION['user'];
                $resume->resume_name = $filename;
                $resume->resume_link = $path;
                $resume->save();
                return redirect()->route('profile')->with('status', 'successfully uploaded resume.');
            }
        } else {
            return redirect()->route('profile')->with('status', 'something went wrong.');
        }
    }

    public function updateProfilePic(Request $request) {
        // get the file from request
        $file = $request->file('profile');
        $file->store('public/profile_pic');
        $path = 'storage/profile_pic/' . $file->hashName();

        // save into mysql
        $student = Student::where('user_id', '=', 1)->first();
        if ($student) {
            $student->profile_pic_link = $path;
            $student->save();
            //echo '<img src=' .asset($path). '>';
            return redirect()->route('profile')->with('status', 'successfully updated profile picture.');
        }
    }


}