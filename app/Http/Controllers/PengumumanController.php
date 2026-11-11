<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    //index untuk menampilkan halaman awal
    public function index(){

       // ini buat manggil data dari model pengumuman
        $pengumuman = Pengumuman::get();
        // pemanggilan folder pakenya titk. ga pake slice lagi /
        // setaip buat variabel baru harus masuk di compact biar bisa di panggil di view
        return view('pengumuman.pages.pengumuman', compact('pengumuman'));
    }

    // Menampilkan halaman form tambah pengumuman
    public function create()
    {
        return view('pengumuman.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required',
            'penulis' => 'required|string|max:255',
            'tanggal_pengumuman' => 'required|date',
        ]);

        // Simpan ke database menggunakan Model Pengumuman
        Pengumuman::create([
            'judul' => $request->judul,
            'isi_pengumuman' => $request->isi_pengumuman,
            'penulis' => $request->penulis,
            'tanggal_pengumuman' => $request->tanggal_pengumuman,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar pengumuman
        return redirect()->route('pengumuman.table')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // edit untuk menampilkan halaman edit data
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.pages.update', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        // Validasi data inputan
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'penulis' => 'required|string|max:255',
            'tanggal_pengumuman' => 'required|date',
        ]);

        // Update data di database menggunakan Model Pengumuman
        $pengumuman->update([
            'judul' => $request->judul,
            'isi_pengumuman' => $request->isi_pengumuman,
            'penulis' => $request->penulis,
            'tanggal_pengumuman' => $request->tanggal_pengumuman,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar pengumuman
        return redirect()->route('pengumuman.table')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    //destroy untuk menghapus data
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('pengumuman.table')->with('success', 'Pengumuman berhasil dihapus!');
    }
}
