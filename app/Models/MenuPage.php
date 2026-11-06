<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    protected $table = 'menu_pages';

    protected $fillable = [
        'hero_script',
        'hero_title_line1',
        'hero_title_line2',
        'hero_title_line3',
        'hero_description',
        'hero_image',
        'promo_title',
    ];
}
