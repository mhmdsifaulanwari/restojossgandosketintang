{{-- resources/views/admin/pages/contact.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Kontak')
@section('page-title', 'Edit Informasi Kontak')

@section('content')
    <div class="container-fluid px-4">
        <!-- Header dengan efek premium -->
        <div class="page-header mb-4">
            <div class="header-content">
                <h4 class="header-title">
                    <i class="fas fa-address-card me-2"></i>
                    Edit Informasi Kontak
                </h4>
                <p class="header-subtitle">Kelola informasi kontak yang akan tampil di halaman reservasi pelanggan</p>
            </div>
            <div class="header-decoration">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <form action="{{ route('admin.pages.contact.update') }}" method="POST" enctype="multipart/form-data"
            class="aesthetic-form">
            @csrf
            {{-- ========================================================= --}}
            {{-- CARD EDIT HERO RESERVASI --}}
            {{-- ========================================================= --}}

            <div class="card main-card mb-4">

                {{-- Header Card --}}
                <div class="card-header">
                    <div class="d-flex align-items-center">

                        <div class="header-icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                        </div>

                        <div class="ms-3">
                            <h5 class="mb-0 header-title">
                                Edit Hero Reservasi
                            </h5>

                            <p class="mb-0 text-muted">
                                Kelola teks, tombol, dan foto hero halaman reservasi
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Isi Card --}}
                <div class="card-body">

                    {{-- Subtitle --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Subtitle Hero
                        </label>

                        <input type="text" name="reservation_hero_subtitle" class="form-control"
                            value="{{ old('reservation_hero_subtitle', $reservationPage->hero_subtitle ?? '') }}"
                            placeholder="Contoh: RESERVASI ONLINE">
                    </div>


                    {{-- Judul --}}
                    <div class="row">

                        <div class="col-md-4 mb-4">
                            <label class="form-label fw-bold">
                                Judul Baris 1
                            </label>

                            <input type="text" name="reservation_hero_title_line1" class="form-control"
                                value="{{ old('reservation_hero_title_line1', $reservationPage->hero_title_line1 ?? '') }}">
                        </div>

                        <div class="col-md-4 mb-4">
                            <label class="form-label fw-bold">
                                Judul Baris 2
                            </label>

                            <input type="text" name="reservation_hero_title_line2" class="form-control"
                                value="{{ old('reservation_hero_title_line2', $reservationPage->hero_title_line2 ?? '') }}">
                        </div>

                        <div class="col-md-4 mb-4">
                            <label class="form-label fw-bold">
                                Judul Baris 3
                            </label>

                            <input type="text" name="reservation_hero_title_line3" class="form-control"
                                value="{{ old('reservation_hero_title_line3', $reservationPage->hero_title_line3 ?? '') }}">
                        </div>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Deskripsi Hero
                        </label>

                        <textarea name="reservation_hero_description" class="form-control" rows="4">{{ old('reservation_hero_description', $reservationPage->hero_description ?? '') }}</textarea>
                    </div>

                    <div class="info-alert mb-4">
                        <i class="fas fa-info-circle me-2"></i>
                        Unggah foto untuk Hero Section halaman reservasi. Format yang didukung JPG, PNG, WebP, atau GIF
                        dengan ukuran maksimal 5 MB.
                    </div>

                    {{-- Foto Hero --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Upload Foto Hero
                        </label>

                        <input type="file" name="reservation_hero_image_file" id="reservationHeroImageInput"
                            class="form-control" accept="image/jpeg,image/png,image/webp,image/gif"
                            onchange="previewReservationHeroImage(this)">

                        <small class="text-muted">
                            Pilih foto dari komputer. Format JPG, PNG, WebP, atau GIF. Maksimal 5 MB.
                        </small>

                        {{-- Preview Foto --}}
                        <div class="mt-3" id="reservationHeroPreviewContainer"
                            style="{{ !empty($reservationPage->hero_image) ? 'display:block;' : 'display:none;' }}">

                            <p class="small fw-bold mb-2">Preview Foto Hero</p>

                            <img id="reservationHeroPreview"
                                src="{{ !empty($reservationPage->hero_image)
                                    ? (preg_match('#^https?://#i', $reservationPage->hero_image)
                                        ? $reservationPage->hero_image
                                        : asset('storage/' . ltrim(preg_replace('#^/?storage/#', '', $reservationPage->hero_image), '/')))
                                    : '' }}"
                                alt="Preview Foto Hero Reservasi"
                                style="width: 100%; max-width: 350px; max-height: 220px; object-fit: cover; border-radius: 10px;">

                        </div>
                    </div>

                </div>
            </div>

            <div class="card main-card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="header-icon-wrapper">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0 header-title">Edit Konten Halaman Kontak</h5>
                            <small class="text-muted">Data ini akan muncul di bagian informasi kontak halaman
                                reservasi</small>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show glass-alert success-alert"
                            role="alert">
                            <div class="alert-content">
                                <div class="alert-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="alert-message">
                                    {{ session('success') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show glass-alert error-alert" role="alert">
                            <div class="alert-content">
                                <div class="alert-icon">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div class="alert-message">
                                    {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- FORM TANPA @method('PUT') --}}


                    {{-- ========================================================= --}}
                    {{-- JUDUL & DESKRIPSI LAYANAN RESERVASI & DELIVERY --}}
                    {{-- ========================================================= --}}

                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon delivery-icon">
                                <i class="fas fa-heading"></i>
                            </div>

                            <h5 class="section-title">Konten Layanan</h5>
                            <span class="section-badge">Judul & Deskripsi</span>
                        </div>

                        <div class="row g-4">

                            {{-- Judul --}}
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-heading me-2"></i>
                                        Judul Layanan
                                    </label>

                                    <div class="input-field">
                                        <input type="text" name="services_title"
                                            class="form-control @error('services_title') is-invalid @enderror"
                                            value="{{ old('services_title', $reservationPage->services_title ?? '') }}"
                                            placeholder="Contoh: Pesan Meja">

                                        @error('services_title')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-align-left me-2"></i>
                                        Deskripsi Layanan
                                    </label>

                                    <div class="input-field">
                                        <textarea name="services_description" class="form-control @error('services_description') is-invalid @enderror"
                                            rows="3" placeholder="Masukkan deskripsi layanan">{{ old('services_description', $reservationPage->services_description ?? '') }}</textarea>

                                        @error('services_description')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    {{-- ========================================================= --}}
                    {{-- LAYANAN RESERVASI & DELIVERY --}}
                    {{-- ========================================================= --}}

                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon delivery-icon">
                                <i class="fas fa-concierge-bell"></i>
                            </div>

                            <h5 class="section-title">Layanan Reservasi & Delivery</h5>
                            <span class="section-badge">Layanan</span>
                        </div>

                        <div id="delivery-services-container">

                            @forelse ($deliveryServices as $index => $service)
                                <div class="delivery-service-card border rounded p-4 mb-4"
                                    data-index="{{ $index }}">

                                    {{-- Header Card --}}
                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <h6 class="mb-0">
                                            <i class="fas fa-store me-2"></i>
                                            Layanan {{ $index + 1 }}
                                        </h6>

                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger remove-delivery-service">
                                            <i class="fas fa-trash me-1"></i>
                                            Hapus
                                        </button>

                                    </div>

                                    {{-- ID --}}
                                    <input type="hidden" name="delivery_services[{{ $index }}][id]"
                                        value="{{ $service->id }}">

                                    <div class="row g-4">

                                        {{-- Nama Layanan --}}
                                        <div class="col-md-6">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-tag me-2"></i>
                                                    Nama Layanan
                                                </label>

                                                <div class="input-field">

                                                    <input type="text"
                                                        name="delivery_services[{{ $index }}][name]"
                                                        class="form-control"
                                                        value="{{ old("delivery_services.$index.name", $service->name) }}"
                                                        placeholder="Contoh: GoFood atau WhatsApp Admin 1">

                                                </div>
                                            </div>
                                        </div>


                                        {{-- Logo / Icon --}}
                                        <div class="col-md-6">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-image me-2"></i>
                                                    Logo / Icon
                                                </label>

                                                <div class="input-field">

                                                    {{-- Upload --}}
                                                    <label class="small fw-bold text-muted mb-2">
                                                        Upload Logo
                                                    </label>

                                                    <input type="file"
                                                        name="delivery_services[{{ $index }}][logo_file]"
                                                        class="form-control delivery-logo-file-input"
                                                        accept=".png,.jpg,.jpeg,image/png,image/jpeg">

                                                    <small class="input-hint">
                                                        Gunakan URL/path atau upload file PNG, JPG, atau JPEG.
                                                        Jika upload dipilih, file upload akan digunakan.
                                                    </small>

                                                    {{-- Preview --}}
                                                    <div class="logo-preview-wrapper mt-3"
                                                        style="{{ !empty($service->logo) ? 'display:block;' : 'display:none;' }}">

                                                        <div class="border rounded p-3 text-center">

                                                            <small class="d-block text-muted mb-2">
                                                                Preview Logo
                                                            </small>

                                                            <img src="{{ !empty($service->logo)
                                                                ? (Str::startsWith($service->logo, ['http://', 'https://', '/'])
                                                                    ? $service->logo
                                                                    : asset('storage/' . $service->logo))
                                                                : '' }}"
                                                                class="delivery-logo-preview img-fluid" alt="Preview Logo"
                                                                style="max-height:100px; max-width:180px; object-fit:contain;">

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        {{-- Deskripsi --}}
                                        <div class="col-12">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-align-left me-2"></i>
                                                    Deskripsi
                                                </label>

                                                <div class="input-field">

                                                    <textarea name="delivery_services[{{ $index }}][description]" class="form-control" rows="3"
                                                        placeholder="Masukkan deskripsi layanan">{{ old("delivery_services.$index.description", $service->description) }}</textarea>

                                                </div>

                                            </div>
                                        </div>


                                        {{-- URL --}}
                                        <div class="col-md-8">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-link me-2"></i>
                                                    Link / URL
                                                </label>

                                                <div class="input-field">

                                                    <input type="url"
                                                        name="delivery_services[{{ $index }}][url]"
                                                        class="form-control"
                                                        value="{{ old("delivery_services.$index.url", $service->url) }}"
                                                        placeholder="https://...">

                                                    <small class="input-hint">
                                                        Untuk WhatsApp dapat menggunakan https://wa.me/628xxx
                                                    </small>

                                                </div>

                                            </div>
                                        </div>


                                        {{-- Teks Tombol --}}
                                        <div class="col-md-4">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-mouse-pointer me-2"></i>
                                                    Teks Tombol
                                                </label>

                                                <div class="input-field">

                                                    <input type="text"
                                                        name="delivery_services[{{ $index }}][button_text]"
                                                        class="form-control"
                                                        value="{{ old("delivery_services.$index.button_text", $service->button_text) }}"
                                                        placeholder="Contoh: Pesan Sekarang">

                                                </div>

                                            </div>
                                        </div>


                                        {{-- Urutan --}}
                                        <div class="col-md-6">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-sort-numeric-down me-2"></i>
                                                    Urutan
                                                </label>

                                                <div class="input-field">

                                                    <input type="number"
                                                        name="delivery_services[{{ $index }}][sort_order]"
                                                        class="form-control"
                                                        value="{{ old("delivery_services.$index.sort_order", $service->sort_order) }}"
                                                        min="0">

                                                </div>

                                            </div>
                                        </div>


                                        {{-- Status --}}
                                        <div class="col-md-6">
                                            <div class="input-wrapper">

                                                <label class="input-label">
                                                    <i class="fas fa-toggle-on me-2"></i>
                                                    Status
                                                </label>

                                                <div class="input-field">

                                                    <div class="form-check form-switch mt-2">

                                                        <input type="hidden"
                                                            name="delivery_services[{{ $index }}][is_active]"
                                                            value="0">

                                                        <input class="form-check-input" type="checkbox"
                                                            name="delivery_services[{{ $index }}][is_active]"
                                                            value="1" {{ $service->is_active ? 'checked' : '' }}>

                                                        <label class="form-check-label">
                                                            Tampilkan di website
                                                        </label>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @empty

                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Belum ada layanan. Silakan tambahkan layanan reservasi atau delivery.
                                </div>
                            @endforelse

                        </div>


                        {{-- Tombol Tambah --}}
                        <button type="button" id="add-delivery-service" class="btn btn-outline-success">

                            <i class="fas fa-plus me-2"></i>
                            Tambah Layanan

                        </button>

                    </div>

                    <!-- Informasi Kontak -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h5 class="section-title">Informasi Kontak</h5>
                            <span class="section-badge">Utama</span>
                        </div>

                        <div class="row g-4 mb-4">

                            {{-- Judul Informasi Kontak --}}
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-heading me-2"></i>
                                        Judul Informasi Kontak
                                    </label>

                                    <div class="input-field">
                                        <input type="text" name="contact_title"
                                            class="form-control @error('contact_title') is-invalid @enderror"
                                            value="{{ old('contact_title', $reservationPage->contact_title ?? '') }}"
                                            placeholder="Contoh: Informasi Kontak">

                                        @error('contact_title')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi Informasi Kontak --}}
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-align-left me-2"></i>
                                        Deskripsi Informasi Kontak
                                    </label>

                                    <div class="input-field">
                                        <textarea name="contact_description" class="form-control @error('contact_description') is-invalid @enderror"
                                            rows="3" placeholder="Masukkan deskripsi informasi kontak">{{ old('contact_description', $reservationPage->contact_description ?? '') }}</textarea>

                                        @error('contact_description')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                    </label>
                                    <div class="input-field">
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address', $reservationContact->address ?? ($page->content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231')) }}">
                                        @error('address')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-phone-alt me-2"></i>Nomor Telepon
                                    </label>
                                    <div class="input-field">
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', $reservationContact->phone ?? ($page->content['phone'] ?? '(021) 1234-5678')) }}">
                                        @error('phone')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-envelope me-2"></i>Email
                                    </label>
                                    <div class="input-field">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $reservationContact->email ?? ($page->content['email'] ?? 'info@jossgandos.com')) }}">
                                        @error('email')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-clock me-2"></i>Jam Operasional
                                    </label>
                                    <div class="input-field">
                                        <textarea name="hours" rows="4" class="form-control @error('hours') is-invalid @enderror"
                                            placeholder="Masukkan jam operasional, satu jadwal setiap baris">{{ old('hours', $reservationContact->hours ?? ($page->content['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)')) }}</textarea>

                                        <small class="input-hint">
                                            Gunakan Enter untuk membuat jadwal pada baris baru.
                                        </small>

                                        @error('hours')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-map-marked-alt me-2"></i>Google Maps Embed URL
                                    </label>
                                    <div class="input-field">
                                        <textarea name="map_embed" rows="4" class="form-control @error('map_embed') is-invalid @enderror">{{ old('map_embed', $reservationContact->map_embed ?? ($page->content['map_embed'] ?? 'https://www.google.com/maps/embed?...')) }}</textarea>
                                        @error('map_embed')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="form-section">
                        <div class="section-header">
                            <div class="section-icon social-icon">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            <h5 class="section-title">Media Sosial</h5>
                            <span class="section-badge">Ikuti Kami</span>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fab fa-facebook me-2" style="color: #1877f2;"></i> Facebook URL
                                    </label>
                                    <div class="input-field">
                                        <input type="url" name="facebook_url"
                                            class="form-control @error('facebook_url') is-invalid @enderror"
                                            value="{{ old('facebook_url', $reservationSocial->facebook_url ?? '') }}">
                                        @error('facebook_url')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fab fa-instagram me-2" style="color: #e4405f;"></i> Instagram URL
                                    </label>
                                    <div class="input-field">
                                        <input type="url" name="instagram_url"
                                            class="form-control @error('instagram_url') is-invalid @enderror"
                                            value="{{ old('instagram_url', $reservationSocial->instagram_url ?? '') }}">
                                        @error('instagram_url')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fab fa-tiktok me-2" style="color: #000;"></i> TikTok URL
                                    </label>
                                    <div class="input-field">
                                        <input type="url" name="tiktok_url"
                                            class="form-control @error('tiktok_url') is-invalid @enderror"
                                            value="{{ old('tiktok_url', $reservationSocial->tiktok_url ?? '') }}">
                                        @error('tiktok_url')
                                            <div class="error-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save me-2"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('reservation') }}" class="btn-preview" target="_blank">
                            <i class="fas fa-eye me-2"></i>
                            Lihat Halaman Reservasi
                        </a>
                    </div>
        </form>
    </div>
    </div>
    </div>
