<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

// Rute untuk Admin (Kelola / CRUD)
Route::get('/', [JadwalController::class, 'index']);
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

// Rute khusus untuk Pelayan / Jemaat (Hanya Lihat)
Route::get('/pelayan', [JadwalController::class, 'pelayanView'])->name('jadwal.pelayan');