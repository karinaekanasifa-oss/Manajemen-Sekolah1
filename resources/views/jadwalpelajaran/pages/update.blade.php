@extends('jadwalpelajaran.index')
@section('content')
   <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Jadwal Pelajaran</h1>
                <p class="subtitle">Perbarui Jadwal Pelajaran Anda.</p>
            </div>
        </header>

        <section class="card form-card">
            {{-- Perbaiki penulisan route update di sini --}}
            <form id="formUpdate" action="{{ route('jadwalpelajaran.update', $jadwal_pelajarans->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="jadwalpelajaranId" value="{{ $jadwal_pelajarans->id }}">

                <div class="form-group">
                    <label for="hari">
                        Hari <span class="required">*</span>
                    </label>
                    <input type="text" id="hari" name="hari" value="{{ $jadwal_pelajarans->hari }}"
                        placeholder="Contoh: senin" required>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">
                        Jam Mulai <span class="required">*</span>
                    </label>
                    <input type="time" id="jam_mulai" name="jam_mulai" value="{{ $jadwal_pelajarans->jam_mulai }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="jam_selesai">
                        Jam Selesai <span class="required">*</span>
                    </label>
                    {{-- Ubah dari jam_mulai ke jam_selesai --}}
                    <input type="time" id="jam_selesai" name="jam_selesai" value="{{ $jadwal_pelajarans->jam_selesai }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">
                        Mata Pelajaran <span class="required">*</span>
                    </label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran"  value="{{ $jadwal_pelajarans->mata_pelajaran }}" placeholder="Contoh: Matematika"
                        required>
                </div>

                <div class="form-group">
                    <label for="nama_guru">
                        Nama Guru <span class="required">*</span>
                    </label>
                    <input type="text" id="nama_guru" name="nama_guru"  value="{{ $jadwal_pelajarans->nama_guru }}"
                    placeholder="Contoh: Bapak John" required>
                </div>

                <div class="form-group">
                    <label for="kelas">
                        Kelas <span class="required">*</span>
                    </label>
                    {{-- Ubah dari nama_guru ke kelas --}}
                    <input type="text" id="kelas" name="kelas"  value="{{ $jadwal_pelajarans->kelas }}"
                     placeholder="Contoh: 10A" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('jadwalpelajaran.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Update Jadwal Pelajaran
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection
