<?php

use App\Models\Anggaran;
use App\Models\SubKodrek1;
use App\Models\SubKodrek5;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KodrekController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\SubKodrek1Controller;
use App\Http\Controllers\SubKodrek5Controller;

Route::get('/', function () {
    return view('dashboard');
});

//Rute Kodrek
Route::get('/kodrek', [KodrekController::class, 'index']);
Route::post('/kodrek/tambah', [KodrekController::class, 'store']);
Route::put('/kodrek/ubah/{id}', [KodrekController::class, 'update']);
Route::delete('/kodrek/hapus/{id}', [KodrekController::class, 'destroy']);

//Rute Subkodrek 1
Route::get('subkodrek1', [SubKodrek1Controller::class, 'index']);
Route::post('/subkodrek1/tambah', [SubKodrek1Controller::class, 'store']);
Route::put('/subkodrek1/ubah/{id}', [SubKodrek1Controller::class, 'update']);
Route::delete('/subkodrek1/hapus/{id}', [SubKodrek1Controller::class, 'destroy']);


Route::get('/anggaran', function () {
    return view('anggaran', ['anggaran' => Anggaran::get()]);
});
Route::get('/laporan', function () {
    return view('laporan');
});


Route::get('/subkodrek5', function () {
    return view('subkodrek5', ['kodrek' => SubKodrek5::get()]);
});
// Route::get('/subkodrek1', function () {
//     return view('subkodrek1', ['kodrek' => SubKodrek1::get(), 'kodrek1' => Kodrek::all()]);
// });


Route::post('/tambahsubkodrek5', [SubKodrek5Controller::class, 'store']);
Route::post('/tambahanggaran', [AnggaranController::class, 'store']);