<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PI')->unsigned()->index();
            $table->string('name')->index();
            $table->string('department')->index();
            $table->string('location');
            $table->text('researchAreas');
            $table->text('description');
            $table->text('publications');
            $table->string('url')->nullable();
            // lab qualifications
            $table->float('gpa')->nullable(); // required gpa to apply
            $table->integer('weeklyCommitment')->nullable(); // weekly time commitment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labs');
    }
}
