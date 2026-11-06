@extends('layouts.admin')

@section('title', 'Tambah Package')

@section('content')

    <div class="container-fluid py-4">

        <div class="mb-4">
            <h2 class="fw-bold mb-1">Tambah Package</h2>
            <p class="text-muted mb-0">
                Tambahkan foto package baru untuk halaman menu.
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

                <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    {{-- Title --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Judul Package
                        </label>

                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                            placeholder="Contoh: Paket Keluarga">
                    </div>

                    {{-- Foto Package --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="packageImageFile">
                            Foto Package
                        </label>

                        <input type="file" name="image" id="packageImageFile" class="form-control"
                            accept=".jpg,.jpeg,.png,.webp" required>

                        <small class="text-muted">
                            Pilih foto format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                        </small>
                    </div>

                    {{-- Preview --}}
                    <div class="mb-4" id="imagePreviewWrapper" style="display: none;">

                        <label class="form-label fw-semibold">
                            Preview Foto
                        </label>

                        <div>
                            <img id="imagePreview" src="" alt="Preview Package"
                                style="
                width:220px;
                height:300px;
                object-fit:cover;
                border-radius:12px;
                border:1px solid #ddd;
            ">
                        </div>

                        <small id="imagePreviewStatus" class="text-muted d-block mt-2"></small>

                    </div>

                    {{-- Sort --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Urutan
                        </label>

                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"
                            min="0">

                    </div>

                    {{-- Active --}}
                    <div class="form-check mb-4">

                        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                            checked>

                        <label class="form-check-label" for="is_active">
                            Tampilkan package di website
                        </label>

                    </div>

                    {{-- Button --}}
                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Simpan Package
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

            input.addEventListener('change', function() {
                const file = this.files[0];

                if (!file) {
                    wrapper.style.display = 'none';
                    preview.src = '';
                    return;
                }

                const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

                if (!allowedTypes.includes(file.type)) {
                    alert('Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                    this.value = '';
                    wrapper.style.display = 'none';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 5 MB.');
                    this.value = '';
                    wrapper.style.display = 'none';
                    return;
                }

                preview.src = URL.createObjectURL(file);
                wrapper.style.display = 'block';
                status.textContent = '✓ Foto berhasil dipilih.';
                status.className = 'text-success d-block mt-2';
            });
        });
    </script>

@endsection
