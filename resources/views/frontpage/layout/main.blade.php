<!DOCTYPE html>
<html lang="id">

@include('frontpage.partial.header')

<body>
    @include('frontpage.partial.navbar')
    <main class="min-vh-100">
        @yield('content')
    </main>
    {{-- @include('frontpage.partial.chat') --}}
    @include('frontpage.partial.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    @stack('script')
</body>

</html>
