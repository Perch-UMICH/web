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
        DB::table('skills')->insert([
            'name' => 'qPCR',
        ]);
        DB::table('skills')->insert([
            'name' => 'Western Blotting',
        ]);
        DB::table('skills')->insert([
            'name' => 'Southern Blotting',
        ]);
        DB::table('skills')->insert([
            'name' => 'RNA Extraction with Trizol',
        ]);
        DB::table('skills')->insert([
            'name' => 'Cell Passaging',
        ]);
        DB::table('skills')->insert([
            'name' => 'DNA Extraction',
        ]);
        DB::table('skills')->insert([
            'name' => 'Separatory Funnel Usage',
        ]);
        DB::table('skills')->insert([
            'name' => 'TLC',
        ]);
        DB::table('skills')->insert([
            'name' => 'Purification and characterization of proteins, enzymes, and nucleic acids',
        ]);
        DB::table('skills')->insert([
            'name' => 'Into to computational biochemistry and bioniformatics',
        ]);
        DB::table('skills')->insert([
            'name' => 'Atomic Force Microscopy',
        ]);
        DB::table('skills')->insert([
            'name' => 'Optical tweezers',
        ]);
        DB::table('skills')->insert([
            'name' => 'NMR',
        ]);
        DB::table('skills')->insert([
            'name' => 'R',
        ]);
        DB::table('skills')->insert([
            'name' => 'Minitab',
        ]);
        DB::table('skills')->insert([
            'name' => 'Distillation',
        ]);
        DB::table('skills')->insert([
            'name' => 'Titration',
        ]);
        DB::table('skills')->insert([
            'name' => 'Crystallization',
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

        // test user student_skills
        DB::table('student_skills')->insert([
            'user_id' => 4,
            'skill_id' => 1
        ]);
        DB::table('student_skills')->insert([
            'user_id' => 4,
            'skill_id' => 2
        ]);
        DB::table('student_skills')->insert([
            'user_id' => 4,
            'skill_id' => 3
        ]);
    }
}