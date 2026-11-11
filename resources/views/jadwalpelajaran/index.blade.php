<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('jadwalpelajaran.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('jadwalpelajaran.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>
