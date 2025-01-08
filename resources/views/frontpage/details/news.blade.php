@extends('frontpage.layout.main')
@section('title')
    Detail Berita
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- Kolom pertama: Konten berita utama -->
                <div class="col-md-8">
                    <img src="{{ asset('images/berita_image/' . $news->file) }}" width="800" height="400"
                        class="img-fluid mb-3" alt="Gambar Berita Utama">
                    <h1>{{ $news->judul }}</h1>
                    <p class="text-muted mb-3">
                        {{ \Carbon\Carbon::parse($news->tanggal)->translatedFormat('l, d F Y') }}</p>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ Avatar::create($news->penulis) }}" alt="Penulis" class="rounded-circle" width="30"
                            height="30">
                        <p class="mb-0">{{ $news->penulis }}</p>
                    </div>

                    <p>
                        {!! $news->konten !!}
                    </p>
                </div>

                <!-- Kolom kedua: Berita lainnya -->
                <div class="col-md-4">
                    <h3>Berita Lainnya</h3>
                    <div class="row row-cols-1 g-3">
                        @forelse ($latest_news as $item)
                            <div class="col d-flex">
                                <img src="{{ asset('images/berita_image/' . $item->file) }}"
                                    class="flex-shrink-0 me-3 rounded object-fit-cover" width="100" height="100"
                                    alt="Gambar Berita 1">
                                <div>
                                    <h5 class="mb-1">{{ $item->judul }}</h5>
                                    <p class="text-muted small mb-1">{!! Str::limit(Strip_tags($item['konten']), 50, '...') !!}</p>
                                    <a href="{{ route('read-news', $item->slug) }}" class="text-primary small">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
