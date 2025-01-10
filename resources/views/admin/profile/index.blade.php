@extends('layout.app')
@section('title', 'Profile')

@section('main')
    {{-- Toast Notifications --}}
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

    {{-- Tab Navigation --}}
    <ul class="nav nav-tabs mt-4" id="profileTab" role="tablist">
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

    {{-- Tab Content --}}
    <div class="tab-content p-3 border rounded-bottom" id="profileTabContent">
        {{-- Sejarah Tab --}}
        <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="sejarah-tab">
            <div class="d-flex justify-content-end gap-2 my-3">
                @if ($histories->isEmpty())
                    <a href="{{ route('history.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>Tambah
                    </a>
                @else
                    <a href="{{ route('history.edit', $histories[0]->id) }}" class="btn btn-info">
                        <i class="ti ti-edit me-1"></i>Edit
                    </a>
                    <a href="{{ route('history.destroy', $histories[0]->id) }}" class="btn btn-danger">
                        <i class="ti ti-trash-x me-1"></i>Hapus
                    </a>
                @endif
            </div>
            <p>
                @forelse ($histories as $item)
                    {!! $item->history !!}
                @empty
                    <div class="alert alert-primary" role="alert">
                        Sejarah Sekolah Belum Tersedia
                    </div>
                @endforelse
            </p>
        </div>

        {{-- Visi-Misi Tab --}}
        <div class="tab-pane fade" id="visi-misi" role="tabpanel" aria-labelledby="visi-misi-tab">
            <div class="d-flex justify-content-end gap-2 my-3">
                @if ($goals->isEmpty())
                    <a href="{{ route('goals.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>Tambah
                    </a>
                @else
                    <a href="{{ route('goals.edit', $goals[0]->id) }}" class="btn btn-info">
                        <i class="ti ti-edit me-1"></i>Edit
                    </a>
                    <a href="{{ route('goals.destroy', $goals[0]->id) }}" class="btn btn-danger">
                        <i class="ti ti-trash-x me-1"></i>Hapus
                    </a>
                @endif
            </div>
            <p>
                @forelse ($goals as $item)
                    <strong>Visi:</strong> {!! $item->visi !!}<br>
                    <strong>Misi:</strong> {!! $item->misi !!}
                @empty
                    <div class="alert alert-primary" role="alert">
                        Visi dan Misi Belum Tersedia
                    </div>
                @endforelse
            </p>
        </div>

        {{-- Fasilitas Tab --}}
        <div class="tab-pane fade" id="fasilitas" role="tabpanel" aria-labelledby="fasilitas-tab">
            <div class="my-3">
                <a href="{{ route('facility.create') }}" class="btn btn-primary"> <i class="ti ti-plus me-1"></i>Tambah</a>
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/fasilitas_image/' . $item->file) }}" alt="Fasilitas"
                                        width="300" height="300" class="object-fit-cover img-fluid rounded"
                                        srcset="">
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('facility.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                                        <form action="{{ route('facility.destroy', $item->id) }}" method="post">
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
    </div>
@endsection
