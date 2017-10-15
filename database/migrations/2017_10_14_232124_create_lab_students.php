<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_id')->unsigned()->index();
            $table->integer('student_id')->unsigned();
            $table->string('role');
            $table->timestamps();
            $table->unique(['lab_id', 'student_id']);
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_students');
    }
}
