<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = [
            [
                'name' => 'access_student',
                'display_name' => 'Access Student',
                'description' => 'Allows user to access student only pages'
            ],
            [
                'name' => 'access_lab',
                'display_name' => 'Access Lab',
                'description' => 'Allows user to access lab faculty only pages'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
