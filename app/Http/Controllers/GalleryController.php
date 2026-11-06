<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    /**
     * Display gallery page for public
     */
    public function index()
    {
        try {
            $galleryItems = Gallery::getActiveItems();

            Log::info(
                'GalleryController@index - Total items from DB: '
                    . $galleryItems->count()
            );

            $galleryHero = GalleryPage::first();

            return view('pages.gallery', compact(
                'galleryItems',
                'galleryHero'
            ));
        } catch (\Throwable $e) {
            Log::error(
                'Error in GalleryController@index: '
                    . $e->getMessage()
            );

            $galleryItems = collect();
            $galleryHero = null;

            return view('pages.gallery', compact(
                'galleryItems',
                'galleryHero'
            ));
        }
    }

    /**
     * Display single gallery item
     */
    public function show($id)
    {
        try {
            $item = Gallery::findOrFail($id);

            return view('pages.gallery-detail', compact('item'));
        } catch (\Exception $e) {
            Log::error(
                'Error in GalleryController@show: '
                    . $e->getMessage()
            );

            return redirect()
                ->route('gallery')
                ->with('error', 'Gambar tidak ditemukan');
        }
    }
}
