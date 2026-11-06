<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationContact extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'hours',
        'map_embed',
    ];

    protected $table = 'reservation_contacts';
}
