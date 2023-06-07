<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLevel;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('landingpage');
});

// Login routes
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// Register routes
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [HomeController::class, 'register']);

// Password reset routes
Route::get('/reset-password', [HomeController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [HomeController::class, 'resetPassword'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [HomeController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('password.update');
    Route::get('/profile', [HomeController::class, 'viewProfile'])->name('profile');

});

// User routes
Route::middleware(['checkLevel:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'showUserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [HomeController::class, 'viewProfile'])->name('user.profile');
    Route::get('/user/landing', [HomeController::class, 'UserLanding'])->name('user.landing');
});

// Admin routes
Route::middleware(['checkLevel:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/profile', [HomeController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/admin/admintable', [AdminController::class, 'index'])->name('admin.admintable');
}
);
    Route::resource('users', AdminController::class);

// Panitia routes
Route::middleware(['checkLevel:panitia'])->group(function () {
    Route::get('/panitia/dashboard', [HomeController::class, 'showPanitiaDashboard'])->name('panitia.dashboard');
    
});

Route::get('/table', [AdminController::class, 'index'])->name('table');

// Google routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Facebook routes
Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

//Pengumuman routes
Route::get('admin/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
Route::resource('pengumuman', PengumumanController::class);

//Gallery routes
Route::get('admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::resource('gallery', GalleryController::class);