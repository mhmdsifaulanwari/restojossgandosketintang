<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('promotions') && !Schema::hasTable('menu_promotions')) {
            Schema::rename('promotions', 'menu_promotions');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('menu_promotions') && !Schema::hasTable('promotions')) {
            Schema::rename('menu_promotions', 'promotions');
        }
    }
};
