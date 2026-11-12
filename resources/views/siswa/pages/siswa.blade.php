@extends('siswa.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Data Siswa</h1>
                <p class="subtitle">Kelola data siswa.</p>
            </div>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </header>

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchSiswa" class="search" placeholder="Cari nama siswa...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Kelas</th>
                            <th>ALamat Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarProfilGuru">
                        @foreach ($siswas as $item)
                            <tr>
                                {{-- loop buat angka urut dari 1 klo ada data yg ilang langsung ke urut --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->alamat_rumah }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('siswa.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('siswa.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">Hapus</button>
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
