@extends('aspirasi.index')
@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Aspirasi</h1>
                <p class="subtitle">Perbarui Aspirasi.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formUpdate" action="{{ route('aspirasi.update', $aspirasis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="aspirasisId" value="{{ $aspirasis->id }}">

                 <div class="form-group">
                    <label for="nama_pengirim">
                        Nama Pengirim <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_pengirim" name="nama_pengirim"
                    placeholder="Contoh: Lisna" value="{{ $aspirasis->nama_pengirim }}"required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: X APAT 2"  value="{{ $aspirasis->kelas }}"required>
                </div>

                 <div class="form-group">
                    <label for="isi_pesan">
                        Isi Pesan <span class="required">*</span>
                    </label>
                    <input type="text" id="isi_pesan" name="isi_pesan" placeholder="Contoh: Sekolahnya Bagus" value="{{ $aspirasis->isi_pesan }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_kirim">
                        Tanggal <span class="required">*</span>
                    </label>
                    {{-- Tambahkan name="tanggal_kirim" --}}
                    <input type="date" id="tanggal_kirim" name="tanggal_kirim" value="{{ $aspirasis->tanggal_kirim }}" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('aspirasi.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Update Aspirasi
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
