@extends('siswa.index')
@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Data Siswa</h1>
                <p class="subtitle">Perbarui informasi Data Siswa.</p>
            </div>
        </header>

        <section class="card form-card">
            {{-- Ubah $siswas->id menjadi $siswa->id --}}
            <form id="formUpdate" action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="siswaId" value="{{ $siswa->id }}">

                <div class="form-group">
                    <label for="nama_siswa">
                       Nama Siswa <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}"
                   placeholder="Contoh: Renaldi Agatha" required>
                </div>

                <div class="form-group">
                    <label for="nisn">
                        Nisn <span class="required">*</span>
                    </label>
                    <input type="text" id="nisn" name="nisn" value="{{ $siswa->nisn }}" placeholder="Contoh: 0812764671" required>
                </div>

               <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" value="{{ $siswa->kelas }}"
                     placeholder="Contoh: X APHP 1" required>
                </div>

                 <div class="form-group">
                    <label for="alamat_rumah">
                       Alamat Rumah  <span class="required">*</span>
                    </label>
                    <input type="text" id="alamat_rumah" name="alamat_rumah" value="{{ $siswa->alamat_rumah }}" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('siswa.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Update Siswa
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
