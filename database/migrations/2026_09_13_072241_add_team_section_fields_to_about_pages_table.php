<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {
            $table->string('team_title')
                ->nullable()
                ->after('journey_subtitle');

            $table->string('team_title_highlight')
                ->nullable()
                ->after('team_title');

            $table->text('team_subtitle')
                ->nullable()
                ->after('team_title_highlight');
        });
    }

    public function down(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {
            $table->dropColumn([
                'team_title',
                'team_title_highlight',
                'team_subtitle',
            ]);
        });
    }
};
