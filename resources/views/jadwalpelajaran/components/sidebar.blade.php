<aside class="sidebar">
    <div class="brand">Sintesa</div>

    {{-- Menu yang hanya tampil untuk Guru --}}
    @if(Auth::user()->role === 'Guru')
        <a href="{{ route('pengumuman.table') }}" class="nav-link">Pengumuman</a>
        <a href="{{ route('jadwalpelajaran.table') }}" class="nav-link active">Jadwal Pelajaran</a>
    @endif

    {{-- Menu yang hanya tampil untuk Siswa --}}
    @if(Auth::user()->role === 'Siswa')
        <a href="{{ route('siswa.table') }}" class="nav-link">Data Siswa</a>
        <a href="{{ route('aspirasi.table') }}" class="nav-link">Aspirasi</a>
    @endif
</aside>
