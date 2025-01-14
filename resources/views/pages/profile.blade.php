@extends('app.main')

@section('title','Profil')
@section('description','Perbarui informasi profil anda')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0">
        <h5 class="card-title">Profil</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('profile-update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ auth()->user()->name }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ auth()->user()->email }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Kosongkan jika tidak ingin mengubah">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation"
                    placeholder="Masukkan ulang password jika diubah">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection