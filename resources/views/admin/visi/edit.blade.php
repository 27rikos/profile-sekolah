@extends('layout.app')
@section('title')
    Edit Visi
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
            <form action="{{ route('goals.update', $data->id) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    <input id="x" type="hidden" name="visi" value="{!! $data->visi !!}">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="misi" class="form-label">Misi</label>
                    <input id="y" type="hidden" name="misi" value="{!! $data->misi !!}">
                    <trix-editor input="y"></trix-editor>
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
