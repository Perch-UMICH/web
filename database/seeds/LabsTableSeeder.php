<?php

use Illuminate\Database\Seeder;
use App\Lab;

class LabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('labs')->delete();

        $lab = new Lab();
        $lab->name = "Nishii Lab";
        $lab->department = "Chemistry";
        $lab->description = "Lab of Akira Nishii, MD PhD.";
        $lab->save();
    }
}
