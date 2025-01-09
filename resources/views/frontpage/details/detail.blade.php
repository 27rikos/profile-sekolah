@extends('frontpage.layout.main')
@section('title')
    Detail Event
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- Kolom pertama: Konten berita utama -->
                <div class="col-md-8">
                    <h1>{{ $event->event }}</h1>
                    <p class="text-muted mb-3">
                        {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('l, d F Y') }}</p>
                    <p>
                        <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_facebook_messenger"></a>
                        <a class="a2a_button_telegram"></a>
                        <a class="a2a_button_x"></a>
                    </div>
                    <script defer src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                    {!! $event->deskripsi !!}
                    </p>
                </div>

                <!-- Kolom kedua: Berita lainnya -->
                <div class="col-md-4">
                    <h3>Event Terkini</h3>
                    <div class="row row-cols-1 g-3">
                        @forelse ($latest_event as $item)
                            <div class="col d-flex">
                                <div>
                                    <h5 class="mb-1">{{ $item->event }}</h5>
                                    <p class="text-muted small mb-1">{!! Str::limit(Strip_tags($item['deskripsi']), 100, '...') !!}</p>
                                    <a href="{{ route('detail-event', $item->id) }}" class="text-primary small">Baca
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
