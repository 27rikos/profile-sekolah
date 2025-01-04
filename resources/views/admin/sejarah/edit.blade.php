@extends('layout.app')
@section('title')
    Edit Sejarah
@endsection
@push('trix')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('profile') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('history.update', $data->id) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="history" class="form-label">Sejarah Sekolah</label>
                    <input id="x" type="hidden" name="history" value="{!! $data->history !!}">
                    <trix-editor input="x"></trix-editor>
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
