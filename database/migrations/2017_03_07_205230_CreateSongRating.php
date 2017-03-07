<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->integer('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('song');
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
        Schema::drop('song_rating');
    }
}
