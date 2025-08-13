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
    Schema::create('promos', function (Blueprint $table) {
       $table->id();
            $table->string('name');
            $table->string('vendor');
            $table->string('label');
            $table->integer('discount');
            $table->string('image');
            $table->string('periode');
            $table->timestamps();
        });
}

};
