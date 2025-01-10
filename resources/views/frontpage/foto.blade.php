@extends('frontpage.layout.main')
@section('title')
    Foto
@endsection
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Dokumentasi Kegiatan</h2>
                <p class="text-muted">Berikut adalah galeri foto kegiatan di SMK Negeri 1 Siempat Rube</p>
            </div>
            <div class="row">
                @forelse ($foto as $item)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <!-- Foto -->
                            <img src="{{ asset('images/foto_gallery/' . $item->file) }}" alt="{{ $item->title }}"
                                class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                            <!-- Konten -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text text-muted">{!! Str::limit(strip_tags($item->deskripsi), 100, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada dokumentasi yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
        {{ $foto->links('pagination::bootstrap-5') }}
    </section>
@endsection
