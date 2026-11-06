<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationPage extends Model
{
    protected $fillable = [
        'hero_subtitle',
        'hero_title_line1',
        'hero_title_line2',
        'hero_title_line3',
        'hero_description',
        'hero_image',
        'services_title',
        'services_description',
    ];

    protected $table = 'reservation_pages';
}
