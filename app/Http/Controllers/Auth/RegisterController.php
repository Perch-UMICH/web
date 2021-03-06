<?php

namespace App\Http\Controllers\Auth;

use App\Student;
use App\Faculty;
use App\Student_Skill;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user-type' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Obtain username by stripping after '@'
        $email = $data['email'];
        $username = substr($email, strpos($email,"<"), strrpos($email, "@")-strpos($email,"<"));

        $user = User::create([
            'email' => $data['email'],
            'username' => $username,
            'password' => bcrypt($data['password']),
        ]);

        // Attach necessary role
        $role = Role::where('name', $data['user-type'])->first();
        $user->attachRole($role);

        // Create student profile object if student
        if ($data['user-type'] == 'student') {
            $profile = new Student();
            $profile->user_id = $user->id;
            $profile->first_name = $data['first_name'];
            $profile->last_name = $data['last_name'];
            $profile->major = $data['major'];
            $profile->year = $data['year'];
            $profile->bio = $data['bio'];
            $profile->save();
        }
        else if ($data['user-type'] == 'faculty') {
            $profile = new Faculty();
            $profile->user_id = $user->id;
            $profile->email = $data['email'];
            $profile->first_name = $data['first_name'];
            $profile->last_name = $data['last_name'];
            $profile->title = $data['suffix'];
            $profile->save();
        }

        // Link skills to student
        if ($data['user-type'] == 'student') {
            $skills = json_decode($data['skills']);
            foreach ($skills as $skillId) {
                $student_skill = new Student_Skill();
                $student_skill->user_id = $user->id;
                $student_skill->skill_id = $skillId;
                $student_skill->save();
            }
        }

        return $user;
    }
}
