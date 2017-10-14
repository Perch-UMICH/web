<?php

use App\Tag;
use App\Lab_Tag;
use Illuminate\Database\Seeder;

class LabTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lab_tags')->delete();
        DB::table('tags')->delete();

        $tag = new Tag();
        $tag->tag = "Chemistry";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Biophysical Chemistry";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Organic Chemistry";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Physical Chemistry";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 1;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Biology";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Cell Biology";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Computational Biology";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;

        //

        $tag = new Tag();
        $tag->tag = "Biochemistry";
        $tag->save();

        $lab_tag = new Lab_Tag();
        $lab_tag->lab_id = 2;
        $lab_tag->tag_id = $tag->id;
    }
}
