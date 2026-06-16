<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KatalogController;
use App\Models\Ulasan;
use App\Models\KatalogMakeup;

// ==========================================
// 1. RUTE PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', function () {
    $ulasans = Ulasan::with('customer')->latest()->take(3)->get();
    $katalogs = KatalogMakeup::latest()->take(3)->get();
    
    // Kirim variabel $ulasans ke view welcome
    return view('welcome', compact('ulasans', 'katalogs'));
});

Route::get('/katalog', [KatalogController::class, 'katalogUser']);
Route::get('/testimoni', [App\Http\Controllers\PemesananController::class, 'daftarUlasan'])->name('testimoni.index');

// ==========================================
// 2. RUTE AUTENTIKASI (Login, Register, Logout)
// ==========================================
Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// 3. RUTE CUSTOMER (Pemesanan & Pembayaran)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    // Alur Pemesanan
    Route::get('/pesan/{id_katalog}', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pesan', [PemesananController::class, 'store'])->name('pemesanan.store');

    // Alur Pembayaran Manual
    Route::get('/pembayaran/{id_pesanan}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/{id_pesanan}', [PembayaranController::class, 'store'])->name('pembayaran.store');
    
    // Rute Riwayat
    Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');

    // Rute Ulasan (DIPINDAHKAN KE SINI AGAR BISA DIAKSES CUSTOMER)
    Route::get('/ulasan/create/{id}', [PemesananController::class, 'buatUlasan'])->name('ulasan.create');
    Route::post('/ulasan/{id}', [PemesananController::class, 'simpanUlasan'])->name('ulasan.store');

});


// ==========================================
// 4. RUTE ADMIN
// ==========================================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('admin.beranda');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Menu Katalog Admin
    Route::get('/katalog', [KatalogController::class, 'indexAdmin'])->name('admin.katalog');
    Route::post('/katalog', [KatalogController::class, 'store'])->name('admin.katalog.store');
    Route::put('/katalog/{id}', [KatalogController::class, 'update'])->name('admin.katalog.update');
    Route::delete('/katalog/{id}', [KatalogController::class, 'destroy'])->name('admin.katalog.destroy');

    // Menu Booking Admin
    Route::get('/booking', [PemesananController::class, 'indexAdmin'])->name('admin.booking');
    Route::post('/booking/{id_pesanan}/update-status', [PemesananController::class, 'updateStatus'])->name('admin.booking.update');

    // Menu Testimoni Admin
    Route::get('/testimoni', [AdminController::class, 'testimoniIndex'])->name('admin.testimoni');
    Route::delete('/testimoni/{id}', [AdminController::class, 'destroyTestimoni'])->name('admin.testimoni.destroy');
    
});