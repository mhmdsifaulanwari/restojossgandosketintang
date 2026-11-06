<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_pages', function (Blueprint $table) {
            $table->string('package_title')
                ->nullable()
                ->after('promo_title');

            $table->text('package_description')
                ->nullable()
                ->after('package_title');
        });
    }

    public function down(): void
    {
        Schema::table('menu_pages', function (Blueprint $table) {
            $table->dropColumn([
                'package_title',
                'package_description',
            ]);
        });
    }
};
