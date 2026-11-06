<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutMission extends Model
{
    protected $table = 'about_missions';

    protected $fillable = [
        'about_page_id',
        'title',
        'description',
        'sort_order',
    ];

    public function aboutPage(): BelongsTo
    {
        return $this->belongsTo(AboutPage::class);
    }
}
