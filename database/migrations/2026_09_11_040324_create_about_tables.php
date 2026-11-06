<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ABOUT PAGES
        |--------------------------------------------------------------------------
        | Data utama halaman About
        */
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('hero_image')->nullable();

            // Hero Buttons
            $table->string('hero_button_1_text')->nullable();
            $table->string('hero_button_1_link')->nullable();
            $table->string('hero_button_2_text')->nullable();
            $table->string('hero_button_2_link')->nullable();

            // Founder
            $table->string('founder_name')->nullable();
            $table->text('founder_description')->nullable();
            $table->longText('founder_story_1')->nullable();
            $table->longText('founder_story_2')->nullable();
            $table->longText('founder_commitment')->nullable();
            $table->text('founder_image')->nullable();

            // Vision
            $table->longText('vision_quote')->nullable();

            // CTA
            $table->string('cta_title')->nullable();
            $table->longText('cta_description')->nullable();

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | ABOUT HISTORIES
        |--------------------------------------------------------------------------
        */
        Schema::create('about_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_page_id')
                ->constrained('about_pages')
                ->cascadeOnDelete();

            $table->longText('paragraph');

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | ABOUT TIMELINES
        |--------------------------------------------------------------------------
        */
        Schema::create('about_timelines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_page_id')
                ->constrained('about_pages')
                ->cascadeOnDelete();

            $table->string('year');
            $table->string('title');

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | ABOUT TIMELINE ITEMS
        |--------------------------------------------------------------------------
        */
        Schema::create('about_timeline_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_timeline_id')
                ->constrained('about_timelines')
                ->cascadeOnDelete();

            $table->longText('item');

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | ABOUT MISSIONS
        |--------------------------------------------------------------------------
        */
        Schema::create('about_missions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_page_id')
                ->constrained('about_pages')
                ->cascadeOnDelete();

            $table->string('title');
            $table->longText('description');

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | ABOUT TEAM MEMBERS
        |--------------------------------------------------------------------------
        */
        Schema::create('about_team_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_page_id')
                ->constrained('about_pages')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('position');
            $table->text('image')->nullable();
            $table->longText('description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_timeline_items');
        Schema::dropIfExists('about_timelines');
        Schema::dropIfExists('about_histories');
        Schema::dropIfExists('about_missions');
        Schema::dropIfExists('about_team_members');
        Schema::dropIfExists('about_pages');
    }
};
