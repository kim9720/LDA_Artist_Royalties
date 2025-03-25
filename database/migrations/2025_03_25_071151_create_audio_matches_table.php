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
        Schema::create('audio_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audio_file_id');
            $table->integer('status_code')->nullable();
            $table->bigInteger('start_time_ms')->nullable();
            $table->bigInteger('end_time_ms')->nullable();
            $table->bigInteger('duration_ms')->nullable();
            $table->bigInteger('played_duration_ms')->nullable();
            $table->string('title')->nullable();
            $table->integer('score')->nullable();
            $table->string('audio_id')->nullable();
            $table->string('bucket_id')->nullable();
            $table->string('acrid')->nullable();
            $table->bigInteger('sample_begin_time_offset_ms')->nullable();
            $table->bigInteger('sample_end_time_offset_ms')->nullable();
            $table->bigInteger('db_begin_time_offset_ms')->nullable();
            $table->bigInteger('db_end_time_offset_ms')->nullable();
            $table->timestamps();

            $table->foreign('audio_file_id')->references('id')->on('audio_files')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio_matches');
    }
};
