<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Generate professional academic cover page PDFs for assignments and lab reports.">
    <title>@yield('title', 'SIU Cover Page Generator')</title>
    <link rel="icon" type="image/png" href="{{ asset('image/Siu.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="app-body">
    <header>
        @include('partials.navbar')
    </header>

    <main class="site-main">
        @yield('content')
    </main>

    <footer>
        @include('partials.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/js/app.js')
</body>
</html>