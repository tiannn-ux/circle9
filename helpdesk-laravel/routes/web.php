<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

// Publik: boleh dibuka tanpa login (Tamu)
Route::get('/', [FaqController::class, 'daftar'])->name('home');
Route::get('/faq', [FaqController::class, 'daftar'])->name('faq.daftar');

// Hanya untuk yang BELUM login (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// Hanya untuk yang SUDAH login (auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Menggunakan Authorization Gate ('kelola-faq-baru')
    Route::get('/faq/tambah', [FaqController::class, 'create'])
        ->can('kelola-faq-baru')
        ->name('faq.create');
    Route::post('/faq', [FaqController::class, 'store'])
        ->can('kelola-faq-baru')
        ->name('faq.store');

    // Menggunakan Middleware Role ('role:admin,editor') + Policy ('update', 'faq')
    Route::middleware('role:admin,editor')->group(function () {
        Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])
            ->can('update', 'faq')
            ->name('faq.edit');
        Route::put('/faq/{faq}', [FaqController::class, 'update'])
            ->can('update', 'faq')
            ->name('faq.update');
    });

    // Menggunakan Middleware Role ('role:admin') + Policy ('delete', 'faq')
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])
        ->middleware('role:admin')
        ->can('delete', 'faq')
        ->name('faq.destroy');
});