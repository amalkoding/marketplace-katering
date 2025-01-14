@extends('app.main')

@section('title', 'Edit Menu Merchant')
@section('description', 'Edit menu yang telah ditambahkan.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Edit Menu</h5>
        <a href="{{ route('menu.index') }}" class="btn btn-danger">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Menu</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $menu->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" rows="3" required>{{ old('description', $menu->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $menu->price) }}" required>
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto Menu</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo"
                    accept="image/*">
                @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($menu->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu Photo" class="img-thumbnail"
                        width="150">
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection