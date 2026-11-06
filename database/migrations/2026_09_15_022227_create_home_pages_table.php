<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            // =========================
            // HERO
            // =========================
            $table->string('hero_premium_badge')->nullable();
            $table->string('hero_title_line1')->nullable();
            $table->string('hero_title_line2')->nullable();
            $table->string('hero_title_line3')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_menu')->nullable();
            $table->string('hero_button_reservation')->nullable();
            $table->text('hero_image_url')->nullable();
            $table->string('hero_media_type')->default('image');

            // =========================
            // WELCOME
            // =========================
            $table->string('welcome_title_line1')->nullable();
            $table->string('welcome_title_line2')->nullable();
            $table->text('welcome_description')->nullable();
            $table->text('welcome_image_url')->nullable();

            // =========================
            // SERVICES SECTION
            // =========================
            $table->string('services_title_line1')->nullable();
            $table->string('services_title_line2')->nullable();
            $table->text('services_subtitle')->nullable();

            // =========================
            // TESTIMONIALS SECTION
            // =========================
            $table->string('testimonials_title_line1')->nullable();
            $table->string('testimonials_title_line2')->nullable();
            $table->text('testimonials_subtitle')->nullable();

            // =========================
            // CTA
            // =========================
            $table->string('cta_title_line1')->nullable();
            $table->string('cta_title_line2')->nullable();
            $table->text('cta_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
