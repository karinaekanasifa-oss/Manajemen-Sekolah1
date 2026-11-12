<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
      // klo pake use hasfactory di atasnya juga harus di panggil biar berjalan
    use HasFactory;

    protected $table = 'siswas'; // nama tabel di database

    // fillable untuk mengunci kolom yang kita punya
    protected $fillable = [
        'nama_siswa',
        'nisn',
        'kelas',
        'alamat_rumah',
    ];
}
