@extends('layout.app')
@section('title')
    Tambah Berita
@endsection
@push('trix')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('berita.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" name="judul" id="judul">
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori Berita</label>
                    <select name="kategori_id" id="kategori" class="form-select">
                        <option value="">Pilih Kategori Berita</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" id="penulis">
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Konten Berita</label>
                    <input id="x" type="hidden" name="konten">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Foto</label>
                    <input type="file" name="file" class="form-control" id="file" accept=".jpg,.jpeg,.png,.svg">
                </div>
                <div class="mb-3">
                    <img id="preview" src="" alt="Preview Gambar" class="img-thumbnail"
                        style="display: none; max-width: 300px; max-height: 300px;">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush
@push('script')
    <script>
        document.getElementById('file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    </script>
@endpush
