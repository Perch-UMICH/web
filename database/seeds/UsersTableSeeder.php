<?php

use Illuminate\Database\Seeder;
use App\Faculty;
use App\User;
use App\Role;
use App\Permission;
use App\Student;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Create a student and professor user
    public function run()
    {
        DB::table('users')->delete();
        DB::table('permission_role')->delete();
        DB::table('role_user')->delete();
        DB::table('students')->delete();
        // Define roles/permissions
        $role_student = Role::where('name', 'student')->first();
        $role_faculty = Role::where('name', 'faculty')->first();
        $permission_student = Permission::where('name', 'access_student')->first();
        $permission_lab = Permission::where('name','access_lab')->first();

        // Attach permissions to roles
        $role_student->attachPermission($permission_student);
        $role_faculty->attachPermission($permission_lab);

        // Create student user
        $student = new User();
        $student->username = 'akshayro';
        $student->email = 'akshayro@umich.edu';
        $student->password = bcrypt('password');
        $student->save();
        $student->attachRole($role_student);

        // Create student profile object for student
        $profile = new Student();
        $profile->user_id = $student->id;
        $profile->first_name = 'Akshay';
        $profile->last_name = 'Rao';
        $profile->major = 'Physics';
        $profile->year = 'Junior';
        $profile->gpa = '4.0';
        $profile->save();

        // Create faculty user
        $prof = new User();
        $prof->username = 'anishii';
        $prof->email = 'anishii@umich.edu';
        $prof->password = bcrypt('password');
        $prof->save();
        $prof->attachRole($role_faculty);

        $profile = new Faculty();
        $profile->user_id = $prof->id;
        $profile->first_name = "Akira";
        $profile->last_name = "Nishii";
        $profile->title = "MD, PhD";
        $profile->email = "anishii@umich.edu";
        $profile->save();

        // Create additional faculty
        $prof = new User();
        $prof->username = 'perch_faculty';
        $prof->email = 'faculty@perch.com';
        $prof->password = bcrypt('test');
        $prof->save();
        $prof->attachRole($role_faculty);

        $profile = new Faculty();
        $profile->user_id = $prof->id;
        $profile->first_name = "Perch";
        $profile->last_name = "Faculty";
        $profile->title = "Graduate Researcher";
        $profile->email = "faculty@perch.com";
        $profile->save();

        // Create additional users
        $student = new User();
        $student->username = 'wangha31';
        $student->email = 'wangha31@msu.edu';
        $student->password = bcrypt('password');
        $student->save();
        $student->attachRole($role_student);

        $profile = new Student();
        $profile->user_id = $student->id;
        $profile->first_name = 'Han';
        $profile->last_name = 'Wang';
        $profile->major = 'Computer Science';
        $profile->year = 'Junior';
        $profile->gpa = '4.0';
        $profile->save();

        // Create additional users
        $student = new User();
        $student->username = 'perch';
        $student->email = 'test@perch.com';
        $student->password = bcrypt('test');
        $student->save();
        $student->attachRole($role_student);

        $profile = new Student();
        $profile->user_id = $student->id;
        $profile->first_name = 'Perch';
        $profile->last_name = 'User';
        $profile->year = 'Freshman';
        $profile->major = 'Biology';
        $profile->save();
    }
}
