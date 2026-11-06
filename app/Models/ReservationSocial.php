<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationSocial extends Model
{
    protected $fillable = [
        'facebook_url',
        'instagram_url',
        'tiktok_url',
    ];

    protected $table = 'reservation_socials';
}
