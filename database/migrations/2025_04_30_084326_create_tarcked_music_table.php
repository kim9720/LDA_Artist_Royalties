<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracked_music', function (Blueprint $table) {
            $table->id();
            $table->string('music_id')->unique();
            $table->string('title');
            $table->string('artist');
            $table->string('album');
            $table->date('release_date');
            $table->integer('duration')->comment('Duration in seconds');
            $table->string('genre');
            $table->string('cover_url');
            $table->string('language')->nullable();
            $table->string('label')->nullable();
            $table->float('confidence')->nullable()->comment('Recognition confidence score');
            $table->timestamps();
        });

        Schema::create('music_tracks_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tracked_music_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('tracked_music_id')->references('id')->on('tracked_music')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('music_tracks_info');
        Schema::dropIfExists('tracked_music');
    }
};
