<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function ($table) {
        $table->string('phone');
        $table->text('address')->nullable();
        $table->string('ktp_number')->unique();
        $table->string('ktp_photo')->nullable();
        $table->string('company_name')->nullable();
        $table->string('npwp')->nullable();
        $table->string('security_question');
        $table->string('security_answer'); // hashed
    });
}

public function down()
{
    Schema::table('users', function ($table) {
        $table->dropColumn(['phone', 'address', 'ktp_number', 'ktp_photo', 'company_name', 'npwp', 'security_question', 'security_answer']);
    });
}
};
