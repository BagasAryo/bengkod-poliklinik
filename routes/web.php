<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pages/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('pages.admin.dashboard');

Route::resource('/pages/admin/dokter', DokterController::class)
    ->names('pages.admin.dokter');
Route::resource('/pages/admin/pasien', PasienController::class)
    ->names('pages.admin.pasien');
