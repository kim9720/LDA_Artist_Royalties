<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('api_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('status_code');
            $table->string('status_message');
            $table->json('metadata')->nullable();
            $table->json('data')->nullable();
            $table->unsignedBigInteger('tracked_music_id')->nullable();
            $table->timestamps();

            $table->foreign('tracked_music_id')->references('id')->on('tracked_music')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_responses');
    }
};
