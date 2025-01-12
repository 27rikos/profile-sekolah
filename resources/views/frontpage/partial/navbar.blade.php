<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <span class="d-none d-lg-inline">SMK Negeri 1 Siempat Rube</span>
            <span class="d-inline d-lg-none">SMK Siempat Rube</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-2">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('other-news') }}" class="nav-link" href="#berita">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGallery" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Gallery
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownGallery">
                        <li><a class="dropdown-item" href="{{ route('video') }}">Video</a></li>
                        <li><a class="dropdown-item" href="{{ route('foto') }}">Foto</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil-sekolah') }}" class="nav-link" href="#berita">Profile</a>
                </li>
            </ul>
            <div class="d-flex flex-column flex-lg-row gap-2">
                @auth
                    <!-- User is logged in -->
                    <div class="dropdown">
                        <a class="dropdown-toggle text-decoration-none text-light" href="#" role="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="User Profile"
                                class="rounded-circle" style="width: 30px; height: 30px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item " href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <!-- User is not logged in -->
                    <a href="{{ route('login') }}" class="btn btn-outline-light mb-2 mb-lg-0">Sign In</a>
                    <a href="{{ route('registration') }}" class="btn btn-primary">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
