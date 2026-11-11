<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
     // klo pake use hasfactory di atasnya juga harus di panggil biar berjalan
    use HasFactory;

    protected $table = 'pengumuman'; // nama tabel di database

    // fillable untuk mengunci kolom yang kita punya
    protected $fillable = [
        'judul',
        'isi_pengumuman',
        'penulis',
        'tanggal_pengumuman',
    ];
}
