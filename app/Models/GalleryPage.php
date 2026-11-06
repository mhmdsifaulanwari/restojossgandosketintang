<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPage extends Model
{
    protected $table = 'gallery_pages';

    protected $fillable = [
        'hero_script',
        'hero_title_line1',
        'hero_title_line2',
        'hero_title_line3',
        'hero_description',
        'hero_image',
    ];
}
