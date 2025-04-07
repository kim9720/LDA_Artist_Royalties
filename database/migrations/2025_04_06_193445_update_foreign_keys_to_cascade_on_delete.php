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
         // Drop existing foreign key constraints
         Schema::table('audio_files', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Add new constraints with ON DELETE CASCADE
        Schema::table('audio_files', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audio_files', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('audio_files', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
                  // No onDelete() means it will use the default (RESTRICT)
        });
    }
};
