<?php
use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder{
    public function run() {
        DB::table('tags')->delete();

        $tag = new Tag();
        $tag->tag = "Chemistry";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Biophysical Chemistry";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Organic Chemistry";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Physical Chemistry";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Biology";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Cell Biology";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Computational Biology";
        $tag->save();

        $tag = new Tag();
        $tag->tag = "Biochemistry";
        $tag->save();
    }
}