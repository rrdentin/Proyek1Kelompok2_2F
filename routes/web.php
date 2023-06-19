<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLevel;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PanitiaController;

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
    Route::get('dashboard/pendaftar/{id}', [PendaftarController::class, 'show'])->name('pendaftar.show');
    Route::put('/pendaftar/{id}', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::get('/pembayaran/{id}/print', [PembayaranController::class, 'print'])->name('pembayaran.print');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/siswa/{id}/print', [SiswaController::class, 'print'])->name('siswa.print');

});

// User routes
Route::middleware(['checkLevel:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'showUserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [HomeController::class, 'viewProfile'])->name('user.profile');
    Route::get('/user/landing', [HomeController::class, 'UserLanding'])->name('user.landing');
    Route::get('/user/edit-profile', [HomeController::class, 'editProfile'])->name('edit-profile');
    Route::post('/user/update-user', [HomeController::class, 'updateUser'])->name('update-user');
    Route::get('/user/dashboard/pendaftar', [PendaftarController::class, 'dashboard'])->name('pendaftar.dashboard');
    Route::post('/user/dashboard/pendaftar', [PendaftarController::class, 'store'])->name('pendaftar.store');
    Route::get('/user/dashboard/pembayaran', [PembayaranController::class, 'dashboard'])->name('pembayaran.dashboard');
    Route::get('/user/dashboard/siswa', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
});

// Panitia routes
Route::middleware(['checkLevel:panitia'])->group(function () {
    Route::get('/panitia/dashboard', [HomeController::class, 'showPanitiaDashboard'])->name('panitia.dashboard');
    Route::get('/panitia/profile', [HomeController::class, 'viewProfile'])->name('panitia.profile');
    Route::get('/panitia/panitiatable', [PanitiaController::class, 'index'])->name('panitia.panitiatable');
    Route::post('add-panitia', [PanitiaController::class, 'addPanitia'])->name('panitia.add-panitia');
    Route::get('/panitia/pendaftar', [PendaftarController::class, 'dashboard'])->name('panitia.pendaftar');
});

// Admin routes
Route::middleware(['checkLevel:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [HomeController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/admin/admintable', [AdminController::class, 'index'])->name('admin.admintable');
    Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.add-admin');
    Route::get('/admin/pendaftar', [PendaftarController::class, 'dashboard'])->name('admin.pendaftar');
    Route::get('/admin/pembayaran', [PembayaranController::class, 'dashboard'])->name('admin.pembayaran');
    Route::get('/admin/pendaftar/print/{id}', [PendaftarController::class, 'printPDF'])->name('admin.print');
    Route::put('pendaftar/{id}/update-status', [PendaftarController::class, 'updateStatus'])->name('pendaftar.updateStatus');
    Route::get('/admin/siswa', [SiswaController::class, 'dashboard'])->name('admin.siswa');
}
);

// CRUD resources routes
Route::resource('users', AdminController::class);
Route::resource('pendaftars', PendaftarController::class);

Route::get('/table', [AdminController::class, 'index'])->name('table');

// Google routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Facebook routes
Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

//Pengumuman routes
Route::get('admin/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
Route::get('panitia/pengumuman', [PengumumanController::class, 'index'])->name('panitia.pengumuman');
Route::resource('pengumuman', PengumumanController::class);

//Gallery routes
Route::get('admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::get('panitia/gallery', [GalleryController::class, 'index'])->name('panitia.gallery');
Route::resource('gallery', GalleryController::class);

//Search routes
Route::get('/search', [HomeController::class, 'searchAdmin'])->name('searchAdmin');
Route::get('/search/user', [HomeController::class, 'searchUser'])->name('searchUser');
Route::get('/search/panitia', [HomeController::class, 'searchPanitia'])->name('searchPanitia');
Route::get('/search/pendaftar', [HomeController::class, 'searchPendaftar'])->name('searchPendaftar');
Route::get('/search/gallery', [HomeController::class, 'searchGallery'])->name('searchGallery');
Route::get('/search/pengumuman', [HomeController::class, 'searchPengumuman'])->name('searchPengumuman');