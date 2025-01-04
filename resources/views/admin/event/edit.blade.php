@extends('layout.app')
@section('title')
    Edit Event
@endsection
@push('trix')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('event.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('event.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="event" class="form-label">Nama Acara</label>
                    <input type="text" class="form-control" name="event" id="event" value="{{ $data->event }}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Acara</label>
                    <input id="x" type="hidden" name="deskripsi" value="{!! $data->deskripsi !!}">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $data->tanggal }}">
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
