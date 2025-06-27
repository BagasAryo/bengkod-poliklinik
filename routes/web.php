<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalPeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\periksaPasienController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.admin.dashboard');
});

Route::get('/pages/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('pages.admin.dashboard');

Route::resource('/pages/admin/dokter', DokterController::class)
    ->names('pages.admin.dokter');
Route::resource('/pages/admin/pasien', PasienController::class)
    ->names('pages.admin.pasien');
Route::resource('/pages/admin/poli', PoliController::class)
    ->names('pages.admin.poli');
Route::resource('pages/admin/obat', ObatController::class)
    ->names('pages.admin.obat');

Route::get('/pages/dokter/dashboard', function () {
    return view('pages.dokter.dashboard');
})->name('pages.dokter.dashboard');

Route::resource('/pages/dokter/jadwal-periksa', JadwalPeriksaController::class)
    ->names('pages.dokter.jadwal_periksa');
Route::resource('/pages/dokter/periksa-pasien', periksaPasienController::class)
    ->names('pages.dokter.periksa_pasien');