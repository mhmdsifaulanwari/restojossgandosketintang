<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFeature extends Model
{
    protected $table = 'home_features';

    protected $fillable = [
        'text',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
