@extends('aspirasi.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Aspirasi</h1>
                <p class="subtitle">Kelola dataAspirasi.</p>
            </div>
            <a href="{{ route('aspirasi.create') }}" class="btn btn-primary">
                + Tambah Aspirasi
            </a>
        </header>

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchAspirasi" class="search" placeholder="Cari Aspirasi...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengirim</th>
                            <th>Kelas</th>
                            <th>Isi Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarAspirasi">
                        @foreach ($aspirasis as $item)
                            <tr>
                                {{-- loop buat angka urut dari 1 klo ada data yg ilang langsung ke urut --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pengirim }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->isi_pesan }}</td>
                                <td>{{ $item->tanggal_kirim}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('aspirasi.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('aspirasi.destroy', $item->id) }}" method="POST"
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
