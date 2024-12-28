@extends('layout.app')
@section('title')
    Edit Video
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('videos.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('videos.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Video</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Url Video</label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $data->url }}">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Foto</label>
                    <input type="file" accept=".png,.jpg,.jpeg,.svg" class="form-control" name="file" id="file">
                </div>
                <div class="mb-3">
                    <img id="preview" src="{{ isset($data->file) ? asset('images/thumbnail/' . $data->file) : '' }}"
                        alt="Preview Gambar" class="img-thumbnail"
                        style="max-width: 300px; max-height: 300px; {{ isset($data->file) ? '' : 'display: none;' }}">
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
