@extends('layouts.admin')

@section('title', 'Edit Halaman Home')
@section('page-title', 'Edit Halaman Home')

@section('content')
    <div class="container-fluid px-4">
        <!-- Header with Premium Red Gradient Theme -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header d-flex align-items-center justify-content-between p-4 rounded-4"
                    style="background: linear-gradient(145deg, #DC143C, #B22234, #8B0000); box-shadow: 0 20px 40px rgba(220, 20, 60, 0.3);">
                    <div>
                        <h4 class="text-white mb-1 fw-bold" style="font-size: 1.8rem;">
                            <i class="fas fa-edit me-2"></i>Edit Halaman Home
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="text-white text-opacity-75 text-decoration-none">
                                        <i class="fas fa-home me-1"></i>Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">Edit Home</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-light rounded-pill px-4 py-2 shadow-lg"
                        style="background: rgba(255,255,255,0.95); border: none; color: #DC143C; font-weight: 600;">
                        <i class="fas fa-eye me-2"></i>Lihat Halaman User
                        <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Alert styling with premium red theme --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show glass-alert" role="alert">
                <div class="d-flex align-items-center">
                    <div class="alert-icon me-3">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                    <div>
                        <strong class="d-block">Berhasil!</strong>
                        {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
                <div class="d-flex align-items-center">
                    <div class="alert-icon me-3">
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                    </div>
                    <div>
                        <strong class="d-block">Oops!</strong>
                        {{ session('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
                <div class="d-flex align-items-center">
                    <div class="alert-icon me-3">
                        <i class="fas fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div>
                        <strong class="d-block">Terdapat Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form id="homePageForm" action="{{ route('admin.pages.home.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            {{-- Menampung ID testimonial yang akan dihapus --}}
            <div id="deletedTestimonialsContainer"></div>

            {{-- HERO SECTION --}}
            <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.2s;">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 header-title">
                            <span class="header-icon">
                                <i class="fas fa-images"></i>
                            </span>
                            Hero Section
                        </h5>

                        <span class="badge-status">Utama</span>
                    </div>
                </div>

                <div class="card-body">

                    {{-- JUDUL KECIL HERO --}}
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Judul Kecil Hero</label>

                            <input type="text"
                                class="form-control custom-input @error('hero_premium_badge') is-invalid @enderror"
                                name="hero_premium_badge"
                                value="{{ old('hero_premium_badge', $page->content['hero_premium_badge'] ?? 'Resto Terbaik Di Ketintang') }}"
                                placeholder="Contoh: Resto Terbaik Di Ketintang">

                            @error('hero_premium_badge')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- JUDUL BARIS HERO --}}
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Judul Baris 1</label>

                                <input type="text"
                                    class="form-control custom-input @error('hero_title_line1') is-invalid @enderror"
                                    name="hero_title_line1"
                                    value="{{ old('hero_title_line1', $page->content['hero_title_line1'] ?? 'Nikmati Kelezatan') }}"
                                    required>

                                @error('hero_title_line1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Judul Baris 2 (Gradient)</label>

                                <input type="text"
                                    class="form-control custom-input gradient-text-preview @error('hero_title_line2') is-invalid @enderror"
                                    name="hero_title_line2"
                                    value="{{ old('hero_title_line2', $page->content['hero_title_line2'] ?? 'Hidangan Spesial') }}"
                                    required>

                                @error('hero_title_line2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Judul Baris 3</label>

                                <input type="text"
                                    class="form-control custom-input @error('hero_title_line3') is-invalid @enderror"
                                    name="hero_title_line3"
                                    value="{{ old('hero_title_line3', $page->content['hero_title_line3'] ?? 'di Joss Gandos') }}"
                                    required>

                                @error('hero_title_line3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 mb-3">
                        <label class="form-label">Deskripsi Hero</label>

                        <textarea class="form-control custom-input @error('hero_description') is-invalid @enderror" name="hero_description"
                            rows="3" placeholder="Masukkan deskripsi Hero">{{ old('hero_description', $page->content['hero_description'] ?? 'Reservasi bisa di nomor 0856-4958-8953. Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.') }}</textarea>

                        @error('hero_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- MEDIA HERO: UPLOAD LANGSUNG --}}
                @php
                    $currentHeroMediaType = old('hero_media_type', $page->content['hero_media_type'] ?? 'image');

                    $currentHeroMediaValue = old('hero_image_url', $page->content['hero_image_url'] ?? '');

                    $currentHeroPreviewUrl = $currentHeroMediaValue;

                    // Konversi path lokal menjadi URL preview.
                    if ($currentHeroMediaValue !== '' && !preg_match('#^https?://#i', $currentHeroMediaValue)) {
                        if (strpos($currentHeroMediaValue, 'storage/') === 0) {
                            $currentHeroPreviewUrl = asset($currentHeroMediaValue);
                        } elseif (strpos($currentHeroMediaValue, '/') === 0) {
                            $currentHeroPreviewUrl = url($currentHeroMediaValue);
                        } else {
                            $currentHeroPreviewUrl = asset('storage/' . ltrim($currentHeroMediaValue, '/'));
                        }
                    }
                @endphp

                <div class="row mt-3">
                    <div class="col-12 mb-3">

                        <label for="hero_media_file" class="form-label">
                            <i class="fas fa-photo-video me-1" style="color: #DC143C;"></i>
                            Upload Gambar / Video Hero
                        </label>

                        {{-- Pertahankan media lama jika tidak memilih file baru --}}
                        <input type="hidden" name="hero_media_type" id="hero_media_type"
                            value="{{ $currentHeroMediaType }}">

                        <input type="hidden" name="hero_image_url" id="hero_image_url"
                            value="{{ $currentHeroMediaValue }}">

                        {{-- Input file langsung dari komputer --}}
                        <input type="file" name="hero_media_file" id="hero_media_file"
                            class="form-control custom-input @error('hero_media_file') is-invalid @enderror"
                            accept="image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,video/quicktime"
                            onchange="previewHeroMedia()">

                        @error('hero_media_file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted d-block mt-2">
                            Pilih file gambar atau video langsung dari komputer.
                            Gambar: JPG, PNG, WEBP, GIF.
                            Video: MP4, WEBM, MOV.
                            Ukuran maksimal 50 MB.
                        </small>

                        <small id="heroMediaFileInfo" class="text-muted d-block mt-1">
                        </small>

                    </div>
                </div>

                {{-- PREVIEW MEDIA HERO --}}
                <div id="heroPreviewContainer" class="image-preview-container mt-2"
                    data-existing-url="{{ $currentHeroPreviewUrl }}" data-existing-type="{{ $currentHeroMediaType }}"
                    style="{{ $currentHeroPreviewUrl !== '' ? 'display:block;' : 'display:none;' }}">
                    <label class="form-label">
                        Preview Media Hero
                    </label>

                    <div id="heroPreviewWrapper" class="image-preview-wrapper" style="width:100%;max-width:100%;">
                        @if ($currentHeroPreviewUrl !== '')

                            @if (in_array($currentHeroMediaType, ['youtube', 'tiktok']))
                                <div class="text-muted small">
                                    Memuat preview media lama...
                                </div>
                            @elseif ($currentHeroMediaType === 'video' || preg_match('/\.(mp4|webm|mov|ogg)(\?.*)?$/i', $currentHeroPreviewUrl))
                                <video src="{{ $currentHeroPreviewUrl }}" controls muted playsinline preload="metadata"
                                    style="width:100%;max-height:450px;object-fit:contain;border-radius:12px;background:#111;"></video>
                            @else
                                <img src="{{ $currentHeroPreviewUrl }}" alt="Preview Gambar Hero"
                                    style="width:100%;max-height:450px;object-fit:contain;border-radius:12px;">
                            @endif

                        @endif
                    </div>
                </div>

                {{-- TOMBOL HERO --}}
                <div class="row mt-3">

                    {{-- TOMBOL 1 --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="fas fa-utensils me-1" style="color: #DC143C;"></i>
                            Teks Tombol 1
                        </label>

                        <input type="text"
                            class="form-control custom-input @error('hero_button_menu') is-invalid @enderror"
                            name="hero_button_menu"
                            value="{{ old('hero_button_menu', $page->content['hero_button_menu'] ?? 'Lihat Menu') }}"
                            placeholder="Contoh: Lihat Menu">

                        @error('hero_button_menu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- TOMBOL 2 --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            <i class="fas fa-calendar-check me-1" style="color: #DC143C;"></i>
                            Teks Tombol 2
                        </label>

                        <input type="text"
                            class="form-control custom-input @error('hero_button_reservation') is-invalid @enderror"
                            name="hero_button_reservation"
                            value="{{ old('hero_button_reservation', $page->content['hero_button_reservation'] ?? 'Pesan Meja') }}"
                            placeholder="Contoh: Pesan Meja">

                        @error('hero_button_reservation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- WELCOME SECTION --}}
            <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.3s;">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 header-title">
                            <span class="header-icon">
                                <i class="fas fa-hand-peace"></i>
                            </span>
                            Welcome Section
                        </h5>
                        <span class="badge-status">Profil</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Baris 1</label>
                            <input type="text"
                                class="form-control custom-input @error('welcome_title_line1') is-invalid @enderror"
                                name="welcome_title_line1"
                                value="{{ old('welcome_title_line1', $page->content['welcome_title_line1'] ?? 'Selamat Datang') }}"
                                required>
                            @error('welcome_title_line1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Baris 2 (Gradient)</label>
                            <input type="text"
                                class="form-control custom-input gradient-text-preview @error('welcome_title_line2') is-invalid @enderror"
                                name="welcome_title_line2"
                                value="{{ old('welcome_title_line2', $page->content['welcome_title_line2'] ?? 'Resto Joss Gandos') }}"
                                required>
                            @error('welcome_title_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Welcome</label>
                        <textarea class="form-control custom-input @error('welcome_description') is-invalid @enderror"
                            name="welcome_description" rows="3" required>{{ old('welcome_description', $page->content['welcome_description'] ?? 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.') }}</textarea>
                        @error('welcome_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>
                            Upload Gambar Welcome
                        </label>

                        <input type="file" name="welcome_image_file" id="welcome_image_file" class="form-control"
                            accept="image/jpeg,image/png,image/webp,image/gif" onchange="previewWelcomeFile(event)">

                        <small class="text-muted">
                            Pilih gambar dari komputer. Format JPG, PNG, WEBP, atau GIF.
                        </small>

                        @php
                            $welcomeImage = $page->content['welcome_image_url'] ?? '';

                            if ($welcomeImage && !preg_match('#^https?://#i', $welcomeImage)) {
                                $welcomeImage = asset('storage/' . ltrim($welcomeImage, '/'));
                            }
                        @endphp

                        <div id="welcomePreviewContainer" class="mt-3">
                            <label class="form-label">
                                Preview Gambar Welcome:
                            </label>

                            <img id="welcomePreview" src="{{ $welcomeImage }}" alt="Preview Gambar Welcome"
                                style="max-width: 200px; display: block; border-radius: 10px;">
                        </div>
                    </div>

                    <h6 class="sub-header">
                        <i class="fas fa-star me-2"></i>
                        Fitur Unggulan
                    </h6>
                    <div class="row">

                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-6 mb-3">

                                <label class="form-label small">
                                    Fitur {{ $i }}
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text"
                                        style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                                        <i class="fas fa-check"></i>
                                    </span>

                                    <input type="text"
                                        class="form-control custom-input @error('feature_' . $i . '_text') is-invalid @enderror"
                                        name="feature_{{ $i }}_text"
                                        value="{{ old(
                                            'feature_' . $i . '_text',
                                            $page->content['feature_' . $i . '_text'] ??
                                                ($i == 1
                                                    ? 'Bahan premium pilihan terbaik'
                                                    : ($i == 2
                                                        ? 'Chef berpengalaman & profesional'
                                                        : ($i == 3
                                                            ? 'Suasana nyaman untuk keluarga'
                                                            : 'Pelayanan ramah & cepat'))),
                                        ) }}"
                                        required>

                                </div>

                                @error('feature_' . $i . '_text')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        @endfor

                    </div>
                </div>
            </div>



            {{-- SERVICES SECTION --}}
            <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.4s;">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 header-title">
                            <span class="header-icon">
                                <i class="fas fa-concierge-bell"></i>
                            </span>
                            Services Section
                        </h5>
                        <span class="badge-status">Layanan</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Baris 1</label>
                            <input type="text"
                                class="form-control custom-input @error('services_title_line1') is-invalid @enderror"
                                name="services_title_line1"
                                value="{{ old('services_title_line1', $page->content['services_title_line1'] ?? 'Fasilitas &') }}"
                                required>
                            @error('services_title_line1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Baris 2 (Gradient)</label>
                            <input type="text"
                                class="form-control custom-input gradient-text-preview @error('services_title_line2') is-invalid @enderror"
                                name="services_title_line2"
                                value="{{ old('services_title_line2', $page->content['services_title_line2'] ?? 'Pelayanan Premium') }}"
                                required>
                            @error('services_title_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <textarea class="form-control custom-input @error('services_subtitle') is-invalid @enderror" name="services_subtitle"
                            rows="2" required>{{ old('services_subtitle', $page->content['services_subtitle'] ?? 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda') }}</textarea>
                        @error('services_subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h6 class="sub-header">
                        <i class="fas fa-list me-2"></i>
                        Icon Detail Layanan
                    </h6>

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

                            $currentIcon = $page->content['service_' . $i . '_icon'] ?? null;

                            $isLegacyFontAwesome =
                                is_string($currentIcon) &&
                                (str_starts_with($currentIcon, 'fas ') ||
                                    str_starts_with($currentIcon, 'far ') ||
                                    str_starts_with($currentIcon, 'fab ') ||
                                    str_starts_with($currentIcon, 'fal ') ||
                                    str_starts_with($currentIcon, 'fad '));
                        @endphp

                        <div class="service-item mb-3">

                            {{-- HEADER LAYANAN --}}
                            <div class="service-header" data-bs-toggle="collapse"
                                href="#service{{ $i }}Collapse" role="button" aria-expanded="false"
                                aria-controls="service{{ $i }}Collapse">

                                {{-- Icon header --}}
                                @if ($isLegacyFontAwesome)
                                    <i class="{{ $currentIcon }} me-2" style="color: #DC143C;"></i>
                                @elseif ($currentIcon)
                                    <img src="{{ asset('storage/' . $currentIcon) }}"
                                        alt="Icon Layanan {{ $i }}" class="service-header-icon me-2">
                                @else
                                    <i class="{{ $iconDefault }} me-2" style="color: #DC143C;"></i>
                                @endif

                                Layanan {{ $i }}: {{ $titleDefault }}

                                <i class="fas fa-chevron-down ms-auto"></i>

                            </div>


                            {{-- BODY LAYANAN --}}
                            <div class="collapse" id="service{{ $i }}Collapse">

                                <div class="service-body">

                                    <div class="row">

                                        {{-- ========================= --}}
                                        {{-- ICON LAYANAN --}}
                                        {{-- ========================= --}}
                                        <div class="col-md-3 mb-3">

                                            <label class="form-label small">
                                                <i class="fas fa-image me-1"></i>
                                                Icon Layanan
                                            </label>


                                            {{-- PREVIEW ICON --}}
                                            <div class="service-icon-preview mb-2"
                                                id="serviceIconPreview_{{ $i }}">

                                                @if ($isLegacyFontAwesome)
                                                    {{-- Font Awesome lama --}}
                                                    <i class="{{ $currentIcon }}"
                                                        style="font-size: 48px; color: #DC143C;"></i>
                                                @elseif ($currentIcon)
                                                    {{-- Icon hasil upload --}}
                                                    <img src="{{ asset('storage/' . $currentIcon) }}"
                                                        alt="Icon Layanan {{ $i }}"
                                                        class="service-icon-preview-image">
                                                @else
                                                    {{-- Icon default --}}
                                                    <i class="{{ $iconDefault }}"
                                                        style="font-size: 48px; color: #DC143C;"></i>
                                                @endif

                                            </div>


                                            {{-- INPUT UPLOAD --}}
                                            <input type="file"
                                                class="form-control custom-input @error('service_' . $i . '_icon') is-invalid @enderror"
                                                name="service_{{ $i }}_icon"
                                                accept=".svg,.png,image/svg+xml,image/png"
                                                onchange="previewServiceIcon(this, {{ $i }})">


                                            <small class="text-muted">
                                                Upload SVG atau PNG, maksimal 2 MB.
                                            </small>


                                            {{-- ERROR --}}
                                            @error('service_' . $i . '_icon')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>


                                        {{-- ========================= --}}
                                        {{-- JUDUL --}}
                                        {{-- ========================= --}}
                                        <div class="col-md-3 mb-3">

                                            <label class="form-label small">
                                                Judul
                                            </label>

                                            <input type="text" class="form-control custom-input"
                                                name="service_{{ $i }}_title"
                                                value="{{ old('service_' . $i . '_title', $page->content['service_' . $i . '_title'] ?? $titleDefault) }}">

                                        </div>


                                        {{-- ========================= --}}
                                        {{-- DESKRIPSI --}}
                                        {{-- ========================= --}}
                                        <div class="col-md-6 mb-3">

                                            <label class="form-label small">
                                                Deskripsi
                                            </label>

                                            <textarea class="form-control custom-input" name="service_{{ $i }}_description" rows="2">{{ old('service_' . $i . '_description', $page->content['service_' . $i . '_description'] ?? $descDefault) }}</textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endfor

                </div>
            </div>
    </div>

    {{-- TESTIMONIALS SECTION --}}
    <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.5s;">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 header-title">
                    <span class="header-icon">
                        <i class="fas fa-star"></i>
                    </span>
                    Testimonials Section
                </h5>

                <span class="badge-status">Ulasan</span>
            </div>
        </div>

        <div class="card-body">

            {{-- JUDUL TESTIMONIAL --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Judul Baris 1
                    </label>

                    <input type="text"
                        class="form-control custom-input @error('testimonials_title_line1') is-invalid @enderror"
                        name="testimonials_title_line1"
                        value="{{ old('testimonials_title_line1', $page->content['testimonials_title_line1'] ?? 'Apa Kata') }}"
                        required>

                    @error('testimonials_title_line1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Judul Baris 2 (Gradient)
                    </label>

                    <input type="text"
                        class="form-control custom-input gradient-text-preview @error('testimonials_title_line2') is-invalid @enderror"
                        name="testimonials_title_line2"
                        value="{{ old('testimonials_title_line2', $page->content['testimonials_title_line2'] ?? 'Pelanggan Kami?') }}"
                        required>

                    @error('testimonials_title_line2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- SUBTITLE --}}
            <div class="mb-3">
                <label class="form-label">
                    Subtitle
                </label>

                <textarea class="form-control custom-input @error('testimonials_subtitle') is-invalid @enderror"
                    name="testimonials_subtitle" rows="2" required>{{ old('testimonials_subtitle', $page->content['testimonials_subtitle'] ?? 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos') }}</textarea>

                @error('testimonials_subtitle')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- HEADER TESTIMONI --}}
            <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                <h6 class="sub-header mb-0">
                    <i class="fas fa-comments me-2"></i>
                    Testimoni Pelanggan
                </h6>

                <button type="button" id="addTestimonialBtn" class="btn btn-admin">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Testimoni
                </button>
            </div>

            {{-- CONTAINER TESTIMONIAL --}}
            <div id="testimonialContainer">

                @forelse ($testimonials as $index => $testimonial)

                    @php
                        $i = $index + 1;
                    @endphp

                    <div class="testimonial-item mb-3" data-testimonial-id="{{ $testimonial->id }}"
                        data-testimonial-index="{{ $i }}">

                        {{-- HEADER TESTIMONIAL --}}
                        <div class="testimonial-header" data-bs-toggle="collapse"
                            href="#testimonial{{ $i }}Collapse" role="button" aria-expanded="false"
                            aria-controls="testimonial{{ $i }}Collapse">

                            <i class="fas fa-user-circle me-2" style="color: #DC143C;"></i>

                            <span class="testimonial-header-title">
                                Testimoni {{ $i }}:
                                {{ $testimonial->name ?: 'Belum diisi' }}
                            </span>

                            <i class="fas fa-chevron-down ms-auto"></i>
                        </div>


                        {{-- ISI TESTIMONIAL --}}
                        <div class="collapse" id="testimonial{{ $i }}Collapse">

                            <div class="testimonial-body">

                                {{-- ID TESTIMONI --}}
                                <input type="hidden" name="testimonial_{{ $i }}_id"
                                    value="{{ $testimonial->id }}">

                                <div class="row">

                                    {{-- NAMA --}}
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label small">
                                            Nama
                                        </label>

                                        <input type="text" class="form-control custom-input testimonial-name-input"
                                            name="testimonial_{{ $i }}_name"
                                            value="{{ old('testimonial_' . $i . '_name', $testimonial->name) }}"
                                            placeholder="Nama pelanggan">
                                    </div>

                                    {{-- SUMBER --}}
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label small">
                                            Asal/Sumber
                                        </label>

                                        <input type="text" class="form-control custom-input"
                                            name="testimonial_{{ $i }}_source"
                                            value="{{ old('testimonial_' . $i . '_source', $testimonial->source ?? 'Google Reviews') }}"
                                            placeholder="Google Reviews">
                                    </div>

                                    {{-- RATING --}}
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label small">
                                            Rating (1-5)
                                        </label>

                                        <select class="form-select custom-input"
                                            name="testimonial_{{ $i }}_rating">

                                            @for ($r = 1; $r <= 5; $r++)
                                                <option value="{{ $r }}"
                                                    {{ old('testimonial_' . $i . '_rating', $testimonial->rating ?? 5) == $r ? 'selected' : '' }}>
                                                    {{ $r }} Bintang
                                                    {{ str_repeat('★', $r) }}
                                                </option>
                                            @endfor

                                        </select>
                                    </div>

                                    {{-- TESTIMONI --}}
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label small">
                                            Testimoni
                                        </label>

                                        <textarea class="form-control custom-input" name="testimonial_{{ $i }}_text" rows="3"
                                            placeholder="Tulis testimoni pelanggan...">{{ old('testimonial_' . $i . '_text', $testimonial->review) }}</textarea>
                                    </div>

                                </div>

                                {{-- TOMBOL HAPUS --}}
                                <div class="d-flex gap-2 mt-3">

                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteTestimonial({{ $testimonial->id }})">
                                        <i class="fas fa-trash me-1"></i>
                                        Hapus
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="alert alert-info">
                        Belum ada data testimoni.
                        Silakan tambahkan testimoni baru.
                    </div>

                @endforelse

            </div>


            {{-- TEMPLATE TESTIMONIAL BARU --}}
            <template id="testimonialTemplate">
                <div class="testimonial-item mb-3" data-testimonial-index="___INDEX___">

                    <div class="testimonial-header" data-bs-toggle="collapse" href="#testimonial___INDEX___Collapse"
                        role="button" aria-expanded="true" aria-controls="testimonial___INDEX___Collapse">

                        <i class="fas fa-user-circle me-2" style="color: #DC143C;"></i>

                        <span class="testimonial-header-title">
                            Testimoni Baru : Belum diisi
                        </span>

                        <i class="fas fa-chevron-down ms-auto"></i>
                    </div>

                    <div class="collapse show" id="testimonial___INDEX___Collapse">

                        <div class="testimonial-body">

                            {{-- ID KOSONG UNTUK DATA BARU --}}
                            <input type="hidden" name="testimonial_%%INDEX%%_id" value="">

                            <div class="row">

                                {{-- NAMA --}}
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">
                                        Nama
                                    </label>

                                    <input type="text" class="form-control custom-input testimonial-name-input"
                                        name="testimonial_%%INDEX%%_name" placeholder="Nama pelanggan">
                                </div>

                                {{-- SUMBER --}}
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">
                                        Asal/Sumber
                                    </label>

                                    <input type="text" class="form-control custom-input"
                                        name="testimonial_%%INDEX%%_source" value="Google Reviews"
                                        placeholder="Google Reviews">
                                </div>

                                {{-- RATING --}}
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">
                                        Rating (1-5)
                                    </label>

                                    <select class="form-select custom-input" name="testimonial_%%INDEX%%_rating">

                                        <option value="1">1 Bintang ★</option>
                                        <option value="2">2 Bintang ★★</option>
                                        <option value="3">3 Bintang ★★★</option>
                                        <option value="4">4 Bintang ★★★★</option>
                                        <option value="5" selected>5 Bintang ★★★★★</option>

                                    </select>
                                </div>

                                {{-- TESTIMONI --}}
                                <div class="col-md-12 mb-2">
                                    <label class="form-label small">
                                        Testimoni
                                    </label>

                                    <textarea class="form-control custom-input" name="testimonial_%%INDEX%%_text" rows="3"
                                        placeholder="Tulis testimoni pelanggan..."></textarea>
                                </div>

                            </div>

                            {{-- TOMBOL HAPUS --}}
                            <div class="d-flex gap-2 mt-3">

                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="this.closest('.testimonial-item').remove()">
                                    <i class="fas fa-trash me-1"></i>
                                    Hapus
                                </button>

                            </div>

                        </div>

                    </div>

                </div>
            </template>
        </div>
    </div>

    {{-- CTA SECTION --}}
    <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.6s;">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 header-title">
                    <span class="header-icon">
                        <i class="fas fa-bullhorn"></i>
                    </span>
                    CTA Section
                </h5>
                <span class="badge-status">Call to Action</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Baris 1</label>
                    <input type="text"
                        class="form-control custom-input @error('cta_title_line1') is-invalid @enderror"
                        name="cta_title_line1"
                        value="{{ old('cta_title_line1', $page->content['cta_title_line1'] ?? 'Siap Merasakan') }}"
                        required>
                    @error('cta_title_line1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Baris 2 (Gradient)</label>
                    <input type="text"
                        class="form-control custom-input gradient-text-preview @error('cta_title_line2') is-invalid @enderror"
                        name="cta_title_line2"
                        value="{{ old('cta_title_line2', $page->content['cta_title_line2'] ?? 'Pengalaman Kuliner Terbaik?') }}"
                        required>
                    @error('cta_title_line2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi CTA</label>
                <textarea class="form-control custom-input @error('cta_description') is-invalid @enderror" name="cta_description"
                    rows="3" required>{{ old('cta_description', $page->content['cta_description'] ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!') }}</textarea>
                @error('cta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h6 class="sub-header">
                <i class="fas fa-buttons me-2"></i>
                Tombol CTA
            </h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Teks Tombol 1 (Pesan Sekarang)</label>
                    <div class="input-group">
                        <span class="input-group-text"
                            style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <input type="text" class="form-control custom-input" name="cta_button1_text"
                            value="{{ old('cta_button1_text', $page->content['cta_button1_text'] ?? 'Pesan Sekarang') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Teks Tombol 2 (Reservasi Sekarang)</label>
                    <div class="input-group">
                        <span class="input-group-text"
                            style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                            <i class="fas fa-calendar-check"></i>
                        </span>
                        <input type="text" class="form-control custom-input" name="cta_button2_text"
                            value="{{ old('cta_button2_text', $page->content['cta_button2_text'] ?? 'Reservasi Sekarang') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-between mt-5 mb-5">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
        </a>
        <button type="submit" class="btn btn-admin" onclick="syncTestimonialsBeforeSubmit()">
            <i class="fas fa-save me-2"></i>Simpan Semua Perubahan
        </button>
    </div>
    </form>
    {{-- FORM HAPUS TESTIMONIAL --}}
    @foreach ($testimonials as $testimonial)
        <form id="deleteTestimonial{{ $testimonial->id }}"
            action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display: none;">

            @csrf
            @method('DELETE')
        </form>
    @endforeach

    </div>
@endsection

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ===== PREMIUM RED GRADIENT THEME ===== */
        :root {
            /* Red Gradient Palette */
            --red-50: #FFF1F3;
            --red-100: #FFE4E8;
            --red-200: #FFB3C1;
            --red-300: #FF8A9F;
            --red-400: #FF4D6D;
            --red-500: #DC143C;
            --red-600: #B22234;
            --red-700: #8B0000;
            --red-800: #5C0000;
            --red-900: #2E0000;

            /* Gradients */
            --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
            --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
            --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
            --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.05), rgba(139, 0, 0, 0.02));
            --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);

            /* Shadows */
            --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
            --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
            --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
            --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);

            /* Border Radius */
            --radius-sm: 12px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --radius-full: 9999px;

            /* Font */
            --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        * {
            font-family: var(--font-sans);
        }

        body {
            background: #faf7f5;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-xl) !important;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent 70%);
            border-radius: 50%;
            animation: floatHeader 15s ease-in-out infinite;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent 70%);
            border-radius: 50%;
            animation: floatHeader 20s ease-in-out infinite reverse;
        }

        @keyframes floatHeader {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(40px, -40px) scale(1.2);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.8);
            }
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.5);
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        /* ===== MAIN CARD ===== */
        .main-card {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: white;
        }

        .main-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px);
        }

        .main-card .card-header {
            background: white;
            border-bottom: 2px solid var(--red-100);
            padding: 1.2rem 1.5rem;
            position: relative;
        }

        .main-card .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-primary);
        }

        .header-title {
            color: var(--red-700);
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--gradient-soft);
            border-radius: var(--radius-md);
            color: var(--red-500);
            font-size: 1.2rem;
        }

        .badge-status {
            background: var(--gradient-soft);
            color: var(--red-700);
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid var(--red-200);
        }

        /* ===== FORM ELEMENTS ===== */
        .form-label {
            color: var(--red-700);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .custom-input {
            border: 2px solid #e9ecef;
            border-radius: var(--radius-md);
            padding: 0.7rem 1rem;
            transition: all 0.3s ease;
            background: white;
            font-size: 0.95rem;
        }

        .custom-input:hover {
            border-color: var(--red-300);
        }

        .custom-input:focus {
            border-color: var(--red-500);
            box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
            outline: none;
        }

        .custom-input.is-invalid {
            border-color: var(--red-500);
            background-image: none;
        }

        .invalid-feedback {
            color: var(--red-500);
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .invalid-feedback::before {
            content: '⚠️';
            font-size: 0.85rem;
        }

        /* ===== GRADIENT TEXT PREVIEW ===== */
        .gradient-text-preview {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }

        /* ===== INFO ALERT ===== */
        .info-alert {
            background: var(--gradient-soft);
            color: var(--red-700);
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            border-left: 4px solid var(--red-500);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .info-alert i {
            font-size: 1.2rem;
            color: var(--red-500);
        }

        /* ===== SUB HEADER ===== */
        .sub-header {
            background: var(--gradient-soft);
            color: var(--red-700);
            padding: 0.8rem 1.2rem;
            border-radius: var(--radius-md);
            font-weight: 700;
            margin: 1.5rem 0 1rem 0;
            border-left: 4px solid var(--red-500);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sub-header i {
            color: var(--red-500);
        }

        /* ===== SERVICE & TESTIMONIAL ITEMS ===== */
        .service-item,
        .testimonial-item {
            border: 2px solid var(--red-100);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            background: white;
        }

        .service-item:hover,
        .testimonial-item:hover {
            border-color: var(--red-500);
            box-shadow: var(--shadow-md);
            transform: translateX(5px);
        }

        .service-header,
        .testimonial-header {
            background: linear-gradient(145deg, #fff5f5, #ffffff);
            padding: 1rem 1.2rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--red-700);
            transition: all 0.3s ease;
        }

        .service-header i,
        .testimonial-header i {
            transition: transform 0.3s ease;
        }

        .service-header[aria-expanded="true"] i.fa-chevron-down,
        .testimonial-header[aria-expanded="true"] i.fa-chevron-down {
            transform: rotate(180deg);
        }

        .service-body,
        .testimonial-body {
            padding: 1.2rem;
            background: white;
            border-top: 2px solid var(--red-100);
        }

        /* ===== URL INPUT GROUP ===== */
        .url-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .url-input-group .form-control {
            padding-right: 50px;
        }

        .url-preview-icon {
            position: absolute;
            right: 15px;
            color: var(--red-500);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            background: white;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-full);
            border: 2px solid var(--red-100);
        }

        .url-preview-icon:hover {
            background: var(--gradient-primary);
            color: white;
            transform: scale(1.1);
            border-color: transparent;
        }

        /* ===== IMAGE PREVIEW ===== */
        .image-preview-container {
            margin-top: 1rem;
            padding: 1rem;
            background: var(--gradient-soft);
            border-radius: var(--radius-md);
            border: 2px dashed var(--red-300);
            animation: fadeIn 0.5s ease;
        }

        .image-preview-wrapper {
            max-width: 200px;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 4px solid white;
            transition: all 0.3s ease;
        }

        .image-preview-wrapper:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
        }

        .image-preview {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .image-preview:hover {
            transform: scale(1.1);
        }

        /* ===== GLASS ALERT ===== */
        .glass-alert {
            background: white;
            backdrop-filter: blur(10px);
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            animation: slideIn 0.5s ease;
            padding: 1.2rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .glass-alert::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }

        .alert-success {
            border-left: 4px solid #28a745;
        }

        .alert-success::before {
            background: linear-gradient(145deg, #28a745, #20c997);
        }

        .alert-danger {
            border-left: 4px solid var(--red-500);
        }

        .alert-danger::before {
            background: var(--gradient-primary);
        }

        .alert-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
        }

        .alert-success .alert-icon i {
            color: #28a745;
        }

        .alert-danger .alert-icon i {
            color: var(--red-500);
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ===== ACTION BUTTONS ===== */
        .btn-admin {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 0.8rem 2.5rem;
            border-radius: var(--radius-full);
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-shine);
            transition: left 0.5s ease;
        }

        .btn-admin:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        .btn-admin:hover::before {
            left: 100%;
        }

        .btn-admin-outline {
            background: white;
            color: var(--red-600);
            border: 2px solid var(--red-500);
            padding: 0.8rem 2.5rem;
            border-radius: var(--radius-full);
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-admin-outline:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ===== ANIMATIONS ===== */
        .fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Delay animations for each card */
        .fade-in-up:nth-child(1) {
            animation-delay: 0.1s;
        }

        .fade-in-up:nth-child(2) {
            animation-delay: 0.2s;
        }

        .fade-in-up:nth-child(3) {
            animation-delay: 0.3s;
        }

        .fade-in-up:nth-child(4) {
            animation-delay: 0.4s;
        }

        .fade-in-up:nth-child(5) {
            animation-delay: 0.5s;
        }

        .fade-in-up:nth-child(6) {
            animation-delay: 0.6s;
        }

        .fade-in-up:nth-child(7) {
            animation-delay: 0.7s;
        }

        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--red-100);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-primary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(145deg, #B22234, #8B0000);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }

            .btn-admin,
            .btn-admin-outline {
                width: 100%;
                justify-content: center;
            }

            .service-header,
            .testimonial-header {
                font-size: 0.9rem;
            }

            .image-preview-wrapper {
                max-width: 100%;
            }
        }


        /* ===== SERVICE ICON UPLOAD ===== */

        .service-icon-preview {
            width: 76px;
            height: 76px;
            border-radius: 14px;
            background: var(--gradient-soft);
            border: 2px solid var(--red-100);

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .service-icon-preview-image {
            width: 56px;
            height: 56px;
            object-fit: contain;
        }

        .service-header-icon {
            width: 28px;
            height: 28px;
            object-fit: contain;
            flex-shrink: 0;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // ========================================
        // PREVIEW SERVICE ICON
        // ========================================

        function previewServiceIcon(input, index) {

            const preview = document.getElementById(
                'serviceIconPreview_' + index
            );

            if (!preview || !input.files || !input.files[0]) {
                return;
            }

            const file = input.files[0];

            // Format yang diperbolehkan
            const allowedTypes = [
                'image/png',
                'image/svg+xml'
            ];

            const validType =
                allowedTypes.includes(file.type) ||
                /\.(png|svg)$/i.test(file.name);

            if (!validType) {

                alert('Icon harus berupa file SVG atau PNG.');

                input.value = '';

                return;
            }

            // Maksimal 2 MB
            if (file.size > 2 * 1024 * 1024) {

                alert('Ukuran icon maksimal 2 MB.');

                input.value = '';

                return;
            }

            const url = URL.createObjectURL(file);

            // Kosongkan preview lama
            preview.innerHTML = '';

            const img = document.createElement('img');

            img.src = url;
            img.alt = 'Preview Icon Layanan ' + index;
            img.className = 'service-icon-preview-image';

            img.onload = function() {
                URL.revokeObjectURL(url);
            };

            img.onerror = function() {

                URL.revokeObjectURL(url);

                preview.innerHTML =
                    '<span class="text-danger small text-center">' +
                    'File icon tidak dapat ditampilkan.' +
                    '</span>';
            };

            preview.appendChild(img);
        }
        // Preview Hero Image
        function getYouTubeId(url) {

            if (!url) {
                return null;
            }

            const patterns = [
                /youtube\.com\/watch\?v=([^&]+)/,
                /youtu\.be\/([^?&]+)/,
                /youtube\.com\/embed\/([^?&]+)/,
                /youtube\.com\/shorts\/([^?&]+)/
            ];

            for (const pattern of patterns) {

                const match = url.match(pattern);

                if (match) {
                    return match[1];
                }

            }

            return null;
        }


        function previewHeroMedia() {

            const urlInput = document.getElementById('hero_image_url');
            const typeInput = document.getElementById('hero_media_type');

            const container = document.getElementById('heroPreviewContainer');
            const wrapper = document.getElementById('heroPreviewWrapper');

            if (!urlInput || !typeInput || !container || !wrapper) {
                return;
            }

            const url = urlInput.value.trim();
            const type = typeInput.value;

            wrapper.innerHTML = '';

            if (!url) {
                container.style.display = 'none';
                return;
            }

            container.style.display = 'block';


            // =========================
            // GAMBAR
            // =========================

            if (type === 'image') {

                const img = document.createElement('img');

                img.src = url;
                img.alt = 'Hero Preview';
                img.className = 'image-preview';

                img.onerror = function() {

                    wrapper.innerHTML = `
                                                                <div class="alert alert-danger mb-0">
                                                                    URL gambar tidak valid.
                                                                </div>
                                                            `;

                };

                wrapper.appendChild(img);

                return;
            }


            // =========================
            // VIDEO
            // =========================

            const youtubeId = getYouTubeId(url);


            // =========================
            // YOUTUBE
            // =========================

            if (youtubeId) {

                const iframe = document.createElement('iframe');

                iframe.src =
                    `https://www.youtube.com/embed/${youtubeId}?autoplay=1&mute=1&loop=1&playlist=${youtubeId}&controls=0&rel=0&playsinline=1`;

                iframe.width = '100%';
                iframe.height = '320';

                iframe.frameBorder = '0';

                iframe.allow =
                    'autoplay; encrypted-media; picture-in-picture';

                iframe.allowFullscreen = true;

                iframe.style.borderRadius = '14px';

                wrapper.appendChild(iframe);

                return;
            }


            // =========================
            // DIRECT VIDEO MP4 / WEBM
            // =========================

            const video = document.createElement('video');

            video.src = url;

            video.controls = true;
            video.muted = true;
            video.autoplay = true;
            video.loop = true;
            video.playsInline = true;

            video.style.width = '100%';
            video.style.maxHeight = '320px';
            video.style.borderRadius = '14px';
            video.style.objectFit = 'cover';

            video.onerror = function() {

                wrapper.innerHTML = `
                                                            <div class="alert alert-danger mb-0">
                                                                URL video tidak valid atau format tidak didukung.
                                                            </div>
                                                        `;

            };

            wrapper.appendChild(video);

            video.play().catch(() => {});

        }

        // Preview Welcome Image
        function previewWelcomeFile(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('welcomePreviewContainer');
            const preview = document.getElementById('welcomePreview');

            if (!file || !previewContainer || !preview) {
                return;
            }

            if (!file.type.startsWith('image/')) {
                alert('Silakan pilih file gambar yang valid.');
                event.target.value = '';
                return;
            }

            const imageUrl = URL.createObjectURL(file);

            preview.onload = function() {
                URL.revokeObjectURL(imageUrl);
            };

            preview.src = imageUrl;
            previewContainer.style.display = 'block';
        }


        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.glass-alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // Character counter for meta description
        const metaDesc = document.querySelector('textarea[name="meta_description"]');
        if (metaDesc) {
            metaDesc.addEventListener('input', function() {
                const length = this.value.length;
                let counter = this.nextElementSibling;

                if (!counter || !counter.classList.contains('char-counter')) {
                    counter = document.createElement('small');
                    counter.classList.add('char-counter', 'text-muted', 'mt-1', 'd-block');
                    this.parentNode.appendChild(counter);
                }

                counter.innerHTML =
                    `<i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>${length} karakter (${155 - length} karakter tersisa untuk SEO)`;

                if (length > 155) {
                    counter.style.color = '#dc3545';
                } else {
                    counter.style.color = '#6c757d';
                }
            });
        }

        // ==========================================
        // DYNAMIC TESTIMONIAL
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {

            const addButton = document.getElementById('addTestimonialBtn');
            const container = document.getElementById('testimonialContainer');
            const template = document.getElementById('testimonialTemplate');
            const form = document.getElementById('homePageForm');

            if (!addButton) {
                console.error('Tombol addTestimonialBtn tidak ditemukan.');
                return;
            }

            if (!container) {
                console.error('Container testimonialContainer tidak ditemukan.');
                return;
            }

            if (!template) {
                console.error('Template testimonialTemplate tidak ditemukan.');
                return;
            }


            // Cari nomor testimonial terbesar
            let nextIndex = 1;

            container.querySelectorAll('.testimonial-item').forEach(function(item) {

                const index = parseInt(
                    item.dataset.testimonialIndex,
                    10
                );

                if (!isNaN(index) && index >= nextIndex) {
                    nextIndex = index + 1;
                }

            });


            // Tombol tambah testimonial
            addButton.addEventListener('click', function() {

                const index = nextIndex;

                // Ambil isi template
                let html = template.innerHTML;

                // Ganti semua placeholder ___INDEX___ dengan nomor baru
                html = html.replaceAll('%%INDEX%%', index);

                // Buat elemen baru
                const wrapper = document.createElement('div');

                wrapper.innerHTML = html.trim();

                const newItem = wrapper.firstElementChild;

                if (!newItem) {
                    console.error('Template testimonial kosong.');
                    return;
                }

                // Pastikan semua input testimonial baru terhubung ke form utama
                if (form) {
                    newItem.querySelectorAll('input, select, textarea').forEach(function(field) {
                        field.setAttribute('form', 'homePageForm');
                    });
                }

                // Masukkan testimonial baru ke container
                container.appendChild(newItem);

                // Tambah nomor berikutnya
                nextIndex++;


                // Scroll ke testimonial baru
                newItem.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });


                // Fokus ke input nama
                setTimeout(function() {

                    const nameInput = newItem.querySelector(
                        '.testimonial-name-input'
                    );

                    if (nameInput) {
                        nameInput.focus();
                    }

                }, 300);

            });


            // Mengubah judul testimonial ketika nama diketik
            container.addEventListener('input', function(event) {

                if (!event.target.classList.contains(
                        'testimonial-name-input'
                    )) {
                    return;
                }

                const item = event.target.closest(
                    '.testimonial-item'
                );

                if (!item) {
                    return;
                }

                const title = item.querySelector(
                    '.testimonial-header-title'
                );

                const index = item.dataset.testimonialIndex;

                const name = event.target.value.trim();

                if (title) {

                    title.textContent =
                        'Testimoni ' +
                        index +
                        ': ' +
                        (name || 'Belum diisi');

                }

            });

        });
    </script>

    <script>
        function confirmDeleteTestimonial(testimonialId) {
            const confirmation = confirm(
                'Apakah kamu yakin ingin menghapus testimonial ini?'
            );

            if (confirmation) {
                document
                    .getElementById('deleteTestimonial' + testimonialId)
                    .submit();
            }
        }
    </script>

    <script>
        function deleteTestimonial(testimonialId) {
            const confirmation = confirm(
                'Apakah kamu yakin ingin menghapus testimonial ini?'
            );

            if (!confirmation) {
                return;
            }

            const testimonialItem = document.querySelector(
                '[data-testimonial-id="' + testimonialId + '"]'
            );

            const deletedContainer = document.getElementById(
                'deletedTestimonialsContainer'
            );

            if (!testimonialItem || !deletedContainer) {
                alert('Data testimonial tidak ditemukan.');
                return;
            }

            // Cegah ID yang sama ditambahkan lebih dari satu kali
            const existingInput = deletedContainer.querySelector(
                'input[name="deleted_testimonials[]"][value="' + testimonialId + '"]'
            );

            if (!existingInput) {
                const hiddenInput = document.createElement('input');

                hiddenInput.type = 'hidden';
                hiddenInput.name = 'deleted_testimonials[]';
                hiddenInput.value = testimonialId;

                deletedContainer.appendChild(hiddenInput);
            }

            // Hilangkan testimonial dari halaman
            testimonialItem.remove();

            // Atur ulang nomor testimonial
            renumberTestimonials();
        }

        function renumberTestimonials() {
            const testimonialItems = document.querySelectorAll(
                '#testimonialContainer .testimonial-item'
            );

            testimonialItems.forEach(function(item, index) {
                const newIndex = index + 1;

                item.setAttribute(
                    'data-testimonial-index',
                    newIndex
                );

                const title = item.querySelector(
                    '.testimonial-header-title'
                );

                if (title) {
                    const currentText = title.textContent.trim();
                    const name = currentText.includes(':') ?
                        currentText.split(':').slice(1).join(':').trim() :
                        '';

                    title.textContent =
                        'Testimoni ' + newIndex + ': ' + name;
                }
            });
        }
    </script>

    <script>
        // ==========================================
        // PREVIEW MEDIA HERO
        // Upload gambar atau video langsung
        // ==========================================

        let activeHeroPreviewObjectUrl = null;

        function getYouTubeId(url) {
            if (!url) return null;

            const patterns = [
                /youtube\.com\/watch\?v=([^&]+)/,
                /youtu\.be\/([^?&]+)/,
                /youtube\.com\/embed\/([^?&]+)/,
                /youtube\.com\/shorts\/([^?&]+)/
            ];

            for (const pattern of patterns) {
                const match = url.match(pattern);
                if (match) return match[1];
            }

            return null;
        }

        function getTikTokId(url) {
            if (!url) return null;

            const match = url.match(
                /tiktok\.com\/@[^\/]+\/video\/(\d+)|tiktok\.com\/player\/v1\/(\d+)/
            );

            return match ? (match[1] || match[2]) : null;
        }

        function renderHeroMediaPreview(source, type, isTemporaryFile = false) {
            const container = document.getElementById('heroPreviewContainer');
            const wrapper = document.getElementById('heroPreviewWrapper');

            if (!container || !wrapper) return;

            wrapper.replaceChildren();

            if (!source) {
                container.style.display = 'none';
                return;
            }

            container.style.display = 'block';

            // Preview media YouTube lama
            const youtubeId = !isTemporaryFile ? getYouTubeId(source) : null;

            if (youtubeId || (type === 'youtube' && !isTemporaryFile)) {
                if (!youtubeId) {
                    wrapper.textContent = 'URL YouTube lama tidak dapat dikenali.';
                    return;
                }

                const iframe = document.createElement('iframe');

                iframe.src =
                    `https://www.youtube.com/embed/${encodeURIComponent(youtubeId)}?autoplay=1&mute=1&loop=1&playlist=${encodeURIComponent(youtubeId)}&controls=1&playsinline=1`;

                iframe.title = 'Preview Video Hero';
                iframe.allow =
                    'autoplay; encrypted-media; picture-in-picture';
                iframe.allowFullscreen = true;
                iframe.style.cssText =
                    'width:100%;aspect-ratio:16/9;border:0;border-radius:12px;';

                wrapper.appendChild(iframe);
                return;
            }

            // Preview media TikTok lama
            const tiktokId = !isTemporaryFile ? getTikTokId(source) : null;

            if (tiktokId || (type === 'tiktok' && !isTemporaryFile)) {
                if (!tiktokId) {
                    wrapper.textContent = 'URL TikTok lama tidak dapat dikenali.';
                    return;
                }

                const iframe = document.createElement('iframe');

                iframe.src =
                    `https://www.tiktok.com/player/v1/${encodeURIComponent(tiktokId)}?controls=1`;

                iframe.title = 'Preview Video Hero TikTok';
                iframe.allow = 'fullscreen';
                iframe.allowFullscreen = true;
                iframe.style.cssText =
                    'width:100%;max-width:420px;height:520px;border:0;border-radius:12px;';

                wrapper.appendChild(iframe);
                return;
            }

            // Preview video lokal
            const isVideo =
                type === 'video' ||
                (!isTemporaryFile && /\.(mp4|webm|mov|ogg)(\?.*)?$/i.test(source));

            if (isVideo) {
                const video = document.createElement('video');

                video.src = source;
                video.controls = true;
                video.muted = true;
                video.loop = true;
                video.autoplay = true;
                video.playsInline = true;
                video.preload = 'metadata';

                video.style.cssText =
                    'display:block;width:100%;max-height:450px;object-fit:contain;border-radius:12px;background:#111;';

                video.addEventListener('error', function() {
                    wrapper.textContent =
                        'Video tidak dapat dipreview. Periksa format file.';
                }, {
                    once: true
                });

                wrapper.appendChild(video);

                const playPromise = video.play();

                if (playPromise && typeof playPromise.catch === 'function') {
                    playPromise.catch(() => {});
                }

                return;
            }

            // Preview gambar
            const image = document.createElement('img');

            image.src = source;
            image.alt = 'Preview Gambar Hero';

            image.style.cssText =
                'display:block;width:100%;max-height:450px;object-fit:contain;border-radius:12px;';

            image.addEventListener('error', function() {
                wrapper.textContent =
                    'Gambar tidak dapat dipreview. Silakan pilih file yang valid.';
            }, {
                once: true
            });

            wrapper.appendChild(image);
        }

        function previewHeroMedia() {
            const fileInput = document.getElementById('hero_media_file');
            const typeInput = document.getElementById('hero_media_type');
            const urlInput = document.getElementById('hero_image_url');
            const container = document.getElementById('heroPreviewContainer');
            const info = document.getElementById('heroMediaFileInfo');

            if (!fileInput || !typeInput || !urlInput || !container) {
                return;
            }

            const file = fileInput.files && fileInput.files[0];

            // Jika admin memilih file baru
            if (file) {
                const maxBytes = 50 * 1024 * 1024;

                if (file.size > maxBytes) {
                    alert('Ukuran file maksimal 50 MB.');

                    fileInput.value = '';

                    if (info) info.textContent = '';

                    previewHeroMedia();
                    return;
                }

                const isImage = /\.(jpg|jpeg|png|webp|gif)$/i.test(file.name);
                const isVideo = /\.(mp4|webm|mov)$/i.test(file.name);

                if (!isImage && !isVideo) {
                    alert(
                        'Format file harus JPG, PNG, WEBP, GIF, MP4, WEBM, atau MOV.'
                    );

                    fileInput.value = '';

                    if (info) info.textContent = '';

                    previewHeroMedia();
                    return;
                }

                // Jenis media mengikuti file yang dipilih
                typeInput.value = isImage ? 'image' : 'video';

                if (activeHeroPreviewObjectUrl) {
                    URL.revokeObjectURL(activeHeroPreviewObjectUrl);
                }

                activeHeroPreviewObjectUrl = URL.createObjectURL(file);

                if (info) {
                    info.textContent =
                        `${file.name} • ${(file.size / (1024 * 1024)).toFixed(2)} MB`;
                }

                renderHeroMediaPreview(
                    activeHeroPreviewObjectUrl,
                    typeInput.value,
                    true
                );

                return;
            }

            // Jika tidak memilih file baru, gunakan media yang sudah tersimpan
            if (info) {
                info.textContent = '';
            }

            const savedUrl =
                container.dataset.existingUrl || urlInput.value.trim();

            const savedType =
                container.dataset.existingType || typeInput.value;

            renderHeroMediaPreview(savedUrl, savedType, false);
        }

        document.addEventListener('DOMContentLoaded', function() {
            previewHeroMedia();
        });


        // ==========================================
        // SINKRONISASI TESTIMONI SEBELUM FORM DISIMPAN
        // ==========================================

        function syncTestimonialsBeforeSubmit() {
            const form = document.getElementById('homePageForm');

            if (!form) {
                console.error('Form Home tidak ditemukan.');
                return;
            }

            form.querySelectorAll('.testimonial-hidden-sync').forEach(function(el) {
                el.remove();
            });

            const testimonialItems = document.querySelectorAll(
                '#testimonialContainer .testimonial-item'
            );

            testimonialItems.forEach(function(item, index) {
                const i = index + 1;

                const idInput = item.querySelector('input[name$="_id"]');
                const nameInput = item.querySelector('input[name$="_name"]');
                const sourceInput = item.querySelector('input[name$="_source"]');
                const ratingInput = item.querySelector('select[name$="_rating"]');
                const textInput = item.querySelector('textarea[name$="_text"]');

                function addHidden(name, value) {
                    const hidden = document.createElement('input');

                    hidden.type = 'hidden';
                    hidden.name = name;
                    hidden.value = value ?? '';
                    hidden.classList.add('testimonial-hidden-sync');

                    form.appendChild(hidden);
                }

                addHidden(`testimonial_${i}_id`, idInput ? idInput.value : '');
                addHidden(`testimonial_${i}_name`, nameInput ? nameInput.value : '');
                addHidden(`testimonial_${i}_source`, sourceInput ? sourceInput.value : '');
                addHidden(`testimonial_${i}_rating`, ratingInput ? ratingInput.value : '5');
                addHidden(`testimonial_${i}_text`, textInput ? textInput.value : '');
            });

            console.log('SYNC TESTIMONI BERHASIL:', testimonialItems.length);
        }
    </script>




@endsection
