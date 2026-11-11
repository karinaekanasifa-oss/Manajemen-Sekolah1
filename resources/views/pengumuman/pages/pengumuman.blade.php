@extends('pengumuman.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Pengumuman</h1>
                <p class="subtitle">Kelola data pengumuman Anda.</p>
            </div>
            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                + Tambah Pengumuman
            </a>
        </header>

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchPengumuman" class="search" placeholder="Cari nama pengumuman...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarPengumuman">
                        @foreach ($pengumuman as $item)
                            <tr>
                                {{-- loop buat angka urut dari 1 klo ada data yg ilang langsung ke urut --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->isi_pengumuman }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->tanggal_pengumuman }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('pengumuman.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST"
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
