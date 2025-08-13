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
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('phone_number');
            $table->string('nik')->unique();
            $table->string('foto_ktp');
            $table->string('no_rekening')->unique();
            $table->string('nama_bank');
            $table->string('bpjs_kesehatan');
            $table->string('security_question');
            $table->string('security_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee__profiles');
    }
};
