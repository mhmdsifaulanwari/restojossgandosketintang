@extends('layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Edit Testimonial</h4>

            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama
                        </label>

                        <input type="text" id="name" name="name" value="{{ old('name', $testimonial->name) }}"
                            class="form-control @error('name') is-invalid @enderror" required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Review --}}
                    <div class="mb-3">
                        <label for="review" class="form-label">
                            Review
                        </label>

                        <textarea id="review" name="review" rows="5" class="form-control @error('review') is-invalid @enderror"
                            required>{{ old('review', $testimonial->review) }}</textarea>

                        @error('review')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Status aktif --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input"
                            {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>

                        <label for="is_active" class="form-check-label">
                            Aktifkan testimonial
                        </label>
                    </div>

                    {{-- Urutan --}}
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">
                            Urutan
                        </label>

                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $testimonial->sort_order) }}"
                            class="form-control @error('sort_order') is-invalid @enderror">

                        @error('sort_order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                </form>

            </div>
        </div>

    </div>
@endsection
