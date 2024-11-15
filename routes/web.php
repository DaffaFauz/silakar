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

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Staff Keuangan routes
    Route::middleware(['role:staff_keuangan'])->group(function () {
        Route::get('/kodrek', [KodeRekeningController::class, 'index']);
        Route::post('/kodrek/tambah', [KodeRekeningController::class, 'storeParent']);
        Route::post('/kodrek/tambahsub/{id}', [KodeRekeningController::class, 'storeChildren']);
        Route::get('/realisasi', [RealisasiController::class, 'index']);
    });

    // Anggaran route for staff_keuangan and bendahara
    Route::middleware(['role:staff_keuangan', 'role:bendahara'])->group(function () {
        Route::get('/anggaran', [AnggaranController::class, 'index']);
    });

    // Laporan route for all roles
    Route::get('/laporan', [LaporanController::class, 'index']);

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});


