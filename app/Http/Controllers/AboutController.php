<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\AboutPage;

class AboutController extends Controller
{
    /**
     * Display the about page
     */
    public function index()
    {
        try {
            // ==========================================================
            // JUMLAH CABANG
            // ==========================================================

            $branchCount = Branch::count();


            // ==========================================================
            // DATA ABOUT UTAMA
            // ==========================================================

            $aboutPage = AboutPage::with([
                'histories',
                'timelines.items',
                'missions',
                'teamMembers',
            ])->first();


            // ==========================================================
            // DEFAULT DATA
            // ==========================================================

            $historyParagraphs = [];
            $visionQuote = '';
            $missions = [];
            $timeline = [];

            $founderName = 'Dr. Siswanto';
            $founderDescription = '';
            $founderStory1 = '';
            $founderStoryCombined = '';


            // ==========================================================
            // JIKA DATA ABOUT TERSEDIA
            // ==========================================================

            if ($aboutPage) {

                // ------------------------------------------------------
                // FOUNDER
                // ------------------------------------------------------

                $founderName =
                    $aboutPage->founder_name ?? 'Dr. Siswanto';

                $founderDescription =
                    $aboutPage->founder_description ?? '';

                $founderStory1 =
                    $aboutPage->founder_story_1 ?? '';

                $founderStoryCombined =
                    $aboutPage->founder_story_2 ?? '';


                // ------------------------------------------------------
                // HISTORY
                // ------------------------------------------------------

                $historyParagraphs = $aboutPage->histories
                    ->sortBy('sort_order')
                    ->pluck('paragraph')
                    ->values()
                    ->toArray();


                // ------------------------------------------------------
                // VISION
                // ------------------------------------------------------

                $visionQuote =
                    $aboutPage->vision_quote ?? '';


                // ------------------------------------------------------
                // MISSIONS
                // ------------------------------------------------------

                $missions = $aboutPage->missions
                    ->sortBy('sort_order')
                    ->values()
                    ->toArray();


                // ------------------------------------------------------
                // TIMELINE
                // ------------------------------------------------------

                $timeline = $aboutPage->timelines
                    ->sortBy('sort_order')
                    ->map(function ($timelineItem) {

                        return [
                            'year' => $timelineItem->year,
                            'title' => $timelineItem->title,

                            'items' => $timelineItem->items
                                ->sortBy('sort_order')
                                ->pluck('item')
                                ->values()
                                ->toArray(),
                        ];
                    })
                    ->values()
                    ->toArray();
            }


            // ==========================================================
            // KIRIM DATA KE VIEW
            // ==========================================================

            return view('pages.about', compact(
                'branchCount',
                'aboutPage',
                'historyParagraphs',
                'visionQuote',
                'missions',
                'timeline',
                'founderName',
                'founderDescription',
                'founderStory1',
                'founderStoryCombined'
            ));
        } catch (\Exception $e) {

            // ==========================================================
            // FALLBACK JIKA TERJADI ERROR
            // ==========================================================

            return view('pages.about', [
                'aboutPage' => null,
                'branchCount' => 0,
                'historyParagraphs' => [],
                'visionQuote' => '',
                'missions' => [],
                'timeline' => [],
                'founderName' => 'Dr. Siswanto',
                'founderDescription' => '',
                'founderStory1' => '',
                'founderStoryCombined' => '',
            ]);
        }
    }
}
