<?php

use Illuminate\Support\Facades\Route;

// === Auth (Guest) ===
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
});

Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->middleware('auth')->name('logout');

// === Client (Giao diện Public) ===
Route::namespace('App\Http\Controllers\Client')->group(function () {
    Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
    Route::get('/san-pham/{slug}', [App\Http\Controllers\Client\ProductController::class, 'show'])->name('products.detail');
    Route::get('/tin-tuc/{slug}', [App\Http\Controllers\Client\PostController::class, 'show'])->name('posts.detail');
    Route::get('/tim-kiem', [App\Http\Controllers\Client\SearchController::class, 'index'])->name('search');

    // Giao dịch & Khách hàng
    Route::middleware('auth')->group(function () {
        Route::post('/dat-tour/{product}', [App\Http\Controllers\Client\BookingController::class, 'store'])->name('bookings.store');
        Route::get('/lich-su-dat-tour', [App\Http\Controllers\Client\BookingController::class, 'history'])->name('bookings.history');
    });
});

// === Admin (Nhóm Route Quản trị) ===
Route::middleware(['auth', 'is_admin'])->prefix('admin')->as('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Quản lý Danh mục, Sản phẩm, Bài viết (Resource)
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
    
    // Lưu ý: Đối với model route binding, mặc định resource dùng id. 
    // Nếu view dùng route('products.index') thì ok. 
    // Tuy nhiên CategoryController dùng redirect()->route('categories.index') không có tiền tố admin.
    // Tôi sẽ giữ nguyên tên route cũ để tránh sửa quá nhiều view, nhưng bọc trong prefix admin.
});

// Quay lại cách dùng cũ để an toàn cho view:
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    
    // Quản lý Đặt Tour
    Route::get('bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin.bookings.index');
    Route::put('bookings/{booking}/status', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('admin.bookings.update');
});
