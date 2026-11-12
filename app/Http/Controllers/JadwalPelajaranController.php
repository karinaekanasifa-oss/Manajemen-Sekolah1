<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JadwalPelajaran;
class JadwalPelajaranController extends Controller
{
     //index untuk menampilkan halaman awal
    public function index(){

       // ini buat manggil data dari model pengumuman
        $jadwal_pelajarans = JadwalPelajaran::get();
        // pemanggilan folder pakenya titk. ga pake slice lagi /
        // setaip buat variabel baru harus masuk di compact biar bisa di panggil di view
        return view('jadwalpelajaran.pages.jadwalpelajaran', compact('jadwal_pelajarans'));
    }

     // Menampilkan halaman form tambah pengumuman
    public function create()
    {
        return view('jadwalpelajaran.pages.tambah');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'mata_pelajaran' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        // Simpan ke database menggunakan Model Pengumuman
        JadwalPelajaran::create([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nama_guru' => $request->nama_guru,
            'kelas' => $request->kelas,
        ]);

        // Jika berhasil, kembalikan ke halaman daftar pengumuman
        return redirect()->route('jadwalpelajaran.table')->with('success', 'Jadwal pelajaran berhasil ditambahkan!');
    }

        // edit untuk menampilkan halaman edit data
    public function edit($id)
    {
        $jadwal_pelajarans = JadwalPelajaran::find($id);
        return view('jadwalpelajaran.pages.update', compact('jadwal_pelajarans'));
    }

   public function update(Request $request, JadwalPelajaran $jadwal_pelajarans)
    {
        // Validasi data inputan
        $request->validate([
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        // Update data di database
        $jadwal_pelajarans->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nama_guru' => $request->nama_guru,
            'kelas' => $request->kelas,
        ]);

        // Ubah teks 'Pengumuman' menjadi 'Jadwal pelajaran'
        return redirect()->route('jadwalpelajaran.table')->with('success', 'Jadwal pelajaran berhasil diperbarui!');
    }

     //destroy untuk menghapus data
    public function destroy(JadwalPelajaran $jadwal_pelajarans)
    {
        $jadwal_pelajarans->delete();

        // Ubah teks 'Pengumuman' menjadi 'Jadwal pelajaran'
        return redirect()->route('jadwalpelajaran.table')->with('success', 'Jadwal pelajaran berhasil dihapus!');
    }

}
