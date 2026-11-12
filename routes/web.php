<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController as LoginController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilGuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\CekGuru;
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

// ================= AREA GURU  =================
// Menggunakan middleware CekGuru untuk hak akses guru
Route::prefix('guru')->middleware([CekGuru::class])->group(function () {

    // Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.table');
    Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/update/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/update/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/delete/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    // Jadwal Pelajaran
    Route::get('/jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran.table');
    Route::get('/jadwalpelajaran/tambah', [JadwalPelajaranController::class, 'create'])->name('jadwalpelajaran.create');
    Route::post('/jadwalpelajaran/store', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajaran.store');
    Route::get('/jadwalpelajaran/update/{id}', [JadwalPelajaranController::class, 'edit'])->name('jadwalpelajaran.edit');
    Route::put('/jadwalpelajaran/update/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'update'])->name('jadwalpelajaran.update');
    Route::delete('/jadwalpelajaran/delete/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'destroy'])->name('jadwalpelajaran.destroy');

});

// ================= AREA SISWA  =================
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa.table');
    Route::get('/tambah', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/update/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/update/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

   // ================= ASPIRASI =================
Route::prefix('aspirasi')->group(function () {
    Route::get('/', [AspirasiController::class, 'index'])->name('aspirasi.table');
    Route::get('/tambah', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/store', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('/update/{id}', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('/update/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');
    Route::delete('/delete/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});
