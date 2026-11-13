<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController as LoginController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilGuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\CekGuru;
use App\Http\Middleware\CekSiswa;
use Illuminate\Support\Facades\Route;

// Head HTTP
Route::get('/', function(){
    return redirect()->route('login');
});

// Login Page
Route::prefix('login')->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});

// ================= AREA GURU =================
Route::prefix('guru')->middleware([CekGuru::class])->group(function () {

    // Pengumuman
    Route::prefix('pengumuman')->group(function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman.table');
        Route::get('/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('/update/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('/update/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete('/delete/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    });

    // Jadwal Pelajaran
    Route::prefix('jadwalpelajaran')->group(function () {
        Route::get('/', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran.table');
        Route::get('/tambah', [JadwalPelajaranController::class, 'create'])->name('jadwalpelajaran.create');
        Route::post('/store', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajaran.store');
        Route::get('/update/{id}', [JadwalPelajaranController::class, 'edit'])->name('jadwalpelajaran.edit');
        Route::put('/update/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'update'])->name('jadwalpelajaran.update');
        Route::delete('/delete/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'destroy'])->name('jadwalpelajaran.destroy');
    });

});

// ================= AREA SISWA =================
Route::prefix('siswa')->middleware([CekSiswa::class])->group(function () {

    // Data Siswa
    Route::prefix('data-siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.table');
        Route::get('/tambah', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/update/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/update/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    // Aspirasi
    Route::prefix('aspirasi')->group(function () {
        Route::get('/', [AspirasiController::class, 'index'])->name('aspirasi.table');
        Route::get('/tambah', [AspirasiController::class, 'create'])->name('aspirasi.create');
        Route::post('/store', [AspirasiController::class, 'store'])->name('aspirasi.store');
        Route::get('/update/{id}', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
        Route::put('/update/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');
        Route::delete('/delete/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    });

});
