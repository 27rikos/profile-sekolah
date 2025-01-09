@extends('frontpage.layout.main')
@section('title')
    Home
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Selamat Datang di SMK Negeri 1 Siempat Rube</h1>
            <p class="lead mb-4">Membangun Generasi Unggul dan Siap Kerja di Era Digital</p>
            <a href="#event" class="btn btn-primary btn-lg">Mulai Menjelajah</a>
        </div>
    </section>

    <!-- Event Section -->
    <section class="py-5" id="event">
        <div class="container">
            <h2 class="section-title text-center">Event Terkini</h2>
            <div class="row g-4">
                @forelse ($latest_event as $item)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->event }}</h5>
                                <p class="card-text">{!! Str::limit(strip_tags($item['deskripsi']), 100, '...') !!}</p>
                                <a href="{{ route('detail-event', $item->id) }}"
                                    class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="py-5 bg-light" id="berita">
        <div class="container">
            <h2 class="section-title text-center">Berita Terbaru</h2>
            <div class="row g-4">
                @forelse ($latest_news as $item)
                    <div class="col-md-4">
                        <div class="card news-card h-100 shadow-sm">
                            <img src="{{ asset('images/berita_image/' . $item->file) }}"
                                class="card-img-top object-fit-cover" alt="berita" width="300" height="200">
                            <span class="category-badge badge bg-primary">{{ $item->kategoris?->kategori }}</span>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text"><small
                                        class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</small>
                                </p>
                                <p class="card-text"> {!! Str::limit(Strip_tags($item['konten']), 80, '...') !!}</p>
                                <a href="{{ route('read-news', $item->slug) }}" class="btn btn-outline-primary mt-3">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>
@endsection
