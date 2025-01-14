@extends('app.auth')

@section('title', 'Halaman Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Login</h5>

            <form method="POST" action="{{ route('login-process') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
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

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>

            <!-- Link Register -->
            <div class="text-center mt-3">
                <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}"
                        class="text-dark fw-semibold">Register di sini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection