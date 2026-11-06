{{-- resources/views/admin/menu/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Menu')
@section('page-title', 'Edit Menu')

@section('styles')
    <style>
        /* ===== PREMIUM RED GRADIENT THEME ===== */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

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
            --shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.02);

            /* Border Radius */
            --radius-xs: 8px;
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
            background: #fafafa;
        }

        /* ===== MAIN CONTAINER ===== */
        .content-card {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(220, 20, 60, 0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            animation: slideIn 0.5s ease;
        }

        .content-card:hover {
            box-shadow: var(--shadow-lg);
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            z-index: 10;
        }

        /* ===== HEADER SECTION ===== */
        .card-header {
            background: var(--gradient-glass);
            padding: 2rem 2.5rem;
            border-bottom: 1px solid rgba(220, 20, 60, 0.1);
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--red-100) 0%, transparent 70%);
            border-radius: 50%;
            opacity: 0.5;
            pointer-events: none;
            animation: float 10s ease-in-out infinite;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -10%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, var(--red-200) 0%, transparent 70%);
            border-radius: 50%;
            opacity: 0.3;
            pointer-events: none;
            animation: float 15s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(20px, -20px) rotate(5deg);
            }

            66% {
                transform: translate(-10px, 10px) rotate(-5deg);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header h2 {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
            position: relative;
            z-index: 2;
        }

        .card-header p {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 0;
            position: relative;
            z-index: 2;
        }

        .card-header p i {
            color: var(--red-500);
            margin-right: 5px;
        }

        .card-header .edit-badge {
            display: inline-block;
            background: var(--gradient-soft);
            color: var(--red-700);
            padding: 0.3rem 1rem;
            border-radius: var(--radius-full);
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 1rem;
            border: 1px solid var(--red-200);
        }

        /* ===== ALERT STYLES ===== */
        .alert-danger {
            background: linear-gradient(145deg, #fff5f5, #ffe4e8);
            border: 1px solid var(--red-300);
            border-radius: var(--radius-lg);
            padding: 1.5rem 2rem;
            margin: 2rem 2.5rem;
            color: var(--red-700);
            position: relative;
            overflow: hidden;
            animation: shake 0.5s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .alert-danger::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-primary);
        }

        .alert-danger ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .alert-danger li {
            padding: 5px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger li::before {
            content: '•';
            color: var(--red-500);
            font-weight: bold;
            font-size: 1.5rem;
        }

        /* ===== FORM STYLES ===== */
        form {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
            animation: fadeIn 0.5s ease;
            animation-fill-mode: both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group:nth-child(1) {
            animation-delay: 0.1s;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.2s;
        }

        .form-group:nth-child(3) {
            animation-delay: 0.3s;
        }

        .form-group:nth-child(4) {
            animation-delay: 0.4s;
        }

        .form-group:nth-child(5) {
            animation-delay: 0.5s;
        }

        .form-group label {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .form-group label i {
            color: var(--red-500);
            font-size: 1rem;
        }

        .text-danger {
            color: var(--red-500) !important;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* ===== FORM CONTROLS ===== */
        .form-control,
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: var(--radius-md);
            padding: 0.9rem 1.2rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            color: #1a1a1a;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: var(--red-300);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--red-500);
            box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
            outline: none;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--red-500);
            background-image: none;
        }

        .invalid-feedback {
            color: var(--red-500);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .invalid-feedback::before {
            content: '⚠️';
            font-size: 0.85rem;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
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
        }

        .url-preview-icon:hover {
            color: white;
            background: var(--gradient-primary);
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        /* ===== SAMPLE URL BUTTONS ===== */
        .sample-urls {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .sample-url-btn {
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            border: 1px solid rgba(220, 20, 60, 0.2);
            border-radius: var(--radius-full);
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            color: #495057;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sample-url-btn i {
            color: var(--red-500);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .sample-url-btn:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .sample-url-btn:hover i {
            color: white;
        }

        /* ===== IMAGE PREVIEW ===== */
        .image-preview-container {
            margin-top: 20px;
            padding: 20px;
            background: var(--gradient-glass);
            border-radius: var(--radius-lg);
            border: 2px dashed rgba(220, 20, 60, 0.3);
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease;
        }

        .image-preview-container:hover {
            border-color: var(--red-500);
            background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        }

        .image-preview-container h6 {
            font-weight: 600;
            color: var(--red-700);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .image-preview-container h6 i {
            font-size: 1.2rem;
        }

        .image-preview {
            max-width: 100%;
            max-height: 250px;
            object-fit: contain;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            border: 4px solid white;
        }

        .image-preview:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-xl);
        }

        /* ===== SWITCH BUTTONS ===== */
        .form-check {
            padding: 1rem;
            background: var(--gradient-glass);
            border-radius: var(--radius-md);
            border: 1px solid rgba(220, 20, 60, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 70px;
        }

        .form-check:hover {
            background: linear-gradient(145deg, #fff5f5, #ffe4e8);
            border-color: var(--red-300);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .form-check-input {
            width: 3rem;
            height: 1.5rem;
            margin: 0;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23DC143C'/%3e%3c/svg%3e");
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: var(--red-500);
            border-color: var(--red-500);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='white'/%3e%3c/svg%3e");
        }

        .form-check-input:focus {
            border-color: var(--red-500);
            box-shadow: 0 0 0 0.25rem rgba(220, 20, 60, 0.25);
        }

        .form-check-label {
            font-weight: 600;
            color: #2c3e50;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.95rem;
        }

        .form-check-label i {
            color: var(--red-500);
            font-size: 1rem;
        }

        /* ===== BUTTON STYLES ===== */
        .btn-admin {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 0.9rem 2rem;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
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
            background: transparent;
            color: var(--red-600);
            border: 2px solid var(--red-500);
            padding: 0.9rem 2rem;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .btn-admin-outline:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: linear-gradient(145deg, #6c757d, #5a6268);
            color: white;
            border: none;
            padding: 0.9rem 2rem;
            border-radius: var(--radius-full);
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary:hover {
            background: linear-gradient(145deg, #5a6268, #495057);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* ===== BUTTON GROUP ===== */
        .d-flex.justify-content-between {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid rgba(220, 20, 60, 0.1);
        }

        .d-flex.justify-content-between>div {
            display: flex;
            gap: 10px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .card-header {
                padding: 1.5rem;
            }

            .card-header h2 {
                font-size: 1.5rem;
            }

            form {
                padding: 1.5rem;
            }

            .alert-danger {
                margin: 1.5rem;
                padding: 1rem;
            }

            .btn-admin,
            .btn-admin-outline,
            .btn-secondary {
                padding: 0.8rem 1.5rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }

            .d-flex.justify-content-between>div {
                justify-content: flex-end;
            }
        }

        /* ===== ADDITIONAL STYLES ===== */
        .text-muted {
            color: #6c757d !important;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .text-muted i {
            color: var(--red-400);
        }

        .row {
            margin-bottom: 0;
        }

        .col-md-6,
        .col-md-4 {
            margin-bottom: 0;
        }

        /* Loading animation for buttons */
        .btn-admin:active {
            transform: scale(0.98);
        }

        /* Focus styles for better accessibility */
        .btn:focus,
        .form-control:focus,
        .form-select:focus {
            outline: none;
        }

        /* Disabled state */
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Current image indicator */
        .current-image-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--gradient-soft);
            color: var(--red-700);
            padding: 0.3rem 1rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 10px;
            border: 1px solid var(--red-200);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="content-card">
            <div class="card-header">
                <h2>
                    <i class="fas fa-edit"></i>
                    Edit Menu
                    <span class="edit-badge">
                        <i class="fas fa-tag"></i>
                        {{ $menuItem->name }}
                    </span>
                </h2>
                <p>
                    <i class="fas fa-home"></i>
                    Admin / <span style="color: var(--red-500); font-weight: 600;">Edit Menu</span>
                </p>
            </div>

            @if ($errors->any())
                <div class="alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.menu.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Nama Menu --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-utensils"></i>
                                Nama Menu <span class="text-danger">*</span>
                            </label>

                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $menuItem->name) }}"
                                placeholder="Contoh: Nasi Goreng Spesial" required>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">
                                <i class="fas fa-tag"></i>
                                Kategori <span class="text-danger">*</span>
                            </label>

                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">-- Pilih Kategori --</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">
                        <i class="fas fa-align-left"></i>
                        Deskripsi
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3" placeholder="Jelaskan detail menu...">{{ old('description', $menuItem->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">
                                <i class="fas fa-money-bill-wave"></i>
                                Harga <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    style="background: var(--gradient-soft); border: 2px solid #e9ecef; border-right: none; border-radius: var(--radius-md) 0 0 var(--radius-md); color: var(--red-600); font-weight: 600;">Rp</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" min="0"
                                    value="{{ old('price', $menuItem->price) }}" placeholder="0"
                                    style="border-left: none; border-radius: 0 var(--radius-md) var(--radius-md) 0;"
                                    required>
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">
                                <i class="fas fa-image"></i>
                                Foto Menu
                                @if ($menuItem->image)
                                @endif
                            </label>

                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept=".jpg,.jpeg,.png,.webp" onchange="showPreview(this)">

                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Pilih foto baru jika ingin mengganti foto saat ini.
                                Format JPG, JPEG, PNG, atau WebP. Maksimal 5 MB.
                            </small>

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Preview Foto Menu -->
                <div class="image-preview-container" id="previewContainer"
                    style="{{ $menuItem->image ? 'display: block;' : 'display: none;' }}">

                    <h6 id="previewTitle">
                        <i class="fas fa-eye"></i>
                        Foto Menu Saat Ini:
                    </h6>

                    <img src="{{ $menuItem->image
                        ? (\Illuminate\Support\Str::startsWith($menuItem->image, ['http://', 'https://'])
                            ? $menuItem->image
                            : asset('storage/' . $menuItem->image))
                        : '' }}"
                        class="image-preview" id="imagePreview" alt="Preview Foto Menu"
                        style="max-width: 100%; max-height: 300px; object-fit: contain;">

                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                                value="1" {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">
                                <i class="fas fa-check-circle"></i>
                                Tersedia
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                                value="1" {{ old('is_featured', $menuItem->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                <i class="fas fa-star"></i>
                                Tampilkan sebagai Fitur
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sort_order">
                                <i class="fas fa-sort-numeric-down"></i>
                                Urutan Tampil
                            </label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                id="sort_order" name="sort_order" min="0"
                                value="{{ old('sort_order', $menuItem->sort_order ?? 0) }}" placeholder="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.menu.index') }}" class="btn-admin-outline">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <div>
                        <button type="reset" class="btn-secondary">
                            <i class="fas fa-undo-alt"></i>
                            Reset
                        </button>
                        <button type="submit" class="btn-admin">
                            <i class="fas fa-save"></i>
                            Update Menu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // URL foto menu yang tersimpan saat halaman pertama kali dibuka
        const originalImageUrl = @json(
            $menuItem->image
                ? (\Illuminate\Support\Str::startsWith($menuItem->image, ['http://', 'https://'])
                    ? $menuItem->image
                    : asset('storage/' . $menuItem->image))
                : '');

        // Preview foto baru setelah file dipilih
        function showPreview(input) {
            const file = input.files[0];

            if (!file) {
                return;
            }

            const previewContainer = document.getElementById('previewContainer');
            const preview = document.getElementById('imagePreview');
            const previewTitle = document.getElementById('previewTitle');

            // Format gambar yang diperbolehkan
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            // Maksimal 5 MB
            const maxSize = 5 * 1024 * 1024;

            // Validasi format
            if (!allowedTypes.includes(file.type)) {
                input.value = '';

                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Valid',
                    text: 'Silakan pilih gambar JPG, JPEG, PNG, atau WebP.',
                    confirmButtonColor: '#DC143C'
                });

                return;
            }

            // Validasi ukuran
            if (file.size > maxSize) {
                input.value = '';

                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran Terlalu Besar',
                    text: 'Ukuran gambar maksimal 5 MB.',
                    confirmButtonColor: '#DC143C'
                });

                return;
            }

            // Baca file untuk menampilkan preview
            const reader = new FileReader();

            reader.onload = function(event) {
                preview.onload = function() {
                    previewContainer.style.display = 'block';

                    previewTitle.innerHTML =
                        '<i class="fas fa-eye"></i> Preview Foto Baru:';

                    previewContainer.style.animation = 'fadeIn 0.5s ease';
                };

                preview.onerror = function() {
                    preview.onload = null;
                    preview.onerror = null;

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menampilkan Foto',
                        text: 'Foto tidak dapat ditampilkan. Silakan pilih file gambar lain.',
                        confirmButtonColor: '#DC143C'
                    });

                    input.value = '';

                    // Kembalikan foto sebelumnya
                    restoreOriginalPreview();
                };

                preview.src = event.target.result;
            };

            reader.onerror = function() {
                input.value = '';

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Membaca Foto',
                    text: 'Terjadi kesalahan saat membaca file gambar.',
                    confirmButtonColor: '#DC143C'
                });
            };

            reader.readAsDataURL(file);
        }

        // Kembalikan preview ke foto yang tersimpan
        function restoreOriginalPreview() {
            const previewContainer = document.getElementById('previewContainer');
            const preview = document.getElementById('imagePreview');
            const previewTitle = document.getElementById('previewTitle');

            if (originalImageUrl) {
                preview.onload = null;
                preview.onerror = null;

                preview.src = originalImageUrl;
                previewContainer.style.display = 'block';

                previewTitle.innerHTML =
                    '<i class="fas fa-eye"></i> Foto Menu Saat Ini:';
            } else {
                preview.removeAttribute('src');
                previewContainer.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {

            // Efek fokus pada input
            document.querySelectorAll('.form-control, .form-select')
                .forEach(input => {
                    input.addEventListener('focus', function() {
                        this.closest('.form-group')
                            ?.querySelector('label')
                            ?.classList.add('text-danger');
                    });

                    input.addEventListener('blur', function() {
                        this.closest('.form-group')
                            ?.querySelector('label')
                            ?.classList.remove('text-danger');
                    });
                });

            // Animasi checkbox
            document.querySelectorAll('.form-check-input')
                .forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const formCheck = this.closest('.form-check');

                        formCheck.style.transform = 'scale(1.02)';

                        setTimeout(() => {
                            formCheck.style.transform = 'scale(1)';
                        }, 200);
                    });
                });

            // Tombol reset
            const resetButton = document.querySelector('button[type="reset"]');

            if (resetButton) {
                resetButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Reset Form?',
                        text: 'Semua perubahan yang belum disimpan akan hilang!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DC143C',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Reset!',
                        cancelButtonText: 'Batal'
                    }).then(result => {
                        if (result.isConfirmed) {
                            const form = this.closest('form');

                            form.reset();

                            // Kembalikan preview foto awal
                            restoreOriginalPreview();

                            Swal.fire({
                                icon: 'success',
                                title: 'Form di-reset!',
                                text: 'Form kembali ke data awal.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    });
                });
            }
        });
    </script>

@endsection
