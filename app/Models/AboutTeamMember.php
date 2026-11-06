<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutTeamMember extends Model
{
    protected $table = 'about_team_members';

    protected $fillable = [
        'about_page_id',
        'name',
        'position',
        'image',
        'description',
        'sort_order',
    ];

    public function aboutPage(): BelongsTo
    {
        return $this->belongsTo(AboutPage::class);
    }
}
