<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App') - Portal Berita</title>

    {{-- CSS buatan sendiri (file: public/css/style.css) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            &copy; {{ date('Y') }} Portal Berita Sederhana
        </footer>
    </div>
</body>
</html>
