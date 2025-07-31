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
            $table->string('promo_type');
            $table->integer('discount_percentage');
            $table->string('category');
            $table->date('period_start');
            $table->date('period_end');
            $table->string('image_url');
            $table->timestamps();
        });
}

};
