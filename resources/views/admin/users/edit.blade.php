@extends('layout.app')
@section('title')
    Edit User
@endsection
@section('main')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users-management.index') }}" class="btn btn-primary justify-content-end"> <i
                    class="ti ti-arrow-left me-2"></i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('users-management.update', $data->id) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="">Pilih Role</option>
                        @foreach (['admin', 'users'] as $item)
                            <option value="{{ $item }}"{{ $data->role == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
