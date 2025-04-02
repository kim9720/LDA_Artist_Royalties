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
        Schema::table('audio_files', function (Blueprint $table) {
            $table->string('original_name')->after('filename');
            $table->string('path')->after('original_name');
            $table->string('file_size')->after('path');
            $table->string('duration')->nullable()->after('file_size');
            $table->string('mime_type')->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audio_files', function (Blueprint $table) {
            $table->dropColumn(['original_name', 'path', 'file_size', 'duration', 'mime_type']);
        });
    }
};
