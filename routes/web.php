<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/save-register', [AuthController::class, 'saveRegister'])->name('saveRegister');

    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tarif', [TarifController::class, 'index'])->name('tarif.index');
    Route::post('/tarif', [TarifController::class, 'store'])->name('tarif.store');
    Route::put('/tarif/update', [TarifController::class, 'update'])->name('tarif.update');
    Route::get('/delete-tarif/{id}',[TarifController::class, 'destroy'])->name('tarif.destroy');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::put('/pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('/delete-pelanggan/{id}',[PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::post('/tagihan', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::put('/tagihan/update', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::get('/delete-tagihan/{id}',[TagihanController::class, 'destroy'])->name('tagihan.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
