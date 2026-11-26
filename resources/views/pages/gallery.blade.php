@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
    @php
        $galleryData = $galleryItems ?? collect();

        $galleryHeroScript = $galleryHero?->hero_script ?? '';
        $galleryHeroTitle1 = $galleryHero?->hero_title_line1 ?? '';
        $galleryHeroTitle2 = $galleryHero?->hero_title_line2 ?? '';
        $galleryHeroTitle3 = $galleryHero?->hero_title_line3 ?? '';
        $galleryHeroDescription = $galleryHero?->hero_description ?? '';
        $galleryHeroImage = $galleryHero?->hero_image ?? '';

        if (!empty($galleryHeroImage)) {
            $galleryHeroImage = filter_var($galleryHeroImage, FILTER_VALIDATE_URL)
                ? $galleryHeroImage
                : asset('storage/' . ltrim($galleryHeroImage, '/'));
        }
        $galleryTitle = $galleryHero?->gallery_title ?? 'Galeri Kami';
        $galleryDescription =
            $galleryHero?->gallery_description ??
            'Temukan inspirasi kuliner dan suasana yang menciptakan pengalaman tak terlupakan';

        // Format data Gallery untuk JavaScript
        $galleryItemsForJs = [];

        foreach ($galleryData as $item) {
            $imagePath = $item->image_path;

            // Tentukan URL gambar
            if ($imagePath) {
                $imageUrl = filter_var($imagePath, FILTER_VALIDATE_URL)
                    ? $imagePath
                    : asset('storage/' . ltrim($imagePath, '/'));
            } else {
                $imageUrl = 'https://via.placeholder.com/800x600?text=No+Image';
            }

            $galleryItemsForJs[] = [
                'id' => $item->id,
                'image' => $imageUrl,
                'title' => $item->caption ?? '',
                'category' => $item->category ?? '',
                'date' => $item->created_at ? $item->created_at->format('d M Y') : '',
                'desc' => $item->description ?? '',
            ];
        }

    @endphp

    <div class="gallery-page-background">

        <!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP -->
        <section class="elegant-hero">

            <div class="gallery-hero-background">
                @if (!empty($galleryHeroImage))
                    <img src="{{ $galleryHeroImage }}" alt="Galeri JOSS GANDOS">
                @endif
            </div>

            <!-- Background -->
            <div class="elegant-gradient"></div>

            <!-- Decorative Elements -->
            <div class="hero-shape shape-1"></div>
            <div class="hero-shape shape-2"></div>
            <div class="hero-shape shape-3"></div>

            <div class="container">
                <div class="row align-items-center">

                    <!-- KOLOM KIRI: JUDUL -->
                    <div class="col-lg-6 col-xl-6">

                        <!-- 1. JUDUL KECIL -->
                        <div class="premium-badge animate__animated animate__fadeInUp">
                            <span>{{ $galleryHeroScript }}</span>
                        </div>

                        <!-- 2. JUDUL BESAR -->
                        <h1 class="elegant-heading">

                            <span class="heading-line animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                                {{ $galleryHeroTitle1 }}
                            </span>

                            <span class="heading-line gradient-highlight animate__animated animate__fadeInUp"
                                style="animation-delay: 0.4s;">
                                {{ $galleryHeroTitle2 }}
                            </span>

                            <span class="heading-line animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
                                {{ $galleryHeroTitle3 }}
                            </span>

                        </h1>

                        <!-- 3. DESKRIPSI -->
                        <p class="elegant-desc animate__animated animate__fadeInUp" style="animation-delay: 0.8s;">
                            {{ $galleryHeroDescription }}
                        </p>

                    </div>
                </div>
            </div>

        </section>

        <!-- Gallery Section -->
        <section class="gallery-section position-relative" id="gallery">
            <!-- Background Pattern -->
            <div class="pattern-bg"></div>

            <div class="container position-relative" style="z-index: 1;">

                <!-- Section Header -->
                <div class="section-header text-center mb-5">

                    <!-- 2. Judul muncul setelah teks kecil -->
                    <h2 class="section-title gallery-reveal">
                        {{ $galleryTitle }}
                    </h2>

                    <div class="section-divider mx-auto"></div>

                    <!-- 3. Deskripsi muncul terakhir -->
                    <p class="section-desc mx-auto gallery-reveal">
                        {{ $galleryDescription }}
                    </p>

                </div>

                <!-- Filter Navigation -->
                <div class="text-center mb-5" id="kategori">
                    <div class="filter-wrapper">
                        <div class="filter-nav d-inline-flex flex-wrap gap-3">

                            @php
                                $totalCount = $galleryData->count();
                                $foodCount = $galleryData->where('category', 'food')->count();
                                $facilityCount = $galleryData->where('category', 'facility')->count();
                                $eventCount = $galleryData->where('category', 'event')->count();
                                $interiorCount = $galleryData->where('category', 'interior')->count();
                            @endphp

                            <button class="filter-btn active" data-filter="all">
                                <span class="filter-icon"><i class="fas fa-th-large"></i></span>
                                <span class="filter-label">Semua</span>
                                <span class="filter-badge">{{ $totalCount ?: 0 }}</span>
                            </button>
                            <button class="filter-btn" data-filter="food">
                                <span class="filter-icon"><i class="fas fa-utensils"></i></span>
                                <span class="filter-label">Makanan</span>
                                <span class="filter-badge">{{ $foodCount ?: 0 }}</span>
                            </button>
                            <button class="filter-btn" data-filter="facility">
                                <span class="filter-icon"><i class="fas fa-building"></i></span>
                                <span class="filter-label">Fasilitas</span>
                                <span class="filter-badge">{{ $facilityCount ?: 0 }}</span>
                            </button>
                            <button class="filter-btn" data-filter="event">
                                <span class="filter-icon"><i class="fas fa-calendar-alt"></i></span>
                                <span class="filter-label">Acara</span>
                                <span class="filter-badge">{{ $eventCount ?: 0 }}</span>
                            </button>
                            <button class="filter-btn" data-filter="interior">
                                <span class="filter-icon"><i class="fas fa-store"></i></span>
                                <span class="filter-label">Interior</span>
                                <span class="filter-badge">{{ $interiorCount ?: 0 }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Gallery Grid -->
                <div class="row g-4" id="galleryGrid">
                    @forelse($galleryItems as $index => $item)
                        @php
                            // Tentukan URL gambar
                            $imagePath = $item->image_path;

                            if ($imagePath) {
                                $imageUrl = filter_var($imagePath, FILTER_VALIDATE_URL)
                                    ? $imagePath
                                    : asset('storage/' . ltrim($imagePath, '/'));
                            } else {
                                $imageUrl = 'https://via.placeholder.com/800x600?text=No+Image';
                            }

                            // Tentukan icon dan label kategori
                            $categoryIcons = [
                                'food' => 'utensils',
                                'facility' => 'building',
                                'event' => 'calendar-alt',
                                'interior' => 'store',
                            ];
                            $categoryLabels = [
                                'food' => 'Makanan',
                                'facility' => 'Fasilitas',
                                'event' => 'Acara',
                                'interior' => 'Interior',
                            ];
                            $categoryIcon = $categoryIcons[$item->category] ?? 'image';
                            $categoryLabel = $categoryLabels[$item->category] ?? ucfirst($item->category);

                            // Format tanggal
                            $formattedDate = $item->created_at
                                ? $item->created_at->format('d M Y')
                                : now()->format('d M Y');
                        @endphp

                        <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item->category }}"
                            data-index="{{ $index }}" style="display: block;">
                            <div class="gallery-card">
                                <div class="gallery-image-wrapper gallery-image-clickable" data-index="{{ $index }}"
                                    role="button" tabindex="0" aria-label="Lihat foto {{ $item->caption }}">

                                    <img src="{{ $imageUrl }}" alt="{{ $item->caption }}" class="gallery-image"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600?text=Image+Not+Found';">

                                </div>

                                <div class="gallery-info">
                                    <h5 class="gallery-title">{{ $item->caption }}</h5>
                                    <p class="gallery-desc">{{ $item->description ?? $item->caption }}</p>

                                    {{-- card tanpa tanggal --}}
                                    <div class="gallery-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <p class="mb-0">Belum ada foto galeri yang tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Lightbox Modal - Premium Design -->
        <div class="modal fade" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content bg-dark border-0">
                    <!-- Close Button -->
                    <button type="button" class="lightbox-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="modal-body p-0" id="lightboxModalBody">

                        <!-- CUSTOM SCROLLBAR MOBILE -->
                        <div class="lightbox-custom-scrollbar" id="lightboxCustomScrollbar">
                            <div class="lightbox-custom-scrollbar-thumb" id="lightboxCustomScrollbarThumb"></div>
                        </div>

                        <div class="lightbox-container">
                            <!-- Main Image Area -->
                            <div class="lightbox-main">
                                <div class="image-container">
                                    <img id="modalImage" src="" alt="" class="modal-image">
                                </div>

                                <!-- Navigation Buttons -->
                                <button class="lightbox-nav-btn prev-btn" id="prevImage" type="button">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="lightbox-nav-btn next-btn" id="nextImage" type="button">
                                    <i class="fas fa-chevron-right"></i>
                                </button>

                                <!-- Image Counter -->
                                <div class="image-counter">
                                    <span id="currentImageNum">1</span> /
                                    <span id="totalImages">0</span>
                                </div>
                            </div>

                            <!-- Info Sidebar -->
                            <div class="lightbox-sidebar">
                                <div class="sidebar-content">
                                    <!-- Category Badge -->
                                    <div class="sidebar-header">
                                        <div class="category-badge" id="modalCategory">
                                            <i class="fas fa-image"></i>
                                            <span></span>
                                        </div>
                                    </div>

                                    <!-- Title & Description -->
                                    <div class="sidebar-info">
                                        <h3 id="modalTitle" class="modal-title-text"></h3>

                                        <p id="modalDesc" class="modal-description"></p>
                                    </div>

                                    <!-- Meta Info -->
                                    <div class="sidebar-meta">
                                        <div class="meta-row">
                                            <div class="meta-item">
                                                <i class="far fa-calendar"></i>
                                                <span id="modalDate"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Photo Gallery Section -->
                                    <div class="sidebar-photos">
                                        <div class="photos-header">
                                            <div class="photos-title">
                                                <i class="fas fa-images"></i>
                                                <span>GALERI FOTO</span>
                                            </div>
                                            <div class="photos-counter">
                                                <span id="currentImageNum2">1</span> /
                                                <span id="totalImages2">0</span>
                                            </div>
                                        </div>

                                        <div class="thumbnails-grid" id="thumbnailsGrid">
                                            <!-- Will be populated by JS -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('styles')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@400;500;600;700;800&display=swap');
            /* ========== IMPORT ANIMATE.CSS ========== */
            @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

            /* ========== VARIABLES ========== */
            :root {
                --primary-red: #B22222;
                --primary-dark: #8B0000;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   GALLERY HERO - PIRING + MAKANAN BERPUTAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ===================================================== */
            .gallery-hero-visual {
                position: relative;
                width: 100%;
                height: 500px;
                min-height: 0;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            .gallery-food-stage {
                position: relative;

                width: 500px;
                height: 500px;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Bayangan */
            .gallery-plate-shadow {
                position: absolute;

                width: 360px;
                height: 70px;

                bottom: 55px;

                background: rgba(0, 0, 0, 0.14);

                border-radius: 50%;

                filter: blur(20px);

                transform: rotate(-8deg);
            }

            /* Piring berputar */
            .gallery-rotating-plate {
                position: relative;

                width: 520px;
                height: 520px;

                display: flex;
                align-items: center;
                justify-content: center;

                animation: galleryPlateLoop 14s linear infinite;

                transform-origin: center center;
            }

            /* Piring */
            .gallery-plate {
                position: relative;

                width: 500px;
                height: 500px;

                border-radius: 50%;

                background:
                    radial-gradient(circle at center,
                        #ffffff 0%,
                        #ffffff 58%,
                        #eeeeee 59%,
                        #d6d6d6 64%,
                        #ffffff 65%,
                        #eeeeee 100%);

                box-shadow:
                    0 25px 60px rgba(0, 0, 0, 0.18);

                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Lingkaran bagian dalam */
            .gallery-plate-inner {
                position: absolute;

                width: 320px;
                height: 320px;

                border-radius: 50%;

                border: 4px solid rgba(255, 90, 0, 0.08);
            }

            /* Frame makanan bulat */
            .gallery-food-frame {
                position: absolute;

                width: 410px;
                height: 410px;

                top: 50%;
                left: 50%;

                transform: translate(-50%, -50%);

                border-radius: 50%;

                overflow: hidden;

                z-index: 3;
            }

            /* Foto makanan */
            .gallery-food-image {
                width: 100%;
                height: 100%;

                object-fit: cover;
                object-position: center;

                display: block;

                border-radius: 50%;
            }

            /* Animasi */
            @keyframes galleryPlateLoop {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            :root {
                --red-dark: #1a0000;
                --red-primary: #8b0000;
                --red-light: #dc143c;
                --red-accent: #ff4757;
            }

            /* Animation Keyframes */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0) rotate(0deg);
                }

                50% {
                    transform: translateY(-20px) rotate(5deg);
                }
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }
            }

            @keyframes shimmer {
                0% {
                    background-position: -1000px 0;
                }

                100% {
                    background-position: 1000px 0;
                }
            }

            /* ============================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   CSS VARIABLES - MODERN SOPHISTICATED PALETTE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ============================================ */
            :root {
                /* Primary Colors - Refined & Sophisticated */
                --primary: #C62828;
                /* Modern Red (lebih soft & elegant) */
                --primary-dark: #B71C1C;
                /* Deep Wine Red */
                --primary-light: #EF5350;
                /* Coral Red */

                /* Secondary & Accent - Warm & Balanced */
                --secondary: #F57C00;
                /* Warm Orange */
                --accent: #FFA726;
                /* Sophisticated Amber (bukan gold murni) */
                --accent-light: #FFB74D;
                /* Light Amber */

                /* Neutral Colors */
                --dark: #1a1a1a;
                --light: #f8fafc;
                --white: #ffffff;
                --text-dark: #1e293b;
                --text-gray: #64748b;
                --border: #e2e8f0;

                /* Background Colors - Warm & Inviting */
                --bg-cream: #FFF8F0;


                /* Gradients - More Refined */


                --gradient-hero: #F4F5F6;


                /* Warm Cream */
                --bg-peach: #FFEBEE;
                /* Soft Peach */


                /* Shadows */
                --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
                --shadow-md: 0 8px 30px rgba(0, 0, 0, 0.12);
                --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.15);



                /* Transitions */
                --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* ========== ELEGANT RED GRADIENT HERO ========== */
            .elegant-hero {
                position: relative;
                width: 100%;
                min-height: 100vh;
                display: flex;
                align-items: center;
                overflow: hidden;
                margin-top: -70px;
                padding: 120px 0 80px;
                background: #ffffff !important;
            }

            /* BACKGROUND HERO GALERI - DESKTOP */

            .gallery-hero-background {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                z-index: 0;
                overflow: hidden;
            }

            .gallery-hero-background img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center center;
            }

            .gallery-hero-background::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(90deg,
                        rgba(0, 0, 0, 0.60) 0%,
                        rgba(0, 0, 0, 0.50) 50%,
                        rgba(0, 0, 0, 0.40) 100%);
            }

            .elegant-hero>.container {
                position: relative;
                z-index: 2;
            }

            .elegant-gradient {
                display: none !important;
            }

            /* Hilangkan seluruh bentuk dekorasi */
            .hero-shape {
                display: none !important;
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
                background: rgba(255, 167, 38, 0.35);
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

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ANIMASI TEKS HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Durasi dipercepat agar teks masuk lebih cepat.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */
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

            /* Teks kecil di atas judul */
            .premium-badge {
                display: inline-flex;
                align-items: center;
                gap: 12px;

                /* Tanpa background */
                background: none;
                backdrop-filter: none;

                /* Tanpa bentuk rounded dan border */
                border-radius: 0;
                border: none;

                /* Jarak bawah teks */
                margin-bottom: 8px;

                /* Tetap mempertahankan ukuran dan posisi teks */
                padding: 0;
            }

            .badge-dot {
                width: 8px;
                height: 8px;
                background: var(--accent-light);
                border-radius: 50%;
                box-shadow: 0 0 15px rgba(255, 167, 38, 0.6);
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

            /* Ukuran dan tampilan teks kecil di atas judul */
            .premium-badge span {
                color: #ffffff;
                font-family: 'Playfair Display', serif;
                font-size: 1.45rem;
                font-style: italic;
                font-weight: 600;
                letter-spacing: 0;
            }

            .elegant-heading {
                margin-bottom: 20px;
                font-family: 'Poppins', sans-serif;
                font-size: clamp(2.6rem, 3.6vw, 3.6rem);
                line-height: 1.12;
                font-weight: 800;
                letter-spacing: -1.2px;
            }

            .heading-line {
                display: block;
                font-family: 'Poppins', sans-serif !important;
                font-size: inherit;
                font-weight: 800;
                line-height: 1.12;
                letter-spacing: -1.2px;

                background: linear-gradient(135deg,
                        #F97316 0%,
                        #FF9D00 50%,
                        #FFD43B 100%);

                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .gradient-highlight {
                display: block;

                background: linear-gradient(135deg,
                        #65000B 0%,
                        #C1121F 50%,
                        #FF3B30 100%);

                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                color: transparent;
            }

            .elegant-desc {
                max-width: 500px;

                margin: 10px 0 0 !important;
                padding: 0 !important;

                color: #ffffff;
                font-family: 'Poppins', sans-serif;
                font-size: 1rem;
                line-height: 1.7;
                font-weight: 400;
                letter-spacing: 0;
            }

            .btn-elegant {
                position: relative;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                min-width: 135px;
                padding: 13px 24px;
                border-radius: 50px;
                font-family: 'Poppins', sans-serif;
                font-size: 0.9rem;
                font-weight: 600;
                line-height: 1.2;
                text-decoration: none;
                transition: none;
                border: none;
            }

            .btn-primary-elegant {
                background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
                color: #ffffff;
                border: none;
                box-shadow: none;
            }

            .btn-primary-elegant:hover {
                background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
                color: #ffffff;
                transform: none;
                box-shadow: none;
            }

            .btn-primary-elegant i {
                transition: transform 0.3s ease;
            }

            .btn-primary-elegant:hover i {
                transform: translateX(8px);
            }

            .btn-outline-elegant {
                background: transparent;
                color: #B22222;
                border: 1.5px solid #B22222;
                backdrop-filter: none;
            }

            .btn-outline-elegant:hover {
                background: transparent;
                color: #B22222;
                border-color: #B22222;
                transform: none;
            }

            /* ========== HERO IMAGE ========== */
            .hero-image {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
                transition: none;
                transform: none;
            }

            .hero-image-container.hero-image-extra-large {
                position: relative;

                width: 100%;
                max-width: 620px;

                aspect-ratio: 1 / 1;

                margin: 0 auto;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO IMAGE FRAME
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Persegi -> bentuk organik
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================= */

            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO IMAGE - ORGANIC STATIC SHAPE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================= */

            .hero-image-frame.hero-frame-premium {
                position: relative;

                width: 100%;
                height: 100%;

                display: flex;
                align-items: center;
                justify-content: center;

                background: transparent;
                border: none;
                border-radius: 0;

                overflow: visible;

                box-shadow: none;
            }

            .hero-image {
                width: 100%;
                height: 100%;

                display: block;

                object-fit: cover;

                transition: transform 0.7s ease;
            }

            .hero-image-frame.hero-frame-premium:hover .image-shine {
                transform: rotate(30deg) translateX(100%);
            }

            .hero-image-frame.hero-frame-premium:hover .frame-corner {
                width: 50px;
                height: 50px;
                border-color: var(--accent-light);
            }


            /* Gallery Section */
            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               GALLERY SECTION
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Background foto panjang dari bawah Hero
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               sampai seluruh isi Gallery
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .gallery-section {
                position: relative;

                padding: 100px 0;

                background: #F4F5F6 !important;

                overflow: hidden;
            }

            .pattern-bg {
                display: none;
            }

            .gallery-section>.container {
                position: relative;
                z-index: 2;
            }

            .section-header {
                margin-bottom: 60px;
            }

            /* Label kecil di atas judul */
            .section-tag {
                display: inline-block;

                /* Warna teks */
                color: #E8892D;

                /* Hilangkan efek gradasi */
                background: none;
                -webkit-background-clip: initial;
                -webkit-text-fill-color: #E8892D;
                background-clip: initial;

                font-weight: 700;
                font-size: 0.95rem;
                letter-spacing: 3px;
                text-transform: uppercase;
                margin-bottom: 15px;
            }

            /* Judul Galeri Kami */

            .section-title {
                margin: 0;

                font-family: 'Poppins', sans-serif;
                font-weight: 800;
                font-size: clamp(2.6rem, 3.6vw, 3.6rem);
                line-height: 1.12;
                letter-spacing: -1.2px;

                background: linear-gradient(135deg,
                        #65000B 0%,
                        #C1121F 50%,
                        #FF3B30 100%);

                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Garis di bawah judul galeri */
            .section-divider {
                display: none;
            }

            .section-desc {
                color: #7e7e7e;
                font-family: 'Inter', sans-serif;
                font-size: 1rem;
                max-width: 500px;
                line-height: 1.7;
                font-weight: 400;
                letter-spacing: 0;
            }

            /* Filter Navigation */
            .filter-wrapper {
                background: white;
                padding: 10px;
                border-radius: 50px;
                box-shadow: 0 10px 40px rgba(139, 0, 0, 0.1);
                display: inline-block;
            }

            .filter-nav {
                margin: 0;
                padding: 0;
            }

            .filter-btn {
                background: transparent;
                border: none;
                padding: 15px 25px;

                border-radius: 50px;

                cursor: pointer;
                transition: all 0.3s ease;

                display: flex;
                align-items: center;
                gap: 10px;

                position: relative;
                overflow: hidden;
            }

            .filter-btn::before {
                content: '';

                position: absolute;
                inset: 0;

                background: linear-gradient(135deg,
                        var(--red-primary),
                        var(--red-light));

                opacity: 0;

                transition: opacity 0.3s ease;

                border-radius: 50px;

                z-index: 0;
            }

            .filter-btn>* {
                position: relative;
                z-index: 1;
            }

            .filter-btn:hover {
                transform: translateY(-2px);
            }

            .filter-btn.active::before {
                opacity: 1;
            }

            .filter-icon {
                width: 35px;
                height: 35px;
                background: rgba(139, 0, 0, 0.1);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .filter-btn.active .filter-icon {
                background: rgba(255, 255, 255, 0.2);
                color: white;
            }

            .filter-label {
                font-weight: 600;
                color: #333;
                transition: color 0.3s ease;
            }

            .filter-btn.active .filter-label {
                color: white;
            }

            .filter-badge {
                background: rgba(255, 255, 255, 0.2);
                padding: 3px 8px;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                color: white;
                margin-left: 5px;
            }

            .filter-btn:not(.active) .filter-badge {
                background: rgba(139, 0, 0, 0.1);
                color: var(--red-primary);
            }

            /* Gallery Card */
            .gallery-card {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .gallery-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 50px rgba(139, 0, 0, 0.15);
            }

            .gallery-image-wrapper {
                position: relative;
                overflow: hidden;
                height: 280px;
                background: #f5f5f5;
            }

            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               FOTO CARD BISA DIKLIK
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================= */

            .gallery-image-clickable {
                cursor: pointer;
            }

            .gallery-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .gallery-card:hover .gallery-image {
                transform: scale(1.1) rotate(2deg);
            }

            .image-overlay-gradient {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 100px;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .gallery-card:hover .image-overlay-gradient {
                opacity: 1;
            }

            .category-tag {
                position: absolute;
                top: 15px;
                left: 15px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                padding: 8px 15px;
                border-radius: 10px;
                font-size: 0.85rem;
                font-weight: 600;
                color: var(--red-primary);
                display: flex;
                align-items: center;
                gap: 6px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                z-index: 2;
            }

            .gallery-info {
                padding: 20px;
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .gallery-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--red-dark);
                margin-bottom: 10px;
                line-height: 1.4;
            }

            .gallery-desc {
                color: #666;
                font-size: 0.9rem;
                line-height: 1.6;
                margin-bottom: 15px;
                flex: 1;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .gallery-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 15px;
                border-top: 1px solid #f0f0f0;
            }

            .gallery-date {
                display: flex;
                align-items: center;
                gap: 6px;
                color: #999;
                font-size: 0.85rem;
                font-weight: 500;
            }

            .gallery-date i {
                color: var(--red-light);
            }

            .btn-view-gallery {
                background: linear-gradient(135deg, var(--red-primary), var(--red-light));
                border: none;
                width: 36px;
                height: 36px;
                border-radius: 10px;
                color: white;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
            }

            .btn-view-gallery:hover {
                transform: scale(1.1);
                box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
            }

            /* Load More Button */
            .btn-load-more {
                background: linear-gradient(135deg, var(--red-primary), var(--red-light));
                border: none;
                padding: 18px 45px;
                border-radius: 50px;
                color: white;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: all 0.4s ease;
                box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
                display: inline-flex;
                align-items: center;
                gap: 12px;
                position: relative;
                overflow: hidden;
            }

            .btn-load-more::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .btn-load-more:hover::before {
                width: 300px;
                height: 300px;
            }

            .btn-load-more:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 40px rgba(139, 0, 0, 0.4);
            }

            .btn-icon,
            .btn-text,
            .btn-arrow {
                position: relative;
                z-index: 1;
            }

            .btn-arrow {
                transition: transform 0.3s ease;
            }

            .btn-load-more:hover .btn-arrow {
                transform: translateY(3px);
            }

            .btn-load-more.show-less .btn-arrow {
                transform: rotate(180deg);
            }

            .btn-load-more.show-less:hover .btn-arrow {
                transform: rotate(180deg) translateY(-3px);
            }

            /* Premium Lightbox Modal - IMPROVED DESIGN */
            .lightbox-close {
                position: fixed;
                top: 30px;
                right: 30px;
                width: 55px;
                height: 55px;
                background: rgba(0, 0, 0, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                color: white;
                font-size: 1.6rem;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1051;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            }

            .lightbox-close:hover {
                background: var(--red-light);
                transform: rotate(90deg) scale(1.1);
                border-color: var(--red-light);
                box-shadow: 0 15px 40px rgba(220, 20, 60, 0.5);
            }

            .lightbox-container {
                display: flex;
                height: 100%;
                position: relative;
            }

            .lightbox-main {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                padding: 40px;
                background: black;
                overflow: hidden;
            }

            .image-container {
                max-width: 100%;
                max-height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                width: 100%;
                height: 100%;
            }

            .modal-image {
                max-width: 85%;
                max-height: 80vh;
                object-fit: contain;
                border-radius: 20px;
                box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6);
                animation: fadeIn 0.6s ease;
                transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .modal-image:hover {
                transform: scale(1.02);
            }

            .lightbox-nav-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 65px;
                height: 65px;
                background: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.25);
                border-radius: 50%;
                color: white;
                font-size: 1.8rem;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            }

            .lightbox-nav-btn:hover {
                background: linear-gradient(135deg, var(--red-primary), var(--red-light));
                border-color: transparent;
                transform: translateY(-50%) scale(1.15);
                box-shadow: 0 20px 50px rgba(139, 0, 0, 0.6);
            }

            .prev-btn {
                left: 50px;
            }

            .next-btn {
                right: 50px;
            }

            .image-counter {
                position: absolute;
                bottom: 50px;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(0, 0, 0, 0.85);
                backdrop-filter: blur(15px);
                padding: 15px 35px;
                border-radius: 40px;
                color: white;
                font-weight: 700;
                font-size: 1.2rem;
                border: 1px solid rgba(255, 255, 255, 0.15);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
                letter-spacing: 1px;
            }

            /* Sidebar - Enhanced Design */
            .lightbox-sidebar {
                width: 420px;
                background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
                overflow-y: auto;
                border-left: 1px solid rgba(255, 255, 255, 0.08);
                position: relative;
                z-index: 2;
            }

            .sidebar-content {
                padding: 45px 35px;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .sidebar-header {
                margin-bottom: 35px;
                text-align: center;
            }

            .category-badge {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                background: linear-gradient(135deg, var(--red-primary), var(--red-light));
                padding: 14px 25px;
                border-radius: 50px;
                color: white;
                font-weight: 700;
                font-size: 1.1rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
                border: 2px solid rgba(255, 255, 255, 0.1);
                animation: pulse 2s infinite ease-in-out;
            }

            .category-badge i {
                font-size: 1.2rem;
            }

            .sidebar-info {
                margin-bottom: 35px;
                padding-bottom: 25px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                text-align: center;
            }

            .modal-title-text {
                font-size: 2.4rem;
                font-weight: 800;
                color: white;
                margin-bottom: 20px;
                line-height: 1.3;
                text-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
                background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                letter-spacing: -0.5px;
            }

            .modal-description {
                color: rgba(255, 255, 255, 0.9);
                font-size: 1.15rem;
                line-height: 1.8;
                margin: 0;
                font-weight: 400;
                text-align: center;
                max-width: 500px;
                margin: 0 auto;
            }

            .sidebar-meta {
                margin-bottom: 40px;
                padding-bottom: 25px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                text-align: center;
            }

            .meta-row {
                display: flex;
                justify-content: center;
                gap: 15px;
            }

            .sidebar-meta .meta-item {
                background: rgba(255, 255, 255, 0.05);
                padding: 18px 25px;
                border-radius: 15px;
                display: inline-flex;
                align-items: center;
                gap: 15px;
                color: rgba(255, 255, 255, 0.95);
                font-size: 1.1rem;
                font-weight: 500;
                transition: all 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.08);
                min-width: 180px;
                justify-content: center;
            }

            .sidebar-meta .meta-item:hover {
                background: rgba(255, 255, 255, 0.08);
                transform: translateY(-3px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            }

            .sidebar-meta .meta-item i {
                color: var(--red-accent);
                font-size: 1.4rem;
            }

            /* Photo Gallery Section - Enhanced */
            .sidebar-photos {
                margin-top: auto;
                padding-top: 35px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
            }

            .photos-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 25px;
            }

            .photos-title {
                display: flex;
                align-items: center;
                gap: 12px;
                color: white;
                font-weight: 700;
                font-size: 1.2rem;
                text-transform: uppercase;
                letter-spacing: 2px;
            }

            .photos-title i {
                color: var(--red-accent);
                font-size: 1.4rem;
            }

            .photos-counter {
                background: rgba(255, 255, 255, 0.05);
                padding: 10px 20px;
                border-radius: 30px;
                color: white;
                font-weight: 700;
                font-size: 1.1rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                min-width: 80px;
                text-align: center;
            }

            .thumbnails-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .thumbnail-item {
                aspect-ratio: 1;
                border-radius: 15px;
                overflow: hidden;
                cursor: pointer;
                border: 3px solid transparent;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                position: relative;
                background: #1a1a1a;
            }

            .thumbnail-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(139, 0, 0, 0.3), rgba(220, 20, 60, 0.3));
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 1;
            }

            .thumbnail-item:hover::before {
                opacity: 1;
            }

            .thumbnail-item:hover {
                border-color: var(--red-accent);
                transform: scale(1.08) rotate(2deg);
                box-shadow: 0 15px 35px rgba(139, 0, 0, 0.4);
            }

            .thumbnail-item.active {
                border-color: var(--red-light);
                box-shadow: 0 0 0 3px var(--red-light), 0 0 30px rgba(220, 20, 60, 0.6);
                transform: scale(1.08);
            }

            .thumbnail-item.active::before {
                opacity: 0;
            }

            .thumbnail-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .thumbnail-item:hover img {
                transform: scale(1.15);
            }

            /* Hide items for load more functionality */
            .gallery-item.hide {
                display: none !important;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
                .lightbox-sidebar {
                    width: 380px;
                }

                .modal-title-text {
                    font-size: 2rem;
                }

                .lightbox-nav-btn {
                    width: 60px;
                    height: 60px;
                    font-size: 1.6rem;
                }
            }

            @media (max-width: 992px) {
                .heading-line {
                    font-size: clamp(2.4rem, 3.2vw, 3.2rem);
                }

                .section-title {
                    font-size: 2.5rem;
                }

                .lightbox-container {
                    flex-direction: column-reverse;
                }



                .lightbox-main {
                    padding: 30px 20px;
                    flex: 2;
                }

                .modal-image {
                    max-height: 70vh;
                    max-width: 90%;
                }

                .lightbox-nav-btn {
                    width: 55px;
                    height: 55px;
                    font-size: 1.5rem;
                }

                .prev-btn {
                    left: 25px;
                }

                .next-btn {
                    right: 25px;
                }

                .image-counter {
                    bottom: 35px;
                    padding: 12px 25px;
                    font-size: 1.1rem;
                }

                .sidebar-content {
                    padding: 30px 25px;
                }

                .category-badge {
                    padding: 12px 20px;
                    font-size: 1rem;
                }
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO GALLERY MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Urutan:
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               1. Teks kecil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               2. Judul besar
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               3. Piring berputar
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               4. Deskripsi
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HERO GALLERY MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

            @media (max-width: 768px) {

                /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================= */

                /* HERO MOBILE - BACKGROUND FULL SCREEN */
                /* HERO MOBILE - FULL SCREEN */
                .elegant-hero {
                    position: relative;
                    width: 100%;

                    height: calc(100svh + 70px);
                    min-height: calc(100svh + 70px);

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    padding: 100px 0 35px;
                    margin-top: -70px;

                    overflow: hidden;
                    box-sizing: border-box;
                }

                .gallery-hero-background {
                    position: absolute;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                    z-index: 0;
                }

                .gallery-hero-background img {
                    display: block;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    object-position: center center;
                }

                .elegant-hero>.container {
                    width: 100%;
                    max-width: 100%;
                    padding-left: 20px;
                    padding-right: 20px;
                }

                .elegant-hero>.container>.row {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    height: auto !important;
                    min-height: 0 !important;
                    margin: 0;
                }

                .elegant-hero>.container>.row>.col-lg-6,
                .elegant-hero>.container>.row>.col-12 {
                    width: 100%;
                    max-width: 100%;
                    padding-left: 0;
                    padding-right: 0;
                }


                /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           1. JUDUL KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================= */

                .premium-badge {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    margin-bottom: 8px;
                    padding: 0;
                    text-align: center;
                }

                .premium-badge span {
                    font-size: 1rem;
                    line-height: 1.2;
                }


                /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           2. JUDUL BESAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================= */

                .elegant-heading {
                    width: 100%;
                    margin: 0 0 12px !important;
                    text-align: center;
                }

                .heading-line {
                    font-size: clamp(2rem, 8.5vw, 2.8rem);
                    line-height: 1.02;
                    letter-spacing: -1.5px;
                    text-align: center;
                    white-space: normal;
                }


                /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           3. PIRING BERPUTAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================= */

                .elegant-hero>.container>.row>.col-lg-6:nth-child(2) {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }

                .gallery-hero-visual {
                    width: 100%;
                    height: auto;
                    min-height: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0;
                }

                .gallery-food-stage {
                    width: min(72vw, 300px);
                    height: min(72vw, 300px);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .gallery-rotating-plate {
                    width: min(68vw, 280px);
                    height: min(68vw, 280px);
                }

                .gallery-plate {
                    width: min(64vw, 265px);
                    height: min(64vw, 265px);
                }

                .gallery-plate-inner {
                    width: min(42vw, 175px);
                    height: min(42vw, 175px);
                }

                .gallery-food-frame {
                    width: min(54vw, 220px);
                    height: min(54vw, 220px);
                }

                .gallery-plate-shadow {
                    width: min(58vw, 240px);
                    height: 40px;
                    bottom: 20px;
                }


                /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4. DESKRIPSI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================= */

                .elegant-hero>.container>.row>.col-12 {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }

                .elegant-desc {
                    width: 100%;
                    max-width: 100%;
                    margin: 12px 0 0 !important;
                    padding: 0 5px;
                    text-align: center;
                    font-size: 0.9rem;
                    line-height: 1.6;
                }


                /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           FILTER KATEGORI MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           HORIZONTAL + BISA DIGESER
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================= */

                #kategori {
                    width: 100%;
                    margin-bottom: 30px !important;
                }

                #kategori .filter-wrapper {
                    width: 100%;
                    max-width: 100%;

                    background: #ffffff;
                    padding: 10px;

                    border-radius: 50px;

                    box-sizing: border-box;

                    overflow-x: auto;
                    overflow-y: hidden;

                    -webkit-overflow-scrolling: touch;
                    scrollbar-width: none;

                    display: block;
                }

                #kategori .filter-wrapper::-webkit-scrollbar {
                    display: none;
                }


                /* BARIS KATEGORI */
                #kategori .filter-nav {
                    display: flex !important;

                    flex-direction: row !important;
                    flex-wrap: nowrap !important;

                    width: max-content !important;
                    min-width: max-content !important;

                    gap: 8px !important;

                    margin: 0 !important;
                    padding: 0 !important;
                }


                /* TOMBOL */
                #kategori .filter-btn {
                    flex: 0 0 auto !important;

                    width: auto !important;
                    min-width: max-content !important;

                    display: flex !important;
                    flex-direction: row !important;

                    align-items: center;
                    justify-content: center;

                    padding: 7px 11px;

                    margin: 0 !important;

                    border-radius: 50px;

                    white-space: nowrap;

                    gap: 5px;

                    font-size: 0.82rem;
                }


                /* ICON */
                #kategori .filter-btn .filter-icon {
                    flex: 0 0 auto;

                    width: 31px;
                    height: 31px;

                    font-size: 0.9rem;
                }


                /* LABEL */
                #kategori .filter-btn .filter-label {
                    white-space: nowrap;
                }


                /* JUMLAH */
                #kategori .filter-btn .filter-badge {
                    flex: 0 0 auto;

                    min-width: 22px;
                    height: 22px;

                    padding: 0 6px;

                    font-size: 0.72rem;

                    white-space: nowrap;
                }


                /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   GALLERY CARD MOBILE - 2 KOLOM
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================= */

                #galleryGrid {
                    display: flex;
                    flex-wrap: wrap;
                    margin-left: -6px;
                    margin-right: -6px;
                }

                #galleryGrid .gallery-item {
                    flex: 0 0 50% !important;
                    width: 50% !important;
                    max-width: 50% !important;

                    padding-left: 6px !important;
                    padding-right: 6px !important;

                    margin-bottom: 12px;
                }

                #galleryGrid .gallery-card {
                    width: 100%;
                    border-radius: 16px;
                    height: 100%;
                }

                /* Ukuran foto agar proporsional di 2 kolom */
                #galleryGrid .gallery-image-wrapper {
                    height: 170px;
                }

                #galleryGrid .gallery-info {
                    padding: 14px;
                }

                #galleryGrid .gallery-title {
                    font-size: 0.95rem;
                    line-height: 1.3;
                    margin-bottom: 7px;
                }

                #galleryGrid .gallery-desc {
                    font-size: 0.78rem;
                    line-height: 1.45;

                    -webkit-line-clamp: 2;
                    line-clamp: 2;
                }



                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       LIGHTBOX MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                       SATU AREA SCROLL SAJA
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal {
                    position: fixed !important;

                    top: 0 !important;
                    left: 0 !important;
                    right: 0 !important;
                    bottom: 0 !important;

                    width: 100% !important;
                    height: 100dvh !important;

                    padding: 0 !important;

                    /* PENTING:
                                                                                                                                                                                                                                                                                                                                                                                                           modal luar TIDAK melakukan scroll */
                    overflow: hidden !important;

                    z-index: 1055 !important;

                    pointer-events: auto !important;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       MODAL DIALOG
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .modal-dialog,
                #lightboxModal .modal-dialog.modal-fullscreen {

                    width: 100% !important;
                    max-width: 100% !important;

                    height: 100dvh !important;
                    min-height: 100dvh !important;

                    margin: 0 !important;

                    pointer-events: auto !important;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       MODAL CONTENT
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .modal-content {

                    width: 100% !important;

                    height: 100dvh !important;
                    min-height: 100dvh !important;

                    max-height: none !important;

                    margin: 0 !important;

                    padding: 0 !important;

                    border: 0 !important;
                    border-radius: 0 !important;

                    background: #000 !important;

                    overflow: hidden !important;

                    pointer-events: auto !important;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       SATU-SATUNYA AREA SCROLL
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .modal-body {

                    position: relative !important;

                    width: 100% !important;

                    height: 100dvh !important;
                    min-height: 100dvh !important;

                    max-height: 100dvh !important;

                    padding: 0 !important;

                    /* HANYA INI YANG SCROLL */
                    overflow-x: hidden !important;
                    overflow-y: auto !important;

                    -webkit-overflow-scrolling: touch;

                    overscroll-behavior-y: contain;

                    touch-action: pan-y;

                    scrollbar-width: auto;
                    scrollbar-color: #777 #111;

                    pointer-events: auto !important;
                }


                /* Chrome / Android / DevTools */

                #lightboxModal .modal-body::-webkit-scrollbar {
                    width: 8px;
                }

                #lightboxModal .modal-body::-webkit-scrollbar-track {
                    background: #111;
                }

                #lightboxModal .modal-body::-webkit-scrollbar-thumb {
                    background: #777;
                    border-radius: 10px;
                }

                #lightboxModal .modal-body::-webkit-scrollbar-thumb:hover {
                    background: #999;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       CONTAINER
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .lightbox-container {

                    position: relative;

                    width: 100%;

                    min-height: 100dvh !important;

                    height: auto !important;

                    display: flex;
                    flex-direction: column;

                    background: #000;

                    overflow: visible !important;

                    pointer-events: auto !important;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       AREA FOTO
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .lightbox-main {

                    position: relative;

                    flex: 0 0 54dvh !important;

                    width: 100%;

                    height: 54dvh !important;
                    min-height: 54dvh !important;

                    padding: 15px;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    background: #000;

                    overflow: hidden;

                    box-sizing: border-box;

                    pointer-events: auto !important;

                    z-index: 1;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       IMAGE CONTAINER
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .image-container {

                    position: relative;

                    width: 100%;
                    height: 100%;

                    max-width: 100%;
                    max-height: 100%;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    overflow: hidden;

                    pointer-events: none;
                }


                /* FOTO */

                #lightboxModal .modal-image {

                    display: block;

                    width: auto;
                    height: auto;

                    max-width: 100%;
                    max-height: calc(54dvh - 30px);

                    object-fit: contain;

                    border-radius: 14px;

                    border: 1px solid rgba(255, 255, 255, 0.10);

                    box-shadow:
                        0 15px 45px rgba(0, 0, 0, 0.65);

                    pointer-events: none;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       TOMBOL PREV / NEXT
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .lightbox-nav-btn {

                    position: absolute;

                    top: 50%;

                    width: 44px;
                    height: 44px;

                    margin: 0;
                    padding: 0;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    transform: translateY(-50%);

                    background: rgba(0, 0, 0, 0.65);

                    border: 1px solid rgba(255, 255, 255, 0.22);

                    border-radius: 50%;

                    color: #fff;

                    font-size: 1.1rem;

                    z-index: 100 !important;

                    cursor: pointer;

                    pointer-events: auto !important;

                    touch-action: manipulation;

                    -webkit-tap-highlight-color: transparent;
                }

                #lightboxModal .prev-btn {
                    left: 12px !important;
                }

                #lightboxModal .next-btn {
                    right: 12px !important;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       COUNTER
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .image-counter {

                    position: absolute;

                    left: 50%;
                    bottom: 15px;

                    transform: translateX(-50%);

                    padding: 8px 18px;

                    min-width: 65px;

                    text-align: center;

                    background: rgba(0, 0, 0, 0.78);

                    border: 1px solid rgba(255, 255, 255, 0.16);

                    border-radius: 30px;

                    color: #fff;

                    font-size: 0.85rem;
                    font-weight: 700;

                    z-index: 20;

                    pointer-events: none;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       TOMBOL CLOSE
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .lightbox-close {

                    position: absolute !important;

                    top: 12px !important;
                    right: 12px !important;

                    width: 44px !important;
                    height: 44px !important;

                    padding: 0 !important;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    background: rgba(0, 0, 0, 0.72);

                    border: 1px solid rgba(255, 255, 255, 0.20);

                    border-radius: 50%;

                    color: #fff;

                    font-size: 1.15rem;

                    z-index: 500 !important;

                    cursor: pointer;

                    pointer-events: auto !important;

                    touch-action: manipulation;

                    -webkit-tap-highlight-color: transparent;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                       SIDEBAR / INFORMASI
                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .lightbox-sidebar {

                    position: relative;

                    flex: 0 0 auto !important;

                    width: 100% !important;

                    height: auto !important;

                    min-height: 0 !important;

                    max-height: none !important;

                    background:
                        linear-gradient(135deg,
                            #0f0f0f 0%,
                            #171717 100%);

                    border-left: none;

                    border-top: 1px solid rgba(255, 255, 255, 0.08);

                    overflow: visible !important;

                    pointer-events: auto !important;

                    z-index: 1;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       6. CONTENT SIDEBAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .sidebar-content {
                    width: 100%;
                    min-height: 100%;

                    padding: 18px 16px 22px;

                    display: flex;
                    flex-direction: column;

                    box-sizing: border-box;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       7. CATEGORY
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .sidebar-header {
                    margin: 0 0 12px;

                    text-align: center;
                }

                #lightboxModal .category-badge {
                    padding: 8px 17px;

                    gap: 8px;

                    border-radius: 30px;

                    font-size: 0.78rem;

                    letter-spacing: 0.8px;

                    border-width: 1px;

                    box-shadow:
                        0 7px 20px rgba(139, 0, 0, 0.28);
                }

                #lightboxModal .category-badge i {
                    font-size: 0.85rem;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       8. JUDUL + DESKRIPSI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .sidebar-info {
                    margin: 0 0 14px;

                    padding-bottom: 14px;

                    text-align: center;

                    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                }

                #lightboxModal .modal-title-text {
                    margin: 0 0 7px;

                    font-size: clamp(1.25rem, 5vw, 1.6rem);

                    line-height: 1.25;

                    letter-spacing: -0.3px;
                }

                #lightboxModal .modal-description {
                    margin: 0 auto;

                    max-width: 100%;

                    color: rgba(255, 255, 255, 0.78);

                    font-size: 0.82rem;

                    line-height: 1.5;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       9. TANGGAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .sidebar-meta {
                    margin: 0 0 14px;

                    padding: 0 0 14px;

                    text-align: center;

                    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                }

                #lightboxModal .meta-row {
                    display: flex;
                    justify-content: center;
                }

                #lightboxModal .sidebar-meta .meta-item {
                    min-width: auto;

                    padding: 9px 14px;

                    gap: 8px;

                    border-radius: 11px;

                    font-size: 0.78rem;

                    background: rgba(255, 255, 255, 0.05);

                    border: 1px solid rgba(255, 255, 255, 0.08);

                    box-shadow: none;
                }

                #lightboxModal .sidebar-meta .meta-item i {
                    font-size: 0.95rem;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       10. GALERI FOTO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .sidebar-photos {
                    margin-top: 0;

                    padding-top: 0;

                    border-top: none;
                }

                #lightboxModal .photos-header {
                    margin-bottom: 10px;

                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                #lightboxModal .photos-title {
                    gap: 8px;

                    font-size: 0.82rem;

                    letter-spacing: 1.3px;
                }

                #lightboxModal .photos-title i {
                    font-size: 1rem;
                }

                #lightboxModal .photos-counter {
                    min-width: 54px;

                    padding: 6px 10px;

                    border-radius: 20px;

                    font-size: 0.75rem;

                    text-align: center;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       11. THUMBNAIL HORIZONTAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       BUKAN 2 KOLOM.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Bisa digeser ke kanan/kiri.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .thumbnails-grid {
                    width: 100%;

                    display: flex !important;

                    flex-direction: row !important;

                    flex-wrap: nowrap !important;

                    gap: 9px;

                    padding: 3px 2px 8px;

                    overflow-x: auto;
                    overflow-y: hidden;

                    scroll-behavior: smooth;

                    -webkit-overflow-scrolling: touch;

                    scrollbar-width: none;
                }

                #lightboxModal .thumbnails-grid::-webkit-scrollbar {
                    display: none;
                }


                /* Thumbnail */

                #lightboxModal .thumbnail-item {
                    flex: 0 0 76px !important;

                    width: 76px !important;
                    height: 58px !important;

                    min-width: 76px !important;
                    min-height: 58px !important;

                    margin: 0;

                    border-radius: 9px;

                    overflow: hidden;

                    border: 2px solid transparent;

                    box-sizing: border-box;

                    transition:
                        transform 0.25s ease,
                        border-color 0.25s ease,
                        box-shadow 0.25s ease;
                }

                #lightboxModal .thumbnail-item.active {
                    border-color: var(--red-light);

                    box-shadow:
                        0 0 0 2px rgba(220, 20, 60, 0.18),
                        0 7px 18px rgba(220, 20, 60, 0.25);

                    transform: translateY(-1px);
                }

                #lightboxModal .thumbnail-item img {
                    width: 100%;
                    height: 100%;

                    object-fit: cover;

                    display: block;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       12. HILANGKAN EFEK HOVER DESKTOP DI MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                #lightboxModal .modal-image:hover {
                    transform: none;
                }

                #lightboxModal .thumbnail-item:hover img {
                    transform: none;
                }


                /* =====================================================
                                                                                                                                                           SCROLLBAR LIGHTBOX MOBILE
                                                                                                                                                           MUNCUL SAAT SCROLL, HILANG SAAT DIAM
                                                                                                                                                           ===================================================== */

                /* Hilangkan scrollbar native browser */
                #lightboxModal,
                #lightboxModal .modal-body {
                    scrollbar-width: none !important;
                }

                #lightboxModal::-webkit-scrollbar,
                #lightboxModal .modal-body::-webkit-scrollbar {
                    display: none !important;
                    width: 0 !important;
                    height: 0 !important;
                }

                /* =====================================================
                                                                                                                                                           CUSTOM SCROLLBAR
                                                                                                                                                           ===================================================== */

                #lightboxModal .lightbox-custom-scrollbar {
                    position: fixed !important;

                    top: 8px;
                    right: 3px;
                    bottom: 8px;

                    width: 7px;

                    background: rgba(255, 255, 255, 0.10);

                    border-radius: 10px;

                    z-index: 9999 !important;

                    /* DEFAULT: TIDAK TERLIHAT */
                    opacity: 0;

                    visibility: hidden;

                    pointer-events: none;

                    transition:
                        opacity 0.25s ease,
                        visibility 0.25s ease;

                    touch-action: none;
                }

                /* =====================================================
                                                                                                                                                           SCROLLBAR MUNCUL SAAT USER SCROLL
                                                                                                                                                           ===================================================== */

                #lightboxModal .lightbox-custom-scrollbar.is-visible {
                    opacity: 1;

                    visibility: visible;

                    pointer-events: auto;
                }

                /* =====================================================
                                                                                                                                                           THUMB
                                                                                                                                                           ===================================================== */

                #lightboxModal .lightbox-custom-scrollbar-thumb {
                    position: absolute;

                    top: 0;
                    left: 0;

                    width: 100%;
                    height: 80px;

                    background: rgba(255, 255, 255, 0.75);

                    border-radius: 10px;

                    transition:
                        top 0.05s linear,
                        height 0.1s ease,
                        background 0.2s ease;

                    pointer-events: auto;

                    cursor: grab;

                    touch-action: none;
                }

                #lightboxModal .lightbox-custom-scrollbar-thumb:active {
                    cursor: grabbing;

                    background: rgba(255, 255, 255, 0.95);
                }

                /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   MOBILE KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================================= */

                @media (max-width: 400px) {

                    #lightboxModal .lightbox-main {
                        flex: none !important;

                        height: 52dvh;
                        min-height: 52dvh;

                        padding: 12px;
                    }

                    #lightboxModal .lightbox-sidebar {
                        flex: none !important;

                        height: auto !important;
                        min-height: 0 !important;
                        max-height: none !important;
                    }


                    #lightboxModal .modal-image {
                        max-height: calc(52dvh - 24px);
                    }

                    #lightboxModal .lightbox-nav-btn {
                        width: 40px;
                        height: 40px;
                        font-size: 1rem;
                    }

                    #lightboxModal .prev-btn {
                        left: 9px;
                    }

                    #lightboxModal .next-btn {
                        right: 9px;
                    }

                    #lightboxModal .lightbox-close {
                        width: 40px;
                        height: 40px;
                        top: 9px;
                        right: 9px;
                    }

                    #lightboxModal .sidebar-content {
                        padding: 14px 13px 18px;
                    }

                    #lightboxModal .category-badge {
                        padding: 7px 14px;
                        font-size: 0.72rem;
                    }

                    #lightboxModal .modal-title-text {
                        font-size: 1.15rem;
                    }

                    #lightboxModal .modal-description {
                        font-size: 0.76rem;
                        line-height: 1.45;
                    }

                    #lightboxModal .sidebar-meta .meta-item {
                        padding: 8px 12px;
                        font-size: 0.72rem;
                    }

                    #lightboxModal .photos-title {
                        font-size: 0.76rem;
                    }

                    #lightboxModal .thumbnail-item {
                        flex-basis: 70px !important;
                        width: 70px !important;
                        min-width: 70px !important;

                        height: 54px !important;
                        min-height: 54px !important;
                    }

                }

                @media (max-width: 576px) {
                    .heading-line {
                        font-size: 2.2rem;
                    }

                    .btn-load-more {
                        padding: 15px 35px;
                        font-size: 0.9rem;
                    }

                    .category-badge {
                        padding: 10px 18px;
                        font-size: 0.9rem;
                    }

                    .sidebar-meta .meta-item {
                        padding: 12px 15px;
                        font-size: 0.9rem;
                        min-width: 140px;
                    }

                    .photos-title {
                        font-size: 1rem;
                    }

                    .photos-counter {
                        font-size: 1rem;
                        padding: 8px 15px;
                        min-width: 70px;
                    }

                    .lightbox-nav-btn {
                        width: 45px;
                        height: 45px;
                        font-size: 1.2rem;
                    }

                    .prev-btn {
                        left: 15px;
                    }

                    .next-btn {
                        right: 15px;
                    }



                    .gallery-hero-visual {
                        min-height: 360px;
                    }

                    .gallery-food-stage {
                        width: 360px;
                        height: 360px;
                    }

                    .gallery-rotating-plate {
                        width: 330px;
                        height: 330px;
                    }

                    .gallery-plate {
                        width: 310px;
                        height: 310px;
                    }

                    .gallery-food-frame {
                        width: 255px;
                        height: 255px;
                    }
                }

                @media (max-width: 400px) {

                    .heading-line {
                        font-size: 1.8rem;
                        letter-spacing: -1px;
                    }

                    .section-title {
                        font-size: 1.7rem;
                    }

                    .filter-icon {
                        width: 23px;
                        height: 23px;
                        border-radius: 7px;
                        font-size: 0.62rem;
                    }

                    .filter-badge {
                        min-width: 17px;
                        padding: 2px 4px;
                        font-size: 0.58rem;
                        margin-left: 0;
                    }

                    /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   GALLERY - 2 KOLOM HP KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================= */

                    .gallery-section .row {
                        --bs-gutter-x: 8px;
                        --bs-gutter-y: 10px;
                    }

                    .gallery-section .gallery-item {
                        flex: 0 0 50%;
                        width: 50%;
                        max-width: 50%;
                        padding-left: 4px;
                        padding-right: 4px;
                    }

                    .gallery-card {
                        border-radius: 10px;
                    }

                    .gallery-image-wrapper {
                        height: 105px;
                    }

                    .gallery-info {
                        padding: 8px;
                    }

                    .gallery-title {
                        font-size: 0.72rem;
                        line-height: 1.25;
                        margin-bottom: 5px;
                    }

                    .gallery-desc {
                        font-size: 0.62rem;
                        line-height: 1.35;
                        margin-bottom: 6px;
                        -webkit-line-clamp: 3;
                    }

                    .gallery-footer {
                        padding-top: 6px;
                    }

                    .gallery-date {
                        font-size: 0.58rem;
                        gap: 3px;
                    }

                    .btn-view-gallery {
                        width: 25px;
                        height: 25px;
                        font-size: 0.6rem;
                        border-radius: 7px;
                    }

                    .category-tag {
                        top: 6px;
                        left: 6px;
                        padding: 4px 6px;
                        border-radius: 6px;
                        font-size: 0.58rem;
                        gap: 3px;
                    }

                    .btn-load-more {
                        padding: 12px 22px;
                        font-size: 0.8rem;
                    }
                }

                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   BACKGROUND UTAMA GALLERY
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Mulai dari HERO sampai bagian paling bawah
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ===================================================== */

                .gallery-page-background {
                    position: relative;
                    width: 100%;
                    min-height: 100vh;

                    /* Menghilangkan background foto */
                    background-image: none !important;

                    background-attachment: scroll;
                    background-color: #F4F5F6;

                    overflow: visible;
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       FIX HERO LAPTOP / DESKTOP
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Supaya seluruh Hero + tombol masuk ke layar
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         /* ==========================================
                                                                       HERO GALLERY DESKTOP - MENGIKUTI HOME
                                                                    ========================================== */

                @media (min-width: 769px) {

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

                    .elegant-hero>.container {
                        width: 100%;
                        max-width: 1200px;
                        margin: 0 auto;
                        position: relative;
                        z-index: 5;
                    }

                    .elegant-hero>.container>.row {
                        align-items: center;
                    }

                    .elegant-hero>.container>.row>.col-lg-7 {
                        width: 58.333333%;
                        max-width: 58.333333%;
                        flex: 0 0 58.333333%;
                    }

                    .elegant-heading {
                        margin-bottom: 20px;
                    }

                    .heading-line {
                        font-size: clamp(2.6rem, 3.6vw, 3.6rem);
                        line-height: 1.12;
                        letter-spacing: -1.2px;
                    }

                    .elegant-desc {
                        max-width: 650px;
                        margin: 15px 0 26px;
                        line-height: 1.65;
                        text-align: left;
                    }
                }


                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       LAPTOP DENGAN TINGGI LAYAR PENDEK
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Contoh: 1366x768 / 1440x800
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

                /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   LAPTOP / DESKTOP DENGAN TINGGI LAYAR PENDEK
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Ukuran tetap besar dan proporsional
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ===================================================== */

                @media (min-width: 769px) and (max-height: 850px) {

                    .elegant-hero {
                        height: calc(100vh - 76px);
                        min-height: 0;
                        padding: 15px 0;
                    }


                    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       TEKS KIRI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================= */

                    .heading-line {
                        font-size: clamp(2.6rem, 3.6vw, 3.6rem);
                        line-height: 1.12;
                        letter-spacing: -1.2px;
                    }

                    .elegant-heading {
                        margin-bottom: 14px;
                    }

                    .elegant-desc {
                        max-width: 540px;
                        font-size: 0.95rem;
                        margin: 15px 0 20px;
                        line-height: 1.55;
                    }



                    .btn-elegant {
                        min-width: 150px;
                        padding: 12px 22px;
                        font-size: 0.88rem;
                    }


                    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       FOTO KANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================= */

                    .gallery-hero-visual {
                        height: 480px;
                        min-height: 0;
                    }

                    .gallery-food-stage {
                        width: 480px;
                        height: 480px;
                    }

                    .gallery-rotating-plate {
                        width: 440px;
                        height: 440px;
                    }

                    .gallery-plate {
                        width: 420px;
                        height: 420px;
                    }

                    .gallery-food-frame {
                        width: 345px;
                        height: 345px;
                    }

                    .gallery-plate-inner {
                        width: 275px;
                        height: 275px;
                    }

                    .gallery-plate-shadow {
                        width: 320px;
                        height: 60px;
                        bottom: 40px;
                    }
                }

                /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ANIMASI PIRING MASUK BERSAMA TEKS KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================================= */

                .gallery-plate-enter {
                    opacity: 0;
                    transform: translate3d(110vw, 0, 0);

                    animation: galleryPlateEntrance 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0s forwards;
                }

                /* Piring masuk dari luar sisi kanan halaman */
                @keyframes galleryPlateEntrance {
                    0% {
                        opacity: 0;
                        transform: translate3d(110vw, 0, 0);
                    }

                    20% {
                        opacity: 1;
                    }

                    100% {
                        opacity: 1;
                        transform: translate3d(0, 0, 0);
                    }
                }

                /* Mencegah animasi dari luar halaman membuat halaman melebar */
                .gallery-hero {
                    overflow: hidden;
                }


                /* HERO CONTENT DESKTOP */
                @media (min-width: 769px) {
                    .elegant-hero>.container {
                        width: 100%;
                        max-width: 1200px;
                        margin: 0 auto;
                        position: relative;
                        z-index: 2;
                    }

                    .elegant-hero .row {
                        align-items: center;
                    }

                    .elegant-hero .row>.col-lg-6 {
                        width: 100%;
                        max-width: 750px;
                        flex: 0 0 750px;
                    }

                    .elegant-hero .premium-badge span {
                        color: #ffffff;
                    }

                    .elegant-hero .elegant-desc {
                        color: #ffffff;
                    }
                }
        </style>
    @endpush

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterBtns = document.querySelectorAll('.filter-btn');
                const galleryItems = document.querySelectorAll('.gallery-item');
                const modalImage = document.getElementById('modalImage');
                const modalTitle = document.getElementById('modalTitle');
                const modalDate = document.getElementById('modalDate');
                const modalDesc = document.getElementById('modalDesc');
                const modalCategory = document.getElementById('modalCategory');
                const currentImageNum = document.getElementById('currentImageNum');
                const currentImageNum2 = document.getElementById('currentImageNum2');
                const totalImages = document.getElementById('totalImages');
                const totalImages2 = document.getElementById('totalImages2');
                const thumbnailsGrid = document.getElementById('thumbnailsGrid');
                const prevBtn = document.getElementById('prevImage');
                const nextBtn = document.getElementById('nextImage');

                const lightboxModalBody = document.getElementById('lightboxModalBody');
                const lightboxCustomScrollbar =
                    document.getElementById('lightboxCustomScrollbar');
                const lightboxCustomScrollbarThumb =
                    document.getElementById('lightboxCustomScrollbarThumb');


                let currentIndex = 0;
                let allItems = @json($galleryItemsForJs);

                console.log('Total data lightbox:', allItems.length);

                document.querySelectorAll('.gallery-image-clickable').forEach((image, index) => {
                    console.log(
                        'Foto card ke-' + index,
                        'data-index:',
                        image.dataset.index
                    );
                });

                console.log('Gallery items loaded:', allItems.length);

                // Set total images
                if (totalImages) totalImages.textContent = allItems.length;
                if (totalImages2) totalImages2.textContent = allItems.length;

                // Filter functionality
                // Filter functionality
                filterBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        filterBtns.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');

                        const filter = this.dataset.filter;

                        galleryItems.forEach((item) => {
                            if (filter === 'all' || item.dataset.category === filter) {
                                item.style.display = 'block';
                                item.style.animation = 'fadeIn 0.6s ease forwards';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });

                function updateLightboxCustomScrollbar() {

                    if (
                        !lightboxModalBody ||
                        !lightboxCustomScrollbar ||
                        !lightboxCustomScrollbarThumb
                    ) {
                        return;
                    }

                    const scrollHeight = lightboxModalBody.scrollHeight;
                    const clientHeight = lightboxModalBody.clientHeight;
                    const scrollTop = lightboxModalBody.scrollTop;

                    /* Tidak perlu scrollbar kalau konten tidak lebih panjang */
                    if (scrollHeight <= clientHeight + 1) {
                        lightboxCustomScrollbar.style.display = 'none';
                        return;
                    }

                    lightboxCustomScrollbar.style.display = 'block';

                    /* Tinggi thumb berdasarkan perbandingan viewport : konten */
                    const trackHeight = lightboxCustomScrollbar.clientHeight;

                    let thumbHeight =
                        (clientHeight / scrollHeight) * trackHeight;

                    /* Batas minimum thumb */
                    thumbHeight = Math.max(45, thumbHeight);

                    /* Jangan sampai thumb lebih besar dari track */
                    thumbHeight = Math.min(trackHeight, thumbHeight);

                    const maxThumbTop = trackHeight - thumbHeight;

                    const maxScrollTop = scrollHeight - clientHeight;

                    const scrollPercentage =
                        maxScrollTop > 0 ?
                        scrollTop / maxScrollTop :
                        0;

                    const thumbTop =
                        scrollPercentage * maxThumbTop;

                    lightboxCustomScrollbarThumb.style.height =
                        thumbHeight + 'px';

                    lightboxCustomScrollbarThumb.style.top =
                        thumbTop + 'px';
                }

                /* =========================================
                   UPDATE CUSTOM SCROLLBAR SAAT DI-SCROLL
                   ========================================= */

                if (lightboxModalBody) {
                    lightboxModalBody.addEventListener('scroll', function() {
                        updateLightboxCustomScrollbar();
                    }, {
                        passive: true
                    });
                }

                /* =========================================
                   UPDATE SAAT LIGHTBOX DIBUKA
                   ========================================= */

                const lightboxModalElement =
                    document.getElementById('lightboxModal');

                if (lightboxModalElement) {

                    lightboxModalElement.addEventListener(
                        'shown.bs.modal',
                        function() {

                            setTimeout(function() {
                                updateLightboxCustomScrollbar();
                            }, 100);

                        }
                    );

                }

                /* =========================================
                   UPDATE SAAT UKURAN LAYAR BERUBAH
                   ========================================= */

                window.addEventListener('resize', function() {
                    if (
                        lightboxModalElement &&
                        lightboxModalElement.classList.contains('show')
                    ) {
                        updateLightboxCustomScrollbar();
                    }
                });

                /* =========================================
                   CUSTOM SCROLLBAR BISA DI-DRAG
                   ========================================= */

                if (
                    lightboxModalBody &&
                    lightboxCustomScrollbar &&
                    lightboxCustomScrollbarThumb
                ) {

                    let isScrollbarDragging = false;
                    let dragStartY = 0;
                    let dragStartScrollTop = 0;

                    /* -----------------------------------------
                       HITUNG SCROLL BERDASARKAN POSISI POINTER
                       ----------------------------------------- */

                    function scrollFromPointer(clientY) {

                        const trackRect =
                            lightboxCustomScrollbar.getBoundingClientRect();

                        const trackHeight =
                            trackRect.height;

                        const scrollHeight =
                            lightboxModalBody.scrollHeight;

                        const clientHeight =
                            lightboxModalBody.clientHeight;

                        const maxScrollTop =
                            scrollHeight - clientHeight;

                        if (maxScrollTop <= 0) {
                            return;
                        }

                        const thumbHeight =
                            lightboxCustomScrollbarThumb.offsetHeight;

                        const maxThumbTop =
                            trackHeight - thumbHeight;

                        if (maxThumbTop <= 0) {
                            return;
                        }

                        let position =
                            clientY - trackRect.top - (thumbHeight / 2);

                        position =
                            Math.max(
                                0,
                                Math.min(maxThumbTop, position)
                            );

                        const percentage =
                            position / maxThumbTop;

                        lightboxModalBody.scrollTop =
                            percentage * maxScrollTop;

                        updateLightboxCustomScrollbar();
                    }


                    /* -----------------------------------------
                       KLIK TRACK SCROLLBAR
                       ----------------------------------------- */

                    lightboxCustomScrollbar.addEventListener(
                        'pointerdown',
                        function(event) {

                            event.preventDefault();

                            /*
                             * Jika langsung klik track,
                             * scrollbar berpindah ke posisi tersebut.
                             */

                            scrollFromPointer(event.clientY);

                            isScrollbarDragging = true;

                            dragStartY = event.clientY;

                            dragStartScrollTop =
                                lightboxModalBody.scrollTop;

                            lightboxCustomScrollbar.setPointerCapture(
                                event.pointerId
                            );
                        }
                    );


                    /* -----------------------------------------
                       DRAG SCROLLBAR
                       ----------------------------------------- */

                    lightboxCustomScrollbar.addEventListener(
                        'pointermove',
                        function(event) {

                            if (!isScrollbarDragging) {
                                return;
                            }

                            event.preventDefault();

                            const trackHeight =
                                lightboxCustomScrollbar.clientHeight;

                            const thumbHeight =
                                lightboxCustomScrollbarThumb.offsetHeight;

                            const maxThumbTop =
                                trackHeight - thumbHeight;

                            const maxScrollTop =
                                lightboxModalBody.scrollHeight -
                                lightboxModalBody.clientHeight;

                            if (
                                maxThumbTop <= 0 ||
                                maxScrollTop <= 0
                            ) {
                                return;
                            }

                            const deltaY =
                                event.clientY - dragStartY;

                            const scrollRatio =
                                maxScrollTop / maxThumbTop;

                            lightboxModalBody.scrollTop =
                                dragStartScrollTop +
                                (deltaY * scrollRatio);

                            updateLightboxCustomScrollbar();
                        }
                    );


                    /* -----------------------------------------
                       SELESAI DRAG
                       ----------------------------------------- */

                    lightboxCustomScrollbar.addEventListener(
                        'pointerup',
                        function(event) {

                            isScrollbarDragging = false;

                            try {
                                lightboxCustomScrollbar.releasePointerCapture(
                                    event.pointerId
                                );
                            } catch (error) {}
                        }
                    );


                    lightboxCustomScrollbar.addEventListener(
                        'pointercancel',
                        function(event) {

                            isScrollbarDragging = false;

                            try {
                                lightboxCustomScrollbar.releasePointerCapture(
                                    event.pointerId
                                );
                            } catch (error) {}
                        }
                    );

                }

                lightboxCustomScrollbarThumb.addEventListener(
                    'click',
                    function(event) {
                        event.stopPropagation();
                    }
                );

                // Load More Toggle functionality



                // Lightbox functionality
                function generateThumbnails() {
                    if (!thumbnailsGrid) return;

                    thumbnailsGrid.innerHTML = '';
                    allItems.forEach((item, index) => {
                        const thumb = document.createElement('div');
                        thumb.className = 'thumbnail-item';
                        if (index === currentIndex) thumb.classList.add('active');
                        thumb.innerHTML =
                            `<img src="${item.image}" alt="${item.title}" onerror="this.onerror=null; this.src='https://via.placeholder.com/150?text=Error';">`;
                        thumb.addEventListener('click', () => {
                            currentIndex = index;
                            updateModal();
                            updateThumbnailsActive();
                        });
                        thumbnailsGrid.appendChild(thumb);
                    });
                }

                function updateThumbnailsActive() {
                    document.querySelectorAll('.thumbnail-item').forEach((thumb, index) => {
                        thumb.classList.toggle('active', index === currentIndex);
                    });
                }

                // =========================================
                // BUKA LIGHTBOX SAAT FOTO CARD DIKLIK
                // =========================================

                // Klik foto untuk membuka modal.
                // Event delegation digunakan agar seluruh foto galeri
                // tetap dapat dibuka melalui lightbox.
                document.addEventListener('click', function(event) {

                    const imageWrapper = event.target.closest('.gallery-image-clickable');

                    // Jika yang diklik bukan area foto, hentikan proses
                    if (!imageWrapper) {
                        return;
                    }

                    const index = parseInt(imageWrapper.dataset.index);

                    // Pastikan index foto valid
                    if (isNaN(index) || index < 0 || index >= allItems.length) {
                        return;
                    }

                    // Simpan index foto yang sedang dibuka
                    currentIndex = index;

                    // Update isi modal sesuai foto yang dipilih
                    updateModal();

                    // Buat thumbnail galeri
                    generateThumbnails();

                    // Buka modal secara langsung
                    const lightboxModal = document.getElementById('lightboxModal');

                    if (lightboxModal) {

                        // Gunakan Bootstrap Modal untuk membuka lightbox
                        const modalInstance = bootstrap.Modal.getOrCreateInstance(lightboxModal);

                        modalInstance.show();
                    }
                });


                // Dukungan keyboard untuk foto yang memiliki tabindex.
                // Tombol Enter atau Space dapat digunakan untuk membuka foto.
                document.addEventListener('keydown', function(event) {

                    const imageWrapper = event.target.closest('.gallery-image-clickable');

                    // Jika fokus bukan pada area foto, hentikan proses
                    if (!imageWrapper) {
                        return;
                    }

                    if (event.key !== 'Enter' && event.key !== ' ') {
                        return;
                    }

                    event.preventDefault();

                    const index = parseInt(imageWrapper.dataset.index);

                    // Pastikan index foto valid
                    if (isNaN(index) || index < 0 || index >= allItems.length) {
                        return;
                    }

                    // Simpan index foto yang sedang dibuka
                    currentIndex = index;

                    // Update isi modal
                    updateModal();

                    // Buat thumbnail galeri
                    generateThumbnails();

                    // Buka modal
                    const lightboxModal = document.getElementById('lightboxModal');

                    if (lightboxModal) {
                        const modalInstance = bootstrap.Modal.getOrCreateInstance(lightboxModal);
                        modalInstance.show();
                    }
                });

                function updateModal() {
                    if (!allItems.length || currentIndex >= allItems.length) return;

                    const item = allItems[currentIndex];

                    // Update image
                    if (modalImage) {
                        modalImage.src = item.image;
                        modalImage.style.animation = 'fadeIn 0.5s ease';
                        modalImage.onerror = function() {
                            this.onerror = null;
                            this.src = 'https://via.placeholder.com/800x600?text=Image+Error';
                        };
                    }

                    // Update info
                    if (modalTitle) modalTitle.textContent = item.title;
                    if (modalDate) modalDate.textContent = item.date;
                    if (modalDesc) modalDesc.textContent = item.desc;

                    // Update category badge
                    if (modalCategory) {
                        const categoryIcons = {
                            'food': 'utensils',
                            'facility': 'building',
                            'event': 'calendar-alt',
                            'interior': 'store'
                        };
                        const categoryLabels = {
                            'food': 'Makanan',
                            'facility': 'Fasilitas',
                            'event': 'Acara',
                            'interior': 'Interior'
                        };
                        const icon = categoryIcons[item.category] || 'image';
                        const label = categoryLabels[item.category] || (item.category ? item.category.charAt(0)
                            .toUpperCase() + item.category.slice(1) : 'Galeri');

                        modalCategory.innerHTML = `
                <i class="fas fa-${icon}"></i>
                <span>${label}</span>
            `;
                    }

                    // Update counters
                    if (currentImageNum) currentImageNum.textContent = currentIndex + 1;
                    if (currentImageNum2) currentImageNum2.textContent = currentIndex + 1;
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        if (allItems.length > 0) {
                            currentIndex = (currentIndex - 1 + allItems.length) % allItems.length;
                            updateModal();
                            updateThumbnailsActive();
                        }
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        if (allItems.length > 0) {
                            currentIndex = (currentIndex + 1) % allItems.length;
                            updateModal();
                            updateThumbnailsActive();
                        }
                    });
                }

                // Keyboard navigation
                document.addEventListener('keydown', function(e) {
                    const modal = document.getElementById('lightboxModal');
                    if (modal && modal.classList.contains('show')) {
                        if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            if (prevBtn) prevBtn.click();
                        } else if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            if (nextBtn) nextBtn.click();
                        } else if (e.key === 'Escape') {
                            const closeBtn = modal.querySelector('.lightbox-close');
                            if (closeBtn) closeBtn.click();
                        }
                    }
                });

                // Parallax effect for hero
                window.addEventListener('scroll', function() {
                    const scrolled = window.pageYOffset;
                    const heroShapes = document.querySelectorAll('.shape');

                    heroShapes.forEach((shape, index) => {
                        const speed = (index + 1) * 0.1;
                        shape.style.transform = `translateY(${scrolled * speed}px)`;
                    });
                });
            });
        </script>
    @endsection
