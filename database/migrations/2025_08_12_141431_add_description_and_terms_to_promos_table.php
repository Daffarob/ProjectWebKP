<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('promos', function (Blueprint $table) {
            if (!Schema::hasColumn('promos', 'description')) {
                $table->text('description')->nullable()->after('image');
            }
            if (!Schema::hasColumn('promos', 'terms')) {
                $table->text('terms')->nullable()->after('description');
            }
        });
    }

    public function down(): void {
        Schema::table('promos', function (Blueprint $table) {
            if (Schema::hasColumn('promos', 'terms')) {
                $table->dropColumn('terms');
            }
            if (Schema::hasColumn('promos', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
};
