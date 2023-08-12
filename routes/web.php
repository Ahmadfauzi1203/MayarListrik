<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\PelangganController;
use App\Http\Controllers\Back\PembayaranController;
use App\Http\Controllers\Back\PenggunaanController;
use App\Http\Controllers\Back\PetugasController;
use App\Http\Controllers\Back\TagihanController;
use App\Http\Controllers\Back\TarifController;
use App\Http\Controllers\Front\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Hak Universial
Route::get('/', [PageController::class, 'main'])->name('home');


// Login Control
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
// Register Control
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionregister');


// Hak Akses pelanggan
Route::group(['middleware' => ['auth', 'CekLevel:3']], function () {
    Route::get('/konfirmasi/{id_tagihan}', [PageController::class, 'konfirmasi']);
    Route::post('/store', [PageController::class, 'store']);
    Route::get('/cetak/{id_tagihan}', [PageController::class, 'cetak']);
});


// Hak Akses Admin dan Petugas
Route::group(['middleware' => ['auth', 'CekLevel:1,2']], function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('admin/penggunaan', PenggunaanController::class);
    Route::resource('admin/pembayaran', PembayaranController::class);
    Route::resource('admin/tagihan', TagihanController::class);
    Route::get('admin/tagihan/{id_penggunaan}/create', [TagihanController::class, 'create']);
    Route::get('admin/tagihan/{id_tagihan}/cetak', [TagihanController::class, 'cetak']);
    // Route::get('admin/tagihan/{id_tagihan}/konfirmasi', [TagihanController::class, 'konfirmasi']);
    Route::get('admin/pembayaran/{id_tagihan}/konfirmasi', [PembayaranController::class, 'create']);
});


// Hak Akses Petugas
Route::group(['middleware' => ['auth', 'CekLevel:1']], function () {
    Route::resource('admin/pelanggan', PelangganController::class);
    Route::resource('admin/petugas', PetugasController::class);
    Route::resource('admin/tarif', TarifController::class);
});