@endsection

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        /* Premium Red Gradient Theme */
        :root {
            --red-50: #fff5f5;
            --red-100: #ffe3e3;
            --red-200: #ffc9c9;
            --red-300: #ffa8a8;
            --red-400: #ff8787;
            --red-500: #ff6b6b;
            --red-600: #c92a2a;
            --red-700: #a61e1e;
            --red-800: #8b1a1a;
            --red-900: #6b1414;
            --gradient-primary: linear-gradient(135deg, #c92a2a 0%, #a61e1e 50%, #8b1a1a 100%);
            --gradient-soft: linear-gradient(135deg, #fff5f5 0%, #ffe3e3 100%);
            --gradient-hover: linear-gradient(135deg, #a61e1e 0%, #8b1a1a 50%, #6b1414 100%);
            --gradient-glow: linear-gradient(145deg, #fff5f5, #ffe3e3);
            --shadow-sm: 0 4px 6px rgba(169, 30, 30, 0.05);
            --shadow-md: 0 8px 15px rgba(169, 30, 30, 0.1);
            --shadow-lg: 0 15px 30px rgba(169, 30, 30, 0.15);
            --shadow-xl: 0 25px 50px rgba(169, 30, 30, 0.25);
            --border-radius-sm: 12px;
            --border-radius-md: 18px;
            --border-radius-lg: 24px;
            --border-radius-xl: 30px;
        }

        /* Global Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #fcf9f7 0%, #f7f2ef 100%);
        }

        /* Page Header Premium */
        .page-header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--border-radius-xl);
            padding: 2.2rem 2.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(201, 42, 42, 0.1);
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
            animation: slideDown 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
        }

        .header-title i {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2rem;
        }

        .header-subtitle {
            color: #718096;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 0;
            position: relative;
            padding-left: 2rem;
        }

        .header-subtitle::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1.5rem;
            height: 2px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .header-decoration {
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 100%;
            pointer-events: none;
        }

        .header-decoration span {
            position: absolute;
            background: var(--gradient-primary);
            border-radius: 50%;
            opacity: 0.05;
            filter: blur(50px);
            animation: float 6s ease-in-out infinite;
        }

        .header-decoration span:nth-child(1) {
            top: -80px;
            right: -80px;
            width: 250px;
            height: 250px;
            animation-delay: 0s;
        }

        .header-decoration span:nth-child(2) {
            bottom: -100px;
            right: 0;
            width: 300px;
            height: 300px;
            animation-delay: 2s;
        }

        .header-decoration span:nth-child(3) {
            top: 50%;
            right: 150px;
            transform: translateY(-50%);
            width: 150px;
            height: 150px;
            animation-delay: 4s;
        }

        /* Main Card Premium */
        .main-card {
            border: none;
            border-radius: var(--border-radius-xl);
            background: white;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            animation: fadeInUp 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .main-card:hover {
            box-shadow: var(--shadow-xl);
            transform: translateY(-5px);
        }

        .main-card .card-header {
            background: white;
            border-bottom: 2px solid rgba(201, 42, 42, 0.1);
            padding: 1.8rem 2.2rem;
            position: relative;
            overflow: hidden;
        }

        .main-card .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(201, 42, 42, 0.02) 0%, transparent 100%);
            pointer-events: none;
        }

        .header-icon-wrapper {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .header-icon-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        /* Glass Alert Premium */
        .glass-alert {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(201, 42, 42, 0.1);
            border-radius: 20px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            animation: slideInDown 0.5s ease;
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
            background: var(--gradient-primary);
        }

        .alert-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-icon {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            animation: pulse 2s infinite;
        }

        .success-alert .alert-icon {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
        }

        .error-alert .alert-icon {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
        }

        .alert-message {
            color: #2d3748;
            font-weight: 500;
            font-size: 1rem;
        }

        /* Form Sections Premium */
        .form-section {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 2.2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(201, 42, 42, 0.1);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .form-section:nth-child(2) {
            animation-delay: 0.1s;
        }

        .form-section:nth-child(3) {
            animation-delay: 0.2s;
        }

        .form-section:nth-child(4) {
            animation-delay: 0.3s;
        }

        .form-section:nth-child(5) {
            animation-delay: 0.4s;
        }

        .form-section:hover {
            border-color: #c92a2a;
            box-shadow: var(--shadow-lg);
            transform: translateY(-3px);
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 0;
            background: var(--gradient-primary);
            transition: height 0.3s ease;
        }

        .form-section:hover::before {
            height: 100%;
        }

        .form-section::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(201, 42, 42, 0.03) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .form-section:hover::after {
            opacity: 1;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.2rem;
            border-bottom: 2px dashed rgba(201, 42, 42, 0.2);
            position: relative;
        }

        .section-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .section-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        .section-icon.whatsapp-icon {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }

        .section-icon.delivery-icon {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        }

        .section-icon.social-icon {
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcaf45);
        }

        .section-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            flex: 1;
        }

        .section-badge {
            background: var(--gradient-soft);
            color: #c92a2a;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: 1px solid rgba(201, 42, 42, 0.2);
            box-shadow: var(--shadow-sm);
        }

        /* Input Wrappers Premium */
        .input-wrapper {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
        }

        .input-wrapper:hover .input-label {
            color: #c92a2a;
            transform: translateX(5px);
        }

        .input-field {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.3rem;
            font-size: 0.95rem;
            border: 2px solid #edf2f7;
            border-radius: 16px;
            background: white;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1a202c;
        }

        .form-control:hover {
            border-color: #c92a2a;
            background: #fffaf0;
        }

        .form-control:focus {
            outline: none;
            border-color: #c92a2a;
            box-shadow: 0 0 0 4px rgba(201, 42, 42, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .input-hint {
            display: block;
            margin-top: 0.6rem;
            font-size: 0.8rem;
            color: #a0aec0;
            padding-left: 0.5rem;
            border-left: 2px solid #cbd5e0;
            transition: all 0.3s ease;
        }

        .input-wrapper:hover .input-hint {
            border-left-color: #c92a2a;
            color: #718096;
        }

        .error-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            padding: 0.5rem 1rem;
            background: #fff5f5;
            border-radius: 10px;
            border-left: 3px solid #dc3545;
            animation: shake 0.3s ease;
        }

        /* Form Actions Premium */
        .form-actions {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            justify-content: flex-start;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid #edf2f7;
            position: relative;
        }

        .form-actions::before {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            width: 100px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 3px;
        }

        .btn-save,
        .btn-preview {
            padding: 1.1rem 2.8rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-save {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .btn-save::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-save:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: var(--shadow-xl);
            background: var(--gradient-hover);
        }

        .btn-save:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-save i {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .btn-save:hover i {
            transform: scale(1.1);
        }

        .btn-preview {
            background: white;
            color: #c92a2a;
            border: 2px solid #c92a2a;
            box-shadow: var(--shadow-sm);
        }

        .btn-preview::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(201, 42, 42, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn-preview:hover {
            background: #fff5f5;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: #a61e1e;
        }

        .btn-preview:hover::before {
            left: 100%;
        }

        /* Animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
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
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Loading States */
        .btn-save.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-save.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #ffe3e3;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #c92a2a, #a61e1e);
            border-radius: 10px;
            border: 2px solid #ffe3e3;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #a61e1e, #8b1a1a);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .header-title i {
                font-size: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .btn-save,
            .btn-preview {
                width: 100%;
                padding: 1rem;
            }

            .form-section {
                padding: 1.5rem;
            }

            .section-header {
                flex-wrap: wrap;
            }

            .section-badge {
                margin-left: auto;
            }
        }

        /* Print Styles */
        @media print {

            .btn-save,
            .btn-preview,
            .header-decoration {
                display: none;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Auto dismiss alerts with smooth animation
            $('.glass-alert').delay(5000).fadeOut(500, function() {
                $(this).alert('close');
            });

            // Add floating labels effect
            $('.form-control').each(function() {
                if ($(this).val()) {
                    $(this).addClass('filled');
                }
            });

            $('.form-control').on('focus blur', function(e) {
                $(this).toggleClass('focused', e.type === 'focus');
            });

            // Add loading state on form submit
            $('form').on('submit', function() {
                $('.btn-save').addClass('loading').html('<i class="fas fa-spinner me-2"></i> Menyimpan...');
            });

            // Smooth hover effects with enhanced animations
            $('.form-section').hover(
                function() {
                    $(this).find('.section-icon').css('transform', 'scale(1.1) rotate(5deg)');
                    $(this).find('.section-badge').css({
                        'background': 'var(--gradient-primary)',
                        'color': 'white',
                        'border-color': 'transparent'
                    });
                },
                function() {
                    $(this).find('.section-icon').css('transform', 'scale(1) rotate(0)');
                    $(this).find('.section-badge').css({
                        'background': 'var(--gradient-soft)',
                        'color': '#c92a2a',
                        'border-color': 'rgba(201, 42, 42, 0.2)'
                    });
                }
            );

            // Input animation with enhanced feedback
            $('.form-control').on('input', function() {
                $(this).css({
                    'border-color': '#c92a2a',
                    'box-shadow': '0 0 0 4px rgba(201, 42, 42, 0.1)'
                });
                setTimeout(() => {
                    $(this).css({
                        'border-color': '#edf2f7',
                        'box-shadow': 'none'
                    });
                }, 500);
            });

            // Add ripple effect to buttons
            $('.btn-save, .btn-preview').on('click', function(e) {
                let ripple = $('<span class="ripple"></span>');
                let x = e.pageX - $(this).offset().left;
                let y = e.pageY - $(this).offset().top;

                ripple.css({
                    top: y,
                    left: x,
                    position: 'absolute',
                    width: '0',
                    height: '0',
                    borderRadius: '50%',
                    background: 'rgba(255, 255, 255, 0.3)',
                    transform: 'translate(-50%, -50%)',
                    animation: 'ripple 0.6s ease-out',
                    pointerEvents: 'none'
                });

                $(this).append(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });

            // Add floating animation to header decoration
            function floatAnimation() {
                $('.header-decoration span').each(function(index) {
                    $(this).css({
                        'animation': `float ${6 + index}s ease-in-out infinite`,
                        'animation-delay': `${index * 2}s`
                    });
                });
            }

            floatAnimation();

            // Add parallax effect to header decoration
            $(window).on('mousemove', function(e) {
                let mouseX = e.pageX / $(window).width();
                let mouseY = e.pageY / $(window).height();

                $('.header-decoration span').each(function(index) {
                    let speed = (index + 1) * 20;
                    let x = (mouseX * speed) - (speed / 2);
                    let y = (mouseY * speed) - (speed / 2);

                    $(this).css({
                        transform: `translate(${x}px, ${y}px)`
                    });
                });
            });

            // Add smooth scroll to form sections
            $('.section-header').on('click', function() {
                $('html, body').animate({
                    scrollTop: $(this).offset().top - 100
                }, 500);
            });

            // Add character counter for textarea
            $('textarea').on('input', function() {
                let length = $(this).val().length;
                let maxLength = $(this).attr('maxlength');

                if (maxLength) {
                    let remaining = maxLength - length;
                    if (!$(this).next('.char-counter').length) {
                        $(this).after('<small class="char-counter"></small>');
                    }
                    $(this).next('.char-counter').text(`${remaining} karakter tersisa`);

                    if (remaining < 50) {
                        $(this).next('.char-counter').css('color', '#dc3545');
                    } else {
                        $(this).next('.char-counter').css('color', '#6c757d');
                    }
                }
            });

            // Add tooltip for social media icons
            $('.input-label i[class*="fa-"]').tooltip({
                placement: 'top',
                title: function() {
                    return $(this).parent().text().trim();
                }
            });

            // Add animation on page load
            $('.form-section').each(function(index) {
                let delay = index * 100;
                $(this).css('animation-delay', delay + 'ms');
            });

            // Add smooth transition for error messages
            $('.error-feedback').hide().fadeIn(300);

            // =========================================================
            // TAMBAH LAYANAN RESERVASI & DELIVERY
            // =========================================================

            let deliveryServiceIndex = $('#delivery-services-container .delivery-service-card').length;

            $('#add-delivery-service').on('click', function() {
                const index = deliveryServiceIndex++;

                const serviceCard = `
                    <div class="delivery-service-card border rounded p-4 mb-4"
                        data-index="${index}">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="mb-0">
                                <i class="fas fa-store me-2"></i>
                                Layanan #${index + 1}
                            </h6>

                            <button type="button"
                                class="btn btn-sm btn-outline-danger remove-delivery-service">
                                <i class="fas fa-trash me-1"></i>
                                Hapus
                            </button>
                        </div>

                        <div class="row g-4">

                            <!-- Judul / Nama Layanan -->
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-tag me-2"></i>
                                        Nama Layanan
                                    </label>

                                    <div class="input-field">
                                        <input type="text"
                                            name="delivery_services[${index}][name]"
                                            class="form-control"
                                            placeholder="Contoh: GoFood, GrabFood, WhatsApp Admin">
                                    </div>
                                </div>
                            </div>

                           <!-- Logo -->
<div class="col-md-6">
    <div class="input-wrapper">

        <label class="input-label">
            <i class="fas fa-image me-2"></i>
            Logo / Icon
        </label>

        <div class="input-field">

            <label class="small fw-bold text-muted mb-2">
                URL / Path Logo
            </label>

            <input type="text"
                name="delivery_services[${index}][logo]"
                class="form-control delivery-logo-input mb-3"
                placeholder="https://... atau icons/delivery/gofood.png">

            <label class="small fw-bold text-muted mb-2">
                Upload Logo
            </label>

            <input type="file"
                name="delivery_services[${index}][logo_file]"
                class="form-control delivery-logo-file-input"
                accept=".png,.jpg,.jpeg,image/png,image/jpeg">

            <small class="input-hint">
                Gunakan URL/path atau upload file PNG, JPG, atau JPEG.
                Jika upload dipilih, file upload akan digunakan.
            </small>

            <div class="logo-preview-wrapper mt-3" style="display:none;">
                <div class="border rounded p-3 text-center">

                    <small class="d-block text-muted mb-2">
                        Preview Logo
                    </small>

                    <img src=""
                        class="delivery-logo-preview img-fluid"
                        alt="Preview Logo"
                        style="max-height:100px; max-width:180px; object-fit:contain;">

                </div>
            </div>

        </div>
    </div>
</div>

                            <!-- Deskripsi -->
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-align-left me-2"></i>
                                        Deskripsi
                                    </label>

                                    <div class="input-field">
                                        <textarea
                                            name="delivery_services[${index}][description]"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Masukkan deskripsi layanan"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Link -->
                            <div class="col-md-8">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-link me-2"></i>
                                        Link / URL
                                    </label>

                                    <div class="input-field">
                                        <input type="url"
                                            name="delivery_services[${index}][url]"
                                            class="form-control"
                                            placeholder="https://...">

                                        <small class="input-hint">
                                            Contoh WhatsApp: https://wa.me/628xxx
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Teks Tombol -->
                            <div class="col-md-4">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-mouse-pointer me-2"></i>
                                        Teks Tombol
                                    </label>

                                    <div class="input-field">
                                        <input type="text"
                                            name="delivery_services[${index}][button_text]"
                                            class="form-control"
                                            placeholder="Contoh: Pesan Sekarang">
                                    </div>
                                </div>
                            </div>

                            <!-- Urutan -->
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-sort-numeric-down me-2"></i>
                                        Urutan
                                    </label>

                                    <div class="input-field">
                                        <input type="number"
                                            name="delivery_services[${index}][sort_order]"
                                            class="form-control"
                                            value="${index}"
                                            min="0">
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label class="input-label">
                                        <i class="fas fa-toggle-on me-2"></i>
                                        Status
                                    </label>

                                    <div class="input-field">
                                        <div class="form-check form-switch mt-2">

                                            <input type="hidden"
                                                name="delivery_services[${index}][is_active]"
                                                value="0">

                                            <input class="form-check-input"
                                                type="checkbox"
                                                name="delivery_services[${index}][is_active]"
                                                value="1"
                                                checked>

                                            <label class="form-check-label">
                                                Tampilkan di website
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                `;

                $('#delivery-services-container').append(serviceCard);
            });

            // Hapus layanan
            $(document).on('click', '.remove-delivery-service', function() {
                $(this).closest('.delivery-service-card').remove();

            });

            // Preview logo layanan
            $(document).on('input', '.delivery-logo-input', function() {
                const input = $(this);
                const value = input.val().trim();

                const previewWrapper = input
                    .closest('.input-field')
                    .find('.logo-preview-wrapper');

                const previewImage = previewWrapper
                    .find('.delivery-logo-preview');

                if (!value) {
                    previewWrapper.hide();
                    previewImage.attr('src', '');
                    return;
                }

                let imageUrl = value;

                // Jika menggunakan path dari storage
                if (
                    !value.startsWith('http://') &&
                    !value.startsWith('https://') &&
                    !value.startsWith('/')
                ) {
                    imageUrl = '/storage/' + value;
                }

                previewImage
                    .off('load error')
                    .on('load', function() {
                        previewWrapper.fadeIn(200);
                    })
                    .on('error', function() {
                        previewWrapper.hide();
                    })
                    .attr('src', imageUrl);
            });
        });

        // Preview file upload logo
        $(document).on('change', '.delivery-logo-file-input', function() {

            const input = $(this);

            const file = this.files[0];

            const previewWrapper = input
                .closest('.input-field')
                .find('.logo-preview-wrapper');

            const previewImage = previewWrapper
                .find('.delivery-logo-preview');

            if (!file) {
                return;
            }

            // Pastikan format benar
            if (!['image/png', 'image/jpeg'].includes(file.type)) {
                alert('Logo harus berupa file PNG atau JPG/JPEG.');

                input.val('');

                return;
            }

            const imageUrl = URL.createObjectURL(file);

            previewImage
                .off('load error')
                .on('load', function() {
                    previewWrapper.fadeIn(200);
                    URL.revokeObjectURL(imageUrl);
                })
                .on('error', function() {
                    previewWrapper.hide();
                    URL.revokeObjectURL(imageUrl);
                })
                .attr('src', imageUrl);

            // Jika upload dipilih, kosongkan URL
            input
                .closest('.input-field')
                .find('.delivery-logo-input')
                .val('');
        });

        // Preview foto hero reservasi
        window.previewReservationHeroImage = function(input) {
            const file = input.files && input.files[0];

            const previewContainer = document.getElementById(
                'reservationHeroPreviewContainer'
            );

            const previewImage = document.getElementById(
                'reservationHeroPreview'
            );

            if (!file) return;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp',
                'image/gif'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, PNG, WebP, atau GIF.');
                input.value = '';
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran foto maksimal 5 MB.');
                input.value = '';
                return;
            }

            if (previewImage.dataset.objectUrl) {
                URL.revokeObjectURL(previewImage.dataset.objectUrl);
            }

            const imageUrl = URL.createObjectURL(file);

            previewImage.src = imageUrl;
            previewImage.dataset.objectUrl = imageUrl;

            previewContainer.style.display = 'block';
        };
    </script>



    <style>
        /* Additional animations for ripple effect */
        @keyframes ripple {
            to {
                width: 300px;
                height: 300px;
                opacity: 0;
            }
        }

        /* Char counter styling */
        .char-counter {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #6c757d;
            transition: color 0.3s ease;
        }

        /* Tooltip customization */
        .tooltip {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .tooltip .tooltip-inner {
            background: var(--gradient-primary);
            border-radius: 10px;
            padding: 0.5rem 1rem;
        }

        .tooltip .arrow::before {
            border-top-color: #c92a2a;
        }

        /* Loading animation enhancement */
        .btn-save.loading i {
            animation: spin 1s linear infinite;
        }

        /* Focus visible outline for accessibility */
        *:focus-visible {
            outline: 2px solid #c92a2a;
            outline-offset: 2px;
        }

        /* Selection styling */
        ::selection {
            background: rgba(201, 42, 42, 0.2);
            color: #c92a2a;
        }

        /* Placeholder styling */
        .form-control::placeholder {
            color: #a0aec0;
            font-size: 0.9rem;
            font-style: italic;
            opacity: 0.7;
        }

        /* Gradient text for icons */
        .fab,
        .fas {
            transition: all 0.3s ease;
        }

        .input-wrapper:hover .fab,
        .input-wrapper:hover .fas {
            transform: scale(1.2);
        }
    </style>
@endpush
