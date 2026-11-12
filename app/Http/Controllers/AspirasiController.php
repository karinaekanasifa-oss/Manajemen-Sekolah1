<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    //index untuk menampilkan halaman awal
    public function index(){

       // ini buat manggil data dari model Aspirasi
        $aspirasis = Aspirasi::get();
        // pemanggilan folder pakenya titk. ga pake slice lagi /
        // setaip buat variabel baru harus masuk di compact biar bisa di panggil di view
        return view('aspirasi.pages.aspirasi', compact('aspirasis'));
    }

    // Menampilkan halaman form tambah Aspirasi
    public function create()
    {
        return view('aspirasi.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'isi_pesan' => 'required',
            'tanggal_kirim' => 'required|date',
        ]);

        // Simpan ke database menggunakan Model Aspirasi
        Aspirasi::create([
            'nama_pengirim' => $request->nama_pengirim,
            'kelas' => $request->kelas,
            'isi_pesan' => $request->isi_pesan,
            'tanggal_kirim' => $request->tanggal_kirim,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar Aspirasi
        return redirect()->route('aspirasi.table')->with('success', 'Aspirasi berhasil ditambahkan!');
    }

    // edit untuk menampilkan halaman edit data
    public function edit($id)
    {
        $aspirasis = Aspirasi::find($id);
        return view('aspirasi.pages.update', compact('aspirasis'));
    }

   public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'isi_pesan' => 'required',
            'tanggal_kirim' => 'required|date',
        ]);

        $aspirasi->update([
            'nama_pengirim' => $request->nama_pengirim,
            'kelas' => $request->kelas,
            'isi_pesan' => $request->isi_pesan,
            'tanggal_kirim' => $request->tanggal_kirim,
        ]);

        return redirect()->route('aspirasi.table')->with('success', 'Aspirasi berhasil diperbarui!');
    }

    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->route('aspirasi.table')->with('success', 'Aspirasi berhasil dihapus!');
    }
}
