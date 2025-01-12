@extends('frontpage.layout.main')
@section('title')
    Video
@endsection
@section('content')
    <section>
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Dokumentasi Kegiatan</h2>
                <p class="text-muted">Berikut adalah galeri video kegiatan di SMK Negeri 1 Siempat Rube</p>
            </div>
            <div class="row g-3">
                @forelse ($video as $item)
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('images/thumbnail/' . $item->file) }}" width="300" height="200"
                                class="card-img-top object-fit-cover" alt="Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <a href="{{ $item->url }}" target="_blank" class="btn btn-primary w-100">Tonton Video</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary" role="alert">
                        Video Belum Tersedia
                    </div>
                @endforelse
            </div>
        </div>
        {{ $video->links('pagination::bootstrap-5') }}
    </section>
@endsection
