<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('similar_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audio_match_id');
            $table->string('audio_id')->nullable();
            $table->string('bucket_id')->nullable();
            $table->bigInteger('duration_ms')->nullable();
            $table->bigInteger('sample_begin_time_offset_ms')->nullable();
            $table->bigInteger('sample_end_time_offset_ms')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('db_end_time_offset_ms')->nullable();
            $table->bigInteger('db_begin_time_offset_ms')->nullable();
            $table->string('acrid')->nullable();
            $table->bigInteger('play_offset_ms')->nullable();
            $table->integer('score')->nullable();
            $table->timestamps();

            $table->foreign('audio_match_id')->references('id')->on('audio_matches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('similar_results');
    }
};
