@extends('layouts.app')

@section('title', 'Reservasi & Kontak - JOSS GANDOS')

@section('content')
    <!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP - ORIGINAL PRESERVED -->
    <!-- ELEGANT RED GRADIENT HERO SECTION -->
    <section class="elegant-hero">

        <!-- Soft Gradient Background -->
        <div class="elegant-gradient"></div>

        <!-- Decorative Elements -->
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        <div class="hero-shape shape-3"></div>



        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-xl-6">

                    {{-- Judul kecil di atas --}}
                    <div class="premium-badge animate__animated animate__fadeInUp" style="animation-delay: 0s;">

                        <span class="badge-dot"></span>

                        <span>
                            {{ $reservationPage->hero_subtitle ?? 'RESERVASI ONLINE' }}
                        </span>

                        <span class="badge-dot"></span>

                    </div>


                    {{-- Judul utama --}}
                    <h1 class="elegant-heading">

                        {{-- Judul Baris 1 --}}
                        <span class="heading-line animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">

                            {{ $reservationPage->hero_title_line1 ?? 'Pesan Meja' }}

                        </span>


                        {{-- Judul Baris 2 --}}
                        <span class="heading-line gradient-highlight animate__animated animate__fadeInUp"
                            style="animation-delay: 0.4s;">

                            {{ $reservationPage->hero_title_line2 ?? 'Untuk Momen' }}

                        </span>


                        {{-- Judul Baris 3 --}}
                        <span class="heading-line animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">

                            {{ $reservationPage->hero_title_line3 ?? 'Spesial Anda' }}

                        </span>

                    </h1>


                    {{-- Deskripsi --}}
                    <p class="elegant-desc animate__animated animate__fadeInUp" style="animation-delay: 0.8s;">

                        {{ $reservationPage->hero_description ?? 'Pastikan tempat duduk terbaik untuk acara keluarga, pertemuan bisnis, atau momen romantis bersama orang tersayang di Joss Gandos.' }}

                    </p>

                </div>


                {{-- Foto Hero --}}
                <div class="col-lg-6 col-xl-6">

                    <div class="hero-image-wrapper reservation-hero-visual reservation-hero-enter">

                        <img src="{{ $reservationPage && $reservationPage->hero_image
                            ? (filter_var($reservationPage->hero_image, FILTER_VALIDATE_URL)
                                ? $reservationPage->hero_image
                                : asset('storage/' . ltrim($reservationPage->hero_image, '/')))
                            : '' }}"
                            alt="{{ $reservationPage->hero_title_line1 ?? 'Reservation' }}" class="reservation-hero-image">
                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- Delivery Services Section - FIXED dengan Button GoFood & GrabFood -->
    <section id="delivery-services" class="section-padding bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold mb-3" style="color: #b42222;">
                        {{ $reservationPage->services_title ?? 'Pesan Delivery' }}
                    </h2>

                    <p class="lead text-muted mb-4">
                        {{ $reservationPage->services_description ?? 'Nikmati menu favorit JOSS GANDOS langsung di rumah Anda melalui layanan delivery kami' }}
                    </p>
                </div>
            </div>

            <!-- Delivery Apps -->
            <div class="row g-4">

                @forelse ($deliveryServices as $service)
                    <div class="col-md-4 col-lg-3">
                        <div class="delivery-app-card text-center">

                            <div class="delivery-app-logo mb-3">
                                @if (!empty($service->logo))
                                    <img src="{{ Str::startsWith($service->logo, ['http://', 'https://', '/'])
                                        ? $service->logo
                                        : asset('storage/' . $service->logo) }}"
                                        alt="{{ $service->name }}" class="img-fluid"
                                        style="max-height: 50px; object-fit: contain;">
                                @endif
                            </div>

                            <div class="delivery-app-content">

                                <h4 class="fw-bold mb-3" style="color: #333;">
                                    {{ $service->name }}
                                </h4>

                                @if (!empty($service->description))
                                    <p class="text-muted mb-3">
                                        {{ $service->description }}
                                    </p>
                                @endif

                                @if ($service->is_active && !empty($service->url))
                                    <a href="{{ $service->url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn w-100 py-3 fw-bold delivery-btn d-flex align-items-center justify-content-center">

                                        <span>{{ $service->button_text ?: 'Order Now' }}</span>
                                    </a>
                                @endif

                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Belum ada layanan yang tersedia.
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- ==================== CONTACT INFO & MAP SECTION ==================== -->
    <section class="section-padding bg-light" id="contact-info">

        <div class="container">

            <!-- ==================== JUDUL SECTION ==================== -->
            <div class="row justify-content-center mb-6">

                <div class="col-lg-8 text-center">

                    <div class="section-header" data-aos="fade-up">

                        <h2 class="display-4 fw-bold mb-4">
                            {{ $reservationPage->contact_title ?? 'Informasi Kontak' }}
                        </h2>

                        <p class="lead text-muted">
                            {{ $reservationPage->contact_description ?? 'Hubungi kami untuk pertanyaan, reservasi, atau informasi lainnya' }}
                        </p>

                    </div>

                </div>

            </div>


            <!-- ==================== LAYOUT UTAMA ==================== -->
            <div class="row g-4 align-items-stretch">

                <!-- ================================================= -->
                <!-- KOLOM KIRI -->
                <!-- ================================================= -->
                <div class="col-lg-4">

                    <!-- ==================== INFO KONTAK ==================== -->
                    <div class="contact-info-card mb-4">

                        <div class="p-4">

                            <h4 class="fw-bold mb-4 text-center" style="color: #b42222;">


                                Info Kontak

                            </h4>


                            <div class="quick-contact-list">

                                <!-- Lokasi Restoran -->
                                <div class="quick-contact-item d-flex align-items-start mb-3">

                                    <div class="contact-icon me-3 flex-shrink-0">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">
                                            Lokasi Restoran
                                        </h6>

                                        <p class="mb-0 text-muted">
                                            {{ $reservationContact->address ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}
                                        </p>
                                    </div>

                                </div>


                                <!-- Jam Operasional -->
                                <div class="quick-contact-item d-flex align-items-start mb-3">

                                    <div class="contact-icon me-3 flex-shrink-0">
                                        <i class="fas fa-clock"></i>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">
                                            Jam Operasional
                                        </h6>

                                        <p class="mb-0 text-muted">
                                            {{ $reservationContact->hours ?? 'Senin - Kamis 10:00 - 22:00, Jumat - Sabtu 10:00 - 23:00, Minggu 10:00 - 22:00' }}
                                        </p>
                                    </div>

                                </div>


                                <!-- Email -->
                                <div class="quick-contact-item d-flex align-items-start mb-3">

                                    <div class="contact-icon me-3 flex-shrink-0">
                                        <i class="fas fa-envelope"></i>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">
                                            Email
                                        </h6>

                                        <p class="mb-0 text-muted">
                                            {{ $reservationContact->email ?? 'info@jossgandos.com' }}
                                        </p>
                                    </div>

                                </div>


                                <!-- Telepon -->
                                <div class="quick-contact-item d-flex align-items-start">

                                    <div class="contact-icon me-3 flex-shrink-0">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">
                                            Telepon
                                        </h6>

                                        <p class="mb-0 text-muted">
                                            {{ $reservationContact->phone ?? '0896-9907-1599' }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ==================== IKUTI KAMI ==================== -->
                    <div class="social-media-card">

                        <div class="p-4 text-center">

                            <h4 class="fw-bold mb-4" style="color: #333;">
                                Ikuti Kami
                            </h4>


                            @php
                                $facebook = $reservationSocial->facebook_url ?? '#';
                                $instagram = $reservationSocial->instagram_url ?? '#';
                                $tiktok = $reservationSocial->tiktok_url ?? '#';
                            @endphp


                            <!-- Icon Media Sosial -->
                            <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">

                                <a href="{{ $facebook != '#' ? $facebook : '#' }}" class="social-icon"
                                    style="background: #1877f2;" target="_blank" rel="noopener noreferrer">

                                    <i class="fab fa-facebook-f"></i>

                                </a>


                                <a href="{{ $instagram != '#' ? $instagram : '#' }}" class="social-icon"
                                    style="background: radial-gradient(circle at 30% 30%, #fdf497, #fd5949, #d6249f, #285AEB);"
                                    target="_blank" rel="noopener noreferrer">

                                    <i class="fab fa-instagram"></i>

                                </a>


                                <a href="{{ $tiktok != '#' ? $tiktok : '#' }}" class="social-icon"
                                    style="background: #000000;" target="_blank" rel="noopener noreferrer">

                                    <i class="fab fa-tiktok"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- KOLOM KANAN: MAPS -->
                <!-- ================================================= -->
                <div class="col-lg-8">

                    <div class="map-card h-100" id="map-section">

                        <!-- Header Maps -->
                        <div class="map-header p-4 p-md-5" style="background: linear-gradient(135deg, #b42222, #e63946);">

                            <div class="d-flex align-items-center">

                                <div class="map-icon me-4 flex-shrink-0">
                                    <i class="fas fa-map-marked-alt fa-3x text-white"></i>
                                </div>

                                <div>

                                    <h4 class="text-white mb-2 fw-bold">
                                        Lokasi Kami
                                    </h4>

                                    <p class="text-white mb-0" style="font-size: 1.1rem;">

                                        {{ $reservationContact->address ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- Google Maps -->
                        <div class="map-container">

                            <div class="ratio ratio-16x9">

                                <iframe src="{{ $reservationContact->map_embed ?? '' }}" style="border: 0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>








@endsection

@section('styles')
    <!-- All the CSS styles remain exactly the same, ditambah styling untuk button merah -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@400;500;600;700;800&display=swap');
        /* ========== IMPORT ANIMATE.CSS ========== */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

        :root {
            --primary-red: #B22222;
            --primary-dark: #8B0000;
            --secondary-gold: #D4A017;
            --accent-gold: #FFC145;
            --light-cream: #FFF9F0;
            --dark-charcoal: #2C2C2C;
            --success-green: #28A745;
            --info-blue: #4361EE;
            --light-gray: #F8F9FA;
            --border-radius: 20px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --box-shadow-lg: 0 25px 50px rgba(0, 0, 0, 0.15);
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
            /* Warm Cream */
            --bg-peach: #FFEBEE;
            /* Soft Peach */
            --hero-bg: #8D1212;
            /* Rich Maroon (lebih terang dari sebelumnya) */

            /* Shadows */
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.15);

            /* Gradients - More Refined */
            --gradient-primary: linear-gradient(135deg, #C62828 0%, #F57C00 100%);
            --gradient-hero: radial-gradient(circle at 70% 30%, #A52A2A 0%, #8D1212 40%, #6B1111 100%);

            /* Transitions */
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ========== ELEGANT RED GRADIENT HERO ========== */

        .elegant-hero {
            position: relative;
            min-height: calc(100vh - 76px);
            display: flex;
            align-items: center;
            padding: 40px 0;
            margin-top: 0;
            overflow: hidden;
            background: #F4F5F6;
        }

        /* Posisi teks mengikuti lebar teks pada Hero Menu */
        @media (min-width: 769px) {

            .elegant-hero .col-lg-6:first-child {
                max-width: 560px;
                transform: translateY(32px);
            }

        }

        /* ============================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HERO GRADIENT - DINONAKTIFKAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Agar tidak menutupi background putih
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ============================================ */
        .elegant-gradient {
            display: none;
        }

        .hero-shape {
            display: none;
        }

        .shape-1 {
            width: 600px;
            height: 600px;
            background: rgba(198, 40, 40, 0.15);
            top: -200px;
            right: -100px;
            animation: shapeFloat 20s ease-in-out infinite;
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: rgba(245, 124, 0, 0.12);
            bottom: -100px;
            left: -50px;
            animation: shapeFloat 25s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 300px;
            height: 300px;
            background: rgba(255, 167, 38, 0.1);
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

        /* Tulisan kecil Hero Reservasi */
        .premium-badge {
            display: inline-block;
            margin-bottom: 8px;

            color: #7e7e7e;
            background: none;
            border: none;
            box-shadow: none;
            padding: 0;

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            font-style: italic;
            font-weight: 600;
        }

        /* Sembunyikan titik dekorasi pada tulisan kecil */
        .premium-badge .badge-dot {
            display: none;
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

        /* Teks di dalam tulisan kecil */
        .premium-badge span {
            color: #7e7e7e;
            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            font-style: italic;
            font-weight: 600;
            letter-spacing: 0;
        }

        /* Judul utama Hero Reservasi */
        .elegant-heading {
            width: 115%;
            max-width: none;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.6rem, 3.6vw, 3.6rem);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -1.2px;
            color: #E8892D;
            text-shadow: none;
            overflow-wrap: anywhere;
        }

        .heading-line {
            display: block;
            font-family: 'Poppins', sans-serif;
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

        /* Baris ketiga tetap berada di bawah */
        .elegant-heading .heading-line:nth-child(3) {
            display: block;
        }

        /* Baris judul kedua menggunakan gradient merah seperti Hero Menu */
        .gradient-highlight {
            display: block;

            background: linear-gradient(135deg,
                    #65000B 0%,
                    #C1121F 50%,
                    #FF3B30 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            font-family: 'Poppins', sans-serif;
            font-weight: 800;
        }

        /* Deskripsi Hero Reservasi */
        .elegant-desc {
            max-width: 500px;
            margin: 18px 0 0 !important;
            padding: 0 !important;
            color: #7e7e7e;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            line-height: 1.7;
            font-weight: 400;
            letter-spacing: 0;
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
            padding: 16px 36px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
            overflow: hidden;
            border: none;
        }

        .btn-primary-elegant {
            background: white;
            color: var(--primary-dark);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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

        /* ============================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   BUTTON OUTLINE - UNTUK BACKGROUND PUTIH
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ============================================ */
        .btn-outline-elegant {
            background: transparent;

            /* Teks tombol menjadi merah */
            color: var(--primary-dark);

            /* Border merah agar terlihat jelas */
            border: 1.5px solid var(--primary-dark);

            backdrop-filter: blur(5px);
        }

        .btn-outline-elegant:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
            transform: translateY(-3px);
        }

        /* ========== HERO IMAGE ========== */
        .hero-image-wrapper {
            position: relative;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            left: 140px;
        }

        /* ============================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ANIMASI MASUK GAMBAR HERO RESERVASI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       Diadaptasi dari animasi Hero Galeri
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ============================================ */

        .reservation-hero-enter {
            opacity: 0;
            transform: translate3d(110vw, 0, 0);
            animation: reservationHeroEntrance 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0s forwards;
        }

        @keyframes reservationHeroEntrance {
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
            border-color: rgba(255, 167, 38, 0.6);
            box-shadow: 0 50px 80px -20px rgba(198, 40, 40, 0.6);
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
                    rgba(198, 40, 40, 0.2) 0%,
                    rgba(0, 0, 0, 0.4) 50%,
                    rgba(198, 40, 40, 0.2) 100%);
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
                    rgba(255, 167, 38, 0.3) 0%,
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
            border-color: rgba(255, 167, 38, 0.7);
            transition: all 0.4s ease;
        }

        .frame-corner.top-left {
            top: 20px;
            left: 20px;
            border-top: 3px solid var(--accent);
            border-left: 3px solid var(--accent);
        }

        .frame-corner.top-right {
            top: 20px;
            right: 20px;
            border-top: 3px solid var(--accent);
            border-right: 3px solid var(--accent);
        }

        .frame-corner.bottom-left {
            bottom: 20px;
            left: 20px;
            border-bottom: 3px solid var(--accent);
            border-left: 3px solid var(--accent);
        }

        .frame-corner.bottom-right {
            bottom: 20px;
            right: 20px;
            border-bottom: 3px solid var(--accent);
            border-right: 3px solid var(--accent);
        }

        .hero-image-frame.hero-frame-premium:hover .frame-corner {
            width: 50px;
            height: 50px;
            border-color: var(--accent-light);
        }

        .image-premium-label {
            position: absolute;
            bottom: 30px;
            left: 30px;
            background: rgba(255, 167, 38, 0.95);
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

        /* Process Section */
        .process-card {
            background: white;
            border-radius: var(--border-radius);
            transition: all 0.4s ease;
            border: 2px solid transparent;
        }

        .process-card:hover {
            transform: translateY(-15px);
            border-color: var(--primary-red);
            box-shadow: var(--box-shadow-lg);
        }

        .number-circle {
            display: inline-block;
            width: 60px;
            height: 60px;
            background: var(--primary-red);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(178, 34, 34, 0.3);
        }

        /* Form Section Title Styles */
        .form-section-title {
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(178, 34, 34, 0.1);
            margin-bottom: 30px;
        }

        .form-section-title h5 {
            color: var(--dark-charcoal);
            font-size: 1.25rem;
            margin-bottom: 8px;
        }

        .form-section-title h5 i {
            font-size: 1.5rem;
        }

        .form-section-title .small {
            font-size: 0.875rem;
            opacity: 0.8;
        }

        /* Form Section */
        .form-wrapper {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow-lg);
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 2;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .label-icon {
            width: 36px;
            height: 36px;
            background: rgba(178, 34, 34, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-600);
            z-index: 1;
        }

        .form-control,
        .form-select {
            padding-left: 45px !important;
            border: 2px solid #E9ECEF;
            border-radius: 12px;
            height: 52px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.25rem rgba(178, 34, 34, 0.1);
        }

        /* Enhanced Date Picker */
        .date-picker-container {
            position: relative;
        }

        .date-picker {
            appearance: none;
            -webkit-appearance: none;
            background-color: white;
            cursor: pointer;
        }

        .date-picker::-webkit-calendar-picker-indicator {
            position: absolute;
            right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .date-picker::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }

        .date-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .selected-date .badge {
            background: var(--primary-red);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Time Select Dropdown */
        .time-select-container {
            position: relative;
        }

        .time-select {
            appearance: none;
            -webkit-appearance: none;
            background-color: white;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23676767' viewBox='0 0 16 16'%3E%3Cpath d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/%3E%3Cpath d='M7.5 12h1v1a.5.5 0 0 1-1 0v-1zm-3-4.5a.5.5 0 0 1 0-1H5a.5.5 0 0 1 0 1H4.5zm0 2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 0 1h-6zm0 2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 0 1h-6z'/%3E%3Cpath d='M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }

        .time-info {
            color: #666;
            font-size: 0.875rem;
        }

        /* Special Requests Textarea */
        .request-textarea {
            position: relative;
        }

        .textarea-icon {
            position: absolute;
            left: 15px;
            top: 15px;
            color: var(--gray-600);
        }

        textarea.form-control {
            padding-left: 45px !important;
            min-height: 120px;
            border: 2px solid #E9ECEF;
            border-radius: 12px;
            resize: vertical;
            font-size: 1rem;
            line-height: 1.5;
        }

        textarea.form-control:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.25rem rgba(178, 34, 34, 0.1);
        }

        .request-examples {
            background: rgba(178, 34, 34, 0.05);
            padding: 12px 16px;
            border-radius: 10px;
            border-left: 3px solid var(--secondary-gold);
        }

        /* Form Footer */
        .form-footer {
            border-top: 2px solid rgba(0, 0, 0, 0.05);
        }

        .btn-primary-red {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-red:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(178, 34, 34, 0.3);
        }

        .btn-primary-red::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-primary-red:hover::before {
            left: 100%;
        }

        .btn-outline-primary-red {
            border: 2px solid var(--primary-red);
            color: var(--primary-red);
            background: transparent;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary-red:hover {
            background: var(--primary-red);
            color: white;
            transform: translateY(-2px);
        }

        /* Benefits Section */
        .benefit-card {
            background: white;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary-red);
            box-shadow: var(--box-shadow-lg);
        }

        .benefit-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* FAQ Section */
        .accordion-button {
            background: white;
            border: 2px solid rgba(178, 34, 34, 0.1);
            border-radius: 12px !important;
            padding: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(178, 34, 34, 0.05);
            border-color: var(--primary-red);
            color: var(--primary-red);
            box-shadow: none;
        }

        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23B22222'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .faq-icon {
            width: 40px;
            height: 40px;
            background: rgba(178, 34, 34, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .accordion-body {
            background: white;
            border: 2px solid rgba(178, 34, 34, 0.1);
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 25px;
        }

        /* Contact Info Card */
        .contact-info-card {
            background: white;
            border-radius: 40px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: auto;
        }

        .contact-info-card:hover {
            transform: none;
            box-shadow: none;
            background: white;
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            background: rgba(180, 34, 34, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b42222;
            font-size: 18px;
        }

        .quick-contact-item {
            transition: all 0.3s ease;
        }

        .quick-contact-item:hover {
            transform: translateX(5px);
        }

        /* Card Ikuti Kami */
        .social-media-card {
            background: white;
            border-radius: 40px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: auto;
        }

        .social-icon {
            position: relative;
            z-index: 20;
            pointer-events: auto;

            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-icon {
            cursor: pointer;
        }

        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .contact-link {
            color: #b42222;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .contact-link:hover {
            color: #8a1a1a;
            text-decoration: underline;
        }

        /* Card Maps */
        .map-card {
            background: white;
            border-radius: 40px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
        }

        .map-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .delivery-app-card {
            background: white;
            border-radius: 40px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       DELIVERY CARD - TOMBOL SELALU SEJAJAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

        .delivery-app-content {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        /* Tombol GoFood / GrabFood */
        .delivery-app-content .delivery-btn {
            margin-top: auto;
        }

        /* Wrapper tombol Admin / Bu Ade */
        .delivery-app-content .whatsapp-admin-buttons {
            margin-top: auto;
        }

        .delivery-app-content .delivery-btn,
        .delivery-app-content .whatsapp-admin-btn-red {
            box-sizing: border-box;
        }

        .delivery-app-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(180, 34, 34, 0.1);
            border-color: #b42222;
        }

        .delivery-app-logo img {
            transition: transform 0.3s ease;
            max-height: 50px;
            object-fit: contain;
        }

        .delivery-app-card:hover .delivery-app-logo img {
            transform: scale(1.1);
        }

        .delivery-btn {
            color: white;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-top: auto;
            font-weight: 600;
            padding: 12px;
            background: linear-gradient(135deg, #b42222, #e63946) !important;
        }

        #delivery-services .delivery-btn {
            width: 160px !important;
            min-width: 160px;
            max-width: 160px;

            height: 48px;
            min-height: 48px;
            max-height: 48px;

            padding: 0 20px !important;

            border-radius: 24px;

            align-self: center;

            font-size: 0.9rem;
        }

        #delivery-services .delivery-btn span {
            font-size: 0.85rem;
            line-height: 1;
            white-space: nowrap;
        }

        .delivery-btn:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(180, 34, 34, 0.3);
            color: white;
        }

        .delivery-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Style untuk button admin merah seperti GrabFood - BARU */
        .whatsapp-admin-btn-red {
            color: white;
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;

            padding: 12px 16px;
            text-align: center;

            background: linear-gradient(135deg, #b42222, #e63946) !important;

            min-height: 56px;
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1rem;
            font-weight: 700;

            box-shadow: 0 4px 10px rgba(180, 34, 34, 0.3);
        }

        .whatsapp-admin-btn-red .fw-bold {
            font-size: inherit !important;
            font-weight: 700 !important;
            line-height: 1.2;
            white-space: nowrap;
        }


        .whatsapp-admin-btn-red:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(180, 34, 34, 0.4);
            color: white;
            background: linear-gradient(135deg, #c53030, #ff4757) !important;
        }

        .whatsapp-admin-btn-red i {
            font-size: 0.56rem !important;
            margin-right: 0 !important;
        }



        .opening-hours-list {
            padding: 10px;
        }

        .quick-actions {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        /* Animation */
        .animate-fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3rem;
            }

            .display-4 {
                font-size: 2.5rem;
            }

            .display-5 {
                font-size: 2rem;
            }
        }

        @media (max-width: 992px) {
            .modern-hero {
                padding: 120px 0 60px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .header-icon {
                margin: 0 auto;
            }

            .form-section-title h5 {
                font-size: 1.1rem;
            }

            .form-section-title h5 i {
                font-size: 1.3rem;
            }

            .stat-item {
                margin-bottom: 20px;
            }
        }

        /* =========================================================
                                                                                                           MOBILE RESERVASI
                                                                                                           Optimized untuk layar HP
                                                                                                           ========================================================= */

        @media (max-width: 768px) {

            /* =====================================================
                                                                                                               HERO
                                                                                                               ===================================================== */

            .elegant-hero {
                min-height: 100svh !important;
                height: auto;
                box-sizing: border-box;

                padding: 85px 0 45px;
                margin-top: 0 !important;

                overflow: hidden;
                width: 100%;
            }

            .elegant-hero .container {
                width: 100%;
                max-width: 100%;
                padding-left: 16px;
                padding-right: 16px;
                margin: 0 auto;
                box-sizing: border-box;
            }

            .elegant-hero .container>.row {
                width: 100%;
                min-height: auto !important;
                height: auto;
                margin-left: 0;
                margin-right: 0;

                display: flex;
                flex-direction: column;
                align-items: center;
            }

            /* Hilangkan struktur kolom Bootstrap agar
                                                                                                               urutan mobile bisa dikontrol */
            .elegant-hero .col-lg-6:first-child,
            .elegant-hero .col-lg-6:nth-child(2) {
                display: contents;
            }


            /* =====================================================
                                                                                                               1. JUDUL KECIL
                                                                                                               ===================================================== */

            .elegant-hero .premium-badge {
                order: 1;

                display: block;
                width: 100%;
                max-width: 320px;

                margin: 0 auto 10px;
                padding: 0;

                font-size: 0.95rem;
                line-height: 1.3;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            .elegant-hero .premium-badge span {
                display: inline;
                font-size: 0.95rem;
                line-height: 1.3;
                font-style: italic;

                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =====================================================
                                                                                                               2. JUDUL UTAMA
                                                                                                               ===================================================== */

            .elegant-hero .elegant-heading {
                order: 2;

                width: 100%;
                max-width: 320px;

                margin: 0 auto;

                font-size: clamp(2.15rem, 9vw, 2.8rem);
                line-height: 1.04;

                letter-spacing: -1px;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            .elegant-hero .elegant-heading .heading-line {
                display: block;

                width: 100%;
                max-width: 100%;

                font-size: inherit;
                line-height: 1.04;
                letter-spacing: -1px;

                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =====================================================
                                                                                                               3. FOTO HERO
                                                                                                               ===================================================== */

            .elegant-hero .hero-image-wrapper,
            .elegant-hero .reservation-hero-visual {
                order: 3;

                position: relative;

                width: 100%;
                max-width: 340px;

                left: 0 !important;
                right: auto;

                margin: 18px auto 0;
                padding: 0;

                display: flex;
                justify-content: center;
                align-items: center;

                transform: none;
            }

            .elegant-hero .reservation-hero-image {
                display: block;

                width: 100%;
                max-width: 340px;

                height: 220px;

                margin: 0 auto;

                object-fit: cover;
                object-position: center;

                border-radius: 28px;
            }


            /* =====================================================
                                                                                                               4. DESKRIPSI HERO
                                                                                                               ===================================================== */

            .elegant-hero .elegant-desc {
                order: 4;

                width: 100%;
                max-width: 320px;

                margin: 18px auto 0 !important;
                padding: 0 !important;

                font-size: 0.9rem;
                line-height: 1.65;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =====================================================
                                                                                                               DELIVERY SERVICES
                                                                                                               ===================================================== */

            #delivery-services {
                width: 100%;
                overflow: hidden;

                padding-top: 55px;
                padding-bottom: 55px;
            }

            #delivery-services>.container {
                width: 100%;
                max-width: 100%;

                padding-left: 16px;
                padding-right: 16px;

                box-sizing: border-box;
            }

            #delivery-services .row {
                margin-left: 0;
                margin-right: 0;
            }

            #delivery-services .display-5 {
                width: 100%;
                max-width: 320px;

                margin-left: auto;
                margin-right: auto;

                font-size: clamp(2rem, 8vw, 2.6rem);
                line-height: 1.08;
                letter-spacing: -0.8px;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            #delivery-services .lead {
                width: 100%;
                max-width: 320px;

                margin: 14px auto 28px !important;

                font-size: 0.9rem;
                line-height: 1.6;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            #delivery-services>.container>.row.g-4 {
                width: 100%;
                margin-left: 0;
                margin-right: 0;

                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));

                gap: 16px !important;

                --bs-gutter-x: 0;
                --bs-gutter-y: 0;
            }

            #delivery-services>.container>.row.g-4>.col-md-4 {
                width: 100%;
                max-width: 100%;
                padding: 0;
            }

            #delivery-services .col-md-4 {
                width: 100%;
                max-width: 100%;

                padding-left: 0;
                padding-right: 0;
            }

            .delivery-app-card {
                width: 100%;
                max-width: 340px;

                margin: 0 auto;

                padding: 20px;

                box-sizing: border-box;
            }

            #delivery-services .delivery-app-content h4 {
                font-size: 1.1rem;
                line-height: 1.3;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            #delivery-services .delivery-app-content p {
                font-size: 0.9rem;
                line-height: 1.6;

                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =====================================================
                                                                                                               CONTACT INFO
                                                                                                               ===================================================== */

            #contact-info {
                width: 100%;
                overflow: hidden;

                padding-top: 55px;
                padding-bottom: 55px;
            }

            #contact-info>.container {
                width: 100%;
                max-width: 100%;

                padding-left: 16px;
                padding-right: 16px;

                box-sizing: border-box;
            }

            #contact-info .display-4 {
                width: 100%;
                max-width: 320px;

                margin-left: auto;
                margin-right: auto;

                font-size: clamp(2rem, 8vw, 2.6rem);
                line-height: 1.08;
                letter-spacing: -0.8px;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            #contact-info .lead {
                width: 100%;
                max-width: 320px;

                margin: 14px auto 28px !important;

                font-size: 0.9rem;
                line-height: 1.6;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }


            /* =====================================================
                                                                                                               CONTACT CARD
                                                                                                               ===================================================== */

            .contact-info-card,
            .social-media-card,
            .map-card {
                width: 100%;
                max-width: 100%;

                box-sizing: border-box;
            }

            .contact-info-card,
            .social-media-card {
                border-radius: 28px;
            }

            .contact-info-card .p-4,
            .social-media-card .p-4 {
                padding: 20px !important;
            }

            .contact-info-card h4,
            .social-media-card h4 {
                font-size: 1.15rem;
            }

            .quick-contact-item {
                min-width: 0;
            }

            .quick-contact-item>div:last-child {
                min-width: 0;
                overflow-wrap: anywhere;
                word-break: break-word;
            }

            .quick-contact-item p {
                font-size: 0.9rem;
                line-height: 1.55;

                overflow-wrap: anywhere;
                word-break: break-word;
            }


            /* =====================================================
                                                                                                               MAP
                                                                                                               ===================================================== */

            .map-card {
                border-radius: 28px;
            }

            .map-header {
                padding: 20px !important;
            }

            .map-header .d-flex {
                align-items: flex-start;
                gap: 15px;
            }

            .map-icon {
                width: 55px;
                height: 55px;

                flex-shrink: 0;
            }

            .map-icon i {
                font-size: 1.5rem !important;
            }

            .map-header h4 {
                font-size: 1.15rem;
            }

            .map-header p {
                font-size: 0.9rem !important;
                line-height: 1.5;

                overflow-wrap: anywhere;
                word-break: break-word;
            }


            /* =====================================================
                                                                                                               SOCIAL ICON
                                                                                                               ===================================================== */

            .social-media-card .d-flex {
                gap: 12px !important;
            }

            .social-icon {
                width: 42px;
                height: 42px;

                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .section-tag {
                padding: 6px 20px;
                font-size: 0.8rem;
            }

            .form-section-title h5 {
                font-size: 1rem;
            }

            .form-section-title h5 i {
                font-size: 1.2rem;
            }

            .benefit-card {
                padding: 20px;
            }

            .benefit-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .date-picker::-webkit-calendar-picker-indicator {
                width: 16px;
                height: 16px;
            }
        }

        /* CSS Tambahan untuk Timer dan Kode Reservasi */
        .reservation-code-container {
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #reservationTimer {
            transition: all 0.3s ease;
        }

        #timerDisplay {
            font-family: 'Courier New', monospace;
            background: white;
            padding: 3px 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: pulse 1s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
                background: #f8f9fa;
            }
        }

        /* Styling untuk alert success yang lebih baik */
        .alert-success {
            border-left: 4px solid #28a745;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 0;
            overflow: hidden;
        }

        /* Styling untuk kode reservasi */
        .reservation-code-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 15px;
            border-left: 4px solid #28a745;
        }

        .reservation-code-container .code-box {
            background: #b42222;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
        }

        .reservation-code-container .code-box span {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            font-family: monospace;
        }

        /* CSS tambahan untuk social icons */
        .social-icon i {
            font-size: 1.2rem;
        }

        .whatsapp-admin-btn-red .fab {
            font-size: 1.2rem;
        }

        .reservation-hero-image {
            width: 100%;
            max-width: 560px;
            height: 380px;
            object-fit: cover;
            object-position: center;
            border-radius: 35px;
            display: block;
        }

        @media (max-width: 768px) {
            .reservation-hero-image {
                width: 100%;
                max-width: 420px;
                height: 280px;
                border-radius: 50px;
                margin: 30px auto 0;
            }
        }

        /* Background Soft Gray - Minimalis Modern */
        #contact-info,
        #contact-info.bg-light,
        #delivery-services,
        #delivery-services.bg-light {
            background-color: #F4F5F6 !important;
        }

        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           MENYATUKAN SECTION PESANAN DAN INFORMASI KONTAK
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Menghilangkan garis/jarak pembatas antar-section
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ===================================================== */

        #delivery-services {
            margin-bottom: 0 !important;
            border: none !important;
            box-shadow: none !important;
        }

        #contact-info {
            margin-top: 0 !important;
            border: none !important;
            box-shadow: none !important;
        }

        /* Menutup kemungkinan celah 1px di antara section */
        #delivery-services+#contact-info {
            margin-top: -1px !important;
        }

        /* Menghilangkan garis dari pseudo-element */
        #delivery-services::before,
        #delivery-services::after,
        #contact-info::before,
        #contact-info::after {
            content: none !important;
            border: none !important;
            box-shadow: none !important;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ANIMASI TEKS HERO RESERVASI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Efek: muncul perlahan sambil bergerak dari bawah ke atas
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================================= */



        /* Urutan kemunculan setiap teks */

        /* 1. Subtitle Reservasi Online */
        .hero-delay-1 {
            animation-delay: 0.15s;
        }

        /* 2. Pesan Meja */
        .hero-delay-2 {
            animation-delay: 0.35s;
        }

        /* 3. Untuk Momen */
        .hero-delay-3 {
            animation-delay: 0.55s;
        }

        /* 4. Spesial Anda */
        .hero-delay-4 {
            animation-delay: 0.75s;
        }

        /* 5. Deskripsi */
        .hero-delay-5 {
            animation-delay: 1s;
        }



        .elegant-heading .heading-line {
            display: block;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ANIMASI GAMBAR HERO RESERVASI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Dibuat sama persis dengan animasi piring pada Galeri
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Gambar masuk dari luar sisi kanan halaman
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ========================================================= */

        .reservation-hero-visual {
            opacity: 0;
            transform: translate3d(110vw, 0, 0);

            animation: reservationHeroImageEntrance 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0s forwards;
        }

        /* Gambar masuk dari luar halaman kanan */
        @keyframes reservationHeroImageEntrance {
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

        /* Mencegah animasi dari luar halaman membuat scrollbar horizontal */
        .elegant-hero {
            overflow: hidden;
        }

        /* =========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           MOBILE HERO RESERVASI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           URUTAN:
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           1. Teks kecil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           2. Judul
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           3. Foto
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4. Deskripsi
                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ========================================================= */

        @media (max-width: 768px) {

            .elegant-hero {
                /* Hero memenuhi satu layar mobile */
                min-height: 100svh !important;
                height: auto;

                box-sizing: border-box;

                /* Ruang untuk navbar + isi hero */
                padding: 85px 0 50px;

                margin-top: 0 !important;

                overflow: hidden;
            }


            /* Hilangkan min-height 85vh dari inline HTML */
            .elegant-hero .container>.row {
                min-height: auto !important;
                height: auto;
            }

            /*
                                                                                                                                                                                                                                                                                                                                                                                                                                         * Pastikan hero benar-benar menempati
                                                                                                                                                                                                                                                                                                                                                                                                                                         * tinggi layar mobile sebelum section berikutnya.
                                                                                                                                                                                                                                                                                                                                                                                                                                         */
            .elegant-hero+#delivery-services {
                margin-top: 0 !important;
            }

            /* Row hero */
            .elegant-hero .container {
                padding-left: 20px;
                padding-right: 20px;
            }

            .elegant-hero .row {
                min-height: auto !important;
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               AGAR ELEMEN BISA DIATUR URUTANNYA DI MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .elegant-hero .col-lg-6:first-child,
            .elegant-hero .col-lg-6:nth-child(2) {
                display: contents;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               1. TEKS KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .elegant-hero .premium-badge {
                order: 1;

                display: block;
                width: 100%;

                margin: 0 0 10px;

                font-size: 1rem;
                line-height: 1.3;
                text-align: center;
            }

            .elegant-hero .premium-badge span {
                font-size: 1rem;
                line-height: 1.3;
                font-style: italic;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               2. JUDUL UTAMA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .elegant-hero .elegant-heading {
                order: 2;

                width: 100%;
                max-width: 500px;

                margin: 0 auto;

                font-size: 2.1rem;
                line-height: 1.02;

                letter-spacing: -1.5px;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            .elegant-hero .elegant-heading .heading-line {
                display: block;

                font-size: inherit;
                line-height: 1.02;
                letter-spacing: -1.5px;

                overflow-wrap: anywhere;
                word-break: normal;
            }

            as
            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               3. FOTO HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .elegant-hero .hero-image-wrapper,
            .elegant-hero .reservation-hero-visual {
                order: 3;

                position: relative;

                width: 100%;
                max-width: 100%;

                left: 0 !important;
                right: auto;

                margin: 18px 0 0;
                padding: 0;

                display: flex;
                justify-content: center;
                align-items: center;

                transform: none;
            }

            .elegant-hero .reservation-hero-image {
                width: 100%;
                max-width: 340px;

                height: 220px;

                margin: 0 auto;

                object-fit: cover;
                object-position: center;

                border-radius: 30px;

                display: block;
            }

            /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               4. DESKRIPSI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

            .elegant-hero .elegant-desc {
                order: 4;

                width: 100%;
                max-width: 320px;

                margin: 18px auto 0 !important;
                padding: 0 !important;

                font-size: 1rem;
                line-height: 1.6;

                text-align: center;

                overflow-wrap: anywhere;
                word-break: normal;
            }


        }

        /* =========================================
                                                                                                                                                                                                                               DELIVERY HEADER
                                                                                                                                                                                                                               ========================================= */

        #delivery-services .display-5 {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.6rem, 3.6vw, 3.6rem);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -1.2px;
            background: linear-gradient(135deg,
                    #65000B 0%,
                    #C1121F 50%,
                    #FF3B30 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px !important;
        }

        #delivery-services .lead {
            max-width: 500px;
            margin: 18px auto 24px !important;
            padding: 0 !important;

            color: #7e7e7e !important;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            line-height: 1.7;
            font-weight: 400;
            letter-spacing: 0;
        }

        #delivery-services .delivery-app-content h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.3;
            color: #333333 !important;
        }


        /* =========================================
                                                                                                                                                                                                       CONTACT HEADER
                                                                                                                                                                                                       ========================================= */

        #contact-info .display-4 {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2.6rem, 3.6vw, 3.6rem);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -1.2px;

            background: linear-gradient(135deg,
                    #65000B 0%,
                    #C1121F 50%,
                    #FF3B30 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            margin-bottom: 12px !important;
        }

        #contact-info .lead {
            max-width: 500px;
            margin: 18px auto 24px !important;
            padding: 0 !important;

            color: #7e7e7e !important;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            line-height: 1.7;
            font-weight: 400;
            letter-spacing: 0;
        }

        /* Font judul di dalam card Contact */
        .contact-info-card h4,
        .social-media-card h4,
        .map-card h4 {
            font-family: 'Poppins', sans-serif;
        }

        #delivery-services>.container>.row.g-4 {
            justify-content: center;
        }





        /* ==========================================
                                       DELIVERY BUTTON - MOBILE
                                       ========================================== */

        @media (max-width: 768px) {

            #delivery-services .delivery-btn {
                width: 125px !important;
                min-width: 125px !important;
                max-width: 125px !important;

                height: 40px;
                min-height: 40px;
                max-height: 40px;

                padding: 0 12px !important;

                border-radius: 20px;

                margin-left: auto;
                margin-right: auto;

                font-size: 0.82rem !important;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            #delivery-services .delivery-btn span {
                font-size: 0.78rem !important;
                line-height: 1;
                white-space: nowrap;
            }
        }


        @media (max-width: 576px) {

            #delivery-services .delivery-btn {
                width: 115px !important;
                min-width: 115px !important;
                max-width: 115px !important;

                height: 38px;
                min-height: 38px;
                max-height: 38px;

                padding: 0 10px !important;

                border-radius: 19px;

                font-size: 0.78rem !important;
            }

            #delivery-services .delivery-btn span {
                font-size: 0.74rem !important;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ========== AUTO SCROLL KE DELIVERY ==========

            const urlParams = new URLSearchParams(window.location.search);
            const target = urlParams.get('target');

            if (target === 'delivery-services') {

                setTimeout(() => {

                    const deliverySection =
                        document.getElementById('delivery-services');

                    if (deliverySection) {

                        window.scrollTo({
                            top: deliverySection.offsetTop - 80,
                            behavior: 'smooth'
                        });

                    }

                }, 300);

            }

            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 100
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });


            // WhatsApp click tracking
            document.querySelectorAll('a[href*="whatsapp"]').forEach(link => {
                link.addEventListener('click', function() {
                    console.log('WhatsApp link clicked:', this.href);
                });
            });

            // Delivery app cards hover effect
            document.querySelectorAll('.delivery-app-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const logo = this.querySelector('.delivery-app-logo img');
                    if (logo) {
                        logo.style.transform = 'scale(1.1)';
                    }
                });

                card.addEventListener('mouseleave', function() {
                    const logo = this.querySelector('.delivery-app-logo img');
                    if (logo) {
                        logo.style.transform = 'scale(1)';
                    }
                });
            });
        });
    </script>
@endsection
