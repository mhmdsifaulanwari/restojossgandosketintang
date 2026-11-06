<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_promotions', function (Blueprint $table) {
            $table->dropColumn(['badge_text', 'button_text']);
        });
    }

    public function down(): void
    {
        Schema::table('menu_promotions', function (Blueprint $table) {
            $table->string('badge_text')->nullable();
            $table->string('button_text')->nullable();
        });
    }
};
