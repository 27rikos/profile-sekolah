<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Kolom Kontak & Sosial Media -->
            <div class="col-md-4">
                <h5 class="mb-4 fw-bold">SMK Negeri 1 Siempat Rube</h5>
                <p class="mb-3">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Siempat Rube I, Siempat Rube, Kabupaten Pakpak Bharat, Sumatera Utara
                </p>
                <div class="social-links ">
                    <!-- Link ke Facebook -->
                    <a href="#" class="text-light me-3 fs-3 text-decoration-none " aria-label="Facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <!-- Link ke Instagram -->
                    <a href="#" class="text-light me-3 fs-3 text-decoration-none" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <!-- Link ke YouTube -->
                    <a href="#" class="text-light me-3 fs-3 text-decoration-none" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <!-- Link ke TikTok -->
                    <a href="#" class="text-light me-3 fs-3 text-decoration-none" aria-label="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>

            </div>

            <!-- Kolom Jurusan -->
            <div class="col-md-4">
                <h5 class="mb-4 fw-bold">Quik Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('profil-sekolah') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2"></i>
                            Profil Sekolah
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2"></i>
                            Berita
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2"></i>
                            Beranda
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom Maps -->
            <div class="col-md-4">
                <h5 class="mb-4 fw-bold">Lokasi Kami</h5>
                <div class="maps-container rounded overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.7730218771144!2d98.36294227447046!3d2.580316956386982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30302fea17ddb407%3A0xcadcddafdc49b89c!2sSMK%20Siempat%20Rube!5e0!3m2!1sen!2sid!4v1736255785844!5m2!1sen!2sid"
                        width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-top border-secondary mt-5 pt-4 text-center">
            <p class="mb-0">&copy; {{ \Carbon\Carbon::now()->year }} SMK Negeri 1 Siempat Rube. All rights reserved.
            </p>
        </div>
    </div>
</footer>
