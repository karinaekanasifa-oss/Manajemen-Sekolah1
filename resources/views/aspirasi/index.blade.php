<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('aspirasi.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('aspirasi.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>
