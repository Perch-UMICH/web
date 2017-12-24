<?php

use App\Lab_Faculty;
use App\Lab_Student;
use App\Lab_Tag;
use App\Lab_Skill;
use App\Tag;
use App\Lab_Position;
use App\Position;
use Illuminate\Database\Seeder;

class LabConnectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->labFacultiesSeeder();
        $this->labStudentSeeder();
        $this->labTagsTableSeeder();
        $this->labPositionsTableSeeder();
        $this->labSkillsTableSeeder();
    }

    /**
     * Seeds lab_faculties table
     */
    public function labFacultiesSeeder() {
        DB::table('lab_faculties')->delete();

        $lab_faculty = new Lab_Faculty();
        $lab_faculty->lab_id = 1;
        $lab_faculty->faculty_id = 1;
        $lab_faculty->PI = true;
        $lab_faculty->save();

        $lab_faculty = new Lab_Faculty();
        $lab_faculty->lab_id = 1;
        $lab_faculty->faculty_id = 2;
        $lab_faculty->PI = false;
        $lab_faculty->save();

        $lab_faculty = new Lab_Faculty();
        $lab_faculty->lab_id = 2;
        $lab_faculty->faculty_id = 2;
        $lab_faculty->PI = true;
        $lab_faculty->save();

        $lab_faculty = new Lab_Faculty();
        $lab_faculty->lab_id = 2;
        $lab_faculty->faculty_id = 1;
        $lab_faculty->PI = false;
        $lab_faculty->save();
    }

    /**
     * Seeds lab_students table
     */
    public function labStudentSeeder() {
        DB::table('lab_students')->delete();
        $lab_student = new Lab_Student();
        $lab_student->lab_id = 1;
        $lab_student->student_id = 1;
        $lab_student->role = 'Research Assistant';
        $lab_student->save();
    }

    /**
     * Seeds the lab_tags table
     *
     * @return void
     */
    public function labTagsTableSeeder() {
        DB::table('lab_tags')->delete();
        // See TagsTableSeeder for seeded tags

        $tag = Tag::where('tag', '=', 'Chemistry')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Biophysical Chemistry')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Organic Chemistry')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Physical Chemistry')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Biology')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Cell Biology')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Computational Biology')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

        //

        $tag = Tag::where('tag', '=', 'Biochemistry')->first();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;
        $lab_tag->save();

    }

    /**
 * Seeds lab_positions table
 */
    public function labPositionsTableSeeder() {
        DB::table('lab_positions')->delete();

        //

        $position = new Position();
        $position->name = "Undergraduate Assistant: Ion Channel Physiology";
        $position->description = "Looking for two undergraduate assistant to help with research on calcium ion channels.";
        $position->weeklyCommitment = "10 - 12 hours/week";
        $position->open = true;
        $position->numSlots = 2;
        $position->save();

        $lab_position = new Lab_Position();
        $lab_position->lab_id = 1;
        $lab_position->position_id = $position->id;
        $lab_position->save();
    }

    /**
     * Seeds lab_skills table
     */
    public function labSkillsTableSeeder() {
        DB::table('lab_skills')->delete();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 1;
        $lab_skill->skill_id = 1;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 1;
        $lab_skill->skill_id = 19;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 1;
        $lab_skill->skill_id = 21;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 1;
        $lab_skill->skill_id = 17;
        $lab_skill->required = false;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 1;
        $lab_skill->skill_id = 18;
        $lab_skill->required = false;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 1;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 3;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 5;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 6;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 9;
        $lab_skill->required = true;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 17;
        $lab_skill->required = false;
        $lab_skill->save();

        $lab_skill = new Lab_Skill();
        $lab_skill->lab_id = 2;
        $lab_skill->skill_id = 18;
        $lab_skill->required = false;
        $lab_skill->save();
    }

}
