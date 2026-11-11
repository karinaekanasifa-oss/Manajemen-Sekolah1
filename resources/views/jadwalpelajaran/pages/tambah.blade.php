@extends('jadwalpelajaran.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Jadwal Pelajaran</h1>
                <p class="subtitle">Tambahkan informasi jadwal pelajaran baru.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formTambah" action="{{ route('jadwalpelajaran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="hari">
                         Hari<span class="required">*</span>
                    </label>
                    <input type="text" id="hari" name="hari" placeholder="Contoh: Senin" required>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">
                        Jam Mulai <span class="required">*</span>
                    </label>
                    <input type="time" id="jam_mulai" name="jam_mulai" required>
                </div>

                <div class="form-group">
                    <label for="jam_selesai">
                        Jam Selesai <span class="required">*</span>
                    </label>
                    <input type="time" id="jam_selesai" name="jam_selesai" required>
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">
                        Mata Pelajaran <span class="required">*</span>
                    </label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran" placeholder="Contoh: Matematika" required>
                </div>

                <div class="form-group">
                    <label for="nama_guru">
                        Nama Guru <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_guru" name="nama_guru" placeholder="Contoh: Bapak John" required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: 10A" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('jadwalpelajaran.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Tambah Jadwal Pelajaran
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
