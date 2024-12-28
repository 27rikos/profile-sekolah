@extends('layout.app')
@section('title')
    Tambah Foto
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('photo.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Foto</label>
                    <input type="file" accept=".png,.jpg,.jpeg,.svg" class="form-control" name="file" id="file">
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
