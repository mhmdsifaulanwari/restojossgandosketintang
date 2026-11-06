<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_services', function (Blueprint $table) {
            $table->id();

            // Nama layanan, contoh: GoFood, GrabFood, WhatsApp
            $table->string('name');

            // Deskripsi layanan
            $table->text('description')->nullable();

            // Logo/icon layanan
            $table->string('logo')->nullable();

            // Link tujuan layanan
            $table->text('url')->nullable();

            // Teks tombol
            $table->string('button_text')->nullable();

            // Urutan card di halaman
            $table->unsignedInteger('sort_order')->default(0);

            // Apakah card ditampilkan di website
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_services');
    }
};
