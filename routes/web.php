<?php

use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman.table');
Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/update/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('/update/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('/delete/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
