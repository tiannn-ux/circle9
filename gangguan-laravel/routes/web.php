<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\GangguanController;
use App\Http\Controllers\AuthController;


//Route::get('/', function () {
//    return view('welcome');
// p});

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "Berhasil connect ke DB!";
    } catch (\Exception $e) {
        return 'Gagal connect ke DB: ' . $e->getMessage();
    }
})->withoutMiddleware('web');

Route::get('/daftar-gangguan', [GangguanController::class, 'daftar'])->name('gangguan.daftar');
Route::get('/', [GangguanController::class, 'index'])->name('home');
Route::post('/gangguan', [GangguanController::class, 'store'])->name('gangguan.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/gangguan/{gangguan}/edit', [GangguanController::class, 'edit'])->name('gangguan.edit');
Route::put('/gangguan/{gangguan}', [GangguanController::class, 'update'])->name('gangguan.update');
Route::delete('/gangguan/{gangguan}', [GangguanController::class, 'destroy'])->name('gangguan.destroy');
});