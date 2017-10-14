<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_id')->unsigned()->index();
            $table->integer('skill_id')->unsigned();
            $table->boolean('required');
            $table->timestamps();
            $table->unique(['lab_id', 'skill_id']);
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_skills');
    }
}
