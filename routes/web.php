<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KatalogController;

// Halaman Utama/Welcome awal
Route::get('/', function () {
    return view('welcome');
});

// Beranda Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.beranda');

// Rute Menu Booking Admin (Tambahkan ini)
Route::get('/admin/booking', [AdminController::class, 'bookingIndex'])->name('admin.booking');
Route::post('/admin/booking/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.booking.update');

Route::get('/admin/katalog', [KatalogController::class, 'indexAdmin'])->name('admin.katalog');
Route::post('/admin/katalog', [KatalogController::class, 'store'])->name('admin.katalog.store');
Route::put('/admin/katalog/{id}', [KatalogController::class, 'update'])->name('admin.katalog.update');
Route::delete('/admin/katalog/{id}', [KatalogController::class, 'destroy'])->name('admin.katalog.destroy');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Rute untuk halaman Testimoni
Route::get('/admin/testimoni', [AdminController::class, 'testimoniIndex'])->name('admin.testimoni');
Route::delete('/admin/testimoni/{id}', [AdminController::class, 'destroyTestimoni'])->name('admin.testimoni.destroy');

// Alur Pemesanan Customer
Route::get('/pesan/{id_katalog}', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pesan', [PemesananController::class, 'store'])->name('pemesanan.store');

// Alur Pembayaran Manual Customer
Route::get('/pembayaran/{id_pesanan}', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran/{id_pesanan}', [PembayaranController::class, 'store'])->name('pembayaran.store');