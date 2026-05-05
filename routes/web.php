<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KehadiranController;

Route::get('/layout', [KehadiranController::class, 'index']);
Route::get('/absen', [KehadiranController::class, 'redirect']);
Route::get('/tambah', [KehadiranController::class, 'create']);
Route::post('/tambah', [KehadiranController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});


