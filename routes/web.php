<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KehadiranController;

Route::get('/layout', [KehadiranController::class, 'index'])->name('beranda');
Route::get('/absen', [KehadiranController::class, 'redirect'])->name('absensi');
Route::get('/tambah', [KehadiranController::class, 'create'])->name('tambah');
Route::post('/tambah', [KehadiranController::class, 'store'])->name('tambah.store');

Route::get('/', function () {
    return view('welcome');
});


