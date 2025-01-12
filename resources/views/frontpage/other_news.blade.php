@extends('frontpage.layout.main')
@section('title')
    Berita
@endsection
@section('content')
    <section>
        <div class="container mt-5">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5 text-center">
                    <h1 class="display-5 fw-bold">Berita Terkini SMK Negeri 1 Siempat Rube</h1>
                    <p class="fs-4">Dapatkan informasi terbaru mengenai kegiatan sekolah, prestasi siswa, program unggulan,
                        dan berbagai berita menarik lainnya di SMK Negeri 1 Siempat Rube.</p>
                    <p class="text-muted">Tetap terhubung dengan kami untuk selalu mengetahui perkembangan terkini!</p>
                </div>
            </div>

            <div class="row">
                @forelse ($news as $item)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Gambar Card -->
                            <img src="{{ asset('images/berita_image/' . $item->file) }}" alt="Berita"
                                class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">

                            <!-- Konten Card -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $item->judul }}</h5>
                                <p class="card-text text-muted mb-2 small">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                </p>
                                <p class="card-text text-wrap flex-grow-1">
                                    {!! Str::limit(strip_tags($item['konten']), 100, '...') !!}
                                </p>
                                <a href="{{ route('read-news', $item->slug) }}"
                                    class="btn btn-outline-primary btn-sm mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary" role="alert">
                        Berita Belum Tersedia
                    </div>
                @endforelse
            </div>
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
