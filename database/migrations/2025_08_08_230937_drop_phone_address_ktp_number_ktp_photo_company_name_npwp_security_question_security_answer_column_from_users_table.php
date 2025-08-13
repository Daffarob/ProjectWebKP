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
            $table->dropColumn([
                'phone',
                'address',
                'ktp_number',
                'ktp_photo',
                'company_name',
                'npwp',
                'security_question',
                'security_answer'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('ktp_number')->nullable();
            $table->string('ktp_photo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('npwp')->nullable();
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
        });
    }
};
