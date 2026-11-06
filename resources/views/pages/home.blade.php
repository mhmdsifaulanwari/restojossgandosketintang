@extends('layouts.app')

@section('title', $page->meta_title ?? 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Ketintang')

@section('meta_description',
    $page->meta_description ??
    'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan
    suasana nyaman')

@section('content')
    @php
        // DEFAULT CONTENT - DIPINDAHKAN KE ATAS AGAR VARIABLE $content TERSEDIA
        $defaultContent = [
            // Hero Section
            'hero_title_line1' => 'Nikmati Kelezatan',
            'hero_title_line2' => 'Hidangan Spesial',
            'hero_title_line3' => 'di Joss Gandos',
            'hero_description' =>
                'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.',
            'hero_button_menu' => 'Lihat Menu',
            'hero_button_reservation' => 'Pesan Meja',
            'hero_image_url' =>
                'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw',
            'hero_premium_badge' => '#1 RESTO & CAFE KETINTANG',

            // Welcome Section
            'welcome_title_line1' => 'Selamat Datang',
            'welcome_title_line2' => 'Resto Joss Gandos',
            'welcome_description' =>
                'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.',
            'welcome_image_url' =>
                'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',

            'feature_1_text' => 'Bahan premium pilihan terbaik',
            'feature_2_text' => 'Chef berpengalaman & profesional',
            'feature_3_text' => 'Suasana nyaman untuk keluarga',
            'feature_4_text' => 'Pelayanan ramah & cepat',

            'services_title_line1' => 'Fasilitas &',
            'services_title_line2' => 'Pelayanan Premium',
            'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',

            // Services Details
            'service_1_icon' => 'fas fa-utensils',
            'service_1_title' => 'Dine In',
            'service_1_description' => 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan',

            'service_2_icon' => 'fas fa-users',
            'service_2_title' => 'Private Room',
            'service_2_description' =>
                'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke',

            'service_3_icon' => 'fas fa-calendar-alt',
            'service_3_title' => 'Event & Catering',
            'service_3_description' => 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda',

            'service_4_icon' => 'fas fa-wifi',
            'service_4_title' => 'Free WiFi',
            'service_4_description' => 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda',

            'service_5_icon' => 'fas fa-mosque',
            'service_5_title' => 'Musholla',
            'service_5_description' => 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang',

            'service_6_icon' => 'fas fa-parking',
            'service_6_title' => 'Parkir Luas',
            'service_6_description' => 'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda',

            // Testimonials Section
            'testimonials_title_line1' => 'Apa Kata',
            'testimonials_title_line2' => 'Pelanggan Kami?',
            'testimonials_subtitle' => 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',

            // Testimoni 1
            'testimonial_1_name' => 'Achmad Thoriq',
            'testimonial_1_text' =>
                'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!',
            'testimonial_1_source' => 'Google Reviews',
            'testimonial_1_rating' => 5,

            // Testimoni 2
            'testimonial_2_name' => 'Perpus Uinsa',
            'testimonial_2_text' =>
                'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.',
            'testimonial_2_source' => 'Google Reviews',
            'testimonial_2_rating' => 5,

            // Testimoni 3
            'testimonial_3_name' => 'Karenina Anisya',
            'testimonial_3_text' =>
                'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.',
            'testimonial_3_source' => 'Google Reviews',
            'testimonial_3_rating' => 5,

            // Testimoni 4
            'testimonial_4_name' => 'Filidyo Bramanta',
            'testimonial_4_text' =>
                'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.',
            'testimonial_4_source' => 'Google Reviews',
            'testimonial_4_rating' => 5,

            // Testimoni 5
            'testimonial_5_name' => 'M. Junianto Tri',
            'testimonial_5_text' =>
                'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.',
            'testimonial_5_source' => 'Google Reviews',
            'testimonial_5_rating' => 5,

            // Testimoni 6
            'testimonial_6_name' => 'Metha Prosper',
            'testimonial_6_text' =>
                'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul',
            'testimonial_6_source' => 'Google Reviews',
            'testimonial_6_rating' => 5,

            // Testimoni 7 (BARU)
            'testimonial_7_name' => 'Budi Santoso',
            'testimonial_7_text' =>
                'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!',
            'testimonial_7_source' => 'Google Reviews',
            'testimonial_7_rating' => 5,

            // Testimoni 8 (BARU)
            'testimonial_8_name' => 'Siti Nurhaliza',
            'testimonial_8_text' =>
                'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.',
            'testimonial_8_source' => 'Google Reviews',
            'testimonial_8_rating' => 5,

            // Testimoni 9 (BARU)
            'testimonial_9_name' => 'Rizki Firmansyah',
            'testimonial_9_text' =>
                'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.',
            'testimonial_9_source' => 'Google Reviews',
            'testimonial_9_rating' => 5,

            // CTA Section
            'cta_title_line1' => 'Siap Merasakan',
            'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
            'cta_description' =>
                'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
            'cta_button1_text' => 'Pesan Sekarang',
            'cta_button2_text' => 'Reservasi Sekarang',
        ];

        $content = array_merge($defaultContent, $page->content ?? []);
    @endphp

    @php
        $avatarColors = [
            '#4285F4',
            '#EA4335',
            '#FBBC05',
            '#34A853',
            '#9C27B0',
            '#FF7043',
            '#00897B',
            '#5C6BC0',
            '#D81B60',
            '#795548',
        ];
    @endphp

    <!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP -->


    <section class="elegant-hero">

        <!-- Background -->
        <div class="hero-background">

            @php
                $heroMediaType = $content['hero_media_type'] ?? 'image';
                $heroMediaUrl = $content['hero_image_url'] ?? '';

                // Membuat URL media yang dapat diakses browser.
                $heroMediaSrc = $heroMediaUrl;

                if ($heroMediaUrl !== '' && !preg_match('#^https?://#i', $heroMediaUrl)) {
                    $normalizedPath = ltrim($heroMediaUrl, '/');

                    if (str_starts_with($normalizedPath, 'storage/')) {
                        $heroMediaSrc = asset($normalizedPath);
                    } else {
                        $heroMediaSrc = asset('storage/' . $normalizedPath);
                    }
                }

                // Deteksi ID YouTube.
                preg_match(
                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/)([^&?\/]+)/',
                    $heroMediaUrl,
                    $youtubeMatches,
                );

                $youtubeId = $youtubeMatches[1] ?? null;

                // Deteksi ID TikTok.
                preg_match(
                    '/tiktok\.com\/@[^\/]+\/video\/(\d+)|tiktok\.com\/player\/v1\/(\d+)/',
                    $heroMediaUrl,
                    $tiktokMatches,
                );

                $tiktokId = $tiktokMatches[1] ?? ($tiktokMatches[2] ?? null);

                // Deteksi file video langsung.
                $isDirectVideo = preg_match('/\.(mp4|webm|mov|ogg)(\?.*)?$/i', $heroMediaUrl) === 1;
            @endphp

            {{-- VIDEO YOUTUBE --}}
            @if ($heroMediaType === 'youtube' || ($heroMediaType === 'video' && $youtubeId))

                @if ($youtubeId)
                    <iframe class="hero-bg-video hero-youtube"
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&loop=1&playlist={{ $youtubeId }}&controls=0&rel=0&playsinline=1"
                        title="Hero YouTube" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                @endif

                {{-- VIDEO TIKTOK --}}
            @elseif ($heroMediaType === 'tiktok')
                @if ($tiktokId)
                    <iframe class="hero-bg-video hero-tiktok"
                        src="https://www.tiktok.com/player/v1/{{ $tiktokId }}?autoplay=1&loop=1&muted=1&volume_control=0&controls=0"
                        title="Hero TikTok" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                    </iframe>
                @endif

                {{-- VIDEO LOKAL DARI STORAGE --}}
            @elseif ($heroMediaType === 'video' || $isDirectVideo)
                @if ($heroMediaSrc !== '')
                    <video class="hero-bg-video" autoplay muted loop playsinline preload="auto"
                        aria-label="Video latar Hero">

                        <source src="{{ $heroMediaSrc }}"
                            type="{{ str_ends_with(strtolower(parse_url($heroMediaUrl, PHP_URL_PATH) ?? ''), '.webm') ? 'video/webm' : (str_ends_with(strtolower(parse_url($heroMediaUrl, PHP_URL_PATH) ?? ''), '.mov') ? 'video/quicktime' : 'video/mp4') }}">

                        Browser Anda tidak mendukung pemutaran video.
                    </video>
                @endif

                {{-- GAMBAR --}}
            @else
                @if ($heroMediaSrc !== '')
                    <img src="{{ $heroMediaSrc }}" class="hero-bg-image" alt="Hero">
                @endif

            @endif

        </div>

        <!-- Overlay -->
        <div class="elegant-gradient"></div>
        <div class="gold-particles">
            @for ($i = 1; $i <= 25; $i++)
                <span class="gold-particle"></span>
            @endfor
        </div>

        <!-- Shapes -->
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        <div class="hero-shape shape-3"></div>

        <!-- Firefly -->
        <div class="particle-container">
            @for ($i = 1; $i <= 30; $i++)
                <div class="firefly"></div>
            @endfor
        </div>

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <div class="premium-badge">
                        <span>
                            {{ $content['hero_premium_badge'] ?? 'Resto Terbaik Di Ketintang' }}
                        </span>
                    </div>

                    <h1 class="elegant-heading">

                        <span class="heading-line">
                            {{ $content['hero_title_line1'] }}
                        </span>

                        <span class="heading-line gradient-highlight">
                            {{ $content['hero_title_line2'] }}
                        </span>

                        <span class="heading-line">
                            {{ $content['hero_title_line3'] }}
                        </span>

                    </h1>

                    <p class="elegant-desc">
                        {{ $content['hero_description'] ?? 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.' }}
                    </p>

                    <div class="elegant-cta">

                        <a href="{{ route('menu') }}" class="btn-elegant btn-primary-elegant">

                            <span>{{ $content['hero_button_menu'] }}</span>
                            <i class="fas fa-utensils"></i>

                        </a>

                        <a href="{{ url('/reservation') }}?target=delivery-services"
                            class="btn-elegant btn-outline-elegant">

                            <span>{{ $content['hero_button_reservation'] }}</span>
                            <i class="fas fa-calendar-alt"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- HOME BACKGROUND WRAPPER -->
    <div class="home-background-wrapper">

        <!-- Welcome Section -->
        <section class="welcome-content-section" id="welcome">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        @php
                            $welcomeImageUrl = $content['welcome_image_url'] ?? '';
                            $welcomeImageSrc = $welcomeImageUrl;

                            // Jika gambar bukan URL eksternal, gunakan path dari storage Laravel.
                            if ($welcomeImageUrl !== '' && !preg_match('#^https?://#i', $welcomeImageUrl)) {
                                $normalizedWelcomePath = ltrim($welcomeImageUrl, '/');

                                if (str_starts_with($normalizedWelcomePath, 'storage/')) {
                                    $welcomeImageSrc = asset($normalizedWelcomePath);
                                } else {
                                    $welcomeImageSrc = asset('storage/' . $normalizedWelcomePath);
                                }
                            }
                        @endphp

                        <div class="welcome-image-simple">
                            <div class="welcome-image-main-simple">
                                <img src="{{ $welcomeImageSrc }}" alt="Restaurant Interior">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="welcome-content-enhanced">
                            <h2 class="welcome-title-main">
                                {{ $content['welcome_title_line1'] }}<br>
                                <span class="text-gradient">{{ $content['welcome_title_line2'] }}</span>
                            </h2>

                            <p class="welcome-description-main">
                                {{ $content['welcome_description'] }}
                            </p>

                            <div class="welcome-features-enhanced">
                                @if (!empty($content['feature_1_text']))
                                    <div class="feature-item-enhanced">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $content['feature_1_text'] }}</span>
                                    </div>
                                @endif
                                @if (!empty($content['feature_2_text']))
                                    <div class="feature-item-enhanced">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $content['feature_2_text'] }}</span>
                                    </div>
                                @endif
                                @if (!empty($content['feature_3_text']))
                                    <div class="feature-item-enhanced">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $content['feature_3_text'] }}</span>
                                    </div>
                                @endif
                                @if (!empty($content['feature_4_text']))
                                    <div class="feature-item-enhanced">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $content['feature_4_text'] }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services-section-enhanced">
            <div class="container">
                <div class="section-header-enhanced text-center" data-aos="fade-up">
                    <div class="section-tag-enhanced mx-auto">
                        LAYANAN KAMI
                    </div>
                    <h2 class="section-title-enhanced">
                        {{ $content['services_title_line1'] ?? 'Fasilitas &' }}<br>
                        <span class="text-gradient">{{ $content['services_title_line2'] ?? 'Pelayanan Premium' }}</span>
                    </h2>
                    @if (!empty($content['services_subtitle']))
                        <p class="section-subtitle-enhanced">
                            {{ $content['services_subtitle'] }}
                        </p>
                    @endif
                </div>

                <div class="row g-4 mt-4">
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                            $iconDefault =
                                $i == 1
                                    ? 'fas fa-utensils'
                                    : ($i == 2
                                        ? 'fas fa-users'
                                        : ($i == 3
                                            ? 'fas fa-calendar-alt'
                                            : ($i == 4
                                                ? 'fas fa-wifi'
                                                : ($i == 5
                                                    ? 'fas fa-mosque'
                                                    : 'fas fa-parking'))));
                            $titleDefault =
                                $i == 1
                                    ? 'Dine In'
                                    : ($i == 2
                                        ? 'Private Room'
                                        : ($i == 3
                                            ? 'Event & Catering'
                                            : ($i == 4
                                                ? 'Free WiFi'
                                                : ($i == 5
                                                    ? 'Musholla'
                                                    : 'Parkir Luas'))));
                            $descDefault =
                                $i == 1
                                    ? 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan'
                                    : ($i == 2
                                        ? 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke'
                                        : ($i == 3
                                            ? 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda'
                                            : ($i == 4
                                                ? 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda'
                                                : ($i == 5
                                                    ? 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang'
                                                    : 'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda'))));
                        @endphp
                        {{-- kolom untuk perangakat --}}
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up"
                            data-aos-delay="{{ 100 * $i }}">
                            <div class="service-card-enhanced">
                                <div class="service-icon-enhanced">
                                    @php
                                        $serviceIcon = $content['service_' . $i . '_icon'] ?? $iconDefault;
                                    @endphp

                                    @if (str_starts_with($serviceIcon, 'icons/services/'))
                                        <img src="{{ asset('storage/' . $serviceIcon) }}"
                                            alt="{{ $content['service_' . $i . '_title'] ?? $titleDefault }}"
                                            style="width: 50px; height: 50px; object-fit: contain;">
                                    @else
                                        <i class="{{ $serviceIcon }}"></i>
                                    @endif
                                </div>
                                <h3 class="service-title-enhanced">
                                    {{ $content['service_' . $i . '_title'] ?? $titleDefault }}
                                </h3>
                                <p class="service-description-enhanced">
                                    {{ $content['service_' . $i . '_description'] ?? $descDefault }}
                                </p>
                                {{-- <div class="service-hover-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div> --}}
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <!-- Testimonials Section -->
        <section class="testimonials-section-enhanced" id="testimonials">
            <div class="container">

                <div class="section-header-enhanced text-center" data-aos="fade-up">

                    <div class="section-tag-enhanced mx-auto">
                        TESTIMONI
                    </div>

                    <h2 class="section-title-enhanced">
                        {{ $content['testimonials_title_line1'] ?? 'Apa Kata' }}<br>

                        <span class="text-gradient">
                            {{ $content['testimonials_title_line2'] ?? 'Pelanggan Kami?' }}
                        </span>
                    </h2>

                    @if (!empty($content['testimonials_subtitle']))
                        <p class="section-subtitle-enhanced">
                            {{ $content['testimonials_subtitle'] }}
                        </p>
                    @endif

                </div>


                @php
                    /*
    |--------------------------------------------------------------------------
    | AMBIL TESTIMONI DARI DATABASE
    |--------------------------------------------------------------------------
    */

                    $testimonialSlides = $testimonials->chunk(2);
                @endphp


                @if ($testimonials->count() > 0)

                    <div class="testimonials-carousel-wrapper" data-aos="fade-up" data-aos-delay="200">

                        <div class="testimonials-carousel-container" id="testimonialsCarousel">


                            {{-- =====================================================
                        BUAT SLIDE SECARA OTOMATIS
                    ====================================================== --}}

                            @foreach ($testimonialSlides as $slideIndex => $slideTestimonials)
                                <div class="testimonials-slide {{ $slideIndex === 0 ? 'active' : '' }}">

                                    <div class="row g-4">

                                        @foreach ($slideTestimonials as $testimonial)
                                            @php
                                                $testimonialName = trim($testimonial->name ?? '');

                                                $testimonialText = $testimonial->review ?? '';

                                                $testimonialSource = $testimonial->source ?? 'Google Reviews';

                                                $testimonialRating = (int) ($testimonial->rating ?? 5);

                                                $avatarInitial = mb_strtoupper(
                                                    mb_substr($testimonialName ?: 'P', 0, 1),
                                                );

                                                $avatarColor = $avatarColors[array_rand($avatarColors)];
                                            @endphp


                                            <div class="col-6">

                                                <div class="testimonial-card-enhanced">


                                                    {{-- Rating --}}
                                                    <div class="testimonial-rating-enhanced">

                                                        @for ($r = 1; $r <= 5; $r++)
                                                            @if ($r <= $testimonialRating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor

                                                    </div>


                                                    {{-- Isi Testimoni --}}
                                                    <p class="testimonial-text-enhanced">
                                                        "{{ $testimonialText }}"
                                                    </p>


                                                    {{-- Author --}}
                                                    <div class="testimonial-author-enhanced">


                                                        {{-- Avatar --}}
                                                        <div class="author-avatar-enhanced"
                                                            style="
                                                        background-color: {{ $avatarColor }};
                                                        color: #ffffff;
                                                    ">
                                                            {{ $avatarInitial }}
                                                        </div>


                                                        {{-- Informasi --}}
                                                        <div class="author-info-enhanced">

                                                            <h4>
                                                                {{ $testimonialName }}
                                                            </h4>

                                                            <p>
                                                                {{ $testimonialSource }}
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            @endforeach


                            {{-- =====================================================
                        INDIKATOR OTOMATIS
                    ====================================================== --}}

                            <div class="testimonials-indicators">

                                @foreach ($testimonialSlides as $slideIndex => $slideTestimonials)
                                    <span class="testimonial-indicator {{ $slideIndex === 0 ? 'active' : '' }}"
                                        onclick="testimonialsCarouselGoTo({{ $slideIndex }})">
                                    </span>
                                @endforeach

                            </div>


                        </div>

                    </div>

                @endif


                <div class="text-center mt-2" data-aos="fade-up">

                    <a href="https://www.google.com/maps/place/Resto+Joss+Gandos+Ketintang+Surabaya/@-7.3228833,112.7268672,870m/data=!3m1!1e3!4m8!3m7!1s0x2dd7fbbc457099a7:0x532f9878c0a059e8!8m2!3d-7.3228833!4d112.7268672!9m1!1b1!16s%2Fg%2F11w28yg25c?entry=ttu"
                        target="_blank" rel="noopener noreferrer" class="btn-enhanced btn-secondary-enhanced">

                        <svg class="google-logo me-2" viewBox="0 0 24 24" width="20" height="20">

                            <path fill="#4285F4"
                                d="M21.35 12.27c0-.79-.07-1.55-.2-2.27H12v4.3h5.23a4.47 4.47 0 0 1-1.94 2.94v2.45h3.14c1.84-1.69 2.92-4.18 2.92-7.42z" />

                            <path fill="#34A853"
                                d="M12 21.99c2.63 0 4.84-.87 6.45-2.35l-3.14-2.45c-.87.58-1.98.92-3.31.92-2.54 0-4.69-1.72-5.46-4.03H3.3v2.53A9.74 9.74 0 0 0 12 21.99z" />

                            <path fill="#FBBC05"
                                d="M6.54 14.08A5.85 5.85 0 0 1 6.23 12c0-.72.12-1.42.31-2.08V7.39H3.3A9.74 9.74 0 0 0 2.25 12c0 1.57.38 3.05 1.05 4.61l3.24-2.53z" />

                            <path fill="#EA4335"
                                d="M12 5.89c1.43 0 2.72.49 3.73 1.45l2.79-2.79C16.84 2.98 14.63 2 12 2a9.74 9.74 0 0 0-8.7 5.39l3.24 2.53C7.31 7.61 9.46 5.89 12 5.89z" />

                        </svg>

                        <span style="color: #000;">
                            Lihat Semua di Google
                        </span>

                        <i class="fas fa-external-link-alt ms-2" style="color: #000;"></i>

                    </a>

                </div>

            </div>
        </section>

        <!-- Rounded CTA Section -->
        <section class="rounded-cta-section">
            <div class="container">
                <div class="rounded-cta-card" data-aos="fade-up">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-8">
                            <div class="rounded-cta-content">
                                <h3 class="rounded-cta-title">
                                    {{ $content['cta_title_line1'] }}<br>
                                    <span class="text-gradient">{{ $content['cta_title_line2'] }}</span>
                                </h3>
                                @if (!empty($content['cta_description']))
                                    <p class="rounded-cta-description">
                                        {{ $content['cta_description'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rounded-cta-buttons">

                                <a href="{{ url('/reservation') }}?target=delivery-services"
                                    class="btn-rounded-cta btn-rounded-cta-primary">

                                    <i class="fas fa-shopping-bag"></i>
                                    <span>{{ $content['cta_button1_text'] ?? 'Pesan Sekarang' }}</span>

                                </a>

                                <a href="{{ url('/reservation') }}" class="btn-rounded-cta btn-rounded-cta-secondary">

                                    <i class="fas fa-calendar-check"></i>
                                    <span>{{ $content['cta_button2_text'] ?? 'Reservasi Sekarang' }}</span>

                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- HOME PROMOTION POPUP --}}
    @if ($homePopupPromotion)
        <div id="homePromoPopup" class="home-promo-popup">
            <div class="home-promo-overlay"></div>

            <div class="home-promo-modal">

                <button type="button" class="home-promo-close" id="homePromoClose" aria-label="Tutup popup">
                    <i class="fas fa-times"></i>
                </button>

                <div class="home-promo-image">
                    <img src="{{ $homePopupPromotion->image_url }}" alt="{{ $homePopupPromotion->title }}">
                </div>

                <div class="home-promo-content">


                    <h2>
                        {{ $homePopupPromotion->title }}
                    </h2>

                    @if ($homePopupPromotion->description)
                        <p>
                            {{ $homePopupPromotion->description }}
                        </p>
                    @endif

                    <div class="home-promo-price">

                        @if ($homePopupPromotion->old_price)
                            <span class="home-promo-old-price">
                                Rp {{ number_format($homePopupPromotion->old_price, 0, ',', '.') }}
                            </span>
                        @endif

                        <span class="home-promo-current-price">
                            Rp {{ number_format($homePopupPromotion->current_price, 0, ',', '.') }}
                        </span>

                    </div>

                    <a href="{{ route('menu') }}" class="home-promo-button">
                        Lihat Menu
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    @endif

@endsection

@section('styles')
    <style>
        /* CSS VARIABLES*/
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --secondary: #f97316;
            --accent: #fbbf24;
            --accent-gold: #FFD700;
            --accent-light: #FFE55C;
            --dark: #1a1a1a;
            --light: #f8fafc;
            --white: #ffffff;
            --text-dark: #1e293b;
            --text-gray: #64748b;
            --border: #e2e8f0;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.15);
            --gradient-primary: linear-gradient(135deg, #dc2626 0%, #f97316 100%);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HOME PROMOTION POPUP
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================== */

        .home-promo-popup {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .home-promo-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.68);
            backdrop-filter: blur(6px);
            animation: homePromoOverlayIn 0.55s ease-out both;
        }

        .home-promo-modal {
            position: relative;
            z-index: 2;
            width: min(920px, 100%);
            max-height: 90vh;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            overflow: hidden;
            background: #ffffff;
            border-radius: 50px;
            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.30),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            animation: homePromoPopupIn 0.65s cubic-bezier(.16, 1, .3, 1) both;
        }

        .home-promo-modal::before {
            content: "";
            position: absolute;
            top: 0;
            left: -130%;
            width: 45%;
            height: 100%;
            transform: skewX(-25deg);
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.45),
                    transparent);
            animation: buttonShine 5s infinite;
            z-index: 4;
            pointer-events: none;
        }

        .home-promo-image {
            min-height: 420px;
            background: #f4f4f4;
            overflow: hidden;
        }

        .home-promo-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .home-promo-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 44px;
        }

        .home-promo-badge {
            display: inline-flex;
            align-self: flex-start;
            align-items: center;
            padding: 8px 16px;
            margin-bottom: 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, #dc2626, #f97316);
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .home-promo-content h2 {
            margin: 0 0 16px;
            color: #1e293b;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.05;
            font-weight: 900;
        }

        .home-promo-content p {
            margin: 0 0 24px;
            color: #64748b;
            font-size: 1rem;
            line-height: 1.7;
        }

        .home-promo-price {
            display: flex;
            align-items: baseline;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .home-promo-old-price {
            color: #94a3b8;
            font-size: 1rem;
            text-decoration: line-through;
        }

        .home-promo-current-price {
            color: #dc2626;
            font-size: 1.85rem;
            font-weight: 900;
        }

        .home-promo-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            align-self: flex-start;
            gap: 10px;
            min-height: 50px;
            padding: 13px 24px;
            border-radius: 999px;
            background: linear-gradient(135deg, #dc2626, #f97316);
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 12px 28px rgba(220, 38, 38, 0.24);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .home-promo-button:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 16px 34px rgba(220, 38, 38, 0.32);
        }

        .home-promo-close {
            position: absolute;
            top: 16px;
            right: 16px;
            z-index: 5;
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            color: #1e293b;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.16);
            transition: transform 0.25s ease, background 0.25s ease;
        }


        @keyframes homePromoPopupIn {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes homePromoOverlayIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* MOBILE */
        /* ==========================================
                                                                                                                                                                                                                                                       HOME PROMOTION POPUP - MOBILE
                                                                                                                                                                                                                                                       POSTER ONLY
                                                                                                                                                                                                                                                       ========================================== */

        @media (max-width: 767.98px) {

            /* POPUP */
            .home-promo-popup {
                padding: 12px;
            }

            /* MODAL HANYA BERISI POSTER */
            .home-promo-modal {
                position: relative;

                width: min(92vw, 380px);
                max-width: 380px;

                max-height: calc(100vh - 24px);

                display: block;

                overflow: hidden;

                background: transparent;

                border-radius: 20px;

                box-shadow:
                    0 25px 60px rgba(0, 0, 0, 0.35),
                    0 0 0 1px rgba(255, 255, 255, 0.15);

                animation: homePromoPopupIn 0.65s cubic-bezier(.16, 1, .3, 1) both;
            }

            /* POSTER */
            .home-promo-image {
                width: 100%;

                min-height: 0;
                max-height: none;

                background: transparent;

                overflow: hidden;

                border-radius: 20px;
            }

            /* GAMBAR POSTER TAMPIL UTUH */
            .home-promo-image img {
                display: block;

                width: 100%;
                height: auto;

                max-width: 100%;
                max-height: calc(100vh - 24px);

                object-fit: contain;

                margin: 0 auto;
            }

            /* SEMUA TEKS / HARGA / BUTTON DISEMBUNYIKAN */
            .home-promo-content {
                display: none !important;
            }

            /* TOMBOL X */
            .home-promo-close {
                top: 10px;
                right: 10px;

                width: 34px;
                height: 34px;

                display: inline-flex;

                align-items: center;
                justify-content: center;

                padding: 0;

                border: 1px solid rgba(255, 255, 255, 0.45);
                border-radius: 50%;

                background: rgba(255, 255, 255, 0.45);

                color: rgba(30, 41, 59, 0.85);

                font-size: 0.95rem;
                font-weight: 900;

                backdrop-filter: blur(4px);

                box-shadow:
                    0 4px 12px rgba(0, 0, 0, 0.12);

                z-index: 10;

                transition:
                    background 0.25s ease,
                    transform 0.25s ease;
            }

            .home-promo-close:hover {
                background: rgba(255, 255, 255, 0.65);
                transform: scale(1.05);
            }
        }

        /* ELEGANT RED GRADIENT HERO */
        .elegant-hero {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            margin-top: -70px;
            padding: 120px 0 80px;
        }

        .elegant-gradient {
            position: absolute;
            inset: 0;

            z-index: 1;

            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.65) 0%,
                    rgba(0, 0, 0, 0.35) 30%,
                    rgba(0, 0, 0, 0.12) 55%,
                    rgba(0, 0, 0, 0) 75%);

            pointer-events: none;
        }

        /*HERO BACKGROUND IMAGE*/
        .hero-background {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;

            background: #000000;
        }

        .hero-bg-image {

            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;

            transform: scale(1.22);

            animation: heroZoomOut 5s cubic-bezier(.19, 1, .22, 1) forwards;

            will-change: transform;
        }

        .hero-bg-video {
            position: absolute;
            top: 50%;
            left: 50%;

            width: 100%;
            height: 100%;

            transform: translate(-50%, -50%);

            object-fit: cover;
            pointer-events: none;
            z-index: 0;
            opacity: 1;
            background: #111111;
        }

        .hero-youtube {
            position: absolute;
            border: 0;

            width: max(100vw, 177.78vh);
            height: max(100vh, 56.25vw);

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%) scale(1.12);

            z-index: 0;
            pointer-events: none;
        }

        .hero-tiktok {
            position: absolute;
            border: 0;

            width: max(100vw, 56.25vh);
            height: max(100vh, 177.78vw);

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%) scale(1.30);

            z-index: 0;
            pointer-events: none;
        }



        /* HERO HOME MOBILE */
        @media (max-width: 768px) {

            .elegant-hero .container {
                width: 100%;
                max-width: 100%;
                padding-left: 16px;
                padding-right: 16px;
            }

            .elegant-hero .col-lg-7 {
                width: 100%;
            }

            /* Badge */
            .premium-badge {
                margin-bottom: 12px;
                padding: 8px 16px;
                font-size: 0.75rem;
            }

            .premium-badge span {
                font-size: 0.75rem;
                letter-spacing: 1px;
            }

            /* Judul */
            .elegant-heading {
                margin-bottom: 45px !important;

            }

            .heading-line {
                font-size: clamp(1.85rem, 7.5vw, 2.5rem);
                line-height: 1.02;
                margin-bottom: 0;
            }

            .gradient-highlight {
                top: 2px;
            }


            /* Deskripsi */
            .elegant-desc {
                width: 100%;
                max-width: 100%;
                margin: 55px auto 24px !important;
                font-size: 0.82rem;
                line-height: 1.6;
            }

            /* Tombol */
            .elegant-hero .elegant-cta {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 8px;
                width: 100%;
                flex-wrap: nowrap;
            }

            .elegant-hero .btn-elegant {
                display: inline-flex;
                flex: 1 1 0;
                width: auto;
                max-width: 145px;
                min-height: 42px;
                margin: 0;
                padding: 10px 8px;
                font-size: 0.78rem;
                line-height: 1.2;
                white-space: nowrap;
                justify-content: center;
                align-items: center;
            }
        }

        @keyframes heroZoomOut {

            from {

                transform: scale(1.22);

            }

            to {

                transform: scale(1);

            }

        }

        .hero-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 2;
        }

        .shape-1 {
            width: 600px;
            height: 600px;
            background: rgba(205, 92, 92, 0.15);
            top: -200px;
            right: -100px;
            animation: shapeFloat 20s ease-in-out infinite;
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: rgba(244, 164, 96, 0.1);
            bottom: -100px;
            left: -50px;
            animation: shapeFloat 25s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 300px;
            height: 300px;
            background: rgba(255, 215, 0, 0.08);
            top: 50%;
            left: 20%;
            filter: blur(100px);
            animation: shapeFloat 18s ease-in-out infinite;
        }

        @keyframes shapeFloat {

            0% {
                transform: translate(0, 0) scale(.8);
            }

            20% {
                transform: translate(25px, -35px) scale(1);
            }

            40% {
                transform: translate(-20px, -70px) scale(.9);
            }

            60% {
                transform: translate(30px, -120px) scale(1.1);
            }

            80% {
                transform: translate(-15px, -170px) scale(.85);
            }

            100% {
                transform: translate(20px, -240px) scale(.8);
            }

            /* 0%, 100% { transform: translate(0, 0) scale(1); } 3% { transform: translate(30px, -30px) scale(1.1); } 66% { transform: translate(-20px, 20px) scale(0.95); } */
        }

        .particle-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 2;
        }

        .firefly {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;

            background: #FFD84D;

            box-shadow:
                0 0 6px rgba(255, 216, 77, .9),
                0 0 12px rgba(255, 216, 77, .8),
                0 0 20px rgba(255, 216, 77, .6),
                0 0 35px rgba(255, 216, 77, .4);

            opacity: .8;

            animation:
                particleFloat 18s linear infinite,
                fireflyBlink 2.5s ease-in-out infinite;

            /* position: absolute;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    width: 4px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    height: 4px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    background: rgba(255, 215, 0, 0.3);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    border-radius: 50%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    animation: particleFloat 15s infinite linear; */
        }

        .firefly:nth-child(3n) {
            width: 4px;
            height: 4px;
        }

        .firefly:nth-child(4n) {
            width: 7px;
            height: 7px;
        }

        .firefly:nth-child(5n) {
            animation-duration: 22s, 3.5s;
        }

        .firefly:nth-child(2n) {
            animation-duration: 15s, 2s;
        }

        @keyframes fireflyBlink {

            0%,
            100% {
                opacity: .25;
            }

            20% {
                opacity: 1;
            }

            40% {
                opacity: .45;
            }

            60% {
                opacity: 1;
            }

            80% {
                opacity: .6;
            }

        }

        .particle:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-duration: 12s;
        }

        .particle:nth-child(2) {
            top: 70%;
            left: 20%;
            animation-duration: 18s;
            background: rgba(255, 255, 255, 0.4);
        }

        .particle:nth-child(3) {
            top: 30%;
            left: 80%;
            animation-duration: 20s;
            width: 6px;
            height: 6px;
        }

        .particle:nth-child(4) {
            top: 80%;
            left: 40%;
            animation-duration: 14s;
        }

        .particle:nth-child(5) {
            top: 40%;
            left: 90%;
            animation-duration: 22s;
            width: 5px;
            height: 5px;
        }

        .particle:nth-child(6) {
            top: 50%;
            left: 50%;
            animation-duration: 16s;
            width: 8px;
            height: 8px;
        }

        .particle:nth-child(7) {
            top: 15%;
            left: 60%;
            animation-duration: 24s;
        }

        .particle:nth-child(8) {
            top: 85%;
            left: 75%;
            animation-duration: 19s;
        }

        .particle:nth-child(9) {
            top: 45%;
            left: 25%;
            animation-duration: 21s;
        }

        .particle:nth-child(10) {
            top: 10%;
            left: 40%;
            animation-duration: 17s;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 0.5;
            }

            90% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-100vh) translateX(20px);
                opacity: 0;
            }
        }

        .container {
            position: relative;
            z-index: 10;
        }

        .reveal-text {
            animation: revealText 1.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes revealText {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .premium-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 10px 24px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 100px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            background: var(--accent-light);
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        .premium-badge span {
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-shadow:
                0 3px 4px rgba(0, 0, 0, .75),
                0 8px 18px rgba(0, 0, 0, .55),
                0 15px 35px rgba(0, 0, 0, .35);
        }

        .elegant-heading {
            margin-bottom: 20px;
        }

        .heading-line {
            display: block;
            font-size: clamp(2.6rem, 3.6vw, 3.6rem);
            font-weight: 700;


            line-height: 1.2;
            margin-bottom: 0;
            /* mendekatkan antar baris */

            color: #fff;

            filter:
                drop-shadow(0 3px 4px rgba(0, 0, 0, .75)) drop-shadow(0 8px 18px rgba(0, 0, 0, .55)) drop-shadow(0 15px 35px rgba(0, 0, 0, .35));
        }

        .gradient-highlight {
            background: linear-gradient(135deg,
                    #dc2626 0%,
                    #f97316 50%,
                    #fbbf24 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            display: inline-block;

            position: relative;
            top: 0;

            filter:
                drop-shadow(0 3px 4px rgba(0, 0, 0, .75)) drop-shadow(0 8px 18px rgba(0, 0, 0, .55)) drop-shadow(0 15px 35px rgba(0, 0, 0, .35));
        }

        .elegant-desc {
            font-size: 0.95rem;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.9);
            width: 100%;
            max-width: 650px;
            margin-bottom: 26px;
            font-weight: 400;
            letter-spacing: 0.2px;

            text-shadow:
                0 5px 15px rgba(0, 0, 0, .85),
                0 12px 35px rgba(0, 0, 0, .70),
                0 25px 60px rgba(0, 0, 0, .55);
        }

        .elegant-cta {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .btn-elegant {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 30px;
            font-size: 0.95rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
            overflow: hidden;
            border: none;
        }



        .btn-primary-elegant span,
        .btn-primary-elegant i {
            color: #fff;
        }



        .btn-primary-elegant:hover span,
        .btn-primary-elegant:hover i {
            color: #fff;
        }



        .btn-primary-elegant:hover {
            background: #fff5f5;
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            color: var(--primary-dark);
        }

        .btn-primary-elegant i {
            transition: transform 0.3s ease;
        }

        .btn-primary-elegant:hover i {
            transform: translateX(8px);
        }

        .btn-outline-elegant {

            background: transparent;

            color: #fff;

            border: 2px solid rgba(255, 255, 255, .5);

            backdrop-filter: blur(6px);

            position: relative;

            overflow: hidden;

        }

        .btn-outline-elegant::before {

            content: "";

            position: absolute;

            top: 0;

            left: -130%;

            width: 45%;

            height: 100%;

            transform: skewX(-25deg);

            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, .45),
                    transparent);

            animation: buttonShine 5s infinite;

        }

        .btn-outline-elegant:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.8);
            transform: translateY(-3px);
        }

        .elegant-hero .container {
            position: relative;
            z-index: 5;
        }

        .hero-content {
            max-width: 650px;
        }

        .premium-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 24px;
            border-radius: 40px;
            background: rgba(255, 255, 255, .12);
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: 600;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #FFD700;
        }

        .elegant-heading {
            color: #fff;
            margin-bottom: 25px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            letter-spacing: -1.5px;
            width: 175%;
        }



        .elegant-desc {
            width: 100%;
            max-width: 650px;
            font-size: 1rem;
            line-height: 1.65;
            color: rgba(255, 255, 255, .92);
            margin: 0 0 26px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }

        .elegant-cta {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        /* codebaru */
        .btn-primary-elegant {

            background: var(--gradient-primary);
            color: #fff;
            border: none;

            box-shadow:
                0 12px 30px rgba(220, 38, 38, .35),
                inset 0 1px 0 rgba(255, 255, 255, .18);

            position: relative;
            overflow: hidden;
        }

        .btn-primary-elegant span,
        .btn-primary-elegant i {
            color: #fff;
        }

        .btn-primary-elegant:hover {

            background: var(--gradient-primary);

            filter: brightness(1.08);

            transform: translateY(-3px);

            box-shadow:
                0 18px 40px rgba(220, 38, 38, .45),
                inset 0 1px 0 rgba(255, 255, 255, .22);
        }

        .btn-primary-elegant:hover span,
        .btn-primary-elegant:hover i {
            color: #fff;
        }

        .btn-primary-elegant:hover span,
        .btn-primary-elegant:hover i {
            color: #fff;
        }

        .btn-primary-elegant::before {

            content: "";

            position: absolute;

            top: 0;

            left: -130%;

            width: 45%;

            height: 100%;

            transform: skewX(-25deg);

            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, .8),
                    transparent);

            animation: buttonShine 5s infinite;

        }

        .btn-outline-elegant {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-outline-elegant:hover {
            background: white;
            color: #8B0000;
        }

        @keyframes buttonShine {

            0% {

                left: -130%;

            }

            18% {

                left: 150%;

            }

            100% {

                left: 150%;

            }

        }



        @media (min-width:992px) and (max-width:1440px) {

            .elegant-hero {
                padding-top: 120px;
                padding-bottom: 60px;
            }

            .heading-line {
                font-size: clamp(2.8rem, 3.8vw, 4rem);
            }

            .elegant-desc {
                font-size: 1.05rem;
                max-width: 560px;
            }

            .elegant-cta {
                margin-top: 28px;
            }

        }


        .image-premium-label {
            position: absolute;
            bottom: 30px;
            left: 30px;
            background: rgba(255, 215, 0, 0.9);
            color: var(--primary-dark);
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 3px;
            font-size: 0.9rem;
            z-index: 7;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HOME BACKGROUND PANJANG
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       WELCOME -> SERVICES -> TESTIMONIALS -> CTA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================================== */

        .home-background-wrapper {
            position: relative;
            background-image: url("{{ asset('images/home-background.png') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        .home-background-wrapper::before {
            display: none;
        }

        .home-background-wrapper>section {
            position: relative;
            z-index: 1;
        }

        /* WELCOME SECTION */
        .welcome-content-section {
            padding: 120px 0;
            background: transparent;
            position: relative;
            overflow: hidden;
        }


        .welcome-image-simple {
            position: relative;
        }

        .welcome-image-main-simple {
            border-radius: 50px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .welcome-image-main-simple img {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            height: auto;
            object-fit: cover;
            border-radius: 0;
            transition: var(--transition);
        }

        .welcome-image-main-simple:hover img {
            transform: scale(1.10);
        }

        .welcome-content-enhanced {
            position: relative;
            z-index: 2;
            padding-left: 20px;
        }

        .welcome-title-main {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.3rem, 4vw, 3.4rem);
            font-weight: 800;
            background: linear-gradient(135deg,
                    #111827 0%,
                    #374151 50%,
                    #6b7280 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            line-height: 1.1;
            margin-bottom: 20px;
        }

        .text-gradient {
            background: linear-gradient(135deg, #ff6b30 0%, #f97316 50%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-divider-enhanced {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .section-divider-enhanced span {
            flex: 1;
            max-width: 60px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .section-divider-enhanced i {
            color: var(--accent);
            font-size: 1.2rem;
        }

        .welcome-description-main {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--text-gray);
            margin-bottom: 28px;
            width: 100%;
            max-width: 600px;
        }

        .welcome-features-enhanced {
            display: grid;
            gap: 15px;
            margin-bottom: 35px;
        }

        .feature-item-enhanced {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1rem;
            line-height: 1.5;
            color: var(--text-gray);
        }

        .feature-item-enhanced i {
            color: var(--primary);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .welcome-action-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .btn-enhanced {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: var(--transition);
        }

        .btn-primary-enhanced {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
        }

        .btn-primary-enhanced:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
            color: var(--white);
        }

        .btn-secondary-enhanced {
            border: none !important;
            outline: none;

            background: #ffffff;
            color: #000000;

            transition:
                background 0.5s cubic-bezier(0.22, 1, 0.36, 1),
                color 0.5s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.5s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }

        /* Teks dan icon external link */
        .btn-secondary-enhanced span,
        .btn-secondary-enhanced>i {
            color: #000000;
            transition: color 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }

        /* Logo Google */
        .btn-secondary-enhanced .google-logo path {
            transition: fill 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }

        /* HOVER */
        .btn-secondary-enhanced:hover {
            background: linear-gradient(135deg,
                    #dc2626 0%,
                    #f97316 100%);

            color: #ffffff !important;
            border: none !important;

            transform: translateY(-3px);

            box-shadow:
                0 12px 30px rgba(220, 38, 38, 0.25);
        }

        .btn-secondary-enhanced:hover span,
        .btn-secondary-enhanced:hover>i {
            color: #ffffff !important;
        }

        /* Google berubah menjadi putih */
        .btn-secondary-enhanced:hover .google-logo path {
            fill: #ffffff !important;
        }


        /* SERVICES SECTION */
        .services-section-enhanced {
            padding: 120px 0;
            background: transparent;
        }

        .section-header-enhanced {
            margin-bottom: 50px;
        }

        .section-tag-enhanced {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 0;
            background: transparent;
            border-radius: 0;
            border: none;
            box-shadow: none;

            color: #dc2626;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .tag-dot {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
        }

        .section-title-enhanced {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.3rem, 4vw, 3.4rem);
            font-weight: 800;
            background: linear-gradient(135deg,
                    #111827 0%,
                    #374151 50%,
                    #6b7280 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .section-subtitle-enhanced {
            font-size: 1rem;
            color: var(--text-gray);
            line-height: 1.7;
            max-width: 600px;
            margin: 0 auto;
        }

        .service-card-enhanced {
            position: relative;
            background: var(--white);
            border-radius: 50px;
            padding: 40px 30px;
            box-shadow: var(--shadow-sm);
            border: 2px solid var(--border);
            transition: var(--transition);
            height: 100%;
            overflow: hidden;
        }

        .service-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .service-card-enhanced:hover::before {
            transform: scaleX(1);
        }

        .service-card-enhanced:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(220, 38, 38, 0.2);
        }

        .service-icon-enhanced {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
            margin-bottom: 25px;
            transition: var(--transition);
        }

        .service-card-enhanced:hover .service-icon-enhanced {
            transform: scale(1.1) rotate(10deg);
        }

        .service-title-enhanced {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .service-description-enhanced {
            font-size: 1rem;
            color: var(--text-gray);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .service-hover-arrow {
            color: var(--primary);
            font-size: 1.2rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: var(--transition);
        }

        .service-card-enhanced:hover .service-hover-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* TESTIMONIALS SECTION */
        .testimonials-section-enhanced {
            padding: 120px 0;
            background: transparent;
        }

        .testimonials-carousel-wrapper {
            position: relative;
            margin-top: 50px;
        }

        .testimonials-carousel-container {
            position: relative;
            overflow: hidden;
            min-height: 400px;
        }

        .testimonials-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            visibility: hidden;

            transform: translateX(100%);
            transition:
                transform 0.65s cubic-bezier(0.65, 0, 0.35, 1),
                opacity 0.45s ease,
                visibility 0s linear 0.65s;
        }

        .testimonials-slide.active {
            position: relative;
            opacity: 1;
            visibility: visible;

            transform: translateX(0);

            transition:
                transform 0.65s cubic-bezier(0.65, 0, 0.35, 1),
                opacity 0.45s ease;
        }

        /* Slide lama bergerak ke kiri */
        .testimonials-slide.slide-out-left {
            position: absolute;
            opacity: 0;
            visibility: visible;
            transform: translateX(-100%);

            transition:
                transform 0.65s cubic-bezier(0.65, 0, 0.35, 1),
                opacity 0.45s ease;
        }

        /* Slide baru masuk dari kanan */
        .testimonials-slide.slide-in-right {
            position: absolute;
            opacity: 0;
            visibility: visible;
            transform: translateX(100%);
        }

        .testimonial-card-enhanced {
            background: var(--white);
            border-radius: 50px;
            padding: 35px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(220, 38, 38, 0.08);
            transition: var(--transition);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .testimonial-card-enhanced::before {
            content: '"';
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 100px;
            font-family: 'Playfair Display', serif;
            color: rgba(220, 38, 38, 0.05);
            line-height: 1;
        }

        .testimonial-rating-enhanced {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
        }

        .testimonial-rating-enhanced i {
            color: #fbbf24;
            font-size: 1.2rem;
        }

        .testimonial-text-enhanced {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--text-gray);
            margin-bottom: 25px;
            font-style: italic;
        }

        .testimonial-author-enhanced {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-top: 20px;
            border-top: 2px solid var(--border);
        }

        .author-avatar-enhanced {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .author-info-enhanced h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .author-info-enhanced p {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 600;
            margin: 0;
        }

        .testimonials-indicators {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 40px;
        }

        .testimonial-indicator {
            width: 12px;
            height: 12px;
            background: rgba(220, 38, 38, 0.2);
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
        }

        .testimonial-indicator.active {
            background: var(--primary);
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(220, 38, 38, 0.3);
        }

        /* google logo */
        .google-logo {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* CTA SECTION */
        .rounded-cta-section {
            padding: 80px 0;
            background: transparent;
        }

        .rounded-cta-card {
            background: linear-gradient(135deg,
                    #B22222 0%,
                    #8B0000 50%,
                    #D94A1E 100%);

            border-radius: 70px;
            padding: 50px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(178, 34, 34, 0.18);
            position: relative;
        }

        .rounded-cta-title {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 15px;
            max-width: 100%;
        }

        .rounded-cta-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #ffffff;
            margin-bottom: 0;
            max-width: 100%;
        }

        .rounded-cta-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn-rounded-cta {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: var(--transition);
            justify-content: center;
            border: 2px solid transparent;
        }

        .btn-rounded-cta-primary {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: 0 8px 30px rgba(220, 38, 38, 0.3);
        }

        .btn-rounded-cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(220, 38, 38, 0.5);
            color: var(--white);
        }

        .btn-rounded-cta-secondary {
            background: var(--white);
            color: var(--primary);
            border: none;
        }

        .btn-rounded-cta-secondary:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* ===================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO RESPONSIVE (NEW VERSION)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            =================================================== */

        @media (max-width:1200px) {

            .heading-line {
                font-size: 3.5rem;
            }

            .elegant-desc {
                font-size: 1.05rem;
                max-width: 560px;
            }

        }

        @media (max-width:992px) {

            .elegant-hero {
                min-height: 100vh;
                height: auto;
                padding: 120px 0 70px;
                text-align: center;
            }

            .row.align-items-center {
                justify-content: center !important;
            }

            .col-lg-7,
            .col-xl-6 {
                width: 100%;
                max-width: 720px;
            }

            .premium-badge {
                margin: 0 auto 20px;
            }

            .premium-badge span {
                font-size: .8rem;
                letter-spacing: 2px;
            }

            .heading-line {
                font-size: 2.8rem;
                line-height: 1.15;
            }

            .elegant-desc {
                font-size: 1rem;
                max-width: 600px;
                margin: 20px auto 35px;
            }

            .elegant-cta {
                justify-content: center;
                gap: 16px;
            }

            .btn-elegant {
                padding: 14px 32px;
                font-size: .95rem;
            }

        }

        @media (max-width:768px) {

            .elegant-hero {
                padding: 105px 0 60px;
            }

            .heading-line {
                font-size: 2.15rem;
                line-height: 1.2;
            }

            .premium-badge {
                padding: 8px 18px;
            }

            .premium-badge span {
                font-size: .75rem;
                letter-spacing: 1.5px;
            }

            .elegant-desc {
                font-size: .93rem;
                line-height: 1.75;
                padding: 0 10px;
                margin: 18px auto 30px;
            }

            .elegant-cta {
                flex-direction: column;
                align-items: center;
                width: 100%;
                gap: 14px;
            }

            .btn-elegant {

                width: 100%;
                max-width: 280px;

                justify-content: center;

                padding: 13px 22px;

                font-size: .9rem;

                min-height: 50px;

            }

        }

        @media (max-width:480px) {

            .elegant-hero {

                padding: 95px 0 50px;

            }

            .heading-line {

                font-size: 1.75rem;

                line-height: 1.25;

            }

            .premium-badge {

                padding: 7px 15px;

            }

            .premium-badge span {

                font-size: .68rem;

                letter-spacing: 1px;

            }

            .elegant-desc {

                font-size: .86rem;

                line-height: 1.7;

                max-width: 100%;

                padding: 0;

            }

            .btn-elegant {

                width: 100%;

                max-width: 240px;

                padding: 12px 20px;

                font-size: .85rem;

                min-height: 48px;

            }

        }



        /* ============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               GOLD FLOATING PARTICLES
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================ */

        .gold-particles {

            position: absolute;

            inset: 0;

            overflow: hidden;

            z-index: 2;

            pointer-events: none;

        }

        .gold-particle {

            position: absolute;

            bottom: -30px;

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background: #FFD84D;

            box-shadow:
                0 0 6px #FFD84D,
                0 0 12px #FFD84D,
                0 0 22px rgba(255, 216, 77, .8);

            animation: goldFloat linear infinite;

            opacity: .85;

        }

        .gold-particle:nth-child(3n) {

            width: 3px;
            height: 3px;

        }

        .gold-particle:nth-child(4n) {

            width: 6px;
            height: 6px;

        }

        .gold-particle:nth-child(5n) {

            width: 7px;
            height: 7px;

        }

        .gold-particle:nth-child(1) {
            left: 5%;
            animation-duration: 10s;
            animation-delay: 0s;
        }

        .gold-particle:nth-child(2) {
            left: 12%;
            animation-duration: 8s;
            animation-delay: 1s;
        }

        .gold-particle:nth-child(3) {
            left: 18%;
            animation-duration: 11s;
            animation-delay: 2s;
        }

        .gold-particle:nth-child(4) {
            left: 24%;
            animation-duration: 9s;
            animation-delay: .5s;
        }

        .gold-particle:nth-child(5) {
            left: 30%;
            animation-duration: 12s;
            animation-delay: 1.5s;
        }

        .gold-particle:nth-child(6) {
            left: 36%;
            animation-duration: 10s;
            animation-delay: 3s;
        }

        .gold-particle:nth-child(7) {
            left: 42%;
            animation-duration: 8.5s;
            animation-delay: 2s;
        }

        .gold-particle:nth-child(8) {
            left: 48%;
            animation-duration: 11s;
            animation-delay: 1s;
        }

        .gold-particle:nth-child(9) {
            left: 54%;
            animation-duration: 9.5s;
            animation-delay: 2.8s;
        }

        .gold-particle:nth-child(10) {
            left: 60%;
            animation-duration: 10.5s;
            animation-delay: 1.3s;
        }

        .gold-particle:nth-child(11) {
            left: 66%;
            animation-duration: 8.8s;
            animation-delay: 2.5s;
        }

        .gold-particle:nth-child(12) {
            left: 72%;
            animation-duration: 12s;
            animation-delay: 1.8s;
        }

        .gold-particle:nth-child(13) {
            left: 78%;
            animation-duration: 9.5s;
            animation-delay: .8s;
        }

        .gold-particle:nth-child(14) {
            left: 84%;
            animation-duration: 11.5s;
            animation-delay: 2.4s;
        }

        .gold-particle:nth-child(15) {
            left: 90%;
            animation-duration: 10s;
            animation-delay: 1.2s;
        }

        .gold-particle:nth-child(16) {
            left: 95%;
            animation-duration: 8s;
            animation-delay: 3s;
        }

        @keyframes goldFloat {

            0% {

                transform:
                    translateY(0) translateX(0) scale(.6);

                opacity: 0;

            }

            10% {

                opacity: 1;

            }

            40% {

                transform:
                    translateY(-220px) translateX(-10px) scale(1);

            }

            70% {

                transform:
                    translateY(-480px) translateX(12px) scale(1.2);

            }

            100% {

                transform:
                    translateY(-850px) translateX(-5px) scale(.8);

                opacity: 0;

            }

        }



        /* =======================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       RESPONSIVE HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Hanya Mobile & Tablet
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ======================================================= */

        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HP KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       (320px - 360px)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================================== */
        @media (max-width:360px) {

            .elegant-hero {
                min-height: 100svh;
                padding: 82px 0 18px;
                margin-top: 0;
                display: flex;
                align-items: center;
            }

            .elegant-hero .row {
                min-height: 100%;
                align-items: center;
                padding-top: 0;
            }

            .elegant-hero .col-lg-7 {
                text-align: center;
            }

            .premium-badge {
                display: inline-flex;
                margin: 0 auto 10px;
                transform: scale(.80);
            }

            .heading-line {
                font-size: 1.85rem;
                line-height: 1;
            }

            .gradient-highlight {
                top: 2px;
            }

            .elegant-desc {
                font-size: .88rem;
                line-height: 1.6;
                max-width: 100%;
                margin: 15px auto;
                padding: 0 10px;
            }

            .elegant-cta {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }

            .btn-elegant {
                width: 90%;
                max-width: 260px;
                padding: 14px 20px;
            }

        }


        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HP STANDAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       (361px - 480px)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================================== */

        @media (min-width:361px) and (max-width:480px) {

            .elegant-hero {
                min-height: 100svh;
                padding: 86px 0 22px;
                margin-top: 0;
                display: flex;
                align-items: center;
            }

            .elegant-hero .row {
                min-height: 100%;
                align-items: center;
                padding-top: 0;
            }

            .elegant-hero .col-lg-7 {
                text-align: center;
            }

            .premium-badge {
                display: inline-flex;
                margin: 0 auto 14px;
                transform: scale(.88);
            }

            .heading-line {
                font-size: 2.15rem;
                line-height: 1;
            }

            .gradient-highlight {
                top: 2px;
            }

            .elegant-desc {
                font-size: .94rem;
                line-height: 1.65;
                max-width: 96%;
                margin: 18px auto;
            }

            .elegant-cta {
                display: flex;
                flex-direction: column;
                gap: 14px;
            }

            .btn-elegant {
                width: 92%;
                max-width: 290px;
            }

        }

        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Testimonials Responsive
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ========================================== */

        @media (max-width: 767.98px) {

            .testimonials-slide .row {
                --bs-gutter-x: 12px;
                --bs-gutter-y: 12px;
            }

            .testimonial-card-enhanced {
                height: 100%;
                padding: 18px 16px;
                border-radius: 18px;
            }

            .testimonial-rating-enhanced {
                font-size: .85rem;
            }

            .testimonial-text-enhanced {
                font-size: .82rem;
                line-height: 1.5;
                margin-bottom: 16px;
            }

            .author-avatar-enhanced {
                width: 42px;
                height: 42px;
                font-size: 1rem;
            }

            .author-info-enhanced h4 {
                font-size: .95rem;
            }

            .author-info-enhanced p {
                font-size: .75rem;
            }

        }



        /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           HOME BACKGROUND - MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ========================================== */

        /* HOME BACKGROUND - MOBILE */
        @media (max-width: 767.98px) {

            .home-background-wrapper {
                background-size: cover;
                background-position: 80% top;
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-color: #f8edda;
            }

            .home-background-wrapper>section {
                background: transparent !important;
            }

            .welcome-content-section,
            .services-section-enhanced,
            .testimonials-section-enhanced,
            .cta-section-enhanced {
                background: transparent !important;
            }

            /* Welcome */
            .welcome-content-section {
                padding: 70px 0 80px;
                background: transparent !important;
            }

            .welcome-content-section .row {
                --bs-gutter-y: 35px;
            }

            .welcome-content-section .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            /* Gambar welcome */
            .welcome-image-main-simple {
                width: 100%;
                overflow: hidden;
                border-radius: 20px;
            }

            .welcome-image-main-simple img {
                width: 100%;
                height: auto;
                display: block;
            }

            /* Konten welcome */
            .welcome-content-enhanced {
                text-align: center;
            }

            .welcome-title-main {
                font-size: 2.2rem;
                line-height: 1.05;
            }

            .welcome-description-main {
                width: 100%;
                max-width: 330px;

                margin: 0 auto 26px;

                font-size: 0.88rem;
                line-height: 1.65;

                text-align: center;
            }

            .welcome-features-enhanced {
                width: 100%;
                max-width: 330px;

                margin: 0 auto;

                text-align: left;

                gap: 14px;
            }

            .feature-item-enhanced {
                display: flex;
                align-items: flex-start;

                gap: 12px;

                font-size: 0.9rem;
                line-height: 1.55;

                color: var(--text-gray);
            }

            .feature-item-enhanced i {
                flex: 0 0 auto;

                margin-top: 3px;

                font-size: 1rem;
            }

            .welcome-action-buttons {
                display: flex;
                justify-content: center;
                margin-top: 25px;
            }

            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               SERVICES
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================================== */

            .services-section-enhanced {
                padding: 80px 0;
                background: transparent !important;
            }


            .section-subtitle-enhanced {
                width: 100%;
                max-width: 330px;

                margin: 0 auto 0;

                font-size: 0.88rem;
                line-height: 1.6;

                text-align: center;
            }


            .services-section-enhanced .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            .services-section-enhanced .row {
                --bs-gutter-x: 12px;
                --bs-gutter-y: 12px;
            }

            .service-card-enhanced {
                padding: 18px 12px;
                border-radius: 18px;
                height: 100%;
            }

            .service-icon-enhanced {
                width: 30px;
                height: 30px;

                font-size: 0.95rem;

                margin-bottom: 10px;
            }

            .service-icon-enhanced img {
                width: 30px !important;
                height: 30px !important;

                object-fit: contain;
            }

            .service-title-enhanced {
                font-size: 0.95rem;
                line-height: 1.3;
            }

            .service-description-enhanced {
                font-size: 0.78rem;
                line-height: 1.5;
            }

            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               TESTIMONIALS
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================================== */

            .testimonials-section-enhanced {
                padding: 80px 0;
                background: transparent !important;
            }

            /* button lihat semua di google */

            .btn-secondary-enhanced {
                display: flex !important;

                width: 250px !important;
                max-width: 250px !important;

                min-height: 42px;

                margin: 0 auto !important;
                padding: 10px 14px;

                align-items: center;
                justify-content: center;

                gap: 7px;

                font-size: 0.82rem;

                border-radius: 50px;
                box-sizing: border-box;
            }

            .btn-secondary-enhanced .google-logo {
                width: 17px;
                height: 17px;
                margin-right: 0 !important;
            }

            .btn-secondary-enhanced>i {
                font-size: 0.78rem;
                margin-left: 0 !important;
            }

            /* testimoni */

            .testimonials-section-enhanced .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            .testimonials-slide .row {
                --bs-gutter-x: 10px;
                --bs-gutter-y: 10px;
            }

            .testimonial-card-enhanced {
                padding: 16px 12px;
                border-radius: 16px;
                height: 100%;
            }

            .testimonial-text-enhanced {
                font-size: 0.78rem;
                line-height: 1.5;
            }

            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               CTA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================================== */

            .rounded-cta-section {
                padding: 60px 0 70px;
                background: transparent !important;
            }

            .rounded-cta-section .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            .rounded-cta-card {
                border-radius: 40px;
                padding: 25px 20px;
            }

            .rounded-cta-title {
                font-size: 1.8rem;
                line-height: 1.1;
                text-align: center;
            }

            .rounded-cta-description {
                width: 100%;
                max-width: 290px;

                margin: 0 auto;

                font-size: 0.84rem;
                line-height: 1.55;

                text-align: center;
            }

            /* CTA BUTTONS MOBILE */
            .rounded-cta-buttons {
                display: flex !important;

                flex-direction: column !important;

                align-items: center !important;
                justify-content: center !important;

                width: 100% !important;

                gap: 12px !important;

                margin-top: 22px !important;
            }

            /* BUTTON */
            .btn-rounded-cta {
                display: flex !important;

                width: 100% !important;
                max-width: 300px !important;

                min-height: 48px;

                margin: 0 auto !important;
                padding: 13px 18px !important;

                align-items: center !important;
                justify-content: center !important;

                gap: 8px;

                font-size: 0.84rem;

                line-height: 1.25;

                text-align: center;

                white-space: normal !important;
                overflow: visible !important;

                box-sizing: border-box;
                border-radius: 50px !important;
            }

        }

        /* HERO MOBILE */
        /* HERO MOBILE MENYESUAIKAN ISI */
        @media (max-width: 768px) {

            .elegant-hero {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                max-height: none;
                padding-top: 55px;
                padding-bottom: 35px;
                overflow: hidden;
            }

            .hero-background {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background: #000;
                z-index: 0;
            }

            .hero-youtube {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 177.78vh;
                height: 100vh;
                max-width: none;
                max-height: none;
                border: 0;
                transform: translate(-50%, -50%);
                pointer-events: none;
            }

            .elegant-hero .row {
                min-height: auto;
                height: auto;
                align-items: center;
            }

            .elegant-hero .container {
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        /* HERO HOME MOBILE - MENGIKUTI UKURAN HERO MENU */
        @media (max-width: 576px) {

            .elegant-hero {
                position: relative;
                width: 100%;
                min-height: 560px;
                height: auto;
                padding: 35px 12px 30px;
                box-sizing: border-box;
                overflow: hidden;
            }

            .hero-background {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background: #000;
                z-index: 0;
            }

            .hero-youtube {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 177.78vh;
                height: 100vh;
                max-width: none;
                max-height: none;
                border: 0;
                transform: translate(-50%, -50%);
                pointer-events: none;
                z-index: 0;
            }

            .elegant-hero .container {
                position: relative;
                z-index: 5;
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                padding: 0;
            }

            .elegant-hero .row {
                min-height: auto;
                height: auto;
                align-items: center;
            }
        }

        /* JARAK JUDUL DAN DESKRIPSI HERO MOBILE */
        @media (max-width: 768px) {
            .elegant-hero .elegant-desc {
                margin-top: 55px !important;
                margin-bottom: 20px !important;
                font-size: 0.75rem;
                line-height: 1.6;
            }
        }

        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       MOBILE SANGAT KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       0px - 359px
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Contoh: HP dengan lebar layar sangat kecil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================================= */


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        MOBILE KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        360px - 480px
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Contoh: iPhone SE, iPhone 12/13/14/15, Android kecil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================================================= */
        @media (max-width:360px) {

            .heading-line {

                font-size: 1.55rem;

            }

            .premium-badge span {

                font-size: .63rem;

            }

            .elegant-desc {

                font-size: .82rem;

            }

            .btn-elegant {

                max-width: 220px;

                font-size: .8rem;

            }


        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                MOBILE BESAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                481px - 767px
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Contoh: iPhone Plus/Max, Android layar besar
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================================================= */
        @media (min-width:481px) and (max-width:767px) {

            .elegant-hero {
                min-height: 100svh;
                padding: 92px 0 28px;
                margin-top: 0;
                display: flex;
                align-items: center;
            }

            .elegant-hero .row {
                min-height: 100%;
                align-items: center;
                padding-top: 0;
            }

            .elegant-hero .col-lg-7 {
                text-align: center;
            }

            .premium-badge {
                display: inline-flex;
                margin: 0 auto 18px;
            }

            .heading-line {
                font-size: 2.45rem;
                line-height: 1;
            }

            .gradient-highlight {
                top: 2px;
            }

            .elegant-desc {
                font-size: 1rem;
                line-height: 1.7;
                max-width: 90%;
                margin: 20px auto;
            }

            .elegant-cta {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .btn-elegant {
                width: 90%;
                max-width: 320px;
            }

        }

        @media (max-width: 767px) {
            .elegant-hero {
                min-height: 100svh;
                height: auto;
                padding: 85px 0 30px;
                margin-top: 0;
            }

            .elegant-hero .row {
                min-height: 100%;
                align-items: center;
                padding-top: 0;
            }


            .premium-badge {
                margin: 0 auto 12px;
                transform: scale(.88);
            }

            .heading-line {
                font-size: clamp(2rem, 8vw, 2.7rem);
                line-height: 1;
            }

            .gradient-highlight {
                top: 2px;
            }

            .elegant-desc {
                font-size: clamp(.9rem, 3.8vw, 1rem);
                line-height: 1.6;
                margin: 15px auto 20px;
                max-width: 95%;
            }

            .elegant-cta {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 12px;
                margin-top: 10px;
            }

            .btn-elegant {
                width: 90%;
                max-width: 300px;
                padding: 14px 20px;
            }
        }

        @media (max-width:767px) {

            .rounded-cta-buttons {
                flex-direction: row;
                gap: 10px;
                width: 100%;
            }

            .btn-rounded-cta {
                flex: 1;
                width: 50%;
                padding: 14px 10px;
                font-size: 0.85rem;
                border-radius: 12px;
                white-space: nowrap;
            }

            .services-section-enhanced .row {
                --bs-gutter-x: 12px;
                --bs-gutter-y: 12px;
            }

            .service-card-enhanced {
                padding: 18px 14px;
                height: 100%;
            }

            .service-icon-enhanced {
                width: 56px;
                height: 56px;
                font-size: 1.3rem;
                margin-bottom: 16px;
            }

            .service-title-enhanced {
                font-size: 1rem;
            }

            .service-description-enhanced {
                font-size: .82rem;
                line-height: 1.5;
            }
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                TABLET
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                768px - 991px
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Contoh: iPad, tablet Android
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================================================= */
        @media (min-width:768px) and (max-width:991px) {

            .elegant-hero {
                min-height: 100svh;
                padding: 110px 0 50px;
                margin-top: 0;
                display: flex;
                align-items: center;
            }

            .elegant-hero .row {
                min-height: 100%;
                align-items: center;
                padding-top: 0;
            }

            .elegant-hero .col-lg-7 {
                text-align: center;
                max-width: 700px;
                margin: auto;
            }

            .premium-badge {
                margin-bottom: 18px;
            }

            .heading-line {
                font-size: 3rem;
                line-height: 1;
            }

            .gradient-highlight {
                top: 2px;
            }

            .elegant-desc {
                font-size: 1.05rem;
                line-height: 1.8;
                max-width: 650px;
                margin: 24px auto;
            }

            .elegant-cta {
                justify-content: center;
                gap: 18px;
            }

        }

        @media (max-width: 991px) {
            .elegant-hero {
                min-height: 0;
                height: auto;
                padding-top: 35px;
                padding-bottom: 30px;
            }

            .elegant-hero .row {
                min-height: 0 !important;
                height: auto;
                align-items: center !important;
                padding-top: 0;
            }
        }

        @media(max-width:991px) {

            .elegant-hero {
                min-height: 100svh;
                padding-block: clamp(90px, 10vh, 140px) clamp(40px, 6vh, 80px);
            }

            .heading-line {
                font-size: 3rem;
            }


            .hero-content {
                text-align: center;
                margin: auto;
            }

            .elegant-cta {
                justify-content: center;
            }

        }



        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   HERO MOBILE - FINAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   0px - 767px
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================================= */
        @media (max-width: 767px) {

            .elegant-hero {
                position: relative;
                width: 100%;
                min-height: 100svh;
                height: auto;
                margin-top: 0;
                padding: 82px 12px 28px;
                display: flex;
                align-items: center;
                overflow: hidden;
                box-sizing: border-box;
            }

            .hero-background {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background: #000;
                z-index: 0;
            }

            .hero-youtube {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 177.78vh;
                height: 100vh;
                max-width: none;
                max-height: none;
                border: 0;
                transform: translate(-50%, -50%);
                pointer-events: none;
                z-index: 0;
            }

            .elegant-hero .container {
                position: relative;
                z-index: 5;
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                padding: 0;
            }

            .elegant-hero .row {
                min-height: auto;
                height: auto;
                align-items: center;
            }

            .elegant-hero .col-lg-7 {
                width: 100% !important;
                max-width: 100% !important;

                margin: 0 auto !important;

                text-align: center !important;
            }

            /* BADGE */
            .premium-badge {
                display: inline-flex;
                margin: 0 auto 12px;
                padding: 7px 14px;
                transform: none;
            }

            .premium-badge span {
                font-size: 0.68rem;
                letter-spacing: 1px;
            }

            /* JUDUL */

            .elegant-heading {
                width: 100% !important;
                max-width: 360px !important;

                margin: 0 auto !important;
                padding: 0 !important;

                text-align: center !important;

                font-size: inherit;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            .heading-line {
                display: block;

                width: 100%;

                margin: 0 auto !important;
                padding: 0;

                font-size: clamp(1.75rem, 7.5vw, 2.25rem);

                line-height: 1.05;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            .gradient-highlight {
                display: block;

                position: relative;

                top: 0;

                width: 100%;

                text-align: center;
            }

            /* ==========================================
                                                                                                                                                                                                                                   DESKRIPSI HERO MOBILE
                                                                                                                                                                                                                                   ========================================== */

            .elegant-desc {
                width: 100% !important;
                max-width: 340px !important;

                margin: 20px auto 22px !important;
                padding: 0 !important;

                font-size: clamp(0.82rem, 3.5vw, 0.9rem);

                line-height: 1.55;

                text-align: center !important;

                overflow-wrap: anywhere;
            }

            /* BUTTON */
            .elegant-hero .elegant-cta {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 8px;
                width: 100%;
                margin-top: 0;
                padding: 0 4px;
                flex-wrap: nowrap;
            }

            .elegant-hero .btn-elegant {
                flex: 1 1 0;
                min-width: 0;
                width: auto;
                max-width: 145px;
                min-height: 42px;
                margin: 0;
                padding: 10px 7px;
                font-size: 0.78rem;
                line-height: 1.15;
                white-space: nowrap;
                justify-content: center;
                align-items: center;
                gap: 7px;
            }

            .elegant-hero .btn-elegant i {
                font-size: 0.78rem;
            }
        }
    </style>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700;1,800&family=Poppins:wght@600;700;800&display=swap"
        rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // ==========================================
        // HOME PROMOTION POPUP
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {

            const popup = document.getElementById('homePromoPopup');
            const closeButton = document.getElementById('homePromoClose');
            const overlay = popup ? popup.querySelector('.home-promo-overlay') : null;

            if (!popup) {
                return;
            }

            // Tampilkan popup saat halaman Home dibuka
            popup.style.display = 'flex';

            // Tombol X
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    popup.style.display = 'none';
                });
            }

            // Klik area gelap di luar popup
            if (overlay) {
                overlay.addEventListener('click', function() {
                    popup.style.display = 'none';
                });
            }

        });


        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // ==========================================
        // TESTIMONIALS CAROUSEL
        // ==========================================

        let testimonialsCurrentSlide = 0;

        const testimonialsSlides =
            document.querySelectorAll('.testimonials-slide');

        const testimonialIndicators =
            document.querySelectorAll('.testimonial-indicator');

        let testimonialsAutoSlideInterval;


        // ==========================================
        // SHOW SLIDE
        // ==========================================

        function testimonialsCarouselShowSlide(index) {

            if (!testimonialsSlides.length) return;

            const totalSlides = testimonialsSlides.length;

            // Pastikan index tetap dalam range
            index = (index + totalSlides) % totalSlides;

            // Jika slide yang dipilih sama, tidak perlu menjalankan animasi
            if (index === testimonialsCurrentSlide) {
                return;
            }

            const currentSlide =
                testimonialsSlides[testimonialsCurrentSlide];

            const nextSlide =
                testimonialsSlides[index];


            // ==========================================
            // SLIDE LAMA → GESER KE KIRI
            // ==========================================

            currentSlide.classList.remove('active');
            currentSlide.classList.add('slide-out-left');


            // ==========================================
            // SLIDE BARU → MASUK DARI KANAN
            // ==========================================

            nextSlide.classList.remove(
                'slide-out-left',
                'active'
            );

            nextSlide.classList.add('slide-in-right');


            // Paksa browser membaca posisi awal
            // sebelum menjalankan animasi
            nextSlide.offsetWidth;


            // Jalankan animasi masuk
            nextSlide.classList.remove('slide-in-right');
            nextSlide.classList.add('active');


            // ==========================================
            // UPDATE INDIKATOR
            // ==========================================

            testimonialIndicators.forEach((indicator) => {
                indicator.classList.remove('active');
            });

            if (testimonialIndicators[index]) {
                testimonialIndicators[index].classList.add('active');
            }


            // Update index
            testimonialsCurrentSlide = index;


            // Bersihkan class setelah animasi selesai
            setTimeout(() => {

                testimonialsSlides.forEach((slide, i) => {

                    if (i !== testimonialsCurrentSlide) {

                        slide.classList.remove(
                            'active',
                            'slide-out-left',
                            'slide-in-right'
                        );

                        slide.style.transform = '';
                        slide.style.opacity = '';
                        slide.style.visibility = '';
                    }

                });

            }, 700);
        }


        // ==========================================
        // NEXT SLIDE
        // ==========================================

        function testimonialsCarouselNext() {

            const nextIndex =
                testimonialsCurrentSlide + 1;

            testimonialsCarouselShowSlide(nextIndex);

            testimonialsResetAutoSlide();
        }


        // ==========================================
        // CLICK INDICATOR
        // ==========================================

        function testimonialsCarouselGoTo(index) {

            testimonialsCarouselShowSlide(index);

            testimonialsResetAutoSlide();
        }


        // ==========================================
        // AUTO SLIDE
        // ==========================================

        function testimonialsAutoSlide() {

            clearInterval(testimonialsAutoSlideInterval);

            testimonialsAutoSlideInterval = setInterval(() => {

                const nextIndex =
                    (testimonialsCurrentSlide + 1) % testimonialsSlides.length;

                testimonialsCarouselShowSlide(nextIndex);

            }, 3000);
        }


        // ==========================================
        // RESET AUTO SLIDE
        // ==========================================

        function testimonialsResetAutoSlide() {

            clearInterval(testimonialsAutoSlideInterval);

            testimonialsAutoSlide();
        }


        // ==========================================
        // INITIAL STATE
        // ==========================================

        if (testimonialsSlides.length > 0) {

            // Pastikan hanya slide pertama yang aktif
            testimonialsSlides.forEach((slide, index) => {

                slide.classList.remove(
                    'active',
                    'slide-out-left',
                    'slide-in-right'
                );

                if (index === 0) {
                    slide.classList.add('active');
                }

            });

            // Pastikan indikator pertama aktif
            testimonialIndicators.forEach((indicator, index) => {

                indicator.classList.remove('active');

                if (index === 0) {
                    indicator.classList.add('active');
                }

            });

            // Jalankan autoplay setelah inisialisasi selesai
            testimonialsAutoSlide();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ==========================================
            // YOUTUBE - MUTE MELALUI IFRAME PLAYER API
            // ==========================================

            const youtubeFrame = document.querySelector('.hero-youtube');

            if (youtubeFrame) {

                function loadYouTubeAPI() {

                    if (window.YT && window.YT.Player) {
                        initYouTubePlayer();
                        return;
                    }

                    const existingScript = document.querySelector(
                        'script[src="https://www.youtube.com/iframe_api"]'
                    );

                    if (!existingScript) {

                        const script = document.createElement('script');

                        script.src = 'https://www.youtube.com/iframe_api';

                        document.head.appendChild(script);
                    }

                    window.onYouTubeIframeAPIReady = function() {
                        initYouTubePlayer();
                    };
                }


                function initYouTubePlayer() {

                    new YT.Player(youtubeFrame, {

                        events: {

                            onReady: function(event) {

                                // Paksa volume 0
                                event.target.setVolume(0);

                                // Paksa mute
                                event.target.mute();

                                // Putar kembali setelah mute
                                event.target.playVideo();

                            }

                        }

                    });

                }

                loadYouTubeAPI();
            }


            // ==========================================
            // TIKTOK - MUTE SAAT PLAYER READY
            // ==========================================

            const tiktokFrame = document.querySelector('.hero-tiktok');

            if (tiktokFrame) {

                function sendTikTokMessage(type, value = null) {

                    if (!tiktokFrame.contentWindow) {
                        return;
                    }

                    tiktokFrame.contentWindow.postMessage({
                            'x-tiktok-player': true,
                            type: type,
                            value: value
                        },
                        '*'
                    );

                }


                // Dengarkan pesan dari TikTok Player
                window.addEventListener('message', function(event) {

                    if (event.origin !== 'https://www.tiktok.com') {
                        return;
                    }

                    let data = event.data;

                    if (typeof data === 'string') {

                        try {
                            data = JSON.parse(data);
                        } catch (error) {
                            return;
                        }

                    }

                    if (
                        data &&
                        data['x-tiktok-player'] === true &&
                        data.type === 'onPlayerReady'
                    ) {

                        // Mute dahulu
                        sendTikTokMessage('mute');

                        // Baru play
                        sendTikTokMessage('play');

                    }

                });


                // Fallback: kirim mute segera setelah iframe dimuat
                tiktokFrame.addEventListener('load', function() {

                    sendTikTokMessage('mute');

                });

            }

        });
    </script>
@endsection

<script>
    (function() {
        function updateMobileHeroSize() {
            const viewportHeight = window.visualViewport ?
                window.visualViewport.height :
                window.innerHeight;

            document.documentElement.style.setProperty(
                '--hero-mobile-height',
                viewportHeight + 'px'
            );

            document.documentElement.style.setProperty(
                '--hero-mobile-width',
                (viewportHeight * 1.7778) + 'px'
            );
        }

        updateMobileHeroSize();

        window.addEventListener('resize', updateMobileHeroSize, {
            passive: true
        });

        window.addEventListener('orientationchange', updateMobileHeroSize, {
            passive: true
        });

        if (window.visualViewport) {
            window.visualViewport.addEventListener(
                'resize',
                updateMobileHeroSize, {
                    passive: true
                }
            );
        }
    })();
</script>
