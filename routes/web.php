<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Models\Promotion;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== PUBLIC ROUTES ====================

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Page
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Gallery Pages
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// About Page
Route::get('/about', [PageController::class, 'indexAbout'])->name('about');

// Reservation & Contact Page
Route::get('/reservation', [PageController::class, 'indexReservation'])
    ->name('reservation');




// ==================== AUTHENTICATION ROUTES ====================

// Admin Login Page
Route::get('/admin/login', function () {

    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('auth.login');
})->name('admin.login')->middleware('guest');

// Admin Login Submit
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Redirect /login to admin login
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Logout route
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// ==================== ADMIN PROTECTED ROUTES ====================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // ===== PAGE MANAGEMENT =====

    // Home
    Route::get('/pages/home/edit', [PageController::class, 'editHome'])
        ->name('pages.home.edit');

    Route::post('/pages/home/update', [PageController::class, 'updateHome'])
        ->name('pages.home.update');


    // About
    Route::get('/pages/about/edit', [PageController::class, 'editAbout'])
        ->name('pages.about.edit');

    Route::post('/pages/about/update', [PageController::class, 'updateAbout'])
        ->name('pages.about.update');


    // Menu Hero
    Route::get('/pages/menu/edit', [PageController::class, 'editMenu'])
        ->name('pages.menu.edit');

    Route::post('/pages/menu/update', [PageController::class, 'updateMenu'])
        ->name('pages.menu.update');

    // GALERY
    Route::get('/pages/gallery/edit', [PageController::class, 'editGallery'])
        ->name('pages.gallery.edit');

    Route::post('/pages/gallery/update', [PageController::class, 'updateGallery'])
        ->name('pages.gallery.update');


    // Contact
    Route::get('/pages/contact/edit', [PageController::class, 'editContact'])
        ->name('pages.contact.edit');

    Route::post('/pages/contact/update', [PageController::class, 'updateContact'])
        ->name('pages.contact.update');



    // ===== MENU MANAGEMENT =====
    Route::get('/menu', [AdminController::class, 'menuIndex'])->name('menu.index');
    Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('menu.create');
    Route::post('/menu', [AdminController::class, 'menuStore'])->name('menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('menu.edit');
    Route::post('/menu/{id}/update', [AdminController::class, 'menuUpdate'])->name('menu.update');

    // ===== PACKAGE MANAGEMENT =====
    Route::get('/packages', [AdminController::class, 'packageIndex'])
        ->name('packages.index');

    Route::post('/packages/settings', [AdminController::class, 'packageSettingsUpdate'])
        ->name('packages.settings.update');

    Route::get('/packages/create', [AdminController::class, 'packageCreate'])
        ->name('packages.create');

    Route::post('/packages', [AdminController::class, 'packageStore'])
        ->name('packages.store');

    Route::get('/packages/{id}/edit', [AdminController::class, 'packageEdit'])
        ->name('packages.edit');

    Route::put('/packages/{id}', [AdminController::class, 'packageUpdate'])
        ->name('packages.update');

    Route::delete('/packages/{id}', [AdminController::class, 'packageDestroy'])
        ->name('packages.destroy');

    // PERBAIKAN: Gunakan Route::delete untuk method DELETE
    Route::delete('/menu/{id}', [AdminController::class, 'menuDestroy'])->name('menu.destroy');

    // ===== PROMOTIONS MANAGEMENT =====
    Route::get('/promotions', [AdminController::class, 'promotionsIndex'])->name('promotions.index');
    Route::get('/promotions/create', [AdminController::class, 'promotionsCreate'])->name('promotions.create');
    Route::post('/promotions', [AdminController::class, 'promotionsStore'])->name('promotions.store');
    Route::get('/promotions/{id}/edit', [AdminController::class, 'promotionsEdit'])->name('promotions.edit');
    Route::put('/promotions/{id}', [AdminController::class, 'promotionsUpdate'])->name('promotions.update');
    Route::delete('/promotions/{id}', [AdminController::class, 'promotionsDestroy'])->name('promotions.destroy');

    // Debug route
    Route::get('/debug-promotions', function () {
        $nowUTC = Carbon::now('UTC');
        $nowJakarta = Carbon::now('Asia/Jakarta');

        $promotions = Promotion::all();

        $data = [
            'server_info' => [
                'timezone_config' => config('app.timezone'),
                'php_timezone' => date_default_timezone_get(),
                'current_time_utc' => $nowUTC->format('Y-m-d H:i:s'),
                'current_time_jakarta' => $nowJakarta->format('Y-m-d H:i:s'),
            ],
            'database_stats' => [
                'total_promotions' => Promotion::count(),
                'active_flag_true' => Promotion::where('is_active', true)->count(),
                'using_scope_active' => Promotion::active()->count(),
            ],
            'promotions' => []
        ];

        foreach ($promotions as $promo) {
            $data['promotions'][] = [
                'id' => $promo->id,
                'title' => $promo->title,
                'is_active' => $promo->is_active,
                'sort_order' => $promo->sort_order,
                'start_date' => [
                    'raw_db' => $promo->getRawStartDateAttribute(),
                    'accessor' => $promo->start_date ? $promo->start_date->format('Y-m-d H:i:s') : null,
                    'timezone' => $promo->start_date ? $promo->start_date->timezoneName : null,
                ],
                'end_date' => [
                    'raw_db' => $promo->getRawEndDateAttribute(),
                    'accessor' => $promo->end_date ? $promo->end_date->format('Y-m-d H:i:s') : null,
                    'timezone' => $promo->end_date ? $promo->end_date->timezoneName : null,
                ],
                'status' => [
                    'label' => $promo->status['label'],
                    'class' => $promo->status['class'],
                ],
                'is_currently_active' => $promo->isCurrentlyActive(),
                'comparison_with_jakarta' => [
                    'start <= now' => $promo->start_date ? ($promo->start_date <= $nowJakarta) : false,
                    'end >= now' => $promo->end_date ? ($promo->end_date >= $nowJakarta) : false,
                    'result' => $promo->isCurrentlyActive()
                ]
            ];
        }

        return response()->json($data);
    });

    // Gallery routes - konsisten dengan menu
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/create', [AdminController::class, 'galleryCreate'])->name('gallery.create');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [AdminController::class, 'galleryEdit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('gallery.destroy');

    // ===== USERS MANAGEMENT =====
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::post('/users/{id}', [AdminController::class, 'userUpdate'])->name('users.update');

    // ===== BRANCHES MANAGEMENT =====
    Route::get('/branches', [AdminController::class, 'branchesIndex'])->name('branches.index');
    Route::post('/branches', [AdminController::class, 'branchStore'])->name('branches.store');
    Route::post('/branches/{id}', [AdminController::class, 'branchUpdate'])->name('branches.update');
    Route::delete('/branches/{id}', [AdminController::class, 'branchDestroy'])->name('branches.destroy');

    // ===== REVIEWS MANAGEMENT =====
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');
    Route::post('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('reviews.destroy');

    // ===== TESTIMONIALS MANAGEMENT =====
    Route::get('/testimonials', [TestimonialController::class, 'index'])
        ->name('testimonials.index');

    Route::get('/testimonials/create', [TestimonialController::class, 'create'])
        ->name('testimonials.create');

    Route::post('/testimonials', [TestimonialController::class, 'store'])
        ->name('testimonials.store');

    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])
        ->name('testimonials.edit');

    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])
        ->name('testimonials.update');

    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
        ->name('testimonials.destroy');

    // ===== SETTINGS MANAGEMENT =====
    Route::get('/settings', [AdminController::class, 'editSettings'])->name('settings.edit');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});

// ==================== FALLBACK ROUTE ====================
Route::fallback(function () {
    return redirect()->route('home');
});
