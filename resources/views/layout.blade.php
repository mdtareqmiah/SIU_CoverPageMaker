<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIU Cover Page Generator')</title>
    <link rel="icon" type="image/png" href="/image/Siu.png">

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

        /* Navbar Customization */
        .navbar { 
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: #000;
            font-size: 30px;
        }

        /* Full Screen Hero/Carousel */
        .carousel-item img {
            height: 100vh; /* ফুল স্ক্রিন */
            object-fit: cover;
            filter: brightness(50%);
        }

        .carousel-caption {
            top: 40%;
            transform: translateY(-50%);
            bottom: initial !important;
        }

        /* Hero Text Shadow */
        .hero-text-shadow {
            text-shadow: 8px 4px 12px rgba(0, 0, 0, 0.9);
        }

        /* Active Button Logic CSS */
        .nav-link.active-btn {
            background-color: #000 !important;
            color: #fff !important;
            border-color: #000 !important;
        }

        .nav-link.border:hover {
            background-color: rgba(0,0,0,0.1);
            color: #000 !important;
        }

        /* Feature Cards */
        .feature-card {
            transition: transform 0.3s;
            border-radius: 15px;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }

        main { flex: 1; }

        footer {
            background: var(--primary-color);
            color: black;
            border-top: 1px solid #000;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .carousel-caption h1 {
                font-size: 1.8rem;
            }
            .carousel-caption p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light py-3 shadow sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-white hero-text-shadow" href="/">SIU Cover Page Maker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <a class="nav-link border btn ms-lg-2 mt-2 mt-lg-0 fw-bold text-white {{ Request::is('/') ? 'active-btn' : 'btn-outline-light' }}" 
                       href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border btn ms-lg-2 mt-2 mt-lg-0 fw-bold text-white {{ Request::is('form-page*') ? 'active-btn' : 'btn-outline-dark'}}" 
                       href="{{ route('show.form') }}">Make Cover Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border btn btn-outline-dark ms-lg-2 mt-2 mt-lg-0 fw-bold text-white" 
                       href="https://siu.edu.bd/" target="_blank">SIU Website</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(Request::is('/'))
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/SIUimg.webp') }}" class="d-block w-100" alt="SIU Banner">
                <div class="carousel-caption">
                    <div class="container">
                        <h1 class="fw-bold display-4 hero-text-shadow text-white">Welcome to SIU Cover Page Generator</h1>
                        <p class="lead fs-3 hero-text-shadow text-white">Create professional assignment and lab report cover pages in seconds.</p>
                        <a href="{{ route('show.form') }}" class="btn btn-warning btn-lg px-5 shadow-lg fw-bold mt-3 py-2">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center g-4">
            <h2 class="mb-4 fw-bold text-primary">Why Use This Generator?</h2>
            
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/3616/3616223.png" width="60" class="mb-3" alt="Fast">
                        <h5 class="fw-bold">Fast Generation</h5>
                        <p class="text-muted small">Just fill in the info and click generate. Your PDF is ready instantly!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" width="60" class="mb-3" alt="Standard">
                        <h5 class="fw-bold">Standard SIU Format</h5>
                        <p class="text-muted small">Designed strictly following the Sylhet International University layout.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/1865/1865273.png" width="60" class="mb-3" alt="Mobile">
                        <h5 class="fw-bold">Mobile Friendly</h5>
                        <p class="text-muted small">Generate and download your cover page directly from your phone anytime.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0 small">© {{ date('Y') }} Sylhet International University | Developed by Me</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>