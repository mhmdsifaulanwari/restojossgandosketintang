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
        Schema::table('gallery_pages', function (Blueprint $table) {
            $table->string('gallery_title')
                ->nullable()
                ->after('hero_image');

            $table->text('gallery_description')
                ->nullable()
                ->after('gallery_title');
        });
    }

    public function down(): void
    {
        Schema::table('gallery_pages', function (Blueprint $table) {
            $table->dropColumn([
                'gallery_title',
                'gallery_description',
            ]);
        });
    }
};
