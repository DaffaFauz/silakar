<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\KodeRekeningController;

// Rute Login
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Staff Keuangan routes
    Route::middleware(['role:staff_keuangan'])->group(function () {
        // Rute Kode Rekening
        Route::get('/kodrek', [KodeRekeningController::class, 'index']);
        Route::post('/kodrek/tambah', [KodeRekeningController::class, 'storeParent']);
        Route::post('/kodrek/tambahsub/{id}', [KodeRekeningController::class, 'storeChildren']);
        Route::put('/kodrek/ubah/{id}', [KodeRekeningController::class, 'update']);
        Route::delete('/kodrek/hapus/{id}', [KodeRekeningController::class, 'destroy']);
        
        // Rute Anggaran
        Route::get('/anggaran', [AnggaranController::class, 'index']);
        Route::post('/anggaran/generate', [AnggaranController::class, 'generateAnggaran']);
        Route::put('/anggaran/ubah/{id}', [AnggaranController::class, 'update']);

        // Rute Realisasi
        Route::get('/realisasi', [RealisasiController::class, 'index']);
        Route::post('/realisasi/generate', [RealisasiController::class, 'generate']);
        Route::put('/realisasi/update/{id}', [RealisasiController::class, 'update']);
    });

    Route::middleware(['role:staff_keuangan|bendahara'])->group(function () {
        // Route::get('/anggaran', [AnggaranController::class, 'index']);
    });

    // Laporan route for all roles
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan/realisasi/{bulan}/{tahun}', [LaporanController::class, 'detailRealisasi'])->name('laporan.detail');


    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});