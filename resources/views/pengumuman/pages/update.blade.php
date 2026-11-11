@extends('pengumuman.index')
@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Pengumuman</h1>
                <p class="subtitle">Perbarui informasi pengumuman Anda.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formUpdate" action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="pengumumanId" value="{{ $pengumuman->id }}">

                <div class="form-group">
                    <label for="judul">
                        Judul Pengumuman <span class="required">*</span>
                    </label>
                    {{-- Tambahkan name="judul" --}}
                    <input type="text" id="judul" name="judul" value="{{ $pengumuman->judul }}"
                    placeholder="Contoh: Pengumuman Libur Akhir Tahun" required>
                </div>

                <div class="form-group">
                    <label for="isi_pengumuman">
                        Isi Pengumuman <span class="required">*</span>
                    </label>
                    <textarea id="isi_pengumuman" name="isi_pengumuman" rows="5" placeholder="Masukkan isi pengumuman..." required>{{ $pengumuman->isi_pengumuman }}</textarea>
                </div>

                <div class="form-group">
                    <label for="penulis">
                        Penulis <span class="required">*</span>
                    </label>
                    {{-- Tambahkan name="penulis" --}}
                    <input type="text" id="penulis" name="penulis" value="{{ $pengumuman->penulis }}" placeholder="Contoh: Admin Sekolah" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pengumuman">
                        Tanggal Pengumuman <span class="required">*</span>
                    </label>
                    {{-- Tambahkan name="tanggal_pengumuman" --}}
                    <input type="date" id="tanggal_pengumuman" name="tanggal_pengumuman" value="{{ $pengumuman->tanggal_pengumuman }}" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('pengumuman.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Update Pengumuman
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
