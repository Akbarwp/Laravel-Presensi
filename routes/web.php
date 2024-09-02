<?php

use App\Http\Controllers\AuthKaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => 'login-karyawan',
    'middleware' => ['guest', 'login-karyawan'],
], function () {
    Route::get('/', [AuthKaryawanController::class, 'create'])->name('login.view');
    Route::post('/', [AuthKaryawanController::class, 'store'])->name('login.auth');
});

Route::group([
    'prefix' => 'karyawan',
    'middleware' => ['karyawan'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('karyawan.dashboard');
    Route::post('/logout', [AuthKaryawanController::class, 'destroy'])->name('logout.auth');

    Route::group([
        'prefix' => 'presensi',
    ], function () {
        Route::get('/', [PresensiController::class, 'index'])->name('karyawan.presensi');
        Route::post('/', [PresensiController::class, 'store'])->name('karyawan.presensi.store');

        Route::group([
            'prefix' => 'history',
        ], function () {
            Route::get('/', [PresensiController::class, 'history'])->name('karyawan.history');
            Route::post('/search-history', [PresensiController::class, 'searchHistory'])->name('karyawan.history.search');
        });

        Route::group([
            'prefix' => 'izin',
        ], function () {
            Route::get('/', [PresensiController::class, 'pengajuanPresensi'])->name('karyawan.izin');
            Route::get('/pengajuan-presensi', [PresensiController::class, 'pengajuanPresensiCreate'])->name('karyawan.izin.create');
            Route::post('/pengajuan-presensi', [PresensiController::class, 'pengajuanPresensiStore'])->name('karyawan.izin.store');
            Route::post('/search-history', [PresensiController::class, 'searchPengajuanHistory'])->name('karyawan.izin.search');
        });
    });

    Route::group([
        'prefix' => 'profile',
    ], function () {
        Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.profile');
        Route::post('/update', [KaryawanController::class, 'update'])->name('karyawan.profile.update');
    });
});

require __DIR__.'/auth.php';
