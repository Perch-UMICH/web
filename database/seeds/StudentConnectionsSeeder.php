<?php

use App\Student_Tag;
use App\Student_Skill;
use App\Student;
use App\Tag;
use Illuminate\Database\Seeder;

class StudentConnectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->studentSkillsSeeder();
        $this->studentTagsSeeder();
    }

    /**
     * Seeds student_skills table
     */
    public function studentSkillsSeeder() {
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

    /**
     * Seeds student_tags table
     */
    public function studentTagsSeeder() {
        DB::table('student_tags')->delete();

        $tag_chemistry = Tag::where('tag', '=', 'Chemistry')->first();
        $tag_orgo = Tag::where('tag','=','Organic Chemistry')->first();
        $tag_comp_bio = Tag::where('tag','=','Computational Biology')->first();

        $student = Student::find(1);

        $student_tag = new Student_Tag();
        $student_tag->student_id = $student->id;
        $student_tag->tag_id = $tag_chemistry->id;
        $student_tag->save();

        $student_tag = new Student_Tag();
        $student_tag->student_id = $student->id;
        $student_tag->tag_id = $tag_orgo->id;
        $student_tag->save();

        $student = Student::find(2);

        $student_tag = new Student_Tag();
        $student_tag->student_id = $student->id;
        $student_tag->tag_id = $tag_comp_bio->id;
        $student_tag->save();
    }

}
