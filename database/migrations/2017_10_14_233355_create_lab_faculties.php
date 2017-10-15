<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabFaculties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_id')->unsigned()->index();
            $table->integer('faculty_id')->unsigned();
            $table->boolean('PI');
            $table->timestamps();
            $table->unique(['lab_id', 'faculty_id']);
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_faculties');
    }
}
