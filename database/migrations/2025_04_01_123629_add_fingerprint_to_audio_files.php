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
            $table->text('fingerprint')->nullable()->after('mime_type');
            $table->string('fingerprint_hash', 64)->unique()->nullable()->after('fingerprint');
        });

        Schema::table('audio_files', function (Blueprint $table) {
            $table->index('fingerprint_hash', 'audio_files_fingerprint_hash_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audio_files', function (Blueprint $table) {
            $table->dropIndex('audio_files_fingerprint_hash_index');
            $table->dropColumn('fingerprint_hash');
            $table->dropColumn('fingerprint');
        });
    }
};
