<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique()->index();
            $table->integer('lab_id')->unsigned()->unique()->index()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('bio')->nullable();
            $table->string('major')->nullable();
            $table->string('year')->nullable();
            $table->double('gpa')->nullable();
            $table->string('linkedin_user')->nullable();
            $table->string('profile_pic_link')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lab_id')->references('id')->on('labs');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}