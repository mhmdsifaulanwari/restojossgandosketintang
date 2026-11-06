<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\AboutPage;
use App\Models\AboutHistory;
use App\Models\AboutTimeline;
use App\Models\AboutTimelineItem;
use App\Models\AboutMission;
use App\Models\AboutTeamMember;
use Illuminate\Support\Facades\DB;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            // ==========================================================
            // 1. AMBIL DATA ABOUT LAMA DARI TABEL pages
            // ==========================================================

            $oldPage = Page::where('slug', 'about')->first();

            if (!$oldPage) {
                $this->command->error(
                    'Data About dengan slug "about" tidak ditemukan di tabel pages.'
                );

                return;
            }

            $content = is_array($oldPage->content)
                ? $oldPage->content
                : [];


            // ==========================================================
            // 2. SIMPAN DATA UTAMA KE about_pages
            // ==========================================================

            $aboutPage = AboutPage::first();

            if (!$aboutPage) {
                $aboutPage = AboutPage::create([
                    'hero_badge' => $content['hero_badge'] ?? null,
                    'hero_title' => $content['hero_title'] ?? null,
                    'hero_subtitle' => $content['hero_subtitle'] ?? null,
                    'hero_image' => $content['hero_image'] ?? null,

                    'hero_button_1_text' =>
                    $content['hero_button_1_text'] ?? null,

                    'hero_button_1_link' =>
                    $content['hero_button_1_link'] ?? null,

                    'hero_button_2_text' =>
                    $content['hero_button_2_text'] ?? null,

                    'hero_button_2_link' =>
                    $content['hero_button_2_link'] ?? null,

                    'founder_name' =>
                    $content['founder_name'] ?? null,

                    'founder_description' =>
                    $content['founder_description'] ?? null,

                    'founder_story_1' =>
                    $content['founder_story_1'] ?? null,

                    'founder_story_2' =>
                    $content['founder_story_2'] ?? null,

                    'founder_commitment' =>
                    $content['founder_commitment'] ?? null,

                    'founder_image' =>
                    $content['founder_image'] ?? null,

                    'vision_quote' =>
                    $content['vision_quote'] ?? null,

                    'cta_title' =>
                    $content['cta_title'] ?? null,

                    'cta_description' =>
                    $content['cta_description'] ?? null,
                ]);
            }


            // ==========================================================
            // 3. HISTORY
            // ==========================================================

            $historyIndex = 1;

            while (
                array_key_exists(
                    'history_description_' . $historyIndex,
                    $content
                )
            ) {
                $paragraph =
                    $content['history_description_' . $historyIndex];

                if (trim((string) $paragraph) !== '') {
                    AboutHistory::create([
                        'about_page_id' => $aboutPage->id,
                        'paragraph' => $paragraph,
                        'sort_order' => $historyIndex,
                    ]);
                }

                $historyIndex++;
            }


            // ==========================================================
            // 4. TIMELINE
            // ==========================================================

            if (
                isset($content['timeline']) &&
                is_array($content['timeline'])
            ) {
                foreach (
                    $content['timeline']
                    as $timelineIndex => $timelineData
                ) {
                    $timeline = AboutTimeline::create([
                        'about_page_id' => $aboutPage->id,

                        'year' =>
                        $timelineData['year'] ?? '',

                        'title' =>
                        $timelineData['title'] ?? '',

                        'sort_order' =>
                        $timelineIndex + 1,
                    ]);


                    // Timeline Items
                    if (
                        isset($timelineData['items']) &&
                        is_array($timelineData['items'])
                    ) {
                        foreach (
                            $timelineData['items']
                            as $itemIndex => $item
                        ) {
                            if (trim((string) $item) === '') {
                                continue;
                            }

                            AboutTimelineItem::create([
                                'about_timeline_id' => $timeline->id,
                                'item' => $item,
                                'sort_order' => $itemIndex + 1,
                            ]);
                        }
                    }
                }
            }


            // ==========================================================
            // 5. MISSIONS
            // ==========================================================

            if (
                isset($content['missions']) &&
                is_array($content['missions'])
            ) {
                foreach (
                    $content['missions']
                    as $missionIndex => $mission
                ) {
                    if (
                        empty($mission['title']) &&
                        empty($mission['description'])
                    ) {
                        continue;
                    }

                    AboutMission::create([
                        'about_page_id' => $aboutPage->id,

                        'title' =>
                        $mission['title'] ?? '',

                        'description' =>
                        $mission['description'] ?? '',

                        'sort_order' =>
                        $missionIndex + 1,
                    ]);
                }
            }


            // ==========================================================
            // 6. TEAM MEMBERS
            // ==========================================================

            if (
                isset($content['team_members']) &&
                is_array($content['team_members'])
            ) {
                foreach (
                    $content['team_members']
                    as $memberIndex => $member
                ) {
                    if (
                        empty($member['name']) &&
                        empty($member['position'])
                    ) {
                        continue;
                    }

                    AboutTeamMember::create([
                        'about_page_id' => $aboutPage->id,

                        'name' =>
                        $member['name'] ?? '',

                        'position' =>
                        $member['position'] ?? '',

                        'image' =>
                        $member['image'] ?? null,

                        'description' =>
                        $member['description'] ?? null,

                        'sort_order' =>
                        $memberIndex + 1,
                    ]);
                }
            }


            // ==========================================================
            // 7. SELESAI
            // ==========================================================

            $this->command->info(
                '============================================'
            );

            $this->command->info(
                'DATA ABOUT BERHASIL DIMIGRASIKAN'
            );

            $this->command->info(
                'About Page ID: ' . $aboutPage->id
            );

            $this->command->info(
                '============================================'
            );
        });
    }
}
