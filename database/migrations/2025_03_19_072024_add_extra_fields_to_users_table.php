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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mname')->nullable();                 // Middle Name
            $table->string('lname')->nullable();                 // Last Name
            $table->string('artist_name')->nullable();           // Artist Name
            $table->string('phone')->nullable();                 // Phone Number
            $table->string('bank_name')->nullable();             // Bank Name
            $table->string('account_number')->nullable();        // Bank Account Number
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'mname',
                'lname',
                'artist_name',
                'phone',
                'bank_name',
                'account_number'
            ]);
        });
    }
};
