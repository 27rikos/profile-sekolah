@extends('frontpage.layout.main')
@section('title')
    Profil Sekolah
@endsection
@section('content')
    <section>
        <div class="container mt-5">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Informasi SMK Negeri 1 Siempat Rube</h1>
                    <p class="fs-4">Berikut ini adalah informasi mulai dari sejarah,visi-misi dan fasilitas sekolah</p>
                </div>
            </div>
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="schoolTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah"
                        type="button" role="tab" aria-controls="sejarah" aria-selected="true">
                        Sejarah
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="visi-misi-tab" data-bs-toggle="tab" data-bs-target="#visi-misi"
                        type="button" role="tab" aria-controls="visi-misi" aria-selected="false">
                        Visi & Misi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="fasilitas-tab" data-bs-toggle="tab" data-bs-target="#fasilitas"
                        type="button" role="tab" aria-controls="fasilitas" aria-selected="false">
                        Fasilitas
                    </button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content mt-3" id="schoolTabsContent">
                <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="sejarah-tab">
                    <h3>Sejarah Sekolah</h3>
                    <p>
                        @forelse ($sejarah as $item)
                            {!! $item->history !!}
                        @empty
                        @endforelse
                    </p>
                </div>
                <div class="tab-pane fade" id="visi-misi" role="tabpanel" aria-labelledby="visi-misi-tab">
                    @forelse ($goal as $item)
                        <h3>Visi & Misi</h3>
                        <p><strong>Visi:</strong>{!! $item->visi !!}</p>
                        <p><strong>Misi:</strong></p>
                        {!! $item->misi !!}
                    @empty
                    @endforelse
                </div>
                <div class="tab-pane fade" id="fasilitas" role="tabpanel" aria-labelledby="fasilitas-tab">
                    <h3>Fasilitas</h3>
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Keterangan</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
