<?php

use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/daftar-teknisi', [TeknisiController::class, 'daftar'])
        ->name('teknisi.daftar');

    Route::get('/tambah-teknisi', [TeknisiController::class, 'tambah'])
        ->name('teknisi.tambah');

    Route::post('/teknisi', [TeknisiController::class, 'store'])
        ->name('teknisi.store');

    Route::get('/teknisi/{teknisi}/edit', [TeknisiController::class, 'edit'])
        ->name('teknisi.edit');

    Route::put('/teknisi/{teknisi}', [TeknisiController::class, 'update'])
        ->name('teknisi.update');

    Route::delete('/teknisi/{teknisi}', [TeknisiController::class, 'destroy'])
        ->name('teknisi.destroy');
});