<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('post.show');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Auth Routes
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Admin & Moderator Routes
Route::middleware(['auth', 'role:admin,moderator'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
});
