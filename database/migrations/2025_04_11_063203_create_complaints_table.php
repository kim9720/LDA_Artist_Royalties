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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->json('attachments')->nullable();
            $table->enum('status', ['submitted', 'in_progress', 'resolved'])
                ->default('submitted')
                ->comment('Tracks the state of the complaint: submitted, in_progress, resolved');
            $table->timestamp('submitted_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
