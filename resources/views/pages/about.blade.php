    @extends('layouts.app')

    @section('title', $page->meta_title ?? 'Tentang Kami - JOSS GANDOS')
    @section('meta-description',
        $page->meta_description ??
        'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan
        restoran kami sejak 2017')

        @php
            /*
    |--------------------------------------------------------------------------
    | ABOUT PAGE - DATA RELASIONAL
    |--------------------------------------------------------------------------
    */

            // =========================================================
            // HISTORY / SEJARAH
            // =========================================================
            $historyParagraphs = $aboutPage->histories ?? collect();

            // =========================================================
            // TIMELINE PERJALANAN
            // =========================================================
            $timeline = $aboutPage->timelines ?? collect();

            // =========================================================
            // MISSIONS / NILAI & KOMITMEN
            // =========================================================
            $missions = $aboutPage->missions ?? collect();

            // =========================================================
            // TEAM MEMBERS
            // =========================================================
            $teamMembers = $aboutPage->teamMembers ?? collect();

            // =========================================================
            // FOUNDER
            // =========================================================
            $founderDescription =
                $aboutPage->founder_description ??
                'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.';

            $founderStory1 =
                $aboutPage->founder_story_1 ??
                'Berawal dari rintisan sederhana bernama <strong>"Bebek Joss Gandos"</strong>, beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.';

            $founderStory2 =
                $aboutPage->founder_story_2 ??
                'Di bawah kepemimpinan beliau dengan filosofi semangat <strong>"Joss, Mantap, dan Luar Biasa"</strong>, resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik <span class="text-primary">Gulai Kepala Ikan Salmon</span>. Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.';

            // =========================================================
            // VISION
            // =========================================================
            $visionQuote =
                $aboutPage->vision_quote ??
                'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.';

            // =========================================================
            // CTA
            // =========================================================
            $ctaTitle = $aboutPage->cta_title ?? 'Rasakan Cita Rasa Luar Biasa';

            $ctaDescription =
                $aboutPage->cta_description ??
                'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.';

            // =========================================================
            // FOUNDER STORY
            // =========================================================
            $founderStoryCombined = $founderStory2;
        @endphp

        <link rel="preload" as="image" href="{{ asset('images/about-background.png') }}" fetchpriority="high">

    @section('content')

        <!-- ========== ABOUT BACKGROUND WRAPPER ========== -->
        <div class="about-background-wrapper">

            <!-- BACKGROUND IMAGE - LOAD SEJAK AWAL -->
            <img src="{{ asset('images/about-background.png') }}" class="about-background-image" alt=""
                aria-hidden="true" fetchpriority="high" decoding="async">

            <!-- ========== HERO SECTION ========== -->
            <div class="elegant-hero">
                <div class="container">
                    <div class="row hero-content align-items-center justify-content-center">

                        {{-- Teks kecil: muncul pertama --}}
                        <div class="premium-badge animate__animated animate__fadeInUp">
                            <span class="badge-dot"></span>
                            <span>{{ $content['hero_badge'] ?? 'Tentang Kami' }}</span>
                            <span class="badge-dot"></span>
                        </div>

                        {{-- Judul: muncul kedua --}}
                        <h1 class="elegant-heading animate__animated animate__fadeInUp animate__delay-1s">
                            {{ $content['hero_title'] ?? 'Resto Joss Gandos Ketintang' }}
                        </h1>

                        {{-- Subtitle: muncul ketiga --}}
                        <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                            {{ $content['hero_subtitle'] ?? 'Delapan tahun perjalanan dari semangat IT hingga menjadi pionir kuliner di Jemursari dengan menu andalan yang menginspirasi.' }}
                        </p>

                        {{-- Button: muncul terakhir --}}
                        <div class="elegant-cta">
                            <a href="{{ $content['hero_button_1_link'] ?? '#sejarah' }}"
                                class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-3s">
                                <span>{{ $content['hero_button_1_text'] ?? 'Telusuri Sejarah' }}</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>

                            <a href="{{ $content['hero_button_2_link'] ?? '#tim' }}"
                                class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-3s">
                                <span>{{ $content['hero_button_2_text'] ?? 'Kenali Tim Kami' }}</span>
                                <i class="fas fa-users"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ========== SEJARAH SECTION DENGAN FONT MODERN ========== -->
            <section id="sejarah" class="section-padding sejarah-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-header mb-3" data-aos="fade-right" data-aos-duration="1000">
                                <div class="section-tag-wrapper">
                                    <span class="section-tag-glow"></span>
                                    <span class="section-tag">SEJARAH KAMI</span>
                                </div>


                                <div class="history-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="history-card-inner">

                                        <div class="history-text">
                                            <div class="history-content modern-text">
                                                <div class="history-decoration"></div>

                                                @foreach ($historyParagraphs as $history)
                                                    <p class="history-paragraph {{ $loop->last ? 'history-last' : '' }}">
                                                        {!! $history->paragraph !!}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            {{-- ================= VISI & MISI ================= --}}
                            <div class="history-vision-mission">

                                {{-- VISI --}}
                                <div class="history-vision-box">
                                    <div class="history-vm-header">
                                        <div class="history-vm-icon">
                                            <i class="fas fa-gem"></i>
                                        </div>
                                        <h3>Visi</h3>
                                    </div>

                                    <p>
                                        {{ $visionQuote }}
                                    </p>
                                </div>


                                {{-- MISI --}}
                                <div class="history-mission-box">
                                    <div class="history-vm-header">
                                        <div class="history-vm-icon">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                        <h3>Misi</h3>
                                    </div>

                                    <div class="history-mission-list">
                                        @foreach ($missions as $index => $mission)
                                            <div class="history-mission-item">

                                                <span class="mission-number">
                                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                </span>

                                                <div>
                                                    <strong>
                                                        {{ $mission->title ?? '' }}
                                                    </strong>

                                                    <p>
                                                        {{ $mission->description ?? '' }}
                                                    </p>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- ========== PERJALANAN RESTO DENGAN FONT MODERN ========== -->
                            <div class="journey-card premium-card" data-aos="fade-left" data-aos-duration="1000">
                                <div class="card-bg-pattern"></div>
                                <div class="journey-header">
                                    <h3 class="journey-main-title">
                                        {{ $aboutPage->journey_title ?? 'PERJALANAN RESTO JOSS GANDOS' }}
                                    </h3>

                                    <p class="journey-quote">
                                        {{ $aboutPage->journey_subtitle ?? 'Dari langkah kecil hingga menjadi resto kebanggaan bersama' }}
                                    </p>

                                    <div class="header-decoration">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>

                                <div class="timeline-wrapper modern-timeline">

                                    @foreach ($timeline as $item)
                                        <div class="timeline-row">

                                            <!-- TAHUN - BERDIRI SENDIRI DI SEBELAH KIRI -->
                                            <div class="timeline-year-badge">
                                                {{ $item->year ?? '' }}
                                            </div>

                                            <!-- ACCORDION -->
                                            <div class="journey-accordion">

                                                <button type="button" class="timeline-content-card accordion-trigger">

                                                    <div class="timeline-accordion-header">

                                                        <h5 class="timeline-year-title">
                                                            {{ $item->title ?? '' }}
                                                        </h5>

                                                        <span class="timeline-toggle">
                                                            <i class="fas fa-chevron-down"></i>
                                                        </span>

                                                    </div>

                                                </button>

                                                <div class="timeline-accordion-content">

                                                    <ul class="timeline-list">

                                                        @foreach ($item->items as $listItem)
                                                            <li>
                                                                {{ $listItem->item ?? '' }}
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- ========== FOUNDER SECTION ========== -->
            <section class="founder-section" style="padding: 80px 0;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="founder-image-wrapper extra-large" data-aos="fade-right">
                                <div class="founder-image premium founder-premium-large">
                                    <div class="image-rotator">

                                        @php
                                            // Mengambil path gambar Founder dari database.
                                            $founderImage = $content['founder_image'] ?? null;

                                            // Gambar default jika belum ada gambar yang diunggah.
                                            $defaultFounderImage =
                                                'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';

                                            // Menentukan URL gambar untuk ditampilkan.
                                            if (is_string($founderImage) && trim($founderImage) !== '') {
                                                $founderImage = trim($founderImage);

                                                if (preg_match('#^https?://#i', $founderImage)) {
                                                    // Mendukung URL gambar lama.
                                                    $founderImageSrc = $founderImage;
                                                } else {
                                                    // Mendukung path gambar lokal dari Laravel Storage.
                                                    $normalizedFounderPath = ltrim($founderImage, '/');

                                                    if (str_starts_with($normalizedFounderPath, 'storage/')) {
                                                        $founderImageSrc = asset($normalizedFounderPath);
                                                    } else {
                                                        $founderImageSrc = asset('storage/' . $normalizedFounderPath);
                                                    }
                                                }
                                            } else {
                                                // Gunakan gambar default jika database belum memiliki gambar.
                                                $founderImageSrc = $defaultFounderImage;
                                            }
                                        @endphp

                                        <img src="{{ $founderImageSrc }}" class="img-fluid"
                                            alt="Dr. Siswanto - Founder JOSS GANDOS">

                                        <div class="image-overlay-glow"></div>
                                    </div>
                                    <div class="frame-accent">
                                        <div class="accent-corner tl"></div>
                                        <div class="accent-corner tr"></div>
                                        <div class="accent-corner bl"></div>
                                        <div class="accent-corner br"></div>
                                    </div>
                                </div>
                                <div class="founder-pattern"></div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="founder-content" data-aos="fade-left">
                                <span class="section-tag mb-3 d-inline-block">PENDIRI</span>
                                @php
                                    // Mengambil data About yang sudah dikirim oleh PageController
                                    $aboutContent = $aboutPage->content ?? ($page->content ?? []);
                                @endphp

                                <h2 class="founder-title">
                                    {{ $aboutContent['founder_name'] ?? 'Dr. Siswanto' }}
                                </h2>

                                <div class="founder-quote">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p>
                                        {{ $aboutContent['founder_description'] ?? '' }}
                                    </p>
                                </div>

                                <div class="founder-story">
                                    <p>
                                        {!! $aboutContent['founder_story_1'] ?? '' !!}
                                    </p>
                                    <p>
                                        {!! $aboutContent['founder_story_2'] ?? '' !!}
                                    </p>

                                    <p>
                                        {!! $aboutContent['founder_commitment'] ?? '' !!}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========== TIM KAMI SECTION ========== -->
            <section id="tim" class="team-section" style="padding: 80px 0;">
                <div class="container">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-lg-8">
                            <div class="section-header" data-aos="fade-up">
                                <span class="section-tag mb-3 d-inline-block">TIM KAMI</span>
                                <h2 class="display-4 fw-bold mb-4">
                                    {{ $aboutPage->team_title ?? 'Orang-orang Berdedikasi' }}<br>
                                    <span class="text-gradient-red">
                                        {{ $aboutPage->team_title_highlight ?? 'di Balik Layar' }}
                                    </span>
                                </h2>

                                <p class="lead text-muted">
                                    {{ $aboutPage->team_subtitle ?? 'Tim yang memastikan pengalaman bersantap Anda sempurna' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 justify-content-center">
                        @foreach ($teamMembers as $member)
                            <div class="col-lg-4 col-md-6">
                                <div class="team-card" data-aos="fade-up">

                                    <div class="team-image">
                                        @if (!empty($member->image))
                                            <img src="{{ preg_match('#^https?://#i', $member->image)
                                                ? $member->image
                                                : asset('storage/' . ltrim(preg_replace('#^/?storage/#', '', $member->image), '/')) }}"
                                                alt="{{ $member->name ?? '' }}" loading="lazy"
                                                onerror="console.error('Foto anggota tim gagal dimuat:', this.src)">
                                        @endif
                                    </div>

                                    <div class="team-info">
                                        <h5>
                                            {{ $member->name ?? '' }}
                                        </h5>

                                        <span class="team-position">
                                            {{ $member->position ?? '' }}
                                        </span>

                                        <p class="team-desc">
                                            {{ $member->description ?? '' }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- ========== CTA SECTION ========== -->
            <section class="cta-section-red-gradient" style="padding: 80px 0;">
                <div class="container">
                    <div class="cta-wrapper-red">
                        <!-- Decorative Elements -->
                        <div class="cta-shapes">
                            <div class="shape s1"></div>
                            <div class="shape s2"></div>
                            <div class="shape s3"></div>
                        </div>

                        <!-- Animated Particles -->
                        <div class="cta-particles">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="particle"></div>
                            @endfor
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                <!-- Premium Badge -->
                                <div class="cta-badge">
                                    <span class="badge-dot"></span>
                                    <span>JOSS GANDOS EXPERIENCE</span>
                                    <span class="badge-dot"></span>
                                </div>

                                <!-- Main Title -->
                                <h2 class="cta-title-red">
                                    {{ $ctaTitle }}
                                </h2>

                                <!-- Description -->
                                <p class="cta-description-red">
                                    {{ $ctaDescription }}
                                </p>

                                <!-- CTA Buttons - BUTTON KUNJUNGI KAMI DIHUBUNGKAN KE RESERVATION PAGE SECTION LOKASI -->
                                <div class="cta-buttons-red">
                                    <a href="{{ route('reservation') }}" class="btn-cta-red btn-primary-red">
                                        <span>Reservasi Sekarang</span>
                                        <i class="fas fa-calendar-check"></i>
                                    </a>
                                    <a href="https://www.google.com/maps/search/?api=1&query=Resto+Joss+Gandos+Ketintang+Surabaya"
                                        class="btn-cta-red btn-outline-red" target="_blank" rel="noopener noreferrer"
                                        onclick="window.open(this.href, '_blank'); return false;">
                                        <span>Kunjungi Kami</span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- END ABOUT BACKGROUND WRAPPER -->

        <!-- BACK TO TOP BUTTON -->
        <div class="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </div>
    @endsection

    @section('styles')
        <style>
            /* ========== IMPORT FONT MODERN ========== */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap');
            @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

            /* ========== VARIABLES ========== */
            :root {
                --primary-red: #B22222;
                --primary-dark: #8B0000;
                --primary-soft: #CD5C5C;
                --accent-gold: #D4A017;
                --accent-light: #FFD700;
                --accent-rose: #E8B4B4;
                --bg-light: #FFF9F0;
                --text-dark: #1E2A36;
                --text-gray: #5A6A72;
                --text-elegant: #2C3E50;
                --shadow-sm: 0 5px 20px rgba(0, 0, 0, 0.02);
                --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.05);
                --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
                --shadow-red: 0 10px 30px rgba(178, 34, 34, 0.1);
                --shadow-gold: 0 10px 30px rgba(212, 160, 23, 0.15);
                --border-radius-sm: 12px;
                --border-radius-md: 20px;
                --border-radius-lg: 30px;
                --border-radius-xl: 50px;
                --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
                --glass-bg: rgba(255, 255, 255, 0.7);
                --glass-border: rgba(255, 255, 255, 0.2);
                --glass-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            }

            /* ========== TYPOGRAPHY MODERN ========== */
            body {
                font-family: var(--font-primary);
                color: var(--text-elegant);
                line-height: 1.6;
                font-weight: 400;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-size: 16px;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: var(--font-primary);
                font-weight: 600;
                letter-spacing: -0.02em;
                line-height: 1.3;
            }

            p {
                font-family: var(--font-primary);
                font-weight: 400;
                line-height: 1.7;
            }

            .fw-semibold {
                font-weight: 600;
            }

            .fw-bold {
                font-weight: 700;
            }

            /* ========== ELEGANT RED GRADIENT HERO ========== */
            .elegant-hero {
                position: relative;
                width: 100%;
                min-height: 520px;

                display: flex;
                align-items: center;
                justify-content: center;

                margin-top: -70px;
                padding: 105px 20px 70px;

                text-align: center;

                background: transparent !important;
                overflow: hidden;
            }

            .elegant-gradient {
                position: absolute;
                top: 0;
                left: 0 width: 100%;
                height: 100%;
                background: transparent;
                z-index: 1;
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

                0%,
                100% {
                    transform: translate(0, 0) scale(1);
                }

                33% {
                    transform: translate(30px, -30px) scale(1.1);
                }

                66% {
                    transform: translate(-20px, 20px) scale(0.95);
                }
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

            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: rgba(255, 215, 0, 0.3);
                border-radius: 50%;
                animation: particleFloat 15s infinite linear;
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

            .particle:nth-child(11) {
                top: 60%;
                left: 70%;
                animation-duration: 23s;
            }

            .particle:nth-child(12) {
                top: 25%;
                left: 95%;
                animation-duration: 15s;
            }

            .particle:nth-child(13) {
                top: 75%;
                left: 5%;
                animation-duration: 26s;
            }

            .particle:nth-child(14) {
                top: 35%;
                left: 15%;
                animation-duration: 18s;
            }

            .particle:nth-child(15) {
                top: 90%;
                left: 55%;
                animation-duration: 20s;
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

            /* Text Reveal Animation */
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

                background: transparent !important;
                backdrop-filter: none !important;
                border: none !important;

                border-radius: 100px;
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
                color: rgb(0, 0, 0);
                font-size: 0.9rem;
                font-weight: 500;
                letter-spacing: 3px;
            }

            /* judul utama */
            .heading-line {
                display: block;
                font-size: 4.2rem;
                font-weight: 700;
                line-height: 1.2;
                color: white;
                text-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                font-family: var(--font-primary);
                display: block;
                font-size: 4.2rem;
                font-weight: 700;
                line-height: 1.2;
                color: white;
                text-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                font-family: var(--font-primary);
            }

            .gradient-highlight {
                background: linear-gradient(120deg, #FFE55C, #FFD700, #FFA500);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                display: inline-block;
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
                justify-content: center;
                gap: 12px;
                min-height: 58px;
                padding: 16px 36px;
                border-radius: 50px;
                font-family: var(--font-primary);
                font-size: 1rem;
                font-weight: 600;
                line-height: 1.2;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
                overflow: hidden;
                border: none;
                box-sizing: border-box;
            }

            /* button telusuri sejarah */
            .btn-primary-elegant {
                background: linear-gradient(135deg, var(--primary-red), #FFA500);
                color: white;
                box-shadow: 0 10px 25px rgba(178, 34, 34, 0.25);
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
                color: rgb(0, 0, 0);
                border: 1.5px solid rgba(0, 0, 0, 0.3);
                backdrop-filter: blur(5px);
            }

            .btn-outline-elegant:hover {
                background: rgba(255, 255, 255, 0.1);
                border-color: rgba(0, 0, 0, 0.8);
                transform: translateY(-3px);
            }

            /* Hero Image */
            .hero-image-wrapper {
                position: relative;
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 10px;
            }

            .hero-image-container.hero-image-extra-large {
                position: relative;
                width: 100%;
                max-width: 720px;
                margin: 0 auto;
            }

            .hero-image-frame.hero-frame-premium {
                position: relative;
                border-radius: 30px;
                overflow: hidden;
                box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.7);
                border: 12px solid rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(8px);
                transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
                transform: translateY(0);
            }

            .hero-image {
                width: 100%;
                height: auto;
                display: block;
                transition: transform 0.7s ease;
                object-fit: cover;
                aspect-ratio: 16/9;
            }

            .hero-image-frame.hero-frame-premium:hover {
                transform: translateY(-15px) scale(1.03);
                border-color: rgba(255, 215, 0, 0.6);
                box-shadow: 0 50px 80px -20px rgba(178, 34, 34, 0.6);
            }

            .hero-image-frame.hero-frame-premium:hover .hero-image {
                transform: scale(1.1);
            }

            .image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(145deg,
                        rgba(178, 34, 34, 0.2) 0%,
                        rgba(0, 0, 0, 0.4) 50%,
                        rgba(178, 34, 34, 0.2) 100%);
                opacity: 0.3;
                transition: opacity 0.5s ease;
                z-index: 2;
                pointer-events: none;
            }

            .hero-image-frame.hero-frame-premium:hover .image-overlay {
                opacity: 0.7;
            }

            .image-glow {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 50% 50%,
                        rgba(255, 215, 0, 0.3) 0%,
                        transparent 70%);
                opacity: 0;
                transition: opacity 0.5s ease;
                z-index: 3;
                pointer-events: none;
            }

            .hero-image-frame.hero-frame-premium:hover .image-glow {
                opacity: 0.8;
            }

            .image-shine {
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(to bottom right,
                        rgba(255, 255, 255, 0) 0%,
                        rgba(255, 255, 255, 0.2) 50%,
                        rgba(255, 255, 255, 0) 100%);
                transform: rotate(30deg) translateX(-100%);
                transition: transform 0.8s ease;
                z-index: 4;
                pointer-events: none;
            }

            .hero-image-frame.hero-frame-premium:hover .image-shine {
                transform: rotate(30deg) translateX(100%);
            }

            .image-frame {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 5;
                pointer-events: none;
            }

            .frame-corner {
                position: absolute;
                width: 35px;
                height: 35px;
                border-color: rgba(255, 215, 0, 0.7);
                transition: all 0.4s ease;
            }

            .frame-corner.top-left {
                top: 20px;
                left: 20px;
                border-top: 3px solid var(--accent-gold);
                border-left: 3px solid var(--accent-gold);
            }

            .frame-corner.top-right {
                top: 20px;
                right: 20px;
                border-top: 3px solid var(--accent-gold);
                border-right: 3px solid var(--accent-gold);
            }

            .frame-corner.bottom-left {
                bottom: 20px;
                left: 20px;
                border-bottom: 3px solid var(--accent-gold);
                border-left: 3px solid var(--accent-gold);
            }

            .frame-corner.bottom-right {
                bottom: 20px;
                right: 20px;
                border-bottom: 3px solid var(--accent-gold);
                border-right: 3px solid var(--accent-gold);
            }

            .hero-image-frame.hero-frame-premium:hover .frame-corner {
                width: 50px;
                height: 50px;
                border-color: var(--accent-gold);
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

            /* ========== SEJARAH SECTION DENGAN FONT MODERN ========== */
            .sejarah-section {
                padding: 115px 0 80px;
                background: transparent;
            }

            .section-tag-wrapper {
                position: relative;
                display: inline-block;
                margin-bottom: 15px;
            }

            .section-tag-glow {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
                background: radial-gradient(circle, rgba(178, 34, 34, 0.2) 0%, transparent 70%);
                filter: blur(10px);
                z-index: 0;
            }

            .section-tag {
                background: var(--primary-red);
                color: white;
                padding: 8px 24px;
                border-radius: 50px;
                font-size: 0.85rem;
                font-weight: 600;
                letter-spacing: 2px;
                text-transform: uppercase;
                box-shadow: var(--shadow-red);
                position: relative;
                z-index: 1;
                font-family: var(--font-primary);
            }

            .text-gradient-red {
                background: linear-gradient(135deg, var(--primary-red), var(--accent-gold));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }


            /* History Card Modern */
            .history-card {
                background: linear-gradient(145deg, #ffffff, #f8f8f8);
                border-radius: 40px;
                padding: 20px 22px !important;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(0, 0, 0, 0.06);
                border-left: none;
                transition: all 0.4s ease;
                position: relative;
                overflow: hidden;
            }

            .history-card::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 150px;
                height: 150px;
                background: radial-gradient(circle, rgba(178, 34, 34, 0.03) 0%, transparent 70%);
                border-radius: 50%;
            }

            .history-card-inner {
                display: flex;
                align-items: center;
                gap: 20px;
                position: relative;
                z-index: 2;
            }

            .history-icon-wrapper {
                position: relative;
            }

            .history-icon {
                width: 70px;
                height: 70px;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.8rem;
                color: white;
                box-shadow: 0 10px 20px rgba(178, 34, 34, 0.2);
                position: relative;
                z-index: 2;
            }

            .history-icon-pulse {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 70px;
                height: 70px;
                background: rgba(178, 34, 34, 0.2);
                border-radius: 20px;
                animation: pulse-ring 2s infinite;
                z-index: 1;
            }

            @keyframes pulse-ring {
                0% {
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0.5;
                }

                70% {
                    transform: translate(-50%, -50%) scale(1.3);
                    opacity: 0;
                }

                100% {
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0;
                }
            }

            .history-text {
                flex: 1;
            }

            .history-text h5 {
                font-size: 1.2rem;
                font-weight: 700;
                margin-bottom: 5px;
                color: var(--text-dark);
                font-family: var(--font-primary);
            }

            .history-text p {
                color: var(--text-gray);
                margin-bottom: 0;
                font-size: 0.95rem;
                font-family: var(--font-primary);
            }

            .history-decoration {
                position: absolute;
                bottom: 0;
                right: 0;
                width: 100px;
                height: 100px;
                background: radial-gradient(circle, rgba(212, 160, 23, 0.05) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }

            /* Modern Text Styles */
            .modern-text {
                color: var(--text-elegant);
            }

            .history-paragraph {
                font-size: 1rem;
                margin-bottom: 12px;
                color: var(--text-gray);
                font-family: var(--font-primary);
                line-height: 1.65;
            }



            .history-paragraph .text-gradient-red {
                font-weight: 700;

            }

            .history-last {
                margin-top: 15px;
                padding-top: 12px;
                border-top: 1px solid rgba(0, 0, 0, 0.08);
                color: var(--text-dark);
            }



            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           CARD PERJALANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Tinggi card mengikuti isi accordion yang sedang terbuka
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================================= */

            .journey-card.premium-card {
                background: linear-gradient(145deg, #ffffff, #f9f9f9);
                border-radius: 40px;
                padding: 35px;
                box-sizing: border-box;

                width: 100%;
                max-width: 100%;

                box-shadow: 0 25px 50px -10px rgba(0, 0, 0, 0.1);
                position: relative;
                overflow: visible;
                border: 1px solid rgba(255, 215, 0, 0.1);

                /* Tinggi mengikuti isi card */
                height: auto;
                min-height: 0;
            }

            .card-bg-pattern {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: radial-gradient(var(--primary-red) 1px, transparent 1px);
                background-size: 30px 30px;
                opacity: 0.02;
                pointer-events: none;
            }

            .journey-header {
                text-align: center;
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 2px solid rgba(178, 34, 34, 0.1);
            }

            .journey-main-title {
                font-size: 1.8rem;
                font-weight: 700;
                color: var(--text-dark);
                margin-bottom: 10px;
                letter-spacing: 1px;
                font-family: var(--font-primary);
            }

            .journey-quote {
                color: var(--primary-red);
                font-style: italic;
                font-size: 1.1rem;
                margin-bottom: 15px;
                font-family: var(--font-primary);
                font-weight: 400;
            }

            .header-decoration {
                display: flex;
                justify-content: center;
                gap: 8px;
            }

            .header-decoration span {
                width: 40px;
                height: 3px;
                background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
                border-radius: 3px;
            }

            .header-decoration span:nth-child(2) {
                width: 20px;
                opacity: 0.5;
            }

            .header-decoration span:nth-child(3) {
                width: 10px;
                opacity: 0.3;
            }


            /* Timeline mengikuti tinggi seluruh accordion */
            .timeline-wrapper.modern-timeline {
                max-height: none;
                overflow: visible;
                padding-right: 15px;

                scrollbar-width: thin;
                scrollbar-color: #9a9a9a transparent;
            }

            .timeline-wrapper.modern-timeline::-webkit-scrollbar {
                width: 7px;
            }

            .timeline-wrapper.modern-timeline::-webkit-scrollbar-track {
                background: transparent;
            }

            .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb {
                background: #9a9a9a;
                border-radius: 10px;
            }

            .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb:hover {
                background: #707070;
            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       TIMELINE - BULAT MERAH + GARIS PENGHUBUNG
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .timeline-row {
                position: relative;
                display: grid;
                grid-template-columns: 95px minmax(0, 1fr);
                gap: 15px;
                align-items: start;
                margin-bottom: 18px;
            }

            /* GARIS PENGHUBUNG ANTAR TAHUN */
            .timeline-row:not(:last-child)::before {
                content: '';
                position: absolute;

                /* posisi garis di tengah lingkaran tahun */
                left: 47.5px;

                /* mulai dari tengah lingkaran pertama */
                top: 65px;

                /* berhenti di tengah lingkaran berikutnya */
                bottom: -83px;

                width: 3px;

                background: linear-gradient(to bottom,
                        var(--primary-red),
                        var(--accent-gold));

                border-radius: 10px;

                z-index: 0;
            }

            /* BULATAN TAHUN */
            .timeline-row .timeline-year-badge {
                position: relative !important;

                width: 70px;
                height: 70px;
                min-width: 70px;

                margin-top: 18px;
                margin-left: 12px;

                padding: 0;

                display: flex;
                align-items: center;
                justify-content: center;

                background: linear-gradient(135deg,
                        var(--primary-red),
                        var(--primary-dark));

                color: #fff;

                border-radius: 50%;

                font-family: var(--font-primary);
                font-size: 0.9rem;
                font-weight: 700;

                line-height: 1.15;
                text-align: center;

                box-sizing: border-box;

                border: 3px solid #fff;

                box-shadow:
                    0 5px 15px rgba(178, 34, 34, 0.30),
                    0 0 0 1px rgba(178, 34, 34, 0.15);

                z-index: 3;

                transform: none !important;
            }

            /* EFEK HALUS PADA BULATAN */
            .timeline-row .timeline-year-badge::after {
                content: '';

                position: absolute;
                inset: -5px;

                border-radius: 50%;

                border: 1px solid rgba(178, 34, 34, 0.12);

                pointer-events: none;
            }

            .journey-accordion {
                min-width: 0;
                margin: 0;
                padding: 0;
            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ACCORDION
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Card tetap sejajar dan tidak melebar saat dibuka
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================================= */

            .journey-accordion {
                width: 100%;
                min-width: 0;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .journey-accordion>summary {
                width: 100%;
                box-sizing: border-box;
            }

            .journey-accordion>summary {
                list-style: none;
            }

            .journey-accordion>summary::-webkit-details-marker {
                display: none;
            }

            .journey-accordion>summary::marker {
                display: none;
            }

            .timeline-content-card {
                background: white;
                padding: 25px;
                border-radius: 24px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .timeline-content-card::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100px;
                height: 100px;
                background: radial-gradient(circle, rgba(178, 34, 34, 0.02) 0%, transparent 70%);
                border-radius: 50%;
            }

            .timeline-item:hover .timeline-content-card {
                box-shadow: 0 15px 35px rgba(178, 34, 34, 0.1);
            }

            .timeline-year-title {
                color: var(--primary-red);
                font-weight: 700;
                margin-bottom: 15px;
                font-size: 1.2rem;
                position: relative;
                z-index: 2;
                font-family: var(--font-primary);
            }

            .timeline-list {
                list-style: none;
                padding: 0;
                margin: 0;
                position: relative;
                z-index: 2;
            }

            .timeline-list li {
                position: relative;
                padding-left: 20px;
                margin-bottom: 10px;
                color: var(--text-gray);
                font-size: 0.95rem;
                line-height: 1.6;
                font-family: var(--font-primary);
            }

            .timeline-list li::before {
                content: "•";
                position: absolute;
                left: 0;
                color: var(--accent-gold);
                font-weight: bold;
                font-size: 1.2rem;
            }





            /* ========== FOUNDER SECTION ========== */
            .founder-section {
                padding: 80px 0;
                background: transparent;
                position: relative;
                overflow: hidden;
            }

            .founder-image-wrapper.extra-large {
                position: relative;
                padding-right: 0;
                max-width: 500px;
                margin: 0 auto;
            }

            .founder-image.premium.founder-premium-large {
                position: relative;
                border-radius: 40px;
                overflow: hidden;
                box-shadow: 0 30px 50px rgba(0, 0, 0, 0.15);
                border: 12px solid white;
                z-index: 2;
                transition: all 0.6s cubic-bezier(0.2, 0.9, 0.4, 1);
            }

            .image-rotator {
                position: relative;
                overflow: hidden;
                border-radius: 28px;
            }

            .image-rotator img {
                width: 100%;
                height: auto;
                aspect-ratio: 1/1.1;
                object-fit: cover;
                transition: transform 0.8s cubic-bezier(0.2, 0.9, 0.4, 1);
                display: block;
            }

            .founder-image.premium.founder-premium-large:hover {
                transform: translateY(-12px);
                box-shadow: 0 45px 70px rgba(178, 34, 34, 0.25);
                border-color: rgba(255, 215, 0, 0.4);
            }

            .founder-image.premium.founder-premium-large:hover .image-rotator img {
                transform: scale(1.1);
            }

            .image-overlay-glow {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 30% 30%, rgba(255, 215, 0, 0.2), transparent 70%);
                opacity: 0;
                transition: opacity 0.6s ease;
                pointer-events: none;
                z-index: 3;
            }

            .founder-image.premium.founder-premium-large:hover .image-overlay-glow {
                opacity: 1;
            }

            .frame-accent {
                position: absolute;
                top: -8px;
                left: -8px;
                right: -8px;
                bottom: -8px;
                pointer-events: none;
                z-index: 4;
            }

            .accent-corner {
                position: absolute;
                width: 30px;
                height: 30px;
                border-color: var(--accent-gold);
                transition: all 0.5s ease;
                opacity: 0.8;
            }

            .accent-corner.tl {
                top: 0;
                left: 0;
                border-top: 3px solid var(--accent-gold);
                border-left: 3px solid var(--accent-gold);
            }

            .accent-corner.tr {
                top: 0;
                right: 0;
                border-top: 3px solid var(--accent-gold);
                border-right: 3px solid var(--accent-gold);
            }

            .accent-corner.bl {
                bottom: 0;
                left: 0;
                border-bottom: 3px solid var(--accent-gold);
                border-left: 3px solid var(--accent-gold);
            }

            .accent-corner.br {
                bottom: 0;
                right: 0;
                border-bottom: 3px solid var(--accent-gold);
                border-right: 3px solid var(--accent-gold);
            }

            .founder-image.premium.founder-premium-large:hover .accent-corner {
                width: 45px;
                height: 45px;
                opacity: 1;
            }

            .founder-pattern {
                position: absolute;
                top: -25px;
                right: -25px;
                width: 100%;
                height: 100%;
                background-image: radial-gradient(var(--primary-red) 2px, transparent 2px);
                background-size: 25px 25px;
                opacity: 0.1;
                border-radius: 40px;
                z-index: 1;
                transition: all 0.6s ease;
            }

            .founder-image-wrapper.extra-large:hover .founder-pattern {
                opacity: 0.2;
                transform: scale(1.08);
            }


            @keyframes badgeFloat {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-8px);
                }
            }

            .founder-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--text-dark);
                margin-bottom: 30px;
                line-height: 1.2;
                font-family: var(--font-primary);
            }

            .founder-quote {
                position: relative;
                padding-left: 30px;
                margin-bottom: 30px;
                border-left: 4px solid var(--accent-gold);
            }

            .quote-icon {
                color: var(--accent-gold);
                font-size: 1.5rem;
                opacity: 0.3;
                margin-bottom: 10px;
            }

            .founder-quote p {
                font-size: 1.1rem;
                line-height: 1.7;
                color: var(--text-gray);
                font-style: italic;
                margin-bottom: 0;
                font-family: var(--font-primary);
            }

            .founder-story p {
                color: var(--text-gray);
                line-height: 1.8;
                margin-bottom: 20px;
                font-family: var(--font-primary);
            }

            .founder-story strong {
                color: var(--primary-red);
            }

            .text-primary {
                color: var(--primary-red) !important;
                font-weight: 600;
            }

            /* ========== TIM KAMI SECTION ========== */
            .team-section {
                padding: 80px 0;
                background: transparent;
            }

            .team-section h2 {
                font-family: 'Poppins', sans-serif;
            }

            .team-section .lead {
                font-size: 1rem;
            }

            .team-card {
                background: white;
                border-radius: 24px;
                overflow: hidden;
                box-shadow: var(--shadow-sm);
                transition: all 0.3s ease;
                height: 100%;
                border: 1px solid rgba(0, 0, 0, 0.03);
            }

            .team-card:hover {
                transform: translateY(-10px);
                box-shadow: var(--shadow-lg);
            }

            .team-image {
                position: relative;
                height: 300px;
                overflow: hidden;
            }

            .team-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .team-card:hover .team-image img {
                transform: scale(1.1);
            }

            .team-info {
                padding: 25px;
                text-align: center;
            }

            .team-info h5 {
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--text-dark);
                margin-bottom: 5px;
                font-family: var(--font-primary);
            }

            .team-position {
                display: inline-block;
                padding: 6px 18px;
                background: var(--primary-red);
                color: white;
                border-radius: 50px;
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 1px;
                margin-bottom: 15px;
                font-family: var(--font-primary);
            }

            .team-desc {
                color: var(--text-gray);
                line-height: 1.6;
                margin-bottom: 0;
                font-size: 0.95rem;
                font-family: var(--font-primary);
            }

            /* ========== CTA SECTION ========== */
            .cta-section-red-gradient {
                padding: 80px 0;
                position: relative;
                overflow: hidden;
            }

            .cta-wrapper-red {
                position: relative;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-dark), #6B0F0F);
                border-radius: 80px;
                padding: 60px 60px;
                overflow: hidden;
                box-shadow: 0 30px 60px rgba(178, 34, 34, 0.3);
                border: 1px solid rgba(255, 215, 0, 0.2);
            }

            .cta-shapes {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
            }

            .cta-shapes .shape {
                position: absolute;
                border-radius: 50%;
                filter: blur(60px);
            }

            .cta-shapes .s1 {
                width: 400px;
                height: 400px;
                background: rgba(255, 215, 0, 0.1);
                top: -100px;
                right: -100px;
            }

            .cta-shapes .s2 {
                width: 300px;
                height: 300px;
                background: rgba(255, 255, 255, 0.05);
                bottom: -100px;
                left: -50px;
                animation: shapeFloat 25s ease-in-out infinite reverse;
            }

            .cta-shapes .s3 {
                width: 200px;
                height: 200px;
                background: rgba(212, 160, 23, 0.08);
                top: 50%;
                left: 20%;
                filter: blur(80px);
                animation: shapeFloat 18s ease-in-out infinite;
            }

            .cta-particles {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
            }

            .cta-particles {
                display: none;
            }

            .cta-badge {
                display: inline-flex;
                align-items: center;
                gap: 15px;
                padding: 12px 30px;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 100px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                margin-bottom: 30px;
            }

            .cta-badge .badge-dot {
                width: 8px;
                height: 8px;
                background: var(--accent-light);
                border-radius: 50%;
                box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);

            }

            .cta-badge span {
                color: white;
                font-size: 0.85rem;
                font-weight: 600;
                letter-spacing: 3px;
                font-family: var(--font-primary);
            }

            .cta-title-red {
                font-size: 3rem;
                font-weight: 700;
                color: white;
                margin-bottom: 25px;
                line-height: 1.2;
                font-family: 'Poppins', sans-serif;
            }

            .cta-description-red {
                font-size: 1.1rem;
                line-height: 1.8;
                color: rgba(255, 255, 255, 0.9);
                max-width: 700px;
                margin: 0 auto 40px;
                font-weight: 300;
                font-family: var(--font-primary);
            }

            .cta-buttons-red {
                display: flex;
                gap: 25px;
                justify-content: center;
                margin-bottom: 0;
            }

            .btn-cta-red {
                position: relative;
                display: inline-flex;
                align-items: center;
                gap: 12px;
                padding: 16px 36px;
                border-radius: 50px;
                font-size: 1rem;
                font-weight: 600;
                text-decoration: none;
                overflow: hidden;
                border: none;
                font-family: var(--font-primary);
            }

            .btn-primary-red {
                background: white;
                color: var(--primary-dark);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            .btn-primary-red:hover {
                background: #fff5f5;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
                color: var(--primary-dark);
            }

            .btn-outline-red {
                background: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.3);
                backdrop-filter: blur(5px);
            }

            .btn-outline-red:hover {
                background: rgba(255, 255, 255, 0.1);
                border-color: white;
                transform: translateY(-3px);
            }

            /* Back to Top Button */
            .back-to-top {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.2rem;
                cursor: pointer;
                box-shadow: 0 10px 25px rgba(178, 34, 34, 0.3);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                border: 2px solid rgba(255, 215, 0, 0.3);
            }

            .back-to-top.show {
                opacity: 1;
                visibility: visible;
            }

            .back-to-top:hover {
                transform: translateY(-5px);
                background: linear-gradient(135deg, var(--primary-dark), var(--primary-red));
                box-shadow: 0 15px 30px rgba(178, 34, 34, 0.4);
            }

            /* Responsive */
            @media (max-width: 1200px) {
                .heading-line {
                    font-size: 3.5rem;
                }

                .hero-image-container.hero-image-extra-large {
                    max-width: 600px;
                }

                .founder-image-wrapper.extra-large {
                    max-width: 450px;
                }

                .cta-title-red {
                    font-size: 2.8rem;
                }

                .founder-title {
                    font-size: 2.2rem;
                }

                .visi-title,
                .misi-title {
                    font-size: 2.2rem;
                }
            }

            @media (max-width: 992px) {
                .elegant-hero {
                    min-height: auto;
                    padding: 120px 0 60px;
                    text-align: center;
                }

                .heading-line {
                    font-size: 3rem;
                }

                .elegant-desc {
                    margin-left: auto;
                    margin-right: auto;
                }

                .elegant-cta {
                    justify-content: center;
                }

                .hero-image-wrapper {
                    margin-top: 40px;
                }

                .hero-image-container.hero-image-extra-large {
                    max-width: 100%;
                }

                .founder-image-wrapper.extra-large {
                    margin-bottom: 40px;
                    max-width: 400px;
                }

                .founder-title {
                    font-size: 2rem;
                }

                .visi-title,
                .misi-title {
                    font-size: 2rem;
                }

                .visi-full-text {
                    font-size: 1.2rem;
                }

                .misi-list {
                    grid-template-columns: 1fr;
                }

                .vision-mission-premium-card {
                    padding: 40px 30px;
                }

                .cta-title-red {
                    font-size: 2.5rem;
                }

                .cta-buttons-red {
                    flex-direction: column;
                    align-items: center;
                }

                .btn-cta-red {
                    width: 100%;
                    max-width: 300px;
                }


                /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               TABLET
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */


                .elegant-hero {
                    min-height: auto;
                    padding: 100px 20px 60px;
                }

                .elegant-hero .heading-line {
                    font-size: 3.2rem;
                }

                .elegant-hero .elegant-desc {
                    max-width: 650px;
                }

                /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           MOBILE - CARD PERJALANAN MENGIKUTI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           TINGGI ACCORDION YANG TERBUKA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================== */

                .sejarah-section .journey-card.premium-card {
                    width: 100%;
                    box-sizing: border-box;
                }

                .sejarah-section .timeline-wrapper.modern-timeline {
                    min-height: 0;
                    overflow-x: hidden;
                    overflow-y: auto;
                }

                .sejarah-section .journey-accordion {
                    height: auto !important;
                    max-height: none !important;
                    overflow: visible !important;
                }

                .sejarah-section .journey-accordion[open] {
                    height: auto !important;
                    max-height: none !important;
                }

                .sejarah-section .timeline-accordion-content {
                    height: auto !important;
                    max-height: none !important;
                    overflow: visible !important;
                }

            }

            @media (max-width: 768px) {
                .heading-line {
                    font-size: 2.2rem;
                }

                .elegant-desc {
                    font-size: 1rem;
                }

                .elegant-cta {
                    flex-direction: column;
                    align-items: center;
                }

                .btn-elegant {
                    width: 100%;
                    max-width: 280px;
                }

                .visi-header,
                .misi-header {
                    flex-direction: column;
                }

                .visi-title,
                .misi-title {
                    font-size: 1.8rem;
                }

                .visi-full-text {
                    font-size: 1.1rem;
                }

                .vision-mission-premium-card {
                    padding: 30px 20px;
                    border-radius: 40px;
                }

                .misi-item-static {
                    padding: 15px;
                }

                .card-footer-premium {
                    flex-direction: column;
                    gap: 15px;
                    text-align: center;
                }

                .cta-wrapper-red {
                    padding: 50px 30px;
                    border-radius: 40px;
                }

                .cta-title-red {
                    font-size: 2rem;
                }

                .cta-description-red {
                    font-size: 1rem;
                }

                .history-card-inner {
                    flex-direction: column;
                    text-align: center;
                }

                .team-image {
                    height: 250px;
                }

                .elegant-hero {
                    text-align: center;
                }

                .elegant-hero .heading-line {
                    font-size: 2.8rem;
                }

                .elegant-hero .elegant-desc {
                    font-size: 1rem;
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                }

                .elegant-hero .elegant-cta {
                    justify-content: center;
                    flex-direction: row;
                }

                .elegant-hero {
                    padding: 80px 15px 50px;
                }

                .elegant-hero .heading-line {
                    font-size: 2.5rem;
                    line-height: 1.1 !important;
                }

                .elegant-hero .elegant-desc {
                    font-size: 1rem;
                    line-height: 1.5 !important;
                    padding: 0 10px;
                }

                .elegant-hero .elegant-cta {
                    flex-direction: row;
                    justify-content: center;
                    gap: 12px;
                }

                .elegant-hero .btn-elegant {
                    padding: 14px 20px;
                    font-size: 0.9rem;
                }

                .timeline-wrapper.modern-timeline {
                    width: 100%;
                    padding-right: 4px;
                    padding-left: 0;
                    box-sizing: border-box;
                }

                .timeline-row {
                    position: relative;
                    grid-template-columns: 75px minmax(0, 1fr);
                    gap: 10px;
                    width: 100%;
                    box-sizing: border-box;
                }

                .timeline-row:not(:last-child)::before {
                    left: 37.5px;
                    top: 53px;
                    bottom: -76px;
                    width: 3px;
                }

                .timeline-row .timeline-year-badge {
                    position: relative !important;

                    width: 60px;
                    height: 60px;
                    min-width: 60px;

                    margin-top: 18px;
                    margin-left: 7px;

                    padding: 0;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    border-radius: 50%;

                    font-size: 0.8rem;

                    transform: none !important;
                    box-sizing: border-box;

                    z-index: 3;
                }

                .journey-accordion {
                    width: 100%;
                    min-width: 0;
                }

                .journey-accordion>.timeline-content-card {
                    width: 100%;
                    min-width: 0;
                }

                .sejarah-section .col-lg-6:last-child .journey-card.premium-card {
                    margin-top: 15px !important;
                }

                .cta-section-red-gradient .animate__animated {
                    animation: none !important;
                    animation-delay: 0s !important;
                    opacity: 1 !important;
                    transform: none !important;
                }

                /* Saat accordion terbuka, garis mengikuti
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       seluruh tinggi header + isi */
                .sejarah-section .journey-accordion[open] {
                    border-radius: 24px;
                    overflow: hidden;
                    background: #fff;
                }

                /* Matikan garis pada header agar tidak
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       menjadi garis ganda */
                .sejarah-section .journey-accordion[open]>summary.timeline-content-card {
                    border-left: none !important;
                }
            }

            @media (max-width: 576px) {
                .heading-line {
                    font-size: 1.8rem;
                }

                .visi-title,
                .misi-title {
                    font-size: 1.6rem;
                }

                .icon-badge.visi-icon-badge,
                .icon-badge.misi-icon-badge {
                    width: 60px;
                    height: 60px;
                    font-size: 1.6rem;
                }

                .misi-number-static {
                    width: 40px;
                    height: 40px;
                    font-size: 0.9rem;
                }

                .misi-content h4 {
                    font-size: 1rem;
                }

                .misi-content p {
                    font-size: 0.85rem;
                }

                .footer-quote {
                    font-size: 0.9rem;
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .cta-wrapper-red {
                    padding: 40px 20px;
                }

                .cta-title-red {
                    font-size: 1.8rem;
                }

                .section-tag {
                    padding: 6px 18px;
                    font-size: 0.75rem;
                }

                .display-4 {
                    font-size: 2rem;
                }

                .founder-title {
                    font-size: 1.8rem;
                }

                .journey-card.premium-card {
                    padding: 25px;
                }

                .journey-main-title {
                    font-size: 1.5rem;
                }

                .timeline-content-card {
                    padding: 20px;
                }

                .timeline-year-title {
                    font-size: 1.1rem;
                }

                .timeline-list li {
                    font-size: 0.9rem;
                }
            }


            @media (max-width: 576px) {

                .elegant-hero .heading-line {
                    font-size: 2.2rem;
                }

                .elegant-hero .elegant-desc {
                    font-size: 0.92rem;
                    padding: 0 15px;
                }

                .elegant-hero .elegant-cta {
                    flex-direction: column;
                    gap: 12px;
                }

                .elegant-hero .btn-elegant {
                    width: 100%;
                    max-width: 280px;
                    justify-content: center;
                }
            }

            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO TENGAH - VERSI TERBARU
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero {
                position: relative;
                width: 100%;
                min-height: 100vh;

                display: flex;
                align-items: center;

                padding: 80px 0 60px;

                text-align: center;

                background: #ffffff;
                overflow: hidden;
            }


            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               CONTAINER
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero .container {
                position: relative;
                z-index: 10;

                width: 100%;
                max-width: 1240px;

                margin: 0 auto;
                padding-left: 30px;
                padding-right: 30px;
            }

            .elegant-hero .row {
                justify-content: center;
            }


            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               KOLOM HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero .col-lg-6,
            .elegant-hero .col-xl-6 {
                width: 100%;
                max-width: 900px;
                flex: 0 0 100%;
                margin: 0 auto;
            }


            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               BADGE "TENTANG KAMI"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero .premium-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;

                margin: 0 0 18px !important;
                padding: 0 !important;

                background: none !important;
                border: none !important;
                box-shadow: none !important;
            }

            .elegant-hero .premium-badge span {
                font-family: var(--font-primary);
                font-size: 0.85rem;
                font-weight: 600;
                letter-spacing: 2.5px;
                color: #7A6A5A;
            }

            .elegant-hero .premium-badge .badge-dot {
                width: 6px;
                height: 6px;
                background: var(--accent-gold);
                box-shadow: none;
            }


            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               JUDUL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            /* JUDUL HERO ABOUT */
            .elegant-hero .elegant-heading {
                width: 100% !important;
                max-width: 900px !important;

                margin: 0 auto 18px !important;
                padding: 0 !important;

                text-align: center !important;

                font-family: 'Poppins', sans-serif !important;
                font-size: clamp(2.5rem, 4vw, 3.8rem) !important;
                font-weight: 800 !important;
                line-height: 1.1 !important;
                letter-spacing: -1.5px !important;

                background: linear-gradient(135deg,
                        #65000B 0%,
                        #C1121F 50%,
                        #FF3B30 100%);

                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                color: transparent;

                text-shadow: none !important;
            }

            .elegant-hero .heading-line {
                display: block;
                width: 100%;

                margin: 0 !important;
                padding: 0 !important;

                font-family: var(--font-primary);
                font-size: 4.2rem;
                font-weight: 700;

                line-height: 1.05 !important;
                letter-spacing: -0.03em;

                background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;

                text-shadow: none;
            }


            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               DESKRIPSI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero .elegant-desc {
                width: 100%;
                max-width: 650px;

                margin: 0 auto 28px !important;
                padding: 0 !important;

                font-family: var(--font-primary);
                font-size: 1rem;
                font-weight: 400;

                line-height: 1.7 !important;
                letter-spacing: 0;

                color: #5A6A72 !important;

                text-align: center;
            }

            /* ==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               DUA BUTTON
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================== */

            .elegant-hero .elegant-cta {
                display: flex;

                justify-content: center;
                align-items: center;

                gap: 20px;

                width: 100%;

                margin-bottom: 30px;
            }


            /* Font button */

            .elegant-hero .btn-elegant {
                min-width: 190px;

                padding: 14px 28px;

                font-family: var(--font-primary);
                font-size: 0.92rem;
                font-weight: 600;

                justify-content: center;
            }

            /* =========================================================
                                                                                                   HERO ABOUT - MOBILE FINAL
                                                                                                   ========================================================= */

            @media (max-width: 767px) {

                .elegant-hero {
                    width: 100%;

                    min-height: 100svh !important;
                    height: auto !important;

                    padding: 88px 16px 45px !important;

                    margin: 0 !important;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    text-align: center;

                    overflow: hidden;
                    box-sizing: border-box;
                }


                /* CONTAINER */
                .elegant-hero .container {
                    width: 100% !important;
                    max-width: 100% !important;

                    margin: 0 auto !important;
                    padding: 0 !important;
                }


                /* ROW */
                .elegant-hero .row.hero-content {
                    width: 100% !important;
                    max-width: 100% !important;

                    margin: 0 !important;
                    padding: 0 !important;

                    display: flex !important;
                    flex-direction: column !important;

                    align-items: center !important;
                    justify-content: center !important;

                    gap: 0 !important;
                }


                /* =========================================
                                                                                                       BADGE
                                                                                                       ========================================= */

                .elegant-hero .premium-badge {
                    display: inline-flex !important;

                    width: auto !important;
                    max-width: 280px !important;

                    margin: 0 auto 8px !important;
                    padding: 0 !important;

                    align-items: center;
                    justify-content: center;

                    gap: 6px;

                    text-align: center;
                }

                .elegant-hero .premium-badge span {
                    font-size: 0.65rem !important;
                    font-weight: 600 !important;

                    letter-spacing: 1.2px !important;

                    line-height: 1.2 !important;

                    color: #7A6A5A !important;
                }

                .elegant-hero .premium-badge .badge-dot {
                    width: 4px;
                    height: 4px;

                    flex-shrink: 0;
                }


                /* =========================================
                                                                                                       JUDUL UTAMA
                                                                                                       ========================================= */

                .elegant-hero .elegant-heading {
                    display: block !important;

                    width: 100% !important;
                    max-width: 300px !important;

                    margin: 0 auto 12px !important;
                    padding: 0 !important;

                    font-family: 'Poppins', sans-serif !important;

                    font-size: 1.85rem !important;
                    font-weight: 800 !important;

                    line-height: 1.08 !important;

                    letter-spacing: -0.5px !important;

                    text-align: center !important;

                    color: var(--primary-red) !important;

                    background: none !important;

                    -webkit-text-fill-color: var(--primary-red) !important;

                    overflow-wrap: break-word !important;
                    word-break: normal !important;
                }


                /* =========================================
                                                                                                       DESKRIPSI
                                                                                                       ========================================= */

                .elegant-hero .elegant-desc {
                    display: block !important;

                    width: 100% !important;
                    max-width: 285px !important;

                    margin: 0 auto 18px !important;
                    padding: 0 !important;

                    font-family: var(--font-primary) !important;

                    font-size: 0.82rem !important;
                    font-weight: 400 !important;

                    line-height: 1.55 !important;

                    letter-spacing: 0 !important;

                    color: #5A6A72 !important;

                    text-align: center !important;

                    overflow-wrap: break-word !important;
                }


                /* =========================================
                                                                                                       BUTTON CONTAINER
                                                                                                       ========================================= */

                .elegant-hero .elegant-cta {
                    width: 100% !important;

                    display: flex !important;

                    flex-direction: column !important;

                    align-items: center !important;
                    justify-content: center !important;

                    gap: 8px !important;

                    margin: 0 !important;
                }


                /* =========================================
                                                                                                       BUTTON
                                                                                                       ========================================= */

                .elegant-hero .btn-elegant {
                    display: inline-flex !important;

                    width: 100% !important;
                    max-width: 250px !important;

                    min-width: 0 !important;
                    min-height: 44px !important;

                    margin: 0 auto !important;
                    padding: 11px 16px !important;

                    align-items: center !important;
                    justify-content: center !important;

                    gap: 7px;

                    font-family: var(--font-primary) !important;

                    font-size: 0.8rem !important;
                    font-weight: 600 !important;

                    line-height: 1.2 !important;

                    text-align: center;

                    border-radius: 50px !important;

                    box-sizing: border-box;
                }

                .elegant-hero .btn-elegant i {
                    font-size: 0.75rem;
                }

            }

            @media (max-width: 767px) {
                .about-background-image {
                    object-fit: cover;
                    object-position: 75% top !important;
                    transform: translateZ(0);
                }
            }






            /* PERJALANAN RESTO - ACCORDION */

            /* ACCORDION */
            .journey-accordion {
                width: 100%;
                min-width: 0;
                margin: 0;
                padding: 0;
                border: 0;
            }

            /* HILANGKAN PANAH DEFAULT DETAILS */
            .journey-accordion>summary {
                list-style: none;
            }

            .journey-accordion>summary::-webkit-details-marker {
                display: none;
            }

            .journey-accordion>summary::marker {
                display: none;
            }

            /* CARD JUDUL */
            .journey-accordion>.timeline-content-card {
                width: 100%;
                box-sizing: border-box;

                padding: 0 !important;

                background: #fff;
                border-radius: 24px !important;

                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);

                overflow: hidden;
                cursor: pointer;

                transition:
                    box-shadow 0.3s ease,
                    border-color 0.3s ease,
                    background 0.3s ease;
            }

            /* CARD ACCORDION - JUDUL + DESKRIPSI MENJADI SATU KOTAK */

            .journey-accordion {
                width: 100%;
                min-width: 0;
                margin: 0;
                padding: 0;

                background: #fff;

                border-radius: 24px;

                overflow: hidden;
            }

            /* SUMMARY */
            .journey-accordion>summary {
                list-style: none;
                cursor: pointer;
            }

            .journey-accordion>summary::-webkit-details-marker {
                display: none;
            }

            .journey-accordion>summary::marker {
                display: none;
            }

            /* HEADER JUDUL + PANAH */
            .journey-accordion .timeline-accordion-header {
                display: flex !important;
                flex-direction: row !important;

                align-items: center !important;
                justify-content: space-between !important;

                width: 100% !important;
                min-height: 98px;

                box-sizing: border-box;

                padding: 25px 20px 25px 25px;

                gap: 20px;
            }

            /* JUDUL */
            .journey-accordion .timeline-year-title {
                flex: 1 1 auto !important;

                margin: 0 !important;
                padding: 0 !important;

                color: var(--primary-red);

                font-size: 1.05rem;
                font-weight: 700;
                line-height: 1.4;
            }

            /* PANAH */
            .journey-accordion .timeline-toggle {
                flex: 0 0 34px !important;

                width: 34px !important;
                height: 34px !important;
                min-width: 34px !important;
                max-width: 34px !important;

                display: flex !important;
                align-items: center !important;
                justify-content: center !important;

                margin: 0 !important;
                padding: 0 !important;

                border-radius: 50%;

                background: #fff;

                border: 1px solid rgba(0, 0, 0, 0.08);

                color: #5a6a72;
            }

            /* PANAH BERPUTAR */
            .journey-accordion[open] .timeline-toggle i {
                transform: rotate(180deg);
            }

            .journey-accordion .timeline-toggle i {
                transition: transform 0.3s ease;
            }


            .journey-accordion .timeline-list li:last-child {
                margin-bottom: 0;
            }

            /* HOVER */
            .journey-accordion:hover {
                border-color: rgba(178, 34, 34, 0.2);

                box-shadow: 0 10px 25px rgba(178, 34, 34, 0.08);
            }

            /* SAAT TERBUKA */
            .journey-accordion[open] {
                border-color: rgba(178, 34, 34, 0.15);

                box-shadow: 0 10px 25px rgba(178, 34, 34, 0.08);
            }

            /* ANIMASI */
            @keyframes timelineOpen {
                from {
                    opacity: 0;
                    transform: translateY(-5px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   VISI & MISI DI BAWAH SEJARAH
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================= */

            .history-vision-mission {
                margin-top: 0 !important;
            }

            /* Box Visi & Misi */
            .history-vision-box,
            .history-mission-box {
                background: #ffffff;
                border-radius: 40px;
                padding: 20px 22px;
                margin-bottom: 0;

                border: 1px solid rgba(0, 0, 0, 0.06);
                border-left: none;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);

                transition: all 0.3s ease;
            }

            /* Jarak antara card Sejarah dan Visi */
            .history-card+.history-vision-mission .history-vision-box {
                margin-top: 0;
            }

            .history-vision-box {
                margin-top: 0 !important;
                margin-bottom: 15px !important;
                padding-top: 6px !important;
                padding-bottom: 6px !important;
            }

            .history-vision-box:hover,
            .history-mission-box:hover {
                transform: none;
                box-shadow: inherit;
            }

            /* Header */
            .history-vm-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 12px;
            }

            .history-vm-icon {
                width: 38px;
                height: 38px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 50%;

                background: linear-gradient(135deg,
                        var(--primary-red),
                        var(--primary-dark));

                color: white;
                font-size: 0.9rem;

                flex-shrink: 0;
            }

            .history-vm-header h3 {
                margin: 0;
                color: var(--text-dark);
                font-size: 1.15rem;
                font-weight: 700;
            }

            /* Visi */
            .history-vision-box>p {
                margin: 0;
                color: var(--text-gray);
                font-size: 1rem;
                line-height: 1.6;
            }

            /* Misi */
            .history-mission-list {
                display: flex;
                flex-direction: column;
                gap: 9px;
            }

            .history-mission-item {
                display: flex;
                align-items: flex-start;
                gap: 10px;
            }

            .mission-number {
                min-width: 25px;
                height: 25px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 50%;

                background: rgba(178, 34, 34, 0.08);
                color: var(--primary-red);

                font-size: 0.7rem;
                font-weight: 700;
            }

            .history-mission-item strong {
                display: block;
                color: var(--text-dark);
                font-size: 1rem;
                margin-bottom: 1px;
            }

            .history-mission-item p {
                margin: 0;
                color: var(--text-gray);
                font-size: 1rem;
                line-height: 1.45;
            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       CARD PERJALANAN - TINGGI MENGIKUTI KONDISI ACCORDION
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (min-width: 993px) {

                .sejarah-section .journey-card.premium-card {
                    width: 100%;
                    box-sizing: border-box;
                    display: block !important;
                }

                /* Saat tertutup, tinggi ditentukan JavaScript */
                .sejarah-section .journey-card.premium-card {
                    min-height: 0 !important;
                }

                /* Timeline tidak memiliki tinggi tetap dari CSS */
                .sejarah-section .timeline-wrapper.modern-timeline {
                    height: auto;
                    min-height: 0;
                    padding-right: 15px;
                }

            }



            /* Override warna judul hero */
            .elegant-hero .heading-line {
                color: var(--primary-red) !important;
                text-shadow: none !important;
            }

            /* ==============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HERO MOBILE - UKURAN NORMAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ============================== */

            @media (max-width: 576px) {

                .elegant-hero .heading-line {
                    font-size: 2.2rem !important;
                    line-height: 1.12 !important;
                    letter-spacing: -0.025em !important;
                }

                .elegant-hero .elegant-desc {
                    font-size: 0.95rem !important;
                    line-height: 1.5 !important;
                    max-width: 340px !important;
                    margin-left: auto !important;
                    margin-right: auto !important;
                }

                .elegant-hero .btn-elegant {
                    padding: 13px 20px !important;
                    font-size: 0.9rem !important;
                }
            }


            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ABOUT - BACKGROUND IMAGE STABIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .about-background-wrapper {
                position: relative;
                width: 100%;
                overflow: hidden;

                /* fallback ketika image belum selesai dipaint */
                background: #FFF9F0;
            }

            /* Background image utama */
            .about-background-image {
                position: absolute;
                inset: 0;

                width: 100%;
                height: 100%;

                object-fit: cover;
                object-position: center top;

                display: block;

                z-index: 0;

                pointer-events: none;
                user-select: none;

                /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 * Jangan ikut animasi/layout.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 * Ini membuat background tetap stabil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 * ketika section di dalamnya berubah.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 */
                transform: translateZ(0);
                backface-visibility: hidden;
            }

            /* Semua isi About berada di atas background */
            .about-background-wrapper>section,
            .about-background-wrapper>div.elegant-hero {
                position: relative;
                z-index: 1;
            }



            /* Mengatur urutan animasi hero agar lebih cepat */
            .elegant-heading {
                animation-delay: 0.2s !important;
            }

            .elegant-desc {
                animation-delay: 0.4s !important;
            }

            .elegant-cta .btn-primary-elegant {
                animation-delay: 0.6s !important;
            }

            .elegant-cta .btn-outline-elegant {
                animation-delay: 0.8s !important;
            }


            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   PERBAIKAN CARD PERJALANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ===================================================== */

            .sejarah-section .journey-card.premium-card {
                width: 100%;
                max-width: 100%;
                height: auto !important;
                min-height: 0 !important;
                box-sizing: border-box;
            }

            /* Setiap baris timeline mengikuti tinggi isinya */
            .sejarah-section .timeline-row {
                width: 100%;
                min-width: 0;
                height: auto;
                box-sizing: border-box;
                align-items: start;
            }

            /* Accordion tidak boleh melebar */
            .sejarah-section .journey-accordion {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                height: auto;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Header tetap memiliki tinggi normal */
            .sejarah-section .timeline-content-card {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                padding: 0 !important;
                box-sizing: border-box;
            }

            /* Header judul dan tombol */
            .sejarah-section .timeline-accordion-header {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                width: 100% !important;
                min-height: 98px;
                padding: 25px 20px 25px 25px;
                gap: 15px;
                box-sizing: border-box;
            }

            /* Judul tidak mendorong tombol keluar */
            .sejarah-section .timeline-year-title {
                flex: 1 1 auto !important;
                min-width: 0;
                margin: 0 !important;
                overflow-wrap: break-word;
            }

            /* Tombol panah tetap berukuran tetap */
            .sejarah-section .timeline-toggle {
                flex: 0 0 34px !important;
                width: 34px !important;
                height: 34px !important;
                min-width: 34px !important;
                max-width: 34px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                box-sizing: border-box;
            }

            /* Isi tidak boleh melebar */
            .sejarah-section .timeline-accordion-content {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                box-sizing: border-box;
                overflow: hidden;
            }

            /* List tetap berada di dalam card */
            .sejarah-section .timeline-list {
                width: 100%;
                max-width: 100%;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Teks panjang turun ke bawah, bukan melebar */
            .sejarah-section .timeline-list li {
                max-width: 100%;
                overflow-wrap: break-word;
                word-break: normal;
                box-sizing: border-box;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   CARD PERJALANAN SELALU SEJAJAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ===================================================== */

            .sejarah-section .journey-card.premium-card {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow: visible;
            }

            /* Timeline menjadi area scroll internal */
            .sejarah-section .timeline-wrapper.modern-timeline {
                width: 100%;
                min-width: 0;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
            }

            /* Accordion tidak boleh mengubah lebar card */
            .sejarah-section .journey-accordion {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                box-sizing: border-box;
            }

            /* Isi accordion tetap berada di dalam timeline */
            .sejarah-section .timeline-accordion-content {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow: hidden;
            }

            /* Teks panjang turun ke bawah */
            .sejarah-section .timeline-list li {
                max-width: 100%;
                overflow-wrap: break-word;
                word-break: normal;
            }



            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                   HERO ABOUT — DESKTOP
                                                                                                                                                                                                                                                                                                                                                                                                                                                   Fokus: ukuran nyaman, proporsional, dan mudah dibaca
                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================================= */

            /* =========================================================
                                                                                                                                                                   HERO ABOUT — DESKTOP
                                                                                                                                                                   ========================================================= */

            /* =========================================================
                                                                               HERO ABOUT — DESKTOP FINAL
                                                                               ========================================================= */

            @media (min-width: 769px) {

                /* =====================================================
                                                                                   ROW HERO
                                                                                   ===================================================== */

                .elegant-hero .row.hero-content {
                    width: 100% !important;
                    max-width: 100% !important;

                    margin: 0 !important;
                    padding: 0 !important;

                    display: flex !important;
                    flex-direction: column !important;

                    align-items: center !important;
                    justify-content: center !important;

                    text-align: center !important;
                }


                /* =====================================================
                                                                                   BADGE
                                                                                   ===================================================== */

                .elegant-hero .premium-badge {
                    display: inline-flex !important;

                    align-items: center;
                    justify-content: center;

                    gap: 10px;

                    width: auto !important;

                    margin: 0 auto 16px !important;
                    padding: 0 !important;

                    text-align: center;
                }

                .elegant-hero .premium-badge span {
                    font-family: 'Poppins', sans-serif !important;

                    font-size: 0.85rem !important;
                    font-weight: 500 !important;

                    letter-spacing: 2.5px !important;

                    line-height: 1.2;

                    text-align: center;
                }


                /* =====================================================
                                                                                   JUDUL
                                                                                   ===================================================== */

                .elegant-hero .elegant-heading {
                    display: block !important;

                    width: 100% !important;
                    max-width: 900px !important;

                    margin: 0 auto 16px !important;
                    padding: 0 !important;

                    font-family: 'Poppins', sans-serif !important;

                    font-size: 3.8rem !important;
                    font-weight: 800 !important;

                    line-height: 1.08 !important;

                    letter-spacing: -1.5px !important;

                    text-align: center !important;

                    box-sizing: border-box;
                }


                /* =====================================================
                                                                                   DESKRIPSI
                                                                                   ===================================================== */

                .elegant-hero .elegant-desc {
                    display: block !important;

                    width: 100% !important;
                    max-width: 650px !important;

                    margin: 0 auto 26px !important;
                    padding: 0 !important;

                    font-family: 'Poppins', sans-serif !important;

                    font-size: 1rem !important;
                    font-weight: 400 !important;

                    line-height: 1.65 !important;

                    letter-spacing: 0 !important;

                    text-align: center !important;

                    box-sizing: border-box;
                }


                /* =====================================================
                                                                                   BUTTON CONTAINER
                                                                                   ===================================================== */

                .elegant-hero .elegant-cta {
                    display: flex !important;

                    width: 100% !important;

                    align-items: center !important;
                    justify-content: center !important;

                    gap: 16px !important;

                    margin: 0 auto !important;
                    padding: 0 !important;

                    text-align: center;
                }


                /* =====================================================
                                                                                   BUTTON
                                                                                   ===================================================== */

                .elegant-hero .btn-elegant {
                    min-width: 190px !important;
                    min-height: 52px !important;

                    padding: 14px 28px !important;

                    display: inline-flex !important;

                    align-items: center !important;
                    justify-content: center !important;

                    gap: 8px;

                    font-family: 'Poppins', sans-serif !important;

                    font-size: 0.92rem !important;
                    font-weight: 600 !important;

                    line-height: 1 !important;

                    text-align: center;

                    border-radius: 50px !important;

                    box-sizing: border-box;
                }

                .elegant-hero .btn-elegant i {
                    font-size: 0.9rem !important;
                }
            }



            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                           PERJALANAN — ACCORDION DALAM CARD TETAP
                                                                                                                                                                                                                                                                                                                                                                                                                                           DESKTOP
                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================================= */

            @media (min-width: 993px) {

                .sejarah-section .journey-card.premium-card {
                    width: 100% !important;
                    max-width: 100% !important;
                    box-sizing: border-box !important;
                    overflow: visible !important;
                }


                /* AREA TIMELINE */
                .sejarah-section .timeline-wrapper.modern-timeline {
                    width: 100% !important;

                    box-sizing: border-box !important;

                    overflow-x: hidden !important;
                    overflow-y: auto !important;

                    scrollbar-width: thin;
                }


                /* SETIAP ACCORDION */
                .sejarah-section .journey-accordion {
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 0 !important;

                    height: auto !important;
                    max-height: none !important;

                    margin: 0 0 18px 0 !important;

                    box-sizing: border-box !important;
                }


                /* ACCORDION TERBUKA */
                .sejarah-section .journey-accordion[open] {
                    height: auto !important;
                    max-height: none !important;

                    overflow: visible !important;

                    background: #fff;
                }


                /* HEADER */
                .sejarah-section .journey-accordion>summary {
                    width: 100% !important;

                    box-sizing: border-box !important;

                    cursor: pointer;
                }


                /* ISI ACCORDION */
                .sejarah-section .timeline-accordion-content {
                    width: 100% !important;
                    max-width: 100% !important;

                    box-sizing: border-box !important;

                    padding: 0 25px 25px 25px !important;

                    overflow: visible !important;
                }


                /* LIST */
                .sejarah-section .timeline-list {
                    width: 100% !important;
                    max-width: 100% !important;

                    margin: 0 !important;
                    padding: 0 !important;

                    box-sizing: border-box !important;
                }


                /* TEKS */
                .sejarah-section .timeline-list li {
                    width: 100% !important;
                    max-width: 100% !important;

                    box-sizing: border-box !important;

                    overflow-wrap: break-word !important;
                    word-break: normal !important;
                }
            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                       ACCORDION PERJALANAN - FINAL
                                                                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .journey-accordion {
                width: 100%;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .sejarah-section .journey-accordion>summary {
                width: 100%;
                box-sizing: border-box;
                list-style: none;
                cursor: pointer;
            }

            .sejarah-section .journey-accordion>summary::-webkit-details-marker {
                display: none;
            }

            .sejarah-section .journey-accordion>summary::marker {
                display: none;
            }

            /* Card judul */
            .sejarah-section .timeline-content-card {
                width: 100%;
                box-sizing: border-box;
                background: #fff;
                padding: 25px;
                border-radius: 24px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
                position: relative;
                overflow: hidden;
            }

            /* Isi accordion */
            .sejarah-section .timeline-accordion-content {
                width: 100%;
                box-sizing: border-box;
                padding: 0 25px 25px 25px;
                background: #fff;
                color: var(--text-gray);
            }

            /* Saat tertutup */
            .sejarah-section .journey-accordion:not([open]) .timeline-accordion-content {
                display: none;
            }

            /* Saat terbuka */
            .sejarah-section .journey-accordion[open] .timeline-accordion-content {
                display: block;
            }

            /* List */
            .sejarah-section .timeline-accordion-content .timeline-list {
                width: 100%;
                list-style: none;
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            /* Item */
            .sejarah-section .timeline-accordion-content .timeline-list li {
                display: list-item;
                position: relative;
                width: 100%;
                padding-left: 20px;
                margin-bottom: 10px;
                box-sizing: border-box;

                color: var(--text-gray);
                font-size: 0.9rem;
                line-height: 1.6;
                font-family: var(--font-primary);

                opacity: 1;
                visibility: visible;
                transform: none;
            }

            /* Bullet */
            .sejarah-section .timeline-accordion-content .timeline-list li::before {
                content: "•";
                position: absolute;
                left: 0;
                color: var(--accent-gold);
                font-size: 1.2rem;
                font-weight: bold;
            }

            /* Panah */
            .sejarah-section .journey-accordion .timeline-toggle i {
                transition: transform 0.3s ease;
            }

            .sejarah-section .journey-accordion[open] .timeline-toggle i {
                transform: rotate(180deg);
            }



            .sejarah-section .timeline-accordion-content .timeline-list li::before {
                content: "•";

                position: absolute;
                left: 0;

                color: var(--accent-gold);
                font-size: 1.2rem;
                font-weight: bold;
            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       ACCORDION PERJALANAN - FINAL CLEAN
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-wrapper.modern-timeline {
                width: 100%;
                box-sizing: border-box;
            }

            .sejarah-section .timeline-row {
                position: relative;
                display: grid;
                grid-template-columns: 80px minmax(0, 1fr);
                gap: 16px;

                width: 100%;
                margin-bottom: 18px;

                align-items: start;
                box-sizing: border-box;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       GARIS TIMELINE
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-row:not(:last-child)::before {
                content: "";

                position: absolute;

                left: 39px;
                top: 70px;
                bottom: -18px;

                width: 3px;

                background: linear-gradient(to bottom,
                        var(--primary-red),
                        var(--accent-gold));

                border-radius: 10px;

                z-index: 0;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       BULATAN TAHUN
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-year-badge {
                position: relative;

                width: 70px;
                height: 70px;

                margin: 18px 0 0 4px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 50%;

                background: linear-gradient(135deg,
                        var(--primary-red),
                        var(--primary-dark));

                color: #fff;

                font-family: var(--font-primary);
                font-size: 0.85rem;
                font-weight: 700;

                line-height: 1.15;
                text-align: center;

                border: 3px solid #fff;

                box-shadow:
                    0 5px 15px rgba(178, 34, 34, 0.25),
                    0 0 0 1px rgba(178, 34, 34, 0.12);

                box-sizing: border-box;

                z-index: 3;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       ACCORDION CONTAINER
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .journey-accordion {
                width: 100%;
                min-width: 0;

                margin: 0;
                padding: 0;

                box-sizing: border-box;

                background: #fff;
                border-radius: 24px;

                overflow: hidden;

                box-shadow:
                    0 8px 25px rgba(0, 0, 0, 0.04);
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       BUTTON HEADER
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .journey-accordion .accordion-trigger {
                display: block;

                width: 100%;

                margin: 0;
                padding: 0;

                border: 0;

                border-radius: 24px;

                background: #fff;

                cursor: pointer;

                text-align: left;

                appearance: none;
                -webkit-appearance: none;

                box-sizing: border-box;

                overflow: hidden;

                transition:
                    box-shadow 0.25s ease,
                    border-color 0.25s ease;
            }


            /* Saat terbuka, border radius bawah jangan terputus */

            .sejarah-section .journey-accordion.is-open .accordion-trigger {
                border-radius: 24px 24px 0 0;
            }


            /* Hover */

            .sejarah-section .journey-accordion .accordion-trigger:hover {
                box-shadow:
                    0 10px 28px rgba(178, 34, 34, 0.08);
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       HEADER DALAM CARD
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-accordion-header {
                display: flex;

                align-items: center;
                justify-content: space-between;

                width: 100%;
                min-height: 98px;

                padding: 22px 20px 22px 24px;

                gap: 18px;

                box-sizing: border-box;
            }


            /* Judul */

            .sejarah-section .timeline-year-title {
                flex: 1 1 auto;

                min-width: 0;

                margin: 0;
                padding: 0;

                color: var(--primary-red);

                font-family: var(--font-primary);

                font-size: 1.05rem;
                font-weight: 700;

                line-height: 1.4;

                word-break: normal;
                overflow-wrap: break-word;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       TOMBOL PANAH
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-toggle {
                flex: 0 0 38px;

                width: 38px;
                height: 38px;

                display: flex;

                align-items: center;
                justify-content: center;

                border-radius: 50%;

                background: #fff;

                border: 1px solid rgba(0, 0, 0, 0.08);

                color: #68757c;

                box-sizing: border-box;
            }


            .sejarah-section .timeline-toggle i {
                font-size: 0.9rem;

                transition:
                    transform 0.3s ease;
            }


            .sejarah-section .journey-accordion.is-open .timeline-toggle i {
                transform: rotate(180deg);
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       ISI ACCORDION
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-accordion-content {
                display: none;

                width: 100%;

                margin: 0;
                padding: 0 24px 24px 24px;

                background: #fff;

                box-sizing: border-box;

                border-radius: 0 0 24px 24px;
            }


            .sejarah-section .journey-accordion.is-open .timeline-accordion-content {
                display: block;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       LIST
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-list {
                width: 100%;

                margin: 0;
                padding: 4px 0 0 0;

                list-style: none;

                box-sizing: border-box;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       ITEM
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            .sejarah-section .timeline-list li {
                position: relative;

                width: 100%;

                margin: 0 0 10px 0;
                padding: 0 0 0 22px;

                color: var(--text-gray);

                font-family: var(--font-primary);

                font-size: 0.9rem;
                line-height: 1.65;

                box-sizing: border-box;

                overflow-wrap: break-word;
            }


            .sejarah-section .timeline-list li:last-child {
                margin-bottom: 0;
            }


            /* Bullet */

            .sejarah-section .timeline-list li::before {
                content: "•";

                position: absolute;

                left: 0;
                top: 0;

                color: var(--accent-gold);

                font-size: 1.2rem;
                font-weight: 700;

                line-height: 1.4;
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       DESKTOP
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (min-width: 993px) {

                .sejarah-section .timeline-row {
                    grid-template-columns: 80px minmax(0, 1fr);
                    gap: 16px;
                }

            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       TABLET
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (max-width: 992px) {

                .sejarah-section .timeline-row {
                    grid-template-columns: 75px minmax(0, 1fr);
                    gap: 12px;
                }

                .sejarah-section .timeline-year-badge {
                    width: 60px;
                    height: 60px;

                    margin-left: 5px;

                    font-size: 0.78rem;
                }

                .sejarah-section .timeline-row:not(:last-child)::before {
                    left: 34px;
                    top: 60px;
                }

            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                       MOBILE
                                                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (max-width: 576px) {

                .sejarah-section .timeline-row {
                    grid-template-columns: 55px minmax(0, 1fr);
                    gap: 10px;
                }

                .sejarah-section .timeline-year-badge {
                    width: 50px;
                    height: 50px;

                    margin-left: 2px;
                    margin-top: 18px;

                    font-size: 0.7rem;
                }

                .sejarah-section .timeline-row:not(:last-child)::before {
                    left: 26px;
                    top: 50px;
                    bottom: -18px;
                }

                .sejarah-section .timeline-accordion-header {
                    min-height: 80px;

                    padding: 18px 15px 18px 18px;

                    gap: 12px;
                }

                .sejarah-section .timeline-year-title {
                    font-size: 0.95rem;
                }

                .sejarah-section .timeline-toggle {
                    flex-basis: 32px;

                    width: 32px;
                    height: 32px;
                }

                .sejarah-section .timeline-accordion-content {
                    padding: 0 18px 20px 18px;
                }

                .sejarah-section .timeline-list li {
                    font-size: 0.85rem;
                    line-height: 1.6;
                }

            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                   FINAL - CARD PERJALANAN TETAP + SCROLL INTERNAL
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

            .sejarah-section .journey-card.premium-card {
                width: 100%;
                box-sizing: border-box;

                overflow: hidden !important;

                /* tinggi akan ditentukan JavaScript */
                height: auto;
                min-height: 0;
            }


            /* Area timeline menjadi area scroll */
            .sejarah-section .timeline-wrapper.modern-timeline {
                min-height: 0;
                overflow-x: hidden !important;
                overflow-y: auto !important;

                scrollbar-width: thin;
                scrollbar-color: #9a9a9a transparent;
            }

            .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar {
                width: 7px;
            }

            .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-track {
                background: transparent;
            }

            .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb {
                background: #9a9a9a;
                border-radius: 10px;
            }

            .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb:hover {
                background: #707070;
            }

            .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb:hover {
                background: var(--primary-dark);
            }


            /* Accordion tidak boleh membuat card utama membesar */
            .sejarah-section .journey-accordion {
                width: 100%;
                max-width: 100%;

                box-sizing: border-box;

                overflow: visible;
            }


            /* Isi accordion */
            .sejarah-section .timeline-accordion-content {
                width: 100%;
                max-width: 100%;

                box-sizing: border-box;

                overflow: visible;

                padding: 0 24px 24px;
            }


            /* Jangan biarkan teks panjang membuat lebar card berubah */
            .sejarah-section .timeline-list,
            .sejarah-section .timeline-list li {
                max-width: 100%;
                box-sizing: border-box;

                overflow-wrap: anywhere;
                word-break: normal;
            }





            /* =========================================================
                                                                                                                                                                                                                                                                                                                                   TABLET
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

            @media (max-width: 992px) {

                .sejarah-section .journey-card.premium-card {
                    height: auto !important;
                    min-height: 0 !important;
                }

                .sejarah-section .timeline-wrapper.modern-timeline {
                    max-height: 520px;
                    overflow-y: auto !important;
                }

            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                                   MOBILE
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

            @media (max-width: 576px) {

                .sejarah-section .journey-card.premium-card {
                    height: auto !important;
                    min-height: 0 !important;
                }

                .sejarah-section .timeline-wrapper.modern-timeline {
                    max-height: 430px;
                    overflow-y: auto !important;

                    padding-right: 8px;
                }

                .sejarah-section .timeline-accordion-content {
                    padding-left: 18px;
                    padding-right: 18px;
                    padding-bottom: 20px;
                }

            }



            /* =========================
                                                                                                                                                                                                                                                                                                                           TEKS PANJANG
                                                                                                                                                                                                                                                                                                                           ========================= */

            .sejarah-section .history-card p,
            .sejarah-section .visi-full-text,
            .sejarah-section .misi-item-static p {
                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =========================
                                                                                                                                                                                                                                                                                                                           MOBILE
                                                                                                                                                                                                                                                                                                                           ========================= */

            @media (max-width: 768px) {

                .sejarah-section .history-card,
                .sejarah-section .history-vision-mission {
                    max-width: 100%;
                    box-sizing: border-box;
                }

            }

            /* =========================================================
                                                                                                                                                                                                                                                                                                       SEJAJARKAN BAWAH CARD SEJARAH + VISI + MISI
                                                                                                                                                                                                                                                                                                       DENGAN CARD PERJALANAN
                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (min-width: 993px) {

                /* Kolom kiri dan kanan mengikuti tinggi terpanjang */
                .sejarah-section .container>.row {
                    align-items: stretch !important;
                }

                /* =====================================================
                                                                                                                                                                                                                                                                                                           KOLOM KIRI
                                                                                                                                                                                                                                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:first-child {
                    display: flex;
                    flex-direction: column;
                    min-height: 0;
                }

                /* =====================================================
                                                                                                                                                                                                                                                                                                           BAGIAN SEJARAH
                                                                                                                                                                                                                                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:first-child>.section-header {
                    display: block;
                    flex: none;
                    min-height: 0;
                }

                .sejarah-section .history-card {
                    flex: none;
                    height: 350px;
                    min-height: 350px;
                    max-height: 350px;
                    overflow: hidden !important;
                    box-sizing: border-box;
                }

                .sejarah-section .history-card-inner {
                    height: 100%;
                    max-height: 100%;
                    overflow-y: auto;
                    overflow-x: hidden;
                    box-sizing: border-box;
                    padding-right: 8px;
                }

                /* =====================================================
                                                                                                                                                                                                                                                                                                           VISI + MISI
                                                                                                                                                                                                                                                                                                           ===================================================== */

                .sejarah-section .history-vision-mission {
                    display: flex;
                    flex-direction: column;

                    flex: 0 0 auto;
                    min-height: 0;

                    overflow: visible;
                }

                .sejarah-section .history-vision-box {
                    overflow: hidden !important;

                    box-sizing: border-box;
                }

                .sejarah-section .history-mission-box {
                    flex: none;

                    height: 445px;
                    min-height: 445px;
                    max-height: 445px;

                    overflow: hidden !important;

                    box-sizing: border-box;
                }



                /* =====================================================
                                                                                                                                                                                                                                                                                                           KOLOM PERJALANAN
                                                                                                                                                                                                                                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:last-child {
                    display: flex;
                    flex-direction: column;
                    min-height: 0;
                }

                .sejarah-section .journey-card.premium-card {
                    width: 100%;
                    min-height: 0;
                    box-sizing: border-box;
                }

                .sejarah-section .timeline-wrapper.modern-timeline {
                    min-height: 0;
                    overflow-y: auto !important;
                    overflow-x: hidden !important;

                    scrollbar-width: thin;
                    scrollbar-color: #9a9a9a transparent;
                }

                .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar {
                    width: 7px;
                }

                .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-track {
                    background: transparent;
                }

                .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb {
                    background: #9a9a9a;
                    border-radius: 10px;
                }

                .sejarah-section .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb:hover {
                    background: #707070;
                }
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                       MOBILE / TABLET
                                                                                                                                                                                                                                                                                                       ========================================================= */

            /* =========================================================
                                                                                       SEJARAH + VISI MISI - MOBILE FINAL
                                                                                       ========================================================= */

            @media (max-width: 992px) {

                /* =====================================================
                                                                                           KOLOM KIRI
                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:first-child {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;
                }


                /* =====================================================
                                                                                           KOLOM KANAN
                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:last-child {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;
                }


                /* =====================================================
                                                                                           SECTION HEADER
                                                                                           History card berada di dalam section-header
                                                                                           ===================================================== */

                .sejarah-section .container>.row>.col-lg-6:first-child>.section-header {
                    display: block !important;

                    width: 100% !important;
                    height: auto !important;

                    min-height: 0 !important;

                    margin-bottom: 20px !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;
                }


                /* =====================================================
                                                                                           LABEL SEJARAH
                                                                                           ===================================================== */

                .sejarah-section .section-tag-wrapper {
                    display: inline-block !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;
                }


                /* =====================================================
                                                                                           HISTORY CARD
                                                                                           ===================================================== */

                .sejarah-section .history-card {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: 300px !important;
                    min-height: 300px !important;
                    max-height: 300px !important;

                    margin: 0 !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;

                    overflow-y: auto !important;
                    overflow-x: hidden !important;

                    box-sizing: border-box;

                    scrollbar-width: thin;
                    scrollbar-color: #b42222 transparent;
                }


                /* =====================================================
                                                                                           VISI + MISI
                                                                                           ===================================================== */

                .sejarah-section .history-vision-mission {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;
                    max-height: none !important;

                    margin-top: 0 !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;

                    overflow: visible !important;
                }


                /* =====================================================
                                                                                           CARD VISI
                                                                                           ===================================================== */

                .sejarah-section .history-vision-box {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;
                    max-height: none !important;

                    margin-top: 0 !important;
                    margin-bottom: 15px !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;

                    overflow: visible !important;

                    box-sizing: border-box;
                }


                /* =====================================================
                                                                                           CARD MISI
                                                                                           ===================================================== */

                .sejarah-section .history-mission-box {
                    display: block !important;

                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;
                    max-height: none !important;

                    margin-top: 0 !important;

                    opacity: 1 !important;
                    visibility: visible !important;

                    transform: none !important;

                    overflow: visible !important;

                    box-sizing: border-box;
                }


                /* =====================================================
                                                                                           JOURNEY CARD
                                                                                           ===================================================== */

                .sejarah-section .journey-card.premium-card {
                    width: 100% !important;
                    max-width: 100% !important;

                    height: auto !important;
                    min-height: 0 !important;
                    max-height: none !important;

                    margin-top: 25px !important;

                    box-sizing: border-box;
                }
            }


            /* =========================================================
                                                                                                                                                                                                                                                                                                                       MOBILE
                                                                                                                                                                                                                                                                                                                       ========================================================= */

            @media (max-width: 992px) {

                .sejarah-section .container>.row>.col-lg-6:first-child,
                .sejarah-section .container>.row>.col-lg-6:last-child {
                    display: block;
                    height: auto;
                }

                .sejarah-section .history-vision-mission {
                    display: block;
                    height: auto;
                    overflow: visible;
                }

                .sejarah-section .history-mission-box {
                    height: auto;
                    max-height: none;
                }

                .sejarah-section .history-vision-box {
                    height: auto;
                    max-height: none;
                }

            }






            /* =========================================================
                                                                                                                                                                                                                               SCROLLBAR INTERNAL CARD
                                                                                                                                                                                                                               ========================================================= */

            .sejarah-section .history-card-inner {
                height: 100%;
                max-height: 100%;
                overflow-y: auto;
                overflow-x: hidden;
                box-sizing: border-box;
                padding-right: 8px;

                scrollbar-width: thin;
                scrollbar-color: #9a9a9a transparent;
            }

            .sejarah-section .history-card-inner::-webkit-scrollbar {
                width: 7px;
            }

            .sejarah-section .history-card-inner::-webkit-scrollbar-track {
                background: transparent;
            }

            .sejarah-section .history-card-inner::-webkit-scrollbar-thumb {
                background: #9a9a9a;
                border-radius: 10px;
            }

            .sejarah-section .history-card-inner::-webkit-scrollbar-thumb:hover {
                background: #707070;
            }


            /* =========================================================
                                                                                                                                                                                                                               VISI
                                                                                                                                                                                                                               ========================================================= */

            .sejarah-section .history-vision-box>p {
                max-height: 90px;
                overflow-y: auto;
                overflow-x: hidden;
                padding-right: 8px;

                scrollbar-width: thin;
                scrollbar-color: #9a9a9a transparent;
            }

            .sejarah-section .history-vision-box>p::-webkit-scrollbar {
                width: 7px;
            }

            .sejarah-section .history-vision-box>p::-webkit-scrollbar-track {
                background: transparent;
            }

            .sejarah-section .history-vision-box>p::-webkit-scrollbar-thumb {
                background: #9a9a9a;
                border-radius: 10px;
            }

            .sejarah-section .history-vision-box>p::-webkit-scrollbar-thumb:hover {
                background: #707070;
            }


            /* =========================================================
                                                                                                                                                                                                                               MISI
                                                                                                                                                                                                                               ========================================================= */

            .sejarah-section .history-mission-list {
                max-height: 350px;
                overflow-y: auto;
                overflow-x: hidden;
                padding-right: 8px;

                scrollbar-width: thin;
                scrollbar-color: #9a9a9a transparent;
            }

            .sejarah-section .history-mission-list::-webkit-scrollbar {
                width: 7px;
            }

            .sejarah-section .history-mission-list::-webkit-scrollbar-track {
                background: transparent;
            }

            .sejarah-section .history-mission-list::-webkit-scrollbar-thumb {
                background: #9a9a9a;
                border-radius: 10px;
            }

            .sejarah-section .history-mission-list::-webkit-scrollbar-thumb:hover {
                background: #707070;
            }
        </style>

    @endsection



    @section('scripts')

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                /* =========================================================
                   AOS
                ========================================================= */
                if (typeof AOS !== 'undefined') {
                    AOS.init({
                        duration: 1000,
                        once: true,
                        offset: 80
                    });
                }

                /* =========================================================
                   ACCORDION PERJALANAN
                   ========================================================= */

                document.querySelectorAll('.journey-accordion').forEach(function(accordion) {

                    const trigger = accordion.querySelector('.accordion-trigger');

                    if (!trigger) return;

                    trigger.addEventListener('click', function() {

                        accordion.classList.toggle('is-open');

                    });

                });


                /* =========================================================
                   SAMAKAN TINGGI CARD PERJALANAN DENGAN KOLOM KIRI
                ========================================================= */
                function alignJourneyWithMission() {

                    const sejarahSection = document.querySelector('.sejarah-section');

                    if (!sejarahSection) return;

                    const row = sejarahSection.querySelector('.container > .row');
                    const leftColumn = row?.querySelector('.col-lg-6:first-child');
                    const historyCard = leftColumn?.querySelector('.history-card');
                    const visionMission = leftColumn?.querySelector('.history-vision-mission');

                    const journeyCard =
                        row?.querySelector('.col-lg-6:last-child .journey-card.premium-card');

                    const timelineWrapper =
                        journeyCard?.querySelector('.timeline-wrapper.modern-timeline');

                    if (
                        !row ||
                        !leftColumn ||
                        !historyCard ||
                        !visionMission ||
                        !journeyCard ||
                        !timelineWrapper
                    ) {
                        return;
                    }

                    /* RESET */

                    leftColumn.style.removeProperty('height');
                    leftColumn.style.removeProperty('min-height');

                    journeyCard.style.removeProperty('height');
                    journeyCard.style.removeProperty('min-height');
                    journeyCard.style.removeProperty('max-height');
                    journeyCard.style.marginTop = '';

                    timelineWrapper.style.removeProperty('height');
                    timelineWrapper.style.removeProperty('max-height');
                    timelineWrapper.style.removeProperty('overflow-y');
                    timelineWrapper.style.removeProperty('overflow-x');


                    /* MOBILE / TABLET */

                    if (window.innerWidth < 993) {
                        return;
                    }


                    /* =====================================================
                       SAMAKAN POSISI ATAS
                       ===================================================== */

                    const historyTop =
                        historyCard.getBoundingClientRect().top;

                    const journeyTop =
                        journeyCard.getBoundingClientRect().top;

                    const topDifference =
                        Math.ceil(historyTop - journeyTop);

                    journeyCard.style.marginTop =
                        topDifference + 'px';


                    /* =====================================================
                       TENTUKAN TINGGI PERJALANAN
                       DARI BOTTOM VISI + MISI
                       ===================================================== */

                    const missionBottom =
                        visionMission.getBoundingClientRect().bottom;

                    const adjustedJourneyTop =
                        journeyCard.getBoundingClientRect().top;

                    const journeyHeight =
                        Math.ceil(missionBottom - adjustedJourneyTop);


                    /* =====================================================
                       CARD PERJALANAN
                       ===================================================== */

                    journeyCard.style.height =
                        journeyHeight + 'px';

                    journeyCard.style.minHeight =
                        journeyHeight + 'px';

                    journeyCard.style.maxHeight =
                        journeyHeight + 'px';


                    /* =====================================================
                       TIMELINE MENJADI SCROLL
                       ===================================================== */

                    const headerHeight =
                        journeyCard.querySelector('.journey-header')?.offsetHeight || 150;

                    const timelineHeight =
                        Math.max(
                            journeyHeight - headerHeight - 35,
                            180
                        );

                    timelineWrapper.style.height =
                        timelineHeight + 'px';

                    timelineWrapper.style.maxHeight =
                        timelineHeight + 'px';

                    timelineWrapper.style.overflowY =
                        'auto';

                    timelineWrapper.style.overflowX =
                        'hidden';
                }

                /* =========================================================
                   JALANKAN SETELAH HALAMAN SIAP
                ========================================================= */

                alignJourneyWithMission();

                requestAnimationFrame(function() {
                    alignJourneyWithMission();
                });


                window.addEventListener('load', function() {
                    alignJourneyWithMission();
                });


                /* =========================================================
                   RESPONSIVE
                ========================================================= */

                let resizeTimer;

                window.addEventListener('resize', function() {

                    clearTimeout(resizeTimer);

                    resizeTimer = setTimeout(function() {
                        alignJourneyWithMission();
                    }, 150);

                });
                /* TUTUP DOMContentLoaded */
            });
        </script>

    @endsection
