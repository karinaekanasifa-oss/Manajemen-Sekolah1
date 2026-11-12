@extends('aspirasi.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Aspirasi</h1>
                <p class="subtitle">Tambahkan aspirasi.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('aspirasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_pengirim">
                        Nama Pengirim <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_pengirim" name="nama_pengirim" placeholder="Contoh: Lisna" required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: X APAT 2" required>
                </div>

                <div class="form-group">
                    <label for="isi_pesan">
                        Isi Pesan <span class="required">*</span>
                    </label>
                    <input type="text" id="isi_pesan" name="isi_pesan" placeholder="Contoh: Sekolahnya Bagus" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_kirim">
                        Tanggal <span class="required">*</span>
                    </label>
                    <input type="date" id="tanggal_kirim" name="tanggal_kirim" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('aspirasi.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Tambah Aspirasi
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
