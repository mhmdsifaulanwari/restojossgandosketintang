@extends('admin.layouts.app')

@section('title', 'Daftar Testimonial')

@section('content')
    <div class="container-fluid">

        {{-- Judul halaman dan tombol tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Daftar Testimonial</h4>

            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                Tambah Testimonial
            </a>
        </div>

        {{-- Pesan berhasil --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel testimonial --}}
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="70">No</th>
                                <th>Nama</th>
                                <th>Review</th>
                                <th>Status</th>
                                <th>Urutan</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($testimonials as $index => $testimonial)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $testimonial->name }}</td>

                                    <td>{{ $testimonial->review }}</td>

                                    <td>
                                        @if ($testimonial->is_active)
                                            <span class="badge bg-success">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>

                                    <td>{{ $testimonial->sort_order }}</td>

                                    <td>
                                        {{-- Tombol edit --}}
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        {{-- Form hapus --}}
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus testimonial ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Belum ada testimonial.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
