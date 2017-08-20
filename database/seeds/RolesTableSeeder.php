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
                'name' => 'professor',
                'display_name' => 'professor',
                'description' => 'User is a professor'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
