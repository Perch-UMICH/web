<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roles = [
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'User is a student'
            ],
            [
                'name' => 'faculty',
                'display_name' => 'faculty',
                'description' => 'User is a lab faculty member'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
