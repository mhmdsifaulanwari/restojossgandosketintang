<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutTimeline extends Model
{
    protected $table = 'about_timelines';

    protected $fillable = [
        'about_page_id',
        'year',
        'title',
        'sort_order',
    ];

    public function aboutPage(): BelongsTo
    {
        return $this->belongsTo(AboutPage::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(AboutTimelineItem::class)
            ->orderBy('sort_order');
    }
}
