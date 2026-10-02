<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TentangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo dari Laravel! Ini pertemuan ke-2.';
});

Route::get('/profil', [ProfilController::class, 'index']);

Route::get('/mahasiswa/{nim}', function ($nim) {
    return 'NIM: ' . $nim;
})->where('nim', '[0-9]+');



Route::get('/sapa', [ProfilController::class, 'formSapa']);
Route::post('/sapa', [ProfilController::class, 'prosesSapa']);
Route::get('/tentang', [ProfilController::class, 'tentang']);
Route::get('/tentang', [TentangController::class, 'index']);

Route::get('/nilai', [MahasiswaController::class, 'index']);
Route::post('/nilai/hitung', [MahasiswaController::class, 'hitung']);