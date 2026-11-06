@extends('layouts.admin')

@section('title', 'Kelola Package')
@section('page-title', 'Kelola Package')

@section('styles')
    <style>
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

            transition:
                all 0.3s cubic-bezier(0.175,
                    0.885,
                    0.32,
                    1.275);

            position: relative;
            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(220, 20, 60, 0.16);

            display: inline-flex;
            align-items: center;
            gap: 0.75rem;

            text-decoration: none;
            cursor: pointer;
        }

        .package-btn-premium:hover {
            transform: translateY(-3px) scale(1.02);

            color: white !important;
            text-decoration: none;

            box-shadow:
                0 8px 30px rgba(220, 20, 60, 0.16);
        }

        .package-btn-premium i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .package-btn-premium:hover i {
            transform: scale(1.2) rotate(90deg);
        }


        .package-action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .package-btn-action {
            width: 36px;
            height: 36px;

            border-radius: 12px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: none;

            cursor: pointer;

            transition: all 0.3s cubic-bezier(0.175,
                    0.885,
                    0.32,
                    1.275);
        }

        .package-btn-action:hover {
            transform: translateY(-3px) scale(1.1);
        }

        .package-btn-action.edit {
            background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
            color: #1976D2;
            border: 1px solid #90CAF9;
        }

        .package-btn-action.edit:hover {
            background: linear-gradient(135deg, #1976D2, #0D47A1);
            color: white;
        }

        .package-btn-action.delete {
            background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
            color: #C62828;
            border: 1px solid #EF9A9A;
        }

        .package-btn-action.delete:hover {
            background: linear-gradient(135deg, #C62828, #8B0000);
            color: white;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid py-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Kelola Package</h2>
                <p class="text-muted mb-0">
                    Kelola foto package yang ditampilkan pada halaman menu.
                </p>
            </div>

            <a href="{{ route('admin.packages.create') }}" class="package-btn-premium">
                <i class="fas fa-plus"></i>
                Tambah Package
            </a>
        </div>



        {{-- ==================== PENGATURAN PACKAGE ==================== --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="mb-4">
                    <h5 class="fw-bold mb-1">
                        Pengaturan Package Menu
                    </h5>

                    <p class="text-muted mb-0">
                        Atur judul dan deskripsi yang ditampilkan pada bagian
                        package di halaman menu.
                    </p>
                </div>

                <form action="{{ route('admin.packages.settings.update') }}" method="POST">

                    @csrf

                    {{-- Judul Package --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Judul Package Menu
                        </label>

                        <input type="text" name="package_title"
                            class="form-control @error('package_title') is-invalid @enderror"
                            value="{{ old('package_title', $menuPage->package_title ?? 'Package Menu') }}"
                            placeholder="Contoh: Package Menu" required>

                        @error('package_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Deskripsi Package --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Deskripsi Package Menu
                        </label>

                        <textarea name="package_description" class="form-control @error('package_description') is-invalid @enderror"
                            rows="3" placeholder="Contoh: Nikmati pilihan package spesial dari Joss Gandos.">{{ old('package_description', $menuPage->package_description ?? 'Nikmati pilihan package spesial dari Joss Gandos.') }}</textarea>

                        @error('package_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="package-btn-premium">
                        <i class="fas fa-save"></i>
                        Simpan Pengaturan
                    </button>

                </form>

            </div>

        </div>

        {{-- Package --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body">


                @if ($packages->count())

                    <div class="row g-4">

                        @foreach ($packages as $package)
                            <div class="col-md-6 col-lg-4">

                                <div class="card h-100 border-0 shadow-sm">

                                    {{-- Image --}}
                                    <div class="position-relative"
                                        style="height: 320px; overflow: hidden; border-radius: 12px 12px 0 0;">

                                        <img src="{{ asset('storage/' . $package->image) }}"
                                            alt="{{ $package->title ?? 'Package' }}" class="w-100 h-100"
                                            style="object-fit: cover;"
                                            onerror="this.onerror=null; this.src='https://via.placeholder.com/600x800?text=Gambar+Tidak+Tersedia';">

                                        {{-- Status --}}
                                        <span
                                            class="position-absolute top-0 end-0 m-3 badge
                                        {{ $package->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>

                                    </div>

                                    {{-- Content --}}
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-2">
                                            {{ $package->title ?: 'Package tanpa judul' }}
                                        </h5>

                                        <small class="text-muted">
                                            Urutan: {{ $package->sort_order }}
                                        </small>

                                    </div>

                                    {{-- Action --}}
                                    <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">

                                        <div class="package-action-buttons">

                                            <a href="{{ route('admin.packages.edit', $package->id) }}"
                                                class="package-btn-action edit" title="Edit Package">

                                                <i class="fas fa-pen"></i>

                                            </a>

                                            <form action="{{ route('admin.packages.destroy', $package->id) }}"
                                                method="POST" style="display: inline-block;"
                                                onsubmit="return confirm('Yakin ingin menghapus package ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="package-btn-action delete"
                                                    title="Hapus Package">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="text-center py-5">

                        <i class="fas fa-images fa-3x text-muted mb-3"></i>

                        <h5 class="fw-bold">
                            Belum Ada Package
                        </h5>

                        <p class="text-muted">
                            Tambahkan foto package pertama untuk ditampilkan
                            pada halaman menu.
                        </p>

                        <a href="{{ route('admin.packages.create') }}" class="package-btn-premium">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Package
                        </a>

                    </div>

                @endif

            </div>
        </div>

    </div>

@endsection
