@extends('layout.app')
@section('title')
    Foto
@endsection
@section('main')
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
        @if (session('success'))
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('photo.create') }}" class="btn btn-primary me-2"><i class="ti ti-plus me-1"></i>Tambah</a>
    </div>
    <div class="row g-4">
        @forelse ($data as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="{{ asset('images/foto_gallery/' . $item->file) }}" height="190"
                        class="card-img-top object-fit-cover" alt="{{ $item->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('photo.edit', $item->id) }}" class="btn btn-primary"><i
                                    class="ti ti-edit"></i></a>
                            <form action="{{ route('photo.destroy', $item->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="ti ti-trash-x"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-primary mt-lg-5" role="alert">
                    Foto Belum Tersedia
                </div>
            </div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
@endsection
