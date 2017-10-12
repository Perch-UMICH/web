<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique()->nullable(); // future: update communication preferences
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('user_type');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletter_users');
    }
}
