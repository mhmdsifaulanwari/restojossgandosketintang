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
            $table->string('contact_title')->nullable()->after('services_description');
            $table->text('contact_description')->nullable()->after('contact_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_pages', function (Blueprint $table) {
            $table->dropColumn([
                'contact_title',
                'contact_description',
            ]);
        });
    }
};
