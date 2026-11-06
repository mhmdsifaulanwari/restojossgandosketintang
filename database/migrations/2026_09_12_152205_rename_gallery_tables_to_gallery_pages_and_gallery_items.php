<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // galleries → gallery_items
        if (Schema::hasTable('galleries') && !Schema::hasTable('gallery_items')) {
            Schema::rename('galleries', 'gallery_items');
        }

        // gallery_hero_settings → gallery_pages
        if (Schema::hasTable('gallery_hero_settings') && !Schema::hasTable('gallery_pages')) {
            Schema::rename('gallery_hero_settings', 'gallery_pages');
        }
    }

    public function down(): void
    {
        // gallery_items → galleries
        if (Schema::hasTable('gallery_items') && !Schema::hasTable('galleries')) {
            Schema::rename('gallery_items', 'galleries');
        }

        // gallery_pages → gallery_hero_settings
        if (Schema::hasTable('gallery_pages') && !Schema::hasTable('gallery_hero_settings')) {
            Schema::rename('gallery_pages', 'gallery_hero_settings');
        }
    }
};
