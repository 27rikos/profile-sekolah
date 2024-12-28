@extends('layout.app')
@section('title')
    Kategori Berita
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
            <a href="{{ route('kategori-berita.create') }}" class="btn btn-primary"><i
                    class="ti ti-plus me-1"></i>Tambah</a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('kategori-berita.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                                    <form action="{{ route('kategori-berita.destroy', $item->id) }}" method="post">
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
