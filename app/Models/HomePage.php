<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_pages';

    protected $fillable = [
        'hero_premium_badge',
        'hero_title_line1',
        'hero_title_line2',
        'hero_title_line3',
        'hero_description',
        'hero_button_menu',
        'hero_button_reservation',
        'hero_image_url',
        'hero_media_type',

        'welcome_title_line1',
        'welcome_title_line2',
        'welcome_description',
        'welcome_image_url',

        'services_title_line1',
        'services_title_line2',
        'services_subtitle',

        'testimonials_title_line1',
        'testimonials_title_line2',
        'testimonials_subtitle',

        'cta_title_line1',
        'cta_title_line2',
        'cta_description',
        'cta_button1_text',
        'cta_button2_text',
    ];

    protected $casts = [
        'hero_media_type' => 'string',
    ];
}
