<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Branch;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\HomePage;
use App\Models\HomeFeature;
use App\Models\HomeService;
use App\Models\Testimonial;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Ambil data Home dari tabel khusus
            $homePage = HomePage::first();

            // Jika data Home baru tersedia,
            // tampilkan menggunakan data tersebut.
            if ($homePage) {
                $page = Page::where('slug', 'home')->first();

                return $this->showHomePage($page, $homePage);
            }
        } catch (\Exception $e) {
            Log::error('Error loading home page: ' . $e->getMessage());
        }

        // Fallback jika tabel home_pages belum memiliki data.
        return $this->showDefaultHome();
    }

    /**
     * Display home page from Page data
     */
    private function showHomePage(?Page $page, HomePage $homePage)
    {
        $featuredItems = $this->getFeaturedItems();
        $branches = $this->getBranches();
        $reviews = $this->getReviews();
        $gallery = $this->getGallery();

        // =========================================================
        // HOME POPUP PROMOTION
        // =========================================================
        $homePopupPromotion = Promotion::active()
            ->where('show_home_popup', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->first();

        // =========================================================
        // HOME FEATURES
        // =========================================================
        $features = HomeFeature::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // =========================================================
        // HOME SERVICES
        // =========================================================
        $services = HomeService::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // =========================================================
        // BENTUK CONTENT UNTUK BLADE PUBLIC LAMA
        // =========================================================
        $content = [
            // HERO
            'hero_premium_badge' => $homePage->hero_premium_badge,
            'hero_title_line1' => $homePage->hero_title_line1,
            'hero_title_line2' => $homePage->hero_title_line2,
            'hero_title_line3' => $homePage->hero_title_line3,
            'hero_description' => $homePage->hero_description,
            'hero_button_menu' => $homePage->hero_button_menu,
            'hero_button_reservation' => $homePage->hero_button_reservation,
            'hero_image_url' => $homePage->hero_image_url,
            'hero_media_type' => $homePage->hero_media_type,

            // WELCOME
            'welcome_title_line1' => $homePage->welcome_title_line1,
            'welcome_title_line2' => $homePage->welcome_title_line2,
            'welcome_description' => $homePage->welcome_description,
            'welcome_image_url' => $homePage->welcome_image_url,

            // SERVICES
            'services_title_line1' => $homePage->services_title_line1,
            'services_title_line2' => $homePage->services_title_line2,
            'services_subtitle' => $homePage->services_subtitle,

            // TESTIMONIALS
            'testimonials_title_line1' => $homePage->testimonials_title_line1,
            'testimonials_title_line2' => $homePage->testimonials_title_line2,
            'testimonials_subtitle' => $homePage->testimonials_subtitle,

            // CTA
            'cta_title_line1' => $homePage->cta_title_line1,
            'cta_title_line2' => $homePage->cta_title_line2,
            'cta_description' => $homePage->cta_description,
            'cta_button1_text' => $homePage->cta_button1_text,
            'cta_button2_text' => $homePage->cta_button2_text,
        ];

        // Features
        foreach ($features as $index => $feature) {
            $number = $index + 1;

            $content["feature_{$number}_text"] = $feature->text;
        }

        // Services
        foreach ($services as $index => $service) {
            $number = $index + 1;

            $content["service_{$number}_title"] = $service->title;
            $content["service_{$number}_description"] = $service->description;
            $content["service_{$number}_icon"] = $service->icon;
        }

        // =========================================================
        // PAGE HANYA SEBAGAI OBJECT KOMPATIBILITAS BLADE
        // =========================================================
        if (!$page) {
            $page = new Page([
                'slug' => 'home',
                'title' => 'Beranda',
                'meta_title' => 'Resto Joss Gandos - Restoran & Cafe Terbaik di Ketintang',
                'meta_description' => 'Resto Joss Gandos - Tempat makan keluarga dengan hidangan lezat dan suasana nyaman',
            ]);
        }

        // Jangan lagi menggunakan pages.content lama.
        // Gunakan content dari tabel HomePage + HomeFeature + HomeService.
        $page->setAttribute('content', $content);

        // =========================================================
        // TESTIMONIALS
        // =========================================================
        $testimonials = Testimonial::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('pages.home', compact(
            'page',
            'featuredItems',
            'branches',
            'reviews',
            'gallery',
            'testimonials',
            'homePopupPromotion'
        ));
    }

    /**
     * Display default home page (fallback)
     */
    private function showDefaultHome()
    {
        $featuredItems = $this->getFeaturedItems();
        $branches = $this->getBranches();
        $reviews = $this->getReviews();
        $gallery = $this->getGallery();

        $testimonials = Testimonial::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Buat page object default
        $page = (object) [
            'title' => 'Beranda',
            'meta_title' => 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari',
            'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
            'content' => [
                // Hero Section
                'hero_title_line1' => 'Nikmati Kelezatan',
                'hero_title_line2' => 'Hidangan Spesial',
                'hero_title_line3' => 'di Joss Gandos',
                'hero_description' => 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.',
                'hero_button_menu' => 'Lihat Menu',
                'hero_button_reservation' => 'Pesan Meja',
                'hero_image_url' => 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw',
                'hero_premium_badge' => '#1 RESTO & CAFE KETINTANG',

                'welcome_title_line1' => 'Selamat Datang',
                'welcome_title_line2' => 'Resto Joss Gandos',
                'welcome_description' => 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.',
                'welcome_image_url' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',

                'feature_1_text' => 'Bahan premium pilihan terbaik',
                'feature_2_text' => 'Chef berpengalaman & profesional',
                'feature_3_text' => 'Suasana nyaman untuk keluarga',
                'feature_4_text' => 'Pelayanan ramah & cepat',

                'services_title_line1' => 'Fasilitas &',
                'services_title_line2' => 'Pelayanan Premium',
                'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',

                'testimonials_title_line1' => 'Apa Kata',
                'testimonials_title_line2' => 'Pelanggan Kami?',
                'testimonials_subtitle' => 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',

                'cta_title_line1' => 'Siap Merasakan',
                'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
                'cta_description' => 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
            ]
        ];

        return view('pages.home', compact(
            'page',
            'featuredItems',
            'branches',
            'reviews',
            'gallery',
            'testimonials'
        ));
    }

    /**
     * Get featured items with error handling
     */
    private function getFeaturedItems()
    {
        try {
            return MenuItem::where('is_featured', true)
                ->where('is_available', true)
                ->orderBy('sort_order')
                ->limit(4)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error getting featured items: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get branches with error handling
     */
    private function getBranches()
    {
        try {
            return Branch::where('is_active', true)->get();
        } catch (\Exception $e) {
            Log::error('Error getting branches: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get reviews with error handling
     */
    private function getReviews()
    {
        try {
            return Review::where('is_approved', true)
                ->latest()
                ->limit(3)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error getting reviews: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get gallery with error handling
     */
    private function getGallery()
    {
        try {
            return Gallery::where('is_active', true)
                ->latest()
                ->limit(6)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error getting gallery: ' . $e->getMessage());
            return collect([]);
        }
    }
}
