<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Branch;
use App\Models\Testimonial;
use App\Models\GalleryPage;
use App\Models\MenuPage;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutPage;
use App\Models\DeliveryService;
use App\Models\ReservationPage;
use App\Models\ReservationContact;
use App\Models\ReservationSocial;
use App\Models\HomePage;
use App\Models\HomeFeature;
use App\Models\HomeService;
use App\Models\AboutHistory;
use App\Models\AboutMission;
use App\Models\AboutTimeline;
use App\Models\AboutTimelineItem;
use App\Models\AboutTeamMember;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PageController extends Controller
{

    /**
     * Display the about page
     *
     * Data About sekarang diambil dari database khusus About:
     * - about_pages
     * - about_histories
     * - about_missions
     * - about_timelines
     * - about_timeline_items
     * - about_team_members
     */
    public function indexAbout()
    {
        // =========================================================
        // AMBIL DATA ABOUT BESERTA SEMUA RELASINYA
        // =========================================================

        $aboutPage = AboutPage::with([
            'histories',
            'missions',
            'timelines.items',
            'teamMembers',
        ])->first();

        // =========================================================
        // JIKA DATA ABOUT BELUM ADA
        // =========================================================

        if (!$aboutPage) {
            $aboutPage = AboutPage::create([
                'hero_badge' => 'Tentang Kami',
                'hero_title' => 'Resto Joss Gandos Ketintang',
                'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
                'hero_image' => null,

                'hero_button_1_text' => 'Telusuri Sejarah',
                'hero_button_1_link' => '#sejarah',

                'hero_button_2_text' => 'Kenali Tim Kami',
                'hero_button_2_link' => '#tim',

                'journey_title' => 'PERJALANAN RESTO JOSS GANDOS',
                'journey_subtitle' => 'Dari langkah kecil hingga menjadi resto kebanggaan bersama',

                'founder_name' => 'Dr. Siswanto',
                'founder_story_1' => '',
                'founder_story_2' => '',
                'founder_commitment' => '',
                'founder_image' => null,

                'team_title' => 'Orang-orang Berdedikasi',
                'team_title_highlight' => 'di Balik Layar',
                'team_subtitle' => 'Tim yang memastikan pengalaman bersantap Anda sempurna',

                'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',

                'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
                'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap.',
            ]);

            $aboutPage->load([
                'histories',
                'missions',
                'timelines.items',
                'teamMembers',
            ]);
        }

        // =========================================================
        // BENTUK CONTENT UNTUK BLADE PUBLIC
        // =========================================================

        $content = [
            // -----------------------------------------------------
            // HERO
            // -----------------------------------------------------
            'hero_badge' => $aboutPage->hero_badge,
            'hero_title' => $aboutPage->hero_title,
            'hero_subtitle' => $aboutPage->hero_subtitle,
            'hero_image' => $aboutPage->hero_image,

            'hero_button_1_text' => $aboutPage->hero_button_1_text,
            'hero_button_1_link' => $aboutPage->hero_button_1_link,

            'hero_button_2_text' => $aboutPage->hero_button_2_text,
            'hero_button_2_link' => $aboutPage->hero_button_2_link,

            // -------------------------
            // JOURNEY / PERJALANAN
            // -------------------------
            'journey_title' => $aboutPage->journey_title,
            'journey_subtitle' => $aboutPage->journey_subtitle,

            // TEAM
            'team_title' => $aboutPage->team_title,
            'team_title_highlight' => $aboutPage->team_title_highlight,
            'team_subtitle' => $aboutPage->team_subtitle,

            // FOUNDER
            'founder_name' => $aboutPage->founder_name,
            'founder_description' => $aboutPage->founder_description,
            'founder_story_1' => $aboutPage->founder_story_1,
            'founder_story_2' => $aboutPage->founder_story_2,
            'founder_commitment' => $aboutPage->founder_commitment,
            'founder_image' => $aboutPage->founder_image,

            // -----------------------------------------------------
            // VISION
            // -----------------------------------------------------
            'vision_quote' => $aboutPage->vision_quote,

            // -----------------------------------------------------
            // CTA
            // -----------------------------------------------------
            'cta_title' => $aboutPage->cta_title,
            'cta_description' => $aboutPage->cta_description,
        ];

        // =========================================================
        // HISTORY
        // =========================================================

        foreach ($aboutPage->histories as $index => $history) {
            $content['history_description_' . ($index + 1)] = $history->paragraph;
        }

        // =========================================================
        // TIMELINE
        // =========================================================

        $content['timeline'] = $aboutPage->timelines
            ->map(function ($timeline) {
                return [
                    'year' => $timeline->year,
                    'title' => $timeline->title,
                    'items' => $timeline->items
                        ->pluck('item')
                        ->values()
                        ->toArray(),
                ];
            })
            ->values()
            ->toArray();

        // =========================================================
        // MISSIONS
        // =========================================================

        $content['missions'] = $aboutPage->missions
            ->map(function ($mission) {
                return [
                    'title' => $mission->title,
                    'description' => $mission->description,
                ];
            })
            ->values()
            ->toArray();

        // =========================================================
        // TEAM MEMBERS
        // =========================================================

        $content['team_members'] = $aboutPage->teamMembers
            ->map(function ($member) {
                return [
                    'name' => $member->name,
                    'position' => $member->position,
                    'image' => $member->image,
                    'description' => $member->description,
                ];
            })
            ->values()
            ->toArray();

        // =========================================================
        // KOMPATIBILITAS DENGAN BLADE LAMA
        // =========================================================
        //
        // Blade public About saat ini masih membaca:
        // $page->content
        //
        // Kita tidak perlu langsung merombak Blade.
        // Kita isi attribute "content" pada object AboutPage
        // dengan data dari tabel relasional.
        //
        // Dengan begitu Blade lama tetap bisa bekerja,
        // tetapi sumber datanya sekarang adalah about_*.
        // =========================================================

        $aboutPage->setAttribute('content', $content);

        // =========================================================
        // DATA PAGE UNTUK BLADE
        // =========================================================
        //
        // Karena Blade mungkin menggunakan $page->title,
        // kita buat object Page hanya di memory.
        //
        // TIDAK ADA penyimpanan ke tabel pages.
        // =========================================================

        $page = new Page([
            'slug' => 'about',
            'title' => $aboutPage->hero_title ?: 'Tentang Kami',
            'meta_title' => 'Tentang Resto Joss Gandos',
            'meta_description' => 'Kenali lebih dekat Resto Joss Gandos',
            'content' => $content,
        ]);

        // =========================================================
        // KIRIM KE VIEW
        // =========================================================

        return view('pages.about', [
            'page' => $page,
            'aboutPage' => $aboutPage,
            'content' => $content,
        ]);
    }


    /**
     * Display the reservation and contact page
     *
     * Halaman ini hanya menampilkan informasi pemesanan,
     * kontak, WhatsApp, GoFood, GrabFood, dan Google Maps.
     * Tidak lagi menggunakan sistem reservasi lama.
     */
    public function indexReservation()
    {
        // Ambil halaman contact karena seluruh informasi
        // pemesanan dan kontak dikelola melalui Edit Contact.
        $page = Page::where('slug', 'contact')->first();

        // Jika halaman contact belum tersedia,
        // gunakan object kosong agar view tidak error.
        if (!$page) {
            $page = new Page();
            $page->content = [];
        }

        // Pastikan content selalu berupa array.
        $content = is_array($page->content)
            ? $page->content
            : [];

        // Ambil data halaman reservasi dari tabel khusus.
        $reservationPage = ReservationPage::first();
        $reservationContact = ReservationContact::first();
        $reservationSocial = ReservationSocial::first();



        // Ambil cabang aktif jika masih digunakan oleh view.
        $branches = Branch::where('is_active', true)->get();

        // Ambil layanan reservasi & delivery yang aktif.
        $deliveryServices = DeliveryService::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('pages.reservation', [
            'page' => $page,
            'content' => $content,
            'settings' => $content,
            'reservationPage' => $reservationPage,
            'reservationContact' => $reservationContact,
            'reservationSocial' => $reservationSocial,
            'branches' => $branches,
            'deliveryServices' => $deliveryServices,
        ]);
    }



    /**
     * Show the form for editing the home page
     */
    public function editHome()
    {
        // =========================================================
        // PAGE LAMA HANYA DIPAKAI SEBAGAI SUMBER DATA AWAL / METADATA
        // =========================================================
        $page = Page::findBySlug('home');

        $legacyContent = is_array($page?->content)
            ? $page->content
            : [];

        // =========================================================
        // PAGE HOME KHUSUS
        // =========================================================
        $homePage = HomePage::first();

        // Jika tabel home_pages masih kosong,
        // pindahkan data Home lama dari pages.content satu kali.
        if (!$homePage) {
            $homePage = HomePage::create([
                // HERO
                'hero_premium_badge' => $legacyContent['hero_premium_badge']
                    ?? '#1 RESTO & CAFE KETINTANG',

                'hero_title_line1' => $legacyContent['hero_title_line1']
                    ?? 'Nikmati Kelezatan',

                'hero_title_line2' => $legacyContent['hero_title_line2']
                    ?? 'Hidangan Spesial',

                'hero_title_line3' => $legacyContent['hero_title_line3']
                    ?? 'di Joss Gandos',

                'hero_description' => $legacyContent['hero_description']
                    ?? 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.',

                'hero_button_menu' => $legacyContent['hero_button_menu']
                    ?? 'Lihat Menu',

                'hero_button_reservation' => $legacyContent['hero_button_reservation']
                    ?? 'Pesan Meja',

                'hero_image_url' => $legacyContent['hero_image_url'] ?? null,

                'hero_media_type' => $legacyContent['hero_media_type']
                    ?? 'image',

                // WELCOME
                'welcome_title_line1' => $legacyContent['welcome_title_line1']
                    ?? 'Selamat Datang',

                'welcome_title_line2' => $legacyContent['welcome_title_line2']
                    ?? 'Resto Joss Gandos',

                'welcome_description' => $legacyContent['welcome_description']
                    ?? 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.',

                'welcome_image_url' => $legacyContent['welcome_image_url']
                    ?? null,

                // SERVICES SECTION
                'services_title_line1' => $legacyContent['services_title_line1']
                    ?? 'Fasilitas &',

                'services_title_line2' => $legacyContent['services_title_line2']
                    ?? 'Pelayanan Premium',

                'services_subtitle' => $legacyContent['services_subtitle']
                    ?? 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',

                // TESTIMONIAL SECTION
                'testimonials_title_line1' => $legacyContent['testimonials_title_line1']
                    ?? 'Apa Kata',

                'testimonials_title_line2' => $legacyContent['testimonials_title_line2']
                    ?? 'Pelanggan Kami?',

                'testimonials_subtitle' => $legacyContent['testimonials_subtitle']
                    ?? 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',

                // CTA
                'cta_title_line1' => $legacyContent['cta_title_line1']
                    ?? 'Siap Merasakan',

                'cta_title_line2' => $legacyContent['cta_title_line2']
                    ?? 'Pengalaman Kuliner Terbaik?',

                'cta_description' => $legacyContent['cta_description']
                    ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
            ]);
        }

        // =========================================================
        // HOME FEATURES
        // =========================================================
        $features = HomeFeature::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // Pindahkan fitur lama jika tabel masih kosong.
        if ($features->isEmpty()) {

            $featureDefaults = [
                1 => 'Bahan premium pilihan terbaik',
                2 => 'Chef berpengalaman & profesional',
                3 => 'Suasana nyaman untuk keluarga',
                4 => 'Pelayanan ramah & cepat',
            ];

            foreach ($featureDefaults as $index => $defaultText) {
                HomeFeature::create([
                    'text' => $legacyContent["feature_{$index}_text"] ?? $defaultText,
                    'sort_order' => $index,
                ]);
            }

            $features = HomeFeature::orderBy('sort_order')
                ->orderBy('id')
                ->get();
        }

        // =========================================================
        // HOME SERVICES
        // =========================================================
        $services = HomeService::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // Pindahkan layanan lama jika tabel masih kosong.
        if ($services->isEmpty()) {

            $serviceDefaults = [
                1 => [
                    'title' => 'Dine In',
                    'description' => 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan',
                    'icon' => 'fas fa-utensils',
                ],
                2 => [
                    'title' => 'Private Room',
                    'description' => 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke',
                    'icon' => 'fas fa-users',
                ],
                3 => [
                    'title' => 'Event & Catering',
                    'description' => 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda',
                    'icon' => 'fas fa-calendar-alt',
                ],
                4 => [
                    'title' => 'Free WiFi',
                    'description' => 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda',
                    'icon' => 'fas fa-wifi',
                ],
                5 => [
                    'title' => 'Musholla',
                    'description' => 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang',
                    'icon' => 'fas fa-mosque',
                ],
                6 => [
                    'title' => 'Parkir Luas',
                    'description' => 'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda',
                    'icon' => 'fas fa-parking',
                ],
            ];

            foreach ($serviceDefaults as $index => $default) {
                HomeService::create([
                    'title' => $legacyContent["service_{$index}_title"]
                        ?? $default['title'],

                    'description' => $legacyContent["service_{$index}_description"]
                        ?? $default['description'],

                    'icon' => $legacyContent["service_{$index}_icon"]
                        ?? $default['icon'],

                    'sort_order' => $index,
                ]);
            }

            $services = HomeService::orderBy('sort_order')
                ->orderBy('id')
                ->get();
        }

        // =========================================================
        // BENTUK CONTENT KOMPATIBILITAS UNTUK BLADE ADMIN LAMA
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

            // SERVICES SECTION
            'services_title_line1' => $homePage->services_title_line1,
            'services_title_line2' => $homePage->services_title_line2,
            'services_subtitle' => $homePage->services_subtitle,

            // TESTIMONIAL SECTION
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

        // Masukkan features ke format lama agar Blade admin
        // yang sekarang tetap bisa digunakan.
        foreach ($features as $index => $feature) {
            $number = $index + 1;

            $content["feature_{$number}_text"] = $feature->text;
        }

        // Masukkan services ke format lama.
        foreach ($services as $index => $service) {
            $number = $index + 1;

            $content["service_{$number}_title"] = $service->title;
            $content["service_{$number}_description"] = $service->description;
            $content["service_{$number}_icon"] = $service->icon;
        }

        // =========================================================
        // PAGE HANYA SEBAGAI OBJECT KOMPATIBILITAS ADMIN
        // =========================================================
        if (!$page) {
            $page = new Page([
                'slug' => 'home',
                'title' => 'Beranda',
                'meta_title' => 'Resto Joss Gandos - Restoran & Cafe Terbaik di Ketintang',
                'meta_description' => 'Resto Joss Gandos - Tempat makan keluarga dengan hidangan lezat dan suasana nyaman',
            ]);
        }

        // Content tidak lagi diambil dari database pages.
        // Hanya ditempel ke object Page di memory
        // agar Blade admin lama tetap kompatibel.
        $page->setAttribute('content', $content);

        // =========================================================
        // TESTIMONIAL
        // =========================================================
        $testimonials = Testimonial::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.pages.home', compact(
            'page',
            'testimonials'
        ));
    }

    /**
     * Update the home page
     */
    public function updateHome(Request $request)
    {
        try {
            // =========================================================
            // VALIDASI
            // =========================================================
            $request->validate([
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',

                // Hero Section
                'hero_title_line1' => 'nullable|string|max:255',
                'hero_title_line2' => 'nullable|string|max:255',
                'hero_title_line3' => 'nullable|string|max:255',
                'hero_description' => 'nullable|string',
                'hero_button_menu' => 'nullable|string|max:100',
                'hero_button_reservation' => 'nullable|string|max:100',
                'hero_image_url' => 'nullable|string|max:2048',
                'hero_media_type' => 'nullable|in:image,youtube,tiktok,video',

                'hero_media_file' => [
                    'nullable',
                    'file',
                    'mimes:jpg,jpeg,png,webp,gif,mp4,webm,mov',
                    'max:51200',
                ],
                'hero_premium_badge' => 'nullable|string|max:255',

                // Welcome Section
                'welcome_title_line1' => 'nullable|string|max:255',
                'welcome_title_line2' => 'nullable|string|max:255',
                'welcome_description' => 'nullable|string',

                'welcome_image_file' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:5120',
                ],

                // Features
                'feature_1_text' => 'nullable|string|max:255',
                'feature_2_text' => 'nullable|string|max:255',
                'feature_3_text' => 'nullable|string|max:255',
                'feature_4_text' => 'nullable|string|max:255',

                // Services Section
                'services_title_line1' => 'nullable|string|max:255',
                'services_title_line2' => 'nullable|string|max:255',
                'services_subtitle' => 'nullable|string',

                // Services
                'service_1_title' => 'nullable|string|max:255',
                'service_1_description' => 'nullable|string',
                'service_2_title' => 'nullable|string|max:255',
                'service_2_description' => 'nullable|string',
                'service_3_title' => 'nullable|string|max:255',
                'service_3_description' => 'nullable|string',
                'service_4_title' => 'nullable|string|max:255',
                'service_4_description' => 'nullable|string',
                'service_5_title' => 'nullable|string|max:255',
                'service_5_description' => 'nullable|string',
                'service_6_title' => 'nullable|string|max:255',
                'service_6_description' => 'nullable|string',

                // Service Icons
                'service_1_icon' => 'nullable|file|mimes:svg,png|max:2048',
                'service_2_icon' => 'nullable|file|mimes:svg,png|max:2048',
                'service_3_icon' => 'nullable|file|mimes:svg,png|max:2048',
                'service_4_icon' => 'nullable|file|mimes:svg,png|max:2048',
                'service_5_icon' => 'nullable|file|mimes:svg,png|max:2048',
                'service_6_icon' => 'nullable|file|mimes:svg,png|max:2048',

                // Testimonials Section
                'testimonials_title_line1' => 'nullable|string|max:255',
                'testimonials_title_line2' => 'nullable|string|max:255',
                'testimonials_subtitle' => 'nullable|string',

                // CTA Section
                'cta_title_line1' => 'nullable|string|max:255',
                'cta_title_line2' => 'nullable|string|max:255',
                'cta_description' => 'nullable|string',
                'cta_button1_text' => 'nullable|string|max:100',
                'cta_button2_text' => 'nullable|string|max:100',

                // Team members
                'team_members.*.image_file' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:5120',
                ],
            ]);



            // =========================================================
            // TRANSACTION
            // =========================================================
            DB::transaction(function () use ($request) {

                // =====================================================
                // HOME PAGE
                // =====================================================
                $homePage = HomePage::first();

                if (!$homePage) {
                    $homePage = new HomePage();
                }

                $homePage->hero_premium_badge = $request->input('hero_premium_badge');
                $homePage->hero_title_line1 = $request->input('hero_title_line1');
                $homePage->hero_title_line2 = $request->input('hero_title_line2');
                $homePage->hero_title_line3 = $request->input('hero_title_line3');
                $homePage->hero_description = $request->input('hero_description');
                $homePage->hero_button_menu = $request->input('hero_button_menu');
                $homePage->hero_button_reservation = $request->input('hero_button_reservation');

                // Pertahankan media lama jika tidak ada media baru.
                if ($request->filled('hero_image_url')) {
                    $homePage->hero_image_url = $request->input('hero_image_url');
                }

                $homePage->hero_media_type = $request->input(
                    'hero_media_type',
                    $homePage->hero_media_type ?? 'image'
                );

                // Upload gambar atau video Hero ke Laravel Storage.
                if (
                    $request->hasFile('hero_media_file') &&
                    $request->file('hero_media_file')->isValid()
                ) {
                    $file = $request->file('hero_media_file');

                    $extension = strtolower($file->getClientOriginalExtension());

                    $isVideo = in_array($extension, ['mp4', 'webm', 'mov'], true);

                    // Simpan path media lama.
                    $oldMedia = $homePage->hero_image_url;

                    // Tentukan folder penyimpanan.
                    $folder = $isVideo ? 'videos/hero' : 'images/hero';

                    // Simpan file baru terlebih dahulu.
                    $path = $file->store($folder, 'public');

                    if ($path) {
                        // Perbarui path dan jenis media.
                        $homePage->hero_image_url = $path;
                        $homePage->hero_media_type = $isVideo ? 'video' : 'image';

                        // Hapus file lama jika berada di folder Hero.
                        if (
                            is_string($oldMedia) &&
                            (
                                str_starts_with($oldMedia, 'videos/hero/') ||
                                str_starts_with($oldMedia, 'images/hero/')
                            )
                        ) {
                            Storage::disk('public')->delete($oldMedia);
                        }
                    }
                }

                $homePage->welcome_title_line1 = $request->input('welcome_title_line1');
                $homePage->welcome_title_line2 = $request->input('welcome_title_line2');
                $homePage->welcome_description = $request->input('welcome_description');

                // Upload gambar Welcome dari komputer.
                if (
                    $request->hasFile('welcome_image_file') &&
                    $request->file('welcome_image_file')->isValid()
                ) {
                    // Simpan path gambar lama.
                    $oldWelcomeImage = $homePage->welcome_image_url;

                    // Simpan gambar baru ke storage/app/public/images/welcome.
                    $newWelcomeImage = $request->file('welcome_image_file')
                        ->store('images/welcome', 'public');

                    if ($newWelcomeImage) {
                        // Simpan path gambar baru ke database.
                        $homePage->welcome_image_url = $newWelcomeImage;

                        // Hapus gambar lama jika berasal dari folder Welcome lokal.
                        if (
                            is_string($oldWelcomeImage) &&
                            str_starts_with($oldWelcomeImage, 'images/welcome/')
                        ) {
                            Storage::disk('public')->delete($oldWelcomeImage);
                        }
                    }
                }

                $homePage->services_title_line1 = $request->input('services_title_line1');
                $homePage->services_title_line2 = $request->input('services_title_line2');
                $homePage->services_subtitle = $request->input('services_subtitle');

                $homePage->testimonials_title_line1 = $request->input('testimonials_title_line1');
                $homePage->testimonials_title_line2 = $request->input('testimonials_title_line2');
                $homePage->testimonials_subtitle = $request->input('testimonials_subtitle');

                // CTA
                $homePage->cta_title_line1 = $request->input('cta_title_line1');
                $homePage->cta_title_line2 = $request->input('cta_title_line2');
                $homePage->cta_description = $request->input('cta_description');
                $homePage->cta_button1_text = $request->input('cta_button1_text');
                $homePage->cta_button2_text = $request->input('cta_button2_text');

                $homePage->save();

                // =====================================================
                // HOME FEATURES
                // =====================================================
                for ($i = 1; $i <= 4; $i++) {

                    $feature = HomeFeature::firstOrNew([
                        'sort_order' => $i,
                    ]);

                    $feature->text = $request->input(
                        "feature_{$i}_text",
                        $feature->text
                    );

                    $feature->sort_order = $i;

                    $feature->save();
                }

                // =====================================================
                // HOME SERVICES
                // =====================================================
                for ($i = 1; $i <= 6; $i++) {

                    $service = HomeService::firstOrNew([
                        'sort_order' => $i,
                    ]);

                    $service->title = $request->input(
                        "service_{$i}_title",
                        $service->title
                    );

                    $service->description = $request->input(
                        "service_{$i}_description",
                        $service->description
                    );

                    // ================================================
                    // ICON SERVICE
                    // ================================================
                    $field = "service_{$i}_icon";

                    if (
                        $request->hasFile($field) &&
                        $request->file($field)->isValid()
                    ) {
                        $oldIcon = $service->icon;

                        $path = $request->file($field)
                            ->store('icons/services', 'public');

                        $service->icon = $path;

                        // Hapus icon lama jika berupa file
                        if (
                            is_string($oldIcon) &&
                            str_starts_with($oldIcon, 'icons/services/')
                        ) {
                            Storage::disk('public')->delete($oldIcon);
                        }
                    }

                    $service->sort_order = $i;

                    $service->save();
                }

                // =====================================================
                // SEO
                // =====================================================
                // SEO tetap dipertahankan di tabel pages.
                // Konten Home tidak lagi disimpan di pages.content.
                $page = Page::where('slug', 'home')->first();

                if ($page) {
                    $page->meta_title = $page->meta_title;
                    $page->meta_description = $page->meta_description;
                    $page->save();
                }

                // =====================================================
                // TESTIMONIAL
                // Sekarang model Testimonial menunjuk ke
                // tabel home_testimonials.
                // =====================================================

                // Hapus testimonial yang dipilih
                $deletedTestimonials = $request->input(
                    'deleted_testimonials',
                    []
                );

                if (!empty($deletedTestimonials)) {
                    Testimonial::whereIn(
                        'id',
                        $deletedTestimonials
                    )->delete();
                }

                // Ambil index testimonial dari form
                $testimonialIndexes = [];

                foreach ($request->all() as $key => $value) {

                    if (
                        preg_match(
                            '/^testimonial_(\d+)_name$/',
                            $key,
                            $matches
                        )
                    ) {
                        $testimonialIndexes[] = (int) $matches[1];
                    }
                }

                sort($testimonialIndexes);

                // Simpan / update testimonial
                foreach ($testimonialIndexes as $index) {

                    $testimonialId = $request->input(
                        "testimonial_{$index}_id"
                    );

                    $name = trim(
                        $request->input(
                            "testimonial_{$index}_name",
                            ''
                        )
                    );

                    $source = trim(
                        $request->input(
                            "testimonial_{$index}_source",
                            'Google Reviews'
                        )
                    );

                    $rating = (int) $request->input(
                        "testimonial_{$index}_rating",
                        5
                    );

                    $review = trim(
                        $request->input(
                            "testimonial_{$index}_text",
                            ''
                        )
                    );

                    if ($name === '' || $review === '') {
                        continue;
                    }

                    $data = [
                        'name' => $name,
                        'source' => $source,
                        'rating' => $rating,
                        'review' => $review,
                        'is_active' => 1,
                        'sort_order' => $index,
                    ];

                    if (!empty($testimonialId)) {

                        Testimonial::where(
                            'id',
                            $testimonialId
                        )->update($data);
                    } else {

                        Testimonial::create($data);
                    }
                }

                // =====================================================
                // RAPikan URUTAN TESTIMONIAL
                // =====================================================
                $testimonials = Testimonial::orderBy(
                    'sort_order',
                    'asc'
                )
                    ->orderBy('id', 'asc')
                    ->get();

                foreach ($testimonials as $index => $testimonial) {

                    $testimonial->update([
                        'sort_order' => $index + 1,
                    ]);
                }
            });

            return redirect()
                ->route('admin.pages.home.edit')
                ->with(
                    'success',
                    'Halaman Home dan testimoni berhasil diperbarui!'
                );
        } catch (\Exception $e) {

            Log::error(
                'Error updating home page: ' . $e->getMessage()
            );

            Log::error(
                $e->getTraceAsString()
            );

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan: ' . $e->getMessage()
                );
        }
    }

    /**
     * Show the form for editing the About page
     *
     * Data About sekarang diambil dari database khusus About:
     * - about_pages
     * - about_histories
     * - about_missions
     * - about_timelines
     * - about_timeline_items
     * - about_team_members
     */
    public function editAbout()
    {
        // =========================================================
        // AMBIL DATA UTAMA ABOUT BESERTA RELASINYA
        // =========================================================

        $aboutPage = AboutPage::with([
            'histories',
            'missions',
            'timelines.items',
            'teamMembers',
        ])->first();

        // Kalau data utama belum ada, buat data kosong/default
        if (!$aboutPage) {
            $aboutPage = AboutPage::create([
                'hero_badge' => 'Tentang Kami',
                'hero_title' => 'Resto Joss Gandos Ketintang',
                'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
                'hero_image' => null,

                'hero_button_1_text' => 'Telusuri Sejarah',
                'hero_button_1_link' => '#sejarah',

                'hero_button_2_text' => 'Kenali Tim Kami',
                'hero_button_2_link' => '#tim',

                'journey_title' => 'PERJALANAN RESTO JOSS GANDOS',
                'journey_subtitle' => 'Dari langkah kecil hingga menjadi resto kebanggaan bersama',

                'founder_name' => 'Dr. Siswanto',

                'team_title' => 'Orang-orang Berdedikasi',
                'team_title_highlight' => 'di Balik Layar',
                'team_subtitle' => 'Tim yang memastikan pengalaman bersantap Anda sempurna',

                'founder_story_1' => '',
                'founder_story_2' => '',
                'founder_commitment' => '',
                'founder_image' => null,

                'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',

                'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
                'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap.',
            ]);

            // Ambil ulang relasi setelah record dibuat
            $aboutPage->load([
                'histories',
                'missions',
                'timelines.items',
                'teamMembers',
            ]);
        }

        // =========================================================
        // CONTENT UNTUK BLADE ADMIN
        // =========================================================

        $content = [
            // -------------------------
            // HERO
            // -------------------------
            'hero_badge' => $aboutPage->hero_badge,
            'hero_title' => $aboutPage->hero_title,
            'hero_subtitle' => $aboutPage->hero_subtitle,
            'hero_image' => $aboutPage->hero_image,

            'hero_button_1_text' => $aboutPage->hero_button_1_text,
            'hero_button_1_link' => $aboutPage->hero_button_1_link,

            'hero_button_2_text' => $aboutPage->hero_button_2_text,
            'hero_button_2_link' => $aboutPage->hero_button_2_link,

            // -------------------------
            // JOURNEY / PERJALANAN
            // -------------------------
            'journey_title' => $aboutPage->journey_title,
            'journey_subtitle' => $aboutPage->journey_subtitle,

            // -------------------------
            // TEAM
            // -------------------------
            'team_title' => $aboutPage->team_title,
            'team_title_highlight' => $aboutPage->team_title_highlight,
            'team_subtitle' => $aboutPage->team_subtitle,

            // -------------------------
            // FOUNDER
            // -------------------------
            'founder_name' => $aboutPage->founder_name,
            'founder_description' => $aboutPage->founder_description,
            'founder_story_1' => $aboutPage->founder_story_1,
            'founder_story_2' => $aboutPage->founder_story_2,
            'founder_commitment' => $aboutPage->founder_commitment,
            'founder_image' => $aboutPage->founder_image,

            // -------------------------
            // VISION
            // -------------------------
            'vision_quote' => $aboutPage->vision_quote,

            // -------------------------
            // CTA
            // -------------------------
            'cta_title' => $aboutPage->cta_title,
            'cta_description' => $aboutPage->cta_description,
        ];

        // =========================================================
        // HISTORY
        // =========================================================

        $historyParagraphs = $aboutPage->histories
            ->pluck('paragraph')
            ->toArray();

        foreach ($historyParagraphs as $index => $paragraph) {
            $content['history_description_' . ($index + 1)] = $paragraph;
        }

        // =========================================================
        // MISSIONS
        // =========================================================

        $missions = $aboutPage->missions
            ->map(function ($mission) {
                return [
                    'title' => $mission->title,
                    'description' => $mission->description,
                ];
            })
            ->values()
            ->toArray();

        $content['missions'] = $missions;

        // =========================================================
        // TIMELINE
        // =========================================================

        $timeline = $aboutPage->timelines
            ->map(function ($timelineItem) {
                return [
                    'year' => $timelineItem->year,
                    'title' => $timelineItem->title,
                    'items' => $timelineItem->items
                        ->pluck('item')
                        ->values()
                        ->toArray(),
                ];
            })
            ->values()
            ->toArray();

        $content['timeline'] = $timeline;

        // =========================================================
        // TEAM MEMBERS
        // =========================================================

        $teamMembersData = $aboutPage->teamMembers
            ->map(function ($member) {
                return [
                    'id' => $member->id,
                    'name' => $member->name,
                    'position' => $member->position,
                    'image' => $member->image,
                    'description' => $member->description,
                ];
            })
            ->values()
            ->toArray();

        $content['team_members'] = $teamMembersData;

        // =========================================================
        // KIRIM KE BLADE ADMIN
        // =========================================================

        return view('admin.pages.about', [
            'page' => $aboutPage,
            'content' => $content,
            'historyParagraphs' => $historyParagraphs,
            'missions' => $missions,
            'timeline' => $timeline,
            'teamMembersData' => $teamMembersData,
        ]);
    }


    /**
     * Update the about page - FULLY FIXED VERSION
     */
    public function updateAbout(Request $request)
    {
        try {

            // =========================================================
            // VALIDASI
            // =========================================================

            $request->validate([

                // Hero
                'hero_badge' => 'nullable|string|max:255',
                'hero_title' => 'nullable|string|max:255',
                'hero_subtitle' => 'nullable|string',
                'hero_image' => 'nullable|url',

                'gallery_title' => 'nullable|string|max:255',
                'gallery_description' => 'nullable|string',

                // Hero Buttons
                'hero_button_1_text' => 'nullable|string|max:255',
                'hero_button_1_link' => 'nullable|string|max:255',
                'hero_button_2_text' => 'nullable|string|max:255',
                'hero_button_2_link' => 'nullable|string|max:255',

                // Journey / Perjalanan
                'journey_title' => 'nullable|string|max:255',
                'journey_subtitle' => 'nullable|string',

                // Team Section
                'team_title' => 'nullable|string|max:255',
                'team_title_highlight' => 'nullable|string|max:255',
                'team_subtitle' => 'nullable|string',

                // History
                'history_paragraphs' => 'nullable|array',
                'history_paragraphs.*' => 'nullable|string',

                // Founder
                'founder_name' => 'nullable|string|max:255',
                'founder_description' => 'nullable|string',
                'founder_story' => 'nullable|string',
                'founder_philosophy' => 'nullable|string',
                'founder_commitment' => 'nullable|string',

                // Upload Gambar Founder
                'founder_image_file' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:5120',
                ],

                // Vision
                'vision_quote' => 'nullable|string',

                // CTA Section
                'cta_title_line1' => 'nullable|string|max:255',
                'cta_title_line2' => 'nullable|string|max:255',
                'cta_description' => 'nullable|string',
                'cta_button1_text' => 'nullable|string|max:100',
                'cta_button2_text' => 'nullable|string|max:100',

                // Timeline
                'timeline' => 'nullable|array',
                'timeline.*.year' => 'required_with:timeline|string',
                'timeline.*.title' => 'required_with:timeline|string',
                'timeline.*.items' => 'required_with:timeline|string',

                // Missions
                'missions' => 'nullable|array',
                'missions.*.title' => 'required_with:missions|string',
                'missions.*.description' => 'required_with:missions|string',

                // Team Members
                'team_members' => 'nullable|array',
                'team_members.*.id' => 'nullable|integer',
                'team_members.*.name' => 'required_with:team_members|string|max:255',
                'team_members.*.position' => 'required_with:team_members|string|max:255',
                'team_members.*.image_file' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:5120',
                ],
                'team_members.*.description' => 'required_with:team_members|string',
            ]);

            // =========================================================
            // TRANSACTION
            // =========================================================

            DB::transaction(function () use ($request, &$aboutPage) {

                // =====================================================
                // ABOUT PAGE UTAMA
                // =====================================================

                $aboutPage = AboutPage::firstOrCreate(
                    [],
                    [
                        'hero_badge' => 'Tentang Kami',
                        'hero_title' => 'Resto Joss Gandos Ketintang',
                        'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
                        'hero_image' => null,

                        'hero_button_1_text' => 'Telusuri Sejarah',
                        'hero_button_1_link' => '#sejarah',

                        'hero_button_2_text' => 'Kenali Tim Kami',
                        'hero_button_2_link' => '#tim',

                        'journey_title' => 'PERJALANAN RESTO JOSS GANDOS',
                        'journey_subtitle' => 'Dari langkah kecil hingga menjadi resto kebanggaan bersama',

                        'team_title' => 'Orang-orang Berdedikasi',
                        'team_title_highlight' => 'di Balik Layar',
                        'team_subtitle' => 'Tim yang memastikan pengalaman bersantap Anda sempurna',

                        'founder_name' => 'Dr. Siswanto',
                        'founder_description' => 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017.',
                        'founder_story_1' => '',
                        'founder_story_2' => '',
                        'founder_commitment' => '',
                        'founder_image' => null,

                        'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',

                        'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
                        'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap.',
                    ]
                );

                // =====================================================
                // UPLOAD GAMBAR FOUNDER
                // =====================================================

                // Pertahankan gambar lama jika tidak ada gambar baru.
                $oldFounderImage = $aboutPage->founder_image;
                $founderImagePath = $oldFounderImage;

                // Jika admin memilih gambar baru.
                if (
                    $request->hasFile('founder_image_file') &&
                    $request->file('founder_image_file')->isValid()
                ) {
                    // Simpan gambar baru ke storage/app/public/images/founder.
                    $newFounderImage = $request->file('founder_image_file')
                        ->store('images/founder', 'public');

                    if ($newFounderImage) {
                        $founderImagePath = $newFounderImage;
                    }
                }

                $aboutPage->fill([
                    // -------------------------
                    // HERO
                    // -------------------------
                    'hero_badge' => $request->input('hero_badge'),
                    'hero_title' => $request->input('hero_title'),
                    'hero_subtitle' => $request->input('hero_subtitle'),
                    'hero_image' => $request->input('hero_image'),

                    'hero_button_1_text' => $request->input('hero_button_1_text'),
                    'hero_button_1_link' => $request->input('hero_button_1_link'),

                    'hero_button_2_text' => $request->input('hero_button_2_text'),
                    'hero_button_2_link' => $request->input('hero_button_2_link'),

                    // -------------------------
                    // JOURNEY / PERJALANAN
                    // -------------------------
                    'journey_title' => $request->input('journey_title'),
                    'journey_subtitle' => $request->input('journey_subtitle'),

                    // -------------------------
                    // TEAM
                    // -------------------------
                    'team_title' => $request->input('team_title'),
                    'team_title_highlight' => $request->input('team_title_highlight'),
                    'team_subtitle' => $request->input('team_subtitle'),

                    // -------------------------
                    // FOUNDER
                    // -------------------------
                    'founder_name' => $request->input('founder_name'),
                    'founder_description' => $request->input('founder_description'),

                    // Form menggunakan founder_story
                    // Database menggunakan founder_story_1
                    'founder_story_1' => $request->input('founder_story'),

                    // Form menggunakan founder_philosophy
                    // Database menggunakan founder_story_2
                    'founder_story_2' => $request->input('founder_philosophy'),

                    'founder_commitment' => $request->input('founder_commitment'),

                    // Simpan path gambar Founder.
                    'founder_image' => $founderImagePath,

                    // -------------------------
                    // VISION
                    // -------------------------
                    'vision_quote' => $request->input('vision_quote'),

                    // -------------------------
                    // CTA
                    // -------------------------
                    'cta_title' => $request->input('cta_title'),
                    'cta_description' => $request->input('cta_description'),
                ]);

                $aboutPage->save();

                // =====================================================
                // HAPUS GAMBAR FOUNDER LAMA
                // =====================================================

                // Hapus hanya jika gambar baru berhasil diunggah
                // dan gambar lama berada di folder khusus Founder.
                if (
                    $founderImagePath !== $oldFounderImage &&
                    is_string($oldFounderImage) &&
                    str_starts_with($oldFounderImage, 'images/founder/')
                ) {
                    Storage::disk('public')->delete($oldFounderImage);
                }

                // =====================================================
                // HISTORY
                // =====================================================

                // Hapus history lama
                $aboutPage->histories()->delete();

                // Simpan history baru
                foreach ($request->input('history_paragraphs', []) as $index => $paragraph) {

                    if (trim((string) $paragraph) === '') {
                        continue;
                    }

                    $aboutPage->histories()->create([
                        'paragraph' => $paragraph,
                        'sort_order' => $index,
                    ]);
                }

                // =====================================================
                // MISSIONS
                // =====================================================

                // Hapus missions lama
                $aboutPage->missions()->delete();

                // Simpan missions baru
                foreach ($request->input('missions', []) as $index => $mission) {

                    if (
                        !isset($mission['title']) &&
                        !isset($mission['description'])
                    ) {
                        continue;
                    }

                    $aboutPage->missions()->create([
                        'title' => $mission['title'] ?? '',
                        'description' => $mission['description'] ?? '',
                        'sort_order' => $index,
                    ]);
                }

                // =====================================================
                // TIMELINE
                // =====================================================

                // Ambil timeline lama
                $oldTimelines = $aboutPage->timelines()->get();

                // Hapus seluruh item dari timeline lama
                foreach ($oldTimelines as $oldTimeline) {
                    $oldTimeline->items()->delete();
                }

                // Hapus timeline lama
                $aboutPage->timelines()->delete();

                // Simpan timeline baru
                foreach ($request->input('timeline', []) as $timelineIndex => $timelineData) {

                    if (
                        !isset($timelineData['year']) &&
                        !isset($timelineData['title'])
                    ) {
                        continue;
                    }

                    $timeline = $aboutPage->timelines()->create([
                        'year' => $timelineData['year'] ?? '',
                        'title' => $timelineData['title'] ?? '',
                        'sort_order' => $timelineIndex,
                    ]);

                    // ---------------------------------------------
                    // TIMELINE ITEMS
                    // ---------------------------------------------

                    $itemsText = $timelineData['items'] ?? '';

                    $items = preg_split(
                        '/\r\n|\r|\n/',
                        trim((string) $itemsText)
                    );

                    $itemSortOrder = 0;

                    foreach ($items as $item) {

                        $item = trim($item);

                        if ($item === '') {
                            continue;
                        }

                        $timeline->items()->create([
                            'item' => $item,
                            'sort_order' => $itemSortOrder,
                        ]);

                        $itemSortOrder++;
                    }
                }

                // =====================================================
                // TEAM MEMBERS
                // =====================================================

                // Ambil anggota tim lama
                $existingMembers = $aboutPage->teamMembers()->get();
                $submittedIds = [];
                $filesToDelete = [];

                foreach ($request->input('team_members', []) as $index => $memberData) {

                    // Cari anggota lama berdasarkan ID
                    $member = null;

                    if (!empty($memberData['id'])) {
                        $member = $aboutPage->teamMembers()
                            ->where('id', $memberData['id'])
                            ->first();
                    }

                    // Simpan foto lama untuk berjaga-jaga jika foto diganti
                    $oldImage = $member?->image;

                    // Siapkan data anggota
                    $data = [
                        'name' => $memberData['name'],
                        'position' => $memberData['position'],
                        'description' => $memberData['description'],
                        'sort_order' => $index,
                    ];

                    // Jika ada foto baru, simpan ke storage/app/public/images/team
                    $imageFile = $request->file("team_members.{$index}.image_file");

                    if ($imageFile) {
                        $newImage = $imageFile->store('images/team', 'public');

                        $data['image'] = $newImage;

                        // Jadwalkan penghapusan foto lama jika foto berhasil diganti
                        if ($oldImage && $oldImage !== $newImage) {
                            $filesToDelete[] = $oldImage;
                        }
                    }

                    // Perbarui anggota lama atau buat anggota baru
                    if ($member) {
                        $member->update($data);
                        $submittedIds[] = $member->id;
                    } else {
                        $newMember = $aboutPage->teamMembers()->create($data);
                        $submittedIds[] = $newMember->id;
                    }
                }

                // Hapus anggota lama yang sudah dihapus dari form
                $removedMembers = $existingMembers->filter(function ($member) use ($submittedIds) {
                    return !in_array($member->id, $submittedIds);
                });

                foreach ($removedMembers as $member) {
                    if ($member->image) {
                        $filesToDelete[] = $member->image;
                    }

                    $member->delete();
                }

                // Hapus file foto lokal yang sudah tidak digunakan
                foreach (array_unique($filesToDelete) as $imagePath) {

                    // Jangan menghapus gambar dari URL eksternal
                    if (preg_match('#^https?://#i', $imagePath)) {
                        continue;
                    }

                    // Hilangkan awalan "storage/" jika tersimpan bersama path
                    $imagePath = preg_replace('#^/?storage/#', '', $imagePath);
                    $imagePath = ltrim($imagePath, '/');

                    // Hapus hanya foto yang berada di folder images/team
                    if (
                        str_starts_with($imagePath, 'images/team/') &&
                        Storage::disk('public')->exists($imagePath)
                    ) {
                        Storage::disk('public')->delete($imagePath);
                    }
                }
            });

            // =========================================================
            // LOG
            // =========================================================

            Log::info('About page updated successfully', [
                'id' => $aboutPage?->id,
            ]);

            // =========================================================
            // REDIRECT
            // =========================================================

            return redirect()
                ->route('admin.pages.about.edit')
                ->with('success', 'Halaman about berhasil diperbarui!');
        } catch (\Exception $e) {

            Log::error('Error updating about page: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

// =========================================================
// MENU HERO
// =========================================================

    /**
     * Show the menu hero settings
     */
    public function editMenu()
    {
        $page = Page::findBySlug('menu');

        if (!$page) {
            $page = Page::create([
                'slug' => 'menu',
                'title' => 'Menu',
                'meta_title' => 'Menu Resto Joss Gandos',
                'meta_description' => 'Menu makanan dan minuman Resto Joss Gandos',
                'content' => [
                    'hero_script' => 'Joss Gandos',
                    'hero_title_line1' => 'Nikmati',
                    'hero_title_line2' => 'Kelezatan',
                    'hero_title_line3' => 'Menu Kami',
                    'hero_description' => 'Nikmati berbagai hidangan khas Joss Gandos dengan cita rasa Nusantara yang menggugah selera.',
                    'hero_image' => null,
                ],
            ]);
        }

        // Pengaturan Hero berada di halaman Admin > Kelola Menu
        return redirect()->route('admin.menu.index');
    }

    public function editGallery()
    {
        $galleryPage = GalleryPage::first();

        if (!$galleryPage) {
            $galleryPage = GalleryPage::create([
                'hero_script' => 'GALERI KULINER',
                'hero_title_line1' => 'Jelajahi Keindahan',
                'hero_title_line2' => 'Setiap Hidangan',
                'hero_title_line3' => '& Momen Spesial',
                'hero_description' => 'Abadikan setiap kelezatan dalam bingkai visual. Dari hidangan istimewa hingga suasana hangat yang menciptakan kenangan tak terlupakan bersama Joss Gandos.',
                'hero_image' => null,
            ]);
        }

        return redirect()->route('admin.gallery.index');
    }


    public function updateGallery(Request $request)
    {
        $validated = $request->validate([
            'hero_script' => 'required|string|max:255',
            'hero_title_line1' => 'required|string|max:255',
            'hero_title_line2' => 'required|string|max:255',
            'hero_title_line3' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'gallery_title' => 'nullable|string|max:255',
            'gallery_description' => 'nullable|string',
        ]);

        $hero = GalleryPage::first();

        if (!$hero) {
            $hero = new GalleryPage();
        }

        $hero->hero_script = $validated['hero_script'];
        $hero->hero_title_line1 = $validated['hero_title_line1'];
        $hero->hero_title_line2 = $validated['hero_title_line2'];
        $hero->hero_title_line3 = $validated['hero_title_line3'];
        $hero->hero_description = $validated['hero_description'];
        $hero->gallery_title = $validated['gallery_title'] ?? 'Galeri Kami';
        $hero->gallery_description = $validated['gallery_description']
            ?? 'Temukan inspirasi kuliner dan suasana yang menciptakan pengalaman tak terlupakan';

        // Unggah foto Hero Galeri jika ada foto baru
        if ($request->hasFile('hero_image_file')) {
            $heroImageFile = $request->file('hero_image_file');

            if ($heroImageFile->isValid()) {
                // Simpan foto baru ke storage/app/public/images/gallery
                $newHeroImage = $heroImageFile->store('images/gallery', 'public');

                // Hapus foto lama jika berada di folder images/gallery
                if (
                    !empty($hero->hero_image) &&
                    str_starts_with($hero->hero_image, 'images/gallery/')
                ) {
                    Storage::disk('public')->delete($hero->hero_image);
                }

                // Simpan path foto baru ke database
                $hero->hero_image = $newHeroImage;
            }
        }

        $hero->save();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Hero Gallery berhasil diperbarui!');
    }




    /**
     * Update the menu hero
     */
    public function updateMenu(Request $request)
    {
        $validated = $request->validate([
            'hero_script' => 'required|string|max:255',
            'hero_title_line1' => 'required|string|max:255',
            'hero_title_line2' => 'required|string|max:255',
            'hero_title_line3' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'promo_title' => 'nullable|string|max:255',
        ]);

        // Ambil data Hero Menu dari tabel menu_pages
        $menuPage = MenuPage::first();

        // Jika belum ada data, buat record baru
        if (!$menuPage) {
            $menuPage = new MenuPage();
        }

        // Simpan data teks Hero
        $menuPage->hero_script = $validated['hero_script'];
        $menuPage->hero_title_line1 = $validated['hero_title_line1'];
        $menuPage->hero_title_line2 = $validated['hero_title_line2'];
        $menuPage->hero_title_line3 = $validated['hero_title_line3'];
        $menuPage->hero_description = $validated['hero_description'];

        $menuPage->promo_title = $validated['promo_title'] ?? 'Promo Spesial';


        // Ganti foto Hero Menu jika ada foto baru yang diunggah.
        if ($request->hasFile('hero_image_file')) {
            $heroImageFile = $request->file('hero_image_file');

            if ($heroImageFile->isValid()) {
                // Simpan path foto lama sebelum menggantinya.
                $oldHeroImage = $menuPage->hero_image;

                // Simpan foto baru ke storage/app/public/images/menu.
                $newHeroImage = $heroImageFile->store('images/menu', 'public');

                if ($newHeroImage) {
                    // Perbarui path foto di database.
                    $menuPage->hero_image = $newHeroImage;

                    // Hapus foto lama jika tersimpan di folder images/menu.
                    if (
                        !empty($oldHeroImage) &&
                        str_starts_with($oldHeroImage, 'images/menu/')
                    ) {
                        Storage::disk('public')->delete($oldHeroImage);
                    }
                }
            }
        }

        $menuPage->save();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Show the form for editing the contact page
     */
    public function editContact()
    {
        $page = Page::findBySlug('contact');

        if (!$page) {
            $page = Page::create([
                'slug' => 'contact',
                'title' => 'Hubungi Kami',
                'meta_title' => 'Kontak Resto Joss Gandos',
                'meta_description' => 'Hubungi Resto Joss Gandos untuk reservasi dan informasi',
                'content' => [
                    'address' => 'Jl. Ketintang No. 123, Surabaya',
                    'phone' => '(031) 1234-5678',
                    'email' => 'info@jossgandos.com',
                    'hours' => 'Setiap Hari: 10.00 - 22.00',
                    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.815195192596!2d112.731234!3d-7.297234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb8f9d8f8f8f%3A0x8f8f8f8f8f8f8f8f!2sSurabaya!5e0!3m2!1sen!2sid!4v1234567890',
                    'whatsapp_admin_1' => '081234567890',
                    'whatsapp_admin_1_name' => 'Admin Jemursari',
                    'whatsapp_admin_2' => '081234567891',
                    'whatsapp_admin_2_name' => 'Admin Ketintang',
                    'delivery_gofood' => 'https://gofood.link/resto-joss-gandos',
                    'delivery_grabfood' => 'https://food.grab.com/resto-joss-gandos',
                    'facebook_url' => 'https://facebook.com/restojossgandos',
                    'instagram_url' => 'https://instagram.com/restojossgandos',
                    'tiktok_url' => 'https://tiktok.com/@restojossgandos',
                    'hero_subtitle' => 'HUBUNGI KAMI',
                    'hero_title_line1' => 'Kami Siap',
                    'hero_title_line2' => 'Melayani Dengan',
                    'hero_title_line3' => 'Sepenuh Hati',
                    'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
                    'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                ]
            ]);
        }

        $reservationPage = ReservationPage::first();
        $reservationContact = ReservationContact::first();
        $reservationSocial = ReservationSocial::first();

        // Ambil data halaman reservasi dari tabel khusus.
        $reservationPage = ReservationPage::first();
        $reservationSocial = ReservationSocial::first();



        // Ambil cabang aktif jika masih digunakan oleh view.
        $branches = Branch::where('is_active', true)->get();

        if (!$reservationPage) {
            $reservationPage = ReservationPage::create([
                'hero_subtitle' => $page->content['hero_subtitle'] ?? null,
                'hero_title_line1' => $page->content['hero_title_line1'] ?? null,
                'hero_title_line2' => $page->content['hero_title_line2'] ?? null,
                'hero_title_line3' => $page->content['hero_title_line3'] ?? null,
                'hero_description' => $page->content['hero_description'] ?? null,
                'hero_image' => $page->content['hero_image_url'] ?? null,
            ]);
        }

        $deliveryServices = DeliveryService::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.pages.contact', compact(
            'page',
            'deliveryServices',
            'reservationPage',
            'reservationContact',
            'reservationSocial'
        ));
    }

    /**
     * Update the contact page - FIXED VERSION with proper validation
     */
    public function updateContact(Request $request)
    {
        try {

            /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

            $request->validate([
                // Hero Reservasi
                'reservation_hero_subtitle' => 'nullable|string|max:255',
                'reservation_hero_title_line1' => 'nullable|string|max:255',
                'reservation_hero_title_line2' => 'nullable|string|max:255',
                'reservation_hero_title_line3' => 'nullable|string|max:255',
                'reservation_hero_description' => 'nullable|string',
                'reservation_hero_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',

                // Konten Informasi Kontak
                'contact_title' => 'nullable|string|max:255',
                'contact_description' => 'nullable|string',

                // Contact
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'hours' => 'required|string',
                'map_embed' => 'required|string',

                // Delivery
                'delivery_title' => 'nullable|string|max:255',

                'delivery_services' => 'nullable|array',
                'delivery_services.*.id' => 'nullable|integer',
                'delivery_services.*.name' => 'required|string|max:255',
                'delivery_services.*.description' => 'nullable|string',
                'delivery_services.*.logo' => 'nullable|string|max:255',
                'delivery_services.*.logo_file' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'delivery_services.*.url' => 'nullable|url',
                'delivery_services.*.button_text' => 'nullable|string|max:255',
                'delivery_services.*.sort_order' => 'nullable|integer|min:0',
                'delivery_services.*.is_active' => 'nullable|in:0,1',

                'delivery_gofood_title' => 'nullable|string|max:255',
                'delivery_gofood_description' => 'nullable|string',
                'delivery_gofood' => 'nullable|url',

                'delivery_grabfood_title' => 'nullable|string|max:255',
                'delivery_grabfood_description' => 'nullable|string',
                'delivery_grabfood' => 'nullable|url',

                'delivery_whatsapp_title' => 'nullable|string|max:255',
                'delivery_whatsapp_description' => 'nullable|string',

                // Social Media
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'tiktok_url' => 'nullable|url',
            ]);


            /*
        |--------------------------------------------------------------------------
        | AMBIL DATA CONTACT YANG SUDAH ADA
        |--------------------------------------------------------------------------
        */

            $page = Page::where('slug', 'contact')->first();

            $existingContent = [];

            if ($page && is_array($page->content)) {
                $existingContent = $page->content;
            }

            /*
        |--------------------------------------------------------------------------
        | SIAPKAN CONTENT
        |--------------------------------------------------------------------------
        |
        | PENTING:
        | Data lama dipertahankan.
        | Field yang tidak dikirim form tidak akan menghapus data lama.
        |
        */

            $content = $existingContent;

            $reservationContact = ReservationContact::first();

            if (!$reservationContact) {
                $reservationContact = new ReservationContact();
            }

            $reservationContact->address = $request->input('address');
            $reservationContact->phone = $request->input('phone');
            $reservationContact->email = $request->input('email');
            $reservationContact->hours = $request->input('hours');
            $reservationContact->map_embed = $request->input('map_embed');

            $reservationContact->save();


            /*
|--------------------------------------------------------------------------
| SOCIAL MEDIA RESERVASI
|--------------------------------------------------------------------------
*/

            $reservationSocial = ReservationSocial::first();

            if (!$reservationSocial) {
                $reservationSocial = new ReservationSocial();
            }

            $reservationSocial->facebook_url = $request->input('facebook_url');
            $reservationSocial->instagram_url = $request->input('instagram_url');
            $reservationSocial->tiktok_url = $request->input('tiktok_url');

            $reservationSocial->save();


            /*
|--------------------------------------------------------------------------
| SIMPAN CONTENT LAINNYA
|--------------------------------------------------------------------------
*/

            foreach (
                $request->except([
                    '_token',
                    'title',
                    'meta_title',
                    'meta_description',
                    'delivery_services',

                    // Sudah disimpan ke tabel khusus
                    'address',
                    'phone',
                    'email',
                    'hours',
                    'map_embed',

                    // Sudah disimpan ke reservation_socials
                    'facebook_url',
                    'instagram_url',
                    'tiktok_url',

                    // Hero reservasi disimpan ke reservation_pages
                    'reservation_hero_subtitle',
                    'reservation_hero_title_line1',
                    'reservation_hero_title_line2',
                    'reservation_hero_title_line3',
                    'reservation_hero_description',
                    'reservation_hero_image_file',
                ]) as $key => $value
            ) {

                // Checkbox
                if ($value === 'on') {
                    $content[$key] = true;
                } else {
                    $content[$key] = $value;
                }
            }

            /*
|--------------------------------------------------------------------------
| LAYANAN RESERVASI & DELIVERY
|--------------------------------------------------------------------------
*/

            $deliveryServices = $request->input('delivery_services', []);

            // ID layanan yang masih ada di form
            $submittedIds = collect($deliveryServices)
                ->pluck('id')
                ->filter()
                ->map(fn($id) => (int) $id)
                ->values()
                ->all();

            // Hapus layanan yang sudah dihapus dari form
            if (empty($submittedIds)) {
                DeliveryService::query()->delete();
            } else {
                DeliveryService::whereNotIn('id', $submittedIds)->delete();
            }

            // Simpan / update layanan
            foreach ($deliveryServices as $index => $serviceData) {

                $service = !empty($serviceData['id'])
                    ? DeliveryService::find($serviceData['id'])
                    : new DeliveryService();

                if (!$service) {
                    continue;
                }

                $service->name = $serviceData['name'];
                $service->description = $serviceData['description'] ?? null;
                $service->url = $serviceData['url'] ?? null;
                $service->button_text = $serviceData['button_text'] ?? null;
                $service->sort_order = $serviceData['sort_order'] ?? 0;
                $service->is_active = ($serviceData['is_active'] ?? '0') == '1';


                // =====================================================
                // LOGO / ICON
                // =====================================================

                // Ambil file upload dari nested input
                $logoFile = $request->file(
                    "delivery_services.{$index}.logo_file"
                );

                if ($logoFile && $logoFile->isValid()) {

                    // Hapus file lokal lama jika ada
                    if (
                        !empty($service->logo) &&
                        is_string($service->logo) &&
                        str_starts_with($service->logo, 'images/delivery/')
                    ) {
                        Storage::disk('public')->delete($service->logo);
                    }

                    // Simpan file baru
                    $service->logo = $logoFile->store(
                        'images/delivery',
                        'public'
                    );
                } elseif (!empty($serviceData['logo'])) {

                    // Tidak upload file → gunakan URL/path
                    $service->logo = $serviceData['logo'];
                }

                // Kalau URL dan upload sama-sama kosong,
                // logo lama tetap dipertahankan.

                $service->save();
            }


            // =====================================================
            // HERO RESERVASI
            // =====================================================

            $reservationPage = ReservationPage::first();

            if (!$reservationPage) {
                $reservationPage = new ReservationPage();
            }

            $reservationPage->hero_subtitle = $request->input('reservation_hero_subtitle');
            $reservationPage->hero_title_line1 = $request->input('reservation_hero_title_line1');
            $reservationPage->hero_title_line2 = $request->input('reservation_hero_title_line2');
            $reservationPage->hero_title_line3 = $request->input('reservation_hero_title_line3');
            $reservationPage->hero_description = $request->input('reservation_hero_description');

            // Simpan foto Hero Reservasi
            $heroImageFile = $request->file('reservation_hero_image_file');

            if ($heroImageFile && $heroImageFile->isValid()) {

                // Simpan foto baru
                $newHeroImage = $heroImageFile->store('images/reservation', 'public');

                // Hapus foto lama jika tersimpan di folder reservation
                if (
                    !empty($reservationPage->hero_image) &&
                    str_starts_with($reservationPage->hero_image, 'images/reservation/')
                ) {
                    Storage::disk('public')->delete($reservationPage->hero_image);
                }

                // Simpan path foto baru ke database
                $reservationPage->hero_image = $newHeroImage;
            }

            $reservationPage->services_title = $request->input('services_title');
            $reservationPage->services_description = $request->input('services_description');

            $reservationPage->contact_title = $request->input('contact_title');
            $reservationPage->contact_description = $request->input('contact_description');

            $reservationPage->save();

            /*
        |--------------------------------------------------------------------------
        | DEFAULT DELIVERY
        |--------------------------------------------------------------------------
        */

            $content['delivery_title'] =
                $content['delivery_title']
                ?? ($existingContent['delivery_title'] ?? 'Pesan Delivery');

            $content['delivery_description'] =
                $content['delivery_description']
                ?? ($existingContent['delivery_description']
                    ?? 'Nikmati hidangan Joss Gandos dari rumah melalui layanan delivery favorit Anda.');

            $content['delivery_gofood_title'] =
                $content['delivery_gofood_title']
                ?? ($existingContent['delivery_gofood_title'] ?? 'GoFood');

            $content['delivery_gofood_description'] =
                $content['delivery_gofood_description']
                ?? ($existingContent['delivery_gofood_description']
                    ?? 'Pesan melalui aplikasi GoFood untuk pengiriman cepat dan mudah');

            $content['delivery_gofood'] =
                $content['delivery_gofood']
                ?? ($existingContent['delivery_gofood'] ?? '#');


            $content['delivery_grabfood_title'] =
                $content['delivery_grabfood_title']
                ?? ($existingContent['delivery_grabfood_title'] ?? 'GrabFood');

            $content['delivery_grabfood_description'] =
                $content['delivery_grabfood_description']
                ?? ($existingContent['delivery_grabfood_description']
                    ?? 'Pesan melalui aplikasi GrabFood dengan berbagai pilihan menu lengkap');

            $content['delivery_grabfood'] =
                $content['delivery_grabfood']
                ?? ($existingContent['delivery_grabfood'] ?? '#');


            $content['delivery_whatsapp_title'] =
                $content['delivery_whatsapp_title']
                ?? ($existingContent['delivery_whatsapp_title'] ?? 'WhatsApp');

            $content['delivery_whatsapp_description'] =
                $content['delivery_whatsapp_description']
                ?? ($existingContent['delivery_whatsapp_description']
                    ?? 'Pesan langsung via WhatsApp untuk konsultasi menu khusus');


            /*
|--------------------------------------------------------------------------
| MEDIA SOSIAL
|--------------------------------------------------------------------------
| Data media sosial disimpan di reservation_socials.
|--------------------------------------------------------------------------
*/


            /*
        |--------------------------------------------------------------------------
        | SIMPAN KE DATABASE
        |--------------------------------------------------------------------------
        |
        | PENTING:
        | HARUS "contact", BUKAN "home".
        |
        */

            Page::updateOrCreate(
                ['slug' => 'contact'],
                [
                    'title' => $request->filled('title')
                        ? $request->input('title')
                        : ($page?->title ?? 'Hubungi Kami'),

                    'meta_title' => $request->filled('meta_title')
                        ? $request->input('meta_title')
                        : ($page?->meta_title ?? null),

                    'meta_description' => $request->filled('meta_description')
                        ? $request->input('meta_description')
                        : ($page?->meta_description ?? null),

                    'content' => $content,
                ]
            );


            /*
        |--------------------------------------------------------------------------
        | BERHASIL
        |--------------------------------------------------------------------------
        */

            return redirect()
                ->route('admin.pages.contact.edit')
                ->with('success', 'Halaman contact berhasil diperbarui!');
        } catch (\Exception $e) {

            Log::error('Error updating contact page: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
