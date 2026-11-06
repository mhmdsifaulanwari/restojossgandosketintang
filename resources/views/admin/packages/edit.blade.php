@extends('layouts.admin')

@section('title', 'Edit Package')

@section('page-title', 'Edit Package')

@section('styles')
    <style>
        /* ==================== PACKAGE BUTTON ==================== */

        .package-btn-premium {
            background: linear-gradient(135deg,
                    #DC143C 0%,
                    #B22234 50%,
                    #8B0000 100%) !important;

            color: white !important;
            border: none !important;

            padding: 1rem 2.5rem;
            border-radius: 9999px;

            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.3px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;

            text-decoration: none;
            cursor: pointer;

            transition:
                all 0.3s cubic-bezier(0.175,
                    0.885,
                    0.32,
                    1.275);

            box-shadow:
                0 8px 30px rgba(220, 20, 60, 0.16);
        }

        .package-btn-premium:hover {
            transform: translateY(-3px) scale(1.02);
            color: white !important;
            text-decoration: none;

            box-shadow:
                0 12px 35px rgba(220, 20, 60, 0.22);
        }

        .package-btn-premium i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .package-btn-premium:hover i {
            transform: scale(1.2) rotate(90deg);
        }


        /* ==================== TOMBOL KEMBALI ==================== */

        .package-btn-back {
            background: #6C757D !important;
            color: white !important;
            border: none !important;

            padding: 1rem 2rem;
            border-radius: 9999px;

            font-weight: 600;
            font-size: 1rem;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;

            text-decoration: none;

            transition:
                all 0.3s ease;
        }

        .package-btn-back:hover {
            background: #495057 !important;
            color: white !important;
            transform: translateY(-2px);
            text-decoration: none;
        }


        /* ==================== MOBILE ==================== */

        @media (max-width: 576px) {

            .package-btn-premium,
            .package-btn-back {
                width: 100%;
            }

        }
    </style>
@endsection

@section('content')

    <div class="container-fluid py-4">

        <div class="mb-4">
            <h2 class="fw-bold mb-1">Edit Package</h2>
            <p class="text-muted mb-0">
                Ubah informasi atau foto package.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('admin.packages.update', $package->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Judul Package
                        </label>

                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $package->title) }}">

                    </div>

                    {{-- Foto Package --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="packageImageFile">
                            Foto Package
                        </label>

                        <input type="file" name="image" id="packageImageFile"
                            class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted d-block mt-1">
                            Pilih foto baru jika ingin mengganti gambar. Format JPG, JPEG, PNG,
                            atau WEBP dengan ukuran maksimal 5 MB.
                        </small>
                    </div>

                    {{-- Preview Foto --}}
                    <div class="mb-4" id="imagePreviewWrapper"
                        style="{{ $package->image ? 'display:block;' : 'display:none;' }}">

                        <label class="form-label fw-semibold d-block">
                            Preview Foto
                        </label>

                        <img id="imagePreview"
                            src="{{ $package->image
                                ? (str_starts_with($package->image, 'http')
                                    ? $package->image
                                    : asset('storage/' . $package->image))
                                : '' }}"
                            data-original="{{ $package->image
                                ? (str_starts_with($package->image, 'http')
                                    ? $package->image
                                    : asset('storage/' . $package->image))
                                : '' }}"
                            alt="{{ $package->title ?: 'Package' }}"
                            style="width:220px; height:300px; object-fit:cover;
        border-radius:12px; border:1px solid #ddd;">

                        <small id="imagePreviewStatus" class="text-muted d-block mt-2">
                            {{ $package->image ? 'Preview foto saat ini.' : '' }}
                        </small>
                    </div>

                    {{-- Sort --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Urutan
                        </label>

                        <input type="number" name="sort_order" class="form-control"
                            value="{{ old('sort_order', $package->sort_order) }}" min="0">

                    </div>

                    {{-- Active --}}
                    <div class="form-check mb-4">

                        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                            {{ $package->is_active ? 'checked' : '' }}>

                        <label class="form-check-label" for="is_active">
                            Tampilkan package di website
                        </label>

                    </div>

                    {{-- Button --}}
                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.packages.index') }}" class="package-btn-back">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>

                        <button type="submit" class="package-btn-premium">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('packageImageFile');
            const wrapper = document.getElementById('imagePreviewWrapper');
            const preview = document.getElementById('imagePreview');
            const status = document.getElementById('imagePreviewStatus');

            const originalPreview = preview.dataset.original;
            let currentPreviewUrl = null;

            input.addEventListener('change', function() {
                const file = this.files[0];

                if (!file) {
                    return;
                }

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {
                    alert('Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                    this.value = '';

                    preview.src = originalPreview;
                    wrapper.style.display = originalPreview ? 'block' : 'none';

                    status.textContent = originalPreview ?
                        'Preview foto saat ini.' :
                        '';

                    status.className = 'text-muted d-block mt-2';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 5 MB.');
                    this.value = '';

                    preview.src = originalPreview;
                    wrapper.style.display = originalPreview ? 'block' : 'none';

                    status.textContent = originalPreview ?
                        'Preview foto saat ini.' :
                        '';

                    status.className = 'text-muted d-block mt-2';
                    return;
                }

                if (currentPreviewUrl) {
                    URL.revokeObjectURL(currentPreviewUrl);
                }

                currentPreviewUrl = URL.createObjectURL(file);

                preview.src = currentPreviewUrl;
                wrapper.style.display = 'block';

                status.textContent = '✓ Foto baru berhasil dipilih.';
                status.className = 'text-success d-block mt-2';
            });
        });
    </script>

@endsection
