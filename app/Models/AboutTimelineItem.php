<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutTimelineItem extends Model
{
    protected $table = 'about_timeline_items';

    protected $fillable = [
        'about_timeline_id',
        'item',
        'sort_order',
    ];

    public function timeline(): BelongsTo
    {
        return $this->belongsTo(AboutTimeline::class, 'about_timeline_id');
    }
}
