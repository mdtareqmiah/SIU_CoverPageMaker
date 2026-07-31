<nav class="navbar navbar-expand-lg navbar-light py-3 shadow sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-white hero-text-shadow" href="{{ route('home') }}">SIU Cover Page Maker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <a class="nav-link border btn ms-lg-2 mt-2 mt-lg-0 fw-bold text-white {{ Request::routeIs('home') ? 'active-btn' : 'btn-outline-light' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border btn ms-lg-2 mt-2 mt-lg-0 fw-bold text-white {{ Request::routeIs('show.form') ? 'active-btn' : 'btn-outline-dark' }}"
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
