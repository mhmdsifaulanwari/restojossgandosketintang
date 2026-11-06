<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->string('cta_button1_text')
                ->nullable()
                ->after('cta_description');

            $table->string('cta_button2_text')
                ->nullable()
                ->after('cta_button1_text');
        });
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'cta_button1_text',
                'cta_button2_text',
            ]);
        });
    }
};
