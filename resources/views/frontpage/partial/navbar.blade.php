<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGallery" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Gallery
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownGallery">
                        <li><a class="dropdown-item" href="#">Video</a></li>
                        <li><a class="dropdown-item" href="#">Foto</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                        <li><a class="dropdown-item" href="#">Sejarah</a></li>
                        <li><a class="dropdown-item" href="#">Visi-Misi</a></li>
                        <li><a class="dropdown-item" href="#">Fasilitas</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex flex-column flex-lg-row gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light mb-2 mb-lg-0">Sign In</a>
                <a href="#signup" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
