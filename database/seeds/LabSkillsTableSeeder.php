<?php

use App\Lab_Skill;
use Illuminate\Database\Seeder;

class LabSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
