<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            if (!Schema::hasColumn('promos', 'name')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('promos', 'vendor')) {
                $table->string('vendor')->nullable();
            }
            if (!Schema::hasColumn('promos', 'label')) {
                $table->string('label')->nullable();
            }
            if (!Schema::hasColumn('promos', 'discount')) {
                $table->string('discount')->nullable();
            }
            if (!Schema::hasColumn('promos', 'periode')) {
                $table->date('periode')->nullable();
            }
            if (!Schema::hasColumn('promos', 'image')) {
                $table->string('image')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn(['name', 'vendor', 'label', 'discount', 'periode', 'image']);
        });
    }
};

