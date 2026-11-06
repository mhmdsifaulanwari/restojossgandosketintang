<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutPage extends Model
{
    protected $table = 'about_pages';

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_button_1_text',
        'hero_button_1_link',
        'hero_button_2_text',
        'hero_button_2_link',

        'journey_title',
        'journey_subtitle',

        'team_title',
        'team_title_highlight',
        'team_subtitle',

        'founder_name',
        'founder_description',
        'founder_story_1',
        'founder_story_2',
        'founder_commitment',
        'founder_image',
        'vision_quote',
        'cta_title',
        'cta_description',
    ];

    public function histories(): HasMany
    {
        return $this->hasMany(AboutHistory::class)
            ->orderBy('sort_order');
    }

    public function timelines(): HasMany
    {
        return $this->hasMany(AboutTimeline::class)
            ->orderBy('sort_order');
    }

    public function missions(): HasMany
    {
        return $this->hasMany(AboutMission::class)
            ->orderBy('sort_order');
    }

    public function teamMembers(): HasMany
    {
        return $this->hasMany(AboutTeamMember::class)
            ->orderBy('sort_order');
    }
}
