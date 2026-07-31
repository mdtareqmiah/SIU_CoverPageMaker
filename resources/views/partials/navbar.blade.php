<nav class="navbar navbar-expand-lg sticky-top premium-navbar" aria-label="Primary navigation">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}" aria-label="SIU Cover Page Maker Home">
            <span class="brand-mark" aria-hidden="true">
                <img src="{{ asset('image/Siu.png') }}" alt="SIU Logo" width="42" height="42">
            </span>
            <span class="brand-text">
                <span class="brand-title">SIU Cover Page Maker</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('show.form') ? 'active' : '' }}" href="{{ route('show.form') }}">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Create Cover Page</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://siu.edu.bd" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>University Link</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn premium-cta-btn" href="{{ route('show.form') }}">
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <span>Generate</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
