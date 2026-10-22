<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FaqController::class, 'daftar'])->name('home');
Route::get('/faq', [FaqController::class, 'daftar'])->name('faq.daftar');

// Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route khusus user yang sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/faq/tambah', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
});
