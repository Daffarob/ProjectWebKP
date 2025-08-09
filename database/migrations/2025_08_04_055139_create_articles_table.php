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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Judul artikel
            $table->text('content')->nullable();   // ✅ Ubah dari 'body' ke 'content'
            $table->string('image')->nullable();  // Gambar artikel (nama file di storage)
            $table->string('year');               // Tahun publikasi
            $table->timestamps();                 // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
