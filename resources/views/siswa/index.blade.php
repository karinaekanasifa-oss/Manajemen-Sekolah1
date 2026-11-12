<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('siswa.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('siswa.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>
