<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLevel;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
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
});

// User routes
Route::middleware(['checkLevel:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'showUserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [HomeController::class, 'viewProfile'])->name('user.profile');
});

// Admin routes
Route::middleware(['checkLevel:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin.dashboard');
        Route::get('/profile', [HomeController::class, 'viewProfile'])->name('admin.profile');

});

// Panitia routes
Route::middleware(['checkLevel:panitia'])->group(function () {
    Route::get('/panitia/dashboard', [HomeController::class, 'showPanitiaDashboard'])->name('panitia.dashboard');
    
});
