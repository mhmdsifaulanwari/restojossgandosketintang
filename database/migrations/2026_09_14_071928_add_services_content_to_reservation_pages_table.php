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
        Schema::table('reservation_pages', function (Blueprint $table) {
            $table->string('services_title')->nullable()->after('hero_image');
            $table->text('services_description')->nullable()->after('services_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_pages', function (Blueprint $table) {
            $table->dropColumn([
                'services_title',
                'services_description',
            ]);
        });
    }
};
