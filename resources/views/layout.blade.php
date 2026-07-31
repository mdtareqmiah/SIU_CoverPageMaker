<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIU Cover Page Generator')</title>
    <link rel="icon" type="image/png" href="{{ asset('image/Siu.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4fc7d2;
            --dark-color: #333;
        }

        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #000;
            font-size: 30px;
        }

        .nav-link.active-btn {
            background-color: #000 !important;
            color: #fff !important;
            border-color: #000 !important;
        }

        .nav-link.border:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: #000 !important;
        }

        main {
            flex: 1;
        }

        footer {
            background: var(--primary-color);
            color: black;
            border-top: 1px solid #000;
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('partials.navbar')

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>