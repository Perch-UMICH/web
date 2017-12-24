<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('labs')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tags');
    }
}
