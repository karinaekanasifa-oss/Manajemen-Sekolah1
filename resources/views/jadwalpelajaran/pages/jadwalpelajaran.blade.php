@extends('jadwalpelajaran.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Jadwal Pelajaran</h1>
                <p class="subtitle">Kelola data jadwal pelajaran Anda.</p>
            </div>
            <a href="{{ route('jadwalpelajaran.create') }}" class="btn btn-primary">
                + Tambah Jadwal Pelajaran
            </a>
        </header>

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchJadwal" class="search" placeholder="Cari nama jadwal...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Ruang Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarJadwal">
                        @foreach ($jadwal_pelajarans as $item)
                            <tr>
                                {{-- loop buat angka urut dari 1 klo ada data yg ilang langsung ke urut --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selesai }}</td>
                                <td>{{ $item->mata_pelajaran }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('jadwalpelajaran.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('jadwalpelajaran.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection
