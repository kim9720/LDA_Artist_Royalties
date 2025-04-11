<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id');
            $table->string('original_name');
            $table->string('path');
            $table->string('mime_type');
            $table->unsignedInteger('size');

            $table->timestamps();

            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
