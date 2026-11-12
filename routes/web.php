<?php

// ==========================================
// IMPORT CONTROLLERS DAN MIDDLEWARE
// ==========================================
// Mengimpor kelas controller dan middleware yang akan digunakan di dalam rute web
use App\Http\Middleware\CekSiswa;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController as LoginController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilGuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\CekGuru;
use Illuminate\Support\Facades\Route;

// Mengarahkan pengguna secara otomatis ke halaman login saat pertama kali membuka web
Route::get('/', function(){
    return redirect()->route('login');
});


// Mengatur halaman form login dan proses autentikasi data login
Route::prefix('login')->group(function(){
    // Menampilkan halaman form login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    // Memproses data yang dikirim dari form login
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});


// area guru
// Hanya bisa diakses jika status login role 'Guru' karna menggunakan middleware cek guru
Route::prefix('guru')->middleware([CekGuru::class])->group(function () {

    // --- Pengelolaan Pengumuman ---
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.table');
    Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/update/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/update/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/delete/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    // --- Pengelolaan Jadwal Pelajaran ---
    Route::get('/jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran.table');
    Route::get('/jadwalpelajaran/tambah', [JadwalPelajaranController::class, 'create'])->name('jadwalpelajaran.create');
    Route::post('/jadwalpelajaran/store', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajaran.store');
    Route::get('/jadwalpelajaran/update/{id}', [JadwalPelajaranController::class, 'edit'])->name('jadwalpelajaran.edit');
    Route::put('/jadwalpelajaran/update/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'update'])->name('jadwalpelajaran.update');
    Route::delete('/jadwalpelajaran/delete/{jadwal_pelajarans}', [JadwalPelajaranController::class, 'destroy'])->name('jadwalpelajaran.destroy');

});

// untuk siswa
// Hanya bisa diakses jika status login rolenya  'Siswa'
Route::prefix('siswa')->middleware([CekSiswa::class])->group(function () {

    // --- Pengelolaan Data Siswa ---
    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('siswa.table');
    Route::get('/data-siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/data-siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/data-siswa/update/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/data-siswa/update/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/data-siswa/delete/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // --- Pengelolaan Aspirasi Siswa ---
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.table');
    Route::get('/aspirasi/tambah', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/store', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('/aspirasi/update/{id}', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('/aspirasi/update/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');
    Route::delete('/aspirasi/delete/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');

});
