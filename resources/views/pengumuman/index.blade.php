<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('pengumuman.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('pengumuman.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>
 