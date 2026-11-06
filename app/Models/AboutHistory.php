<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutHistory extends Model
{
    protected $table = 'about_histories';

    protected $fillable = [
        'about_page_id',
        'paragraph',
        'sort_order',
    ];

    public function aboutPage(): BelongsTo
    {
        return $this->belongsTo(AboutPage::class);
    }
}
