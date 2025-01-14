@extends('app.auth')

@section('title', 'Halaman Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Register</h5>

            <form method="POST" action="{{ route('register-process') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Daftar Sebagai</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="" selected disabled>Pilih Role</option>
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="merchant" {{ old('role') == 'merchant' ? 'selected' : '' }}>Merchant</option>
                    </select>
                    @error('role')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-dark fw-semibold">Login di
                        sini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection