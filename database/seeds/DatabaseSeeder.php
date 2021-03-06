<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LabsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LabConnectionsSeeder::class);
        $this->call(StudentConnectionsSeeder::class);
        //$this->call(LabSkillsTableSeeder::class);
    }
}
