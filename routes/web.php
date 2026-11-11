<?php

use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilGuruController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.table');
Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/update/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('/update/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('/delete/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

//jadwal pelajaran
Route::get('/jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran.table');
Route::get('/jadwalpelajaran/tambah', [JadwalPelajaranController::class, 'create'])->name('jadwalpelajaran.create');
Route::post('/jadwalpelajaran/store', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajaran.store');;
Route::get('/update/update/{id}', [JadwalPelajaranController::class, 'edit'])->name('jadwalpelajaran.edit');
Route::put('/update/{jadwalpelajaran}', [JadwalPelajaranController::class, 'update'])->name('jadwalpelajaran.update');
Route::delete('/delete/{jadwalpelajaran}', [JadwalPelajaranController::class, 'destroy'])->name('jadwalpelajaran.destroy');

//profilguru
Route::get('/profilguru', [ProfilGuruController::class, 'index'])->name('profilguru.table');
