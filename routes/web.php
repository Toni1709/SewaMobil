<?php

use App\Http\Controllers\{
    AuthController,
    ManajemenMobilController,
    PeminjamanMobilController,
    PengembalianMobilController,
    ProfileController,
    SewaMobilController
};
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

Route::controller(AuthController::class)->group(function () {
    Route::get('', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('postlogin', 'postlogin')->name('postlogin');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::post('profile/update/{id}', 'update')->name('profile.update');
    });
    Route::controller(ManajemenMobilController::class)->group(function () {
        Route::get('mobil-saya', 'index')->name('manajemenMobil');
        Route::post('mobil-saya/add', 'add')->name('manajemenMobil.add');
        Route::post('mobil-saya/update/{id}', 'update')->name('manajemenMobil.update');
        Route::get('mobil-saya/delete/{id}', 'delete')->name('manajemenMobil.delete');
    });
    Route::controller(SewaMobilController::class)->group(function () {
        Route::get('manajemen-mobil', 'index')->name('sewaMobil');
    });
    Route::controller(PeminjamanMobilController::class)->group(function () {
        Route::get('peminjaman-mobil', 'index')->name('peminjaman');
        Route::get('peminjaman-mobil/form-peminjaman', 'formPeminjaman')->name('peminjaman.formPeminjaman');
        Route::post('peminjaman-mobil/add', 'add')->name('peminjaman.add');
        
        // Ajax
        Route::get('peminjaman-mobil/cek-status-mobil', 'cekStatusMobil')->name('peminjaman.ajax.cekStatusMobil');
    });
    Route::controller(PengembalianMobilController::class)->group(function () {
        Route::get('pengembalian-mobil', 'index')->name('pengembalian');
        Route::get('pengembalian-mobil/form-pengembalian', 'formPengembalian')->name('pengembalian.formPengembalian');
        Route::post('pengembalian-mobil/add', 'add')->name('pengembalian.add');

        Route::get('pengembaluan-mobil/cari-data', 'cariData')->name('pengembalian.ajax.cariData');
    });
});
