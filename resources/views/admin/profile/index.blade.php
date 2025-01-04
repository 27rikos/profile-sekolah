@extends('layout.app')
@section('title')
    Profile
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
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah" type="button"
                role="tab" aria-controls="sejarah" aria-selected="true">Sejarah</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="visi-misi-tab" data-bs-toggle="tab" data-bs-target="#visi-misi" type="button"
                role="tab" aria-controls="visi-misi" aria-selected="false">Visi-Misi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="fasilitas-tab" data-bs-toggle="tab" data-bs-target="#fasilitas" type="button"
                role="tab" aria-controls="fasilitas" aria-selected="false">Fasilitas</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="sejarah-tab">
            <div class="mt-3">
                <div class="d-flex justify-content-end gap-2">
                    @if ($data->isEmpty())
                        <a href="{{ route('history.create') }}" class="btn btn-primary"><i
                                class="ti ti-plus me-1"></i>Tambah</a>
                    @endif
                    @if (isset($data[0]))
                        <a href="{{ route('history.edit', $data[0]) }}" class="btn btn-info"><i
                                class="ti ti-edit me-1"></i>Edit</a>
                        <a href="{{ route('history.destroy', $data[0]->id) }}" class="btn btn-danger"><i
                                class="ti ti-trash-x me-1"></i>Hapus</a>
                </div>
                @endif
            </div>
            <p>
                @forelse ($data as $item)
                    {!! $item->history !!}
                @empty
                    <div class="alert alert-primary" role="alert">
                        Sejarah Sekolah Belum Tersedia
                    </div>
                @endforelse
            </p>
        </div>
        <div class="tab-pane fade" id="visi-misi" role="tabpanel" aria-labelledby="visi-misi-tab">
            <p>Isi informasi tentang visi dan misi di sini.</p>
        </div>
        <div class="tab-pane fade" id="fasilitas" role="tabpanel" aria-labelledby="fasilitas-tab">
            <p>Isi informasi tentang fasilitas di sini.</p>
        </div>
    </div>
@endsection
