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
        $student->name = 'akshay';
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
        $profile->lab_id = 1;
        $profile->save();

        // Create prof user
        $prof = new User();
        $prof->name = 'akira';
        $prof->username = 'anishii';
        $prof->email = 'anishii@umich.edu';
        $prof->password = bcrypt('password');
        $prof->save();
        $prof->attachRole($role_faculty);

        $profile = new Faculty();
        $profile->user_id = $prof->id;
        $profile->lab_id = 1;
        $profile->title = "Akira Nishii, MD, PhD";
        $profile->save();

        // Create additional users
        $student = new User();
        $student->name = 'han';
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
        $student->name = 'perch';
        $student->username = 'perch';
        $student->email = 'test@perch.com';
        $student->password = bcrypt('test');
        $student->save();
        $student->attachRole($role_student);

        $profile = new Student();
        $profile->user_id = $student->id;
        $profile->first_name = 'Perch';
        $profile->last_name = 'User';
        $profile->major = 'Biology';
        $profile->save();
    }
}
