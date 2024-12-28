@extends('layout.app')
@section('title')
    Tambah Kategori
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kategori-berita.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori-berita.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori Berita</label>
                    <input type="text" class="form-control" name="kategori" id="kategori">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
