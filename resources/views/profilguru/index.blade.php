<!DOCTYPE html>
<html lang="en">

{{-- bagian head--}}
@include('profilguru.partials.head')

<body>
    <div class="app">
        {{-- bagian sidebar --}}
        @include('profilguru.components.sidebar')

            {{-- bagian konten --}}
            @yield('content')
    </div>
</body>
</html>
