@extends('pengumuman.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Pengumuman</h1>
                <p class="subtitle">Tambahkan informasi pengumuman baru.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('pengumuman.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">
                        Judul Pengumuman <span class="required">*</span>
                    </label>
                    <input type="text" id="judul" name="judul" placeholder="Contoh: Pengumuman Libur Akhir Tahun" required>
                </div>

                <div class="form-group">
                    <label for="isi_pengumuman">
                        Isi Pengumuman <span class="required">*</span>
                    </label>
                    <textarea id="isi_pengumuman" name="isi_pengumuman" rows="5" placeholder="Masukkan isi pengumuman..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="penulis">
                        Penulis <span class="required">*</span>
                    </label>
                    <input type="text" id="penulis" name="penulis" placeholder="Contoh: Admin Sekolah" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pengumuman">
                        Tanggal Pengumuman <span class="required">*</span>
                    </label>
                    <input type="date" id="tanggal_pengumuman" name="tanggal_pengumuman" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('pengumuman.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Tambah Pengumuman
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
