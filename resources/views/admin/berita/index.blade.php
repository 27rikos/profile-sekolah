@extends('layout.app')
@section('title')
    Berita
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

    <div class="card">
        <div class="card-header">
            <a href="{{ route('berita.create') }}" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Tambah</a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategoris?->kategori }}</td>
                            <td> <span
                                    class="badge {{ $item->status == 'publish' ? 'text-bg-success' : 'text-bg-danger' }} ">{{ $item->status }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $item->id }}">
                                        <i class="ti ti-eye"></i>
                                    </button>
                                    <a href="{{ route('publish', $item->id) }}" class="btn btn-success btn-sm">
                                        <i class="ti ti-news"></i>
                                    </a>
                                    <a href="{{ route('draft', $item->id) }}" class="btn btn-info btn-sm"><i
                                            class="ti ti-news-off"></i></a>
                                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                            class="ti ti-edit"></i></a>
                                    <form action="{{ route('berita.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        <button class=" btn btn-danger btn-sm"><i class="ti ti-trash-x"></i></button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($data as $item)
        <!-- Modal -->
        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Berita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>{{ $item->judul }}</h3>
                        <small> <span class="badge text-bg-primary">{{ $item->kategoris?->kategori }}</span> </small>
                        <p>{{ $item->penulis }}</p>
                        <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                        <img src="{{ asset('images/berita_image/' . $item->file) }}" alt="berita_images"
                            style="width: 100%">
                        {!! $item->konten !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('toast')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show());
        });
    </script>
@endpush
