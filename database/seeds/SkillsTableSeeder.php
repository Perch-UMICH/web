<?php
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: han
 * Date: 8/20/17
 * Time: 4:08 PM
 */
class SkillsTableSeeder extends Seeder{
    public function run() {
        DB::table('skills')->delete();
        DB::table('skills')->insert([
            'name' => 'Reading comprehension',
            'description' => 'Reading comprehension of research paper'
        ]);
        DB::table('skills')->insert([
            'name' => 'PCR',
            'description' => 'Polymerase chain reaction'
        ]);
        DB::table('skills')->insert([
            'name' => 'Gel Electrophoresis',
            'description' => 'Separate mixtures of DNA, RNA, or proteins according to molecular size'
        ]);

        // student_skills
        DB::table('student_skills')->delete();
        DB::table('student_skills')->insert([
            'user_id' => 1,
            'skill_id' => 1
        ]);
        DB::table('student_skills')->insert([
            'user_id' => 1,
            'skill_id' => 2
        ]);
        DB::table('student_skills')->insert([
            'user_id' => 1,
            'skill_id' => 3
        ]);
    }
}