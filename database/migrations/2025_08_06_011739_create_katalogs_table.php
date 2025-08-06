<?php

// database/migrations/xxxx_xx_xx_create_katalogs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogsTable extends Migration
{
    public function up(): void
    {
        Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mesin');
            $table->string('harga');
            $table->text('spesifikasi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('jenis')->nullable(); // Misal: 'Garment Textile'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('katalogs');
    }
}

