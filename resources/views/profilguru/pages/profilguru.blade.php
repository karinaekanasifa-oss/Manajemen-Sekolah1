@extends('profilguru.index')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Profil Guru</h1>
                <p class="subtitle">Kelola data profil guru.</p>
            </div>
            <a href="" class="btn btn-primary">
                + Tambah Profil
            </a>
        </header>

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchProfilGuru" class="search" placeholder="Cari nama guru...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Nip</th>
                            <th>Bidang Studi</th>
                            <th>No Telpon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarProfilGuru">
                        @foreach ($profil_gurus as $item)
                            <tr>
                                {{-- loop buat angka urut dari 1 klo ada data yg ilang langsung ke urut --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->bidang_studi }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="">Edit</a>
                                    <form action="" method="POST"
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
