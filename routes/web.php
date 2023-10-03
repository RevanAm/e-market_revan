<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

Route::get('/', [HomeController::class, 'index']);
Route::get('profile', [HomeController::class, 'profile']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('faq', [HomeController::class, 'faq']);
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('barang', BarangController::class);
Route::resource('pembelian', PembelianController::class);
Route::resource('penjualan', PenjualanController::class);

//Login
Route::get('login', [PenggunaController::class, 'index'])->name('login');
Route::post('login/check', [PenggunaController::class, 'CheckLogin'])->name('CheckLogin');
Route::get('logout', [PenggunaController::class, 'logout'])->name('logout');
