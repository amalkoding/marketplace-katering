@extends('app.main')

@section('title', 'Dashboard')
@section('description', 'Selamat datang di halaman dashboard')

@section('content')
@if(auth()->user()->role == "admin")
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-1 mb-3">
                    <div class="icon-container py-1 px-3 rounded">
                        <i class="bi bi-person fs-3"></i>
                    </div>
                    <div>
                        <p class="fs-6 mb-0">Total User</p>
                        <h5 class="fw-bold mb-0">
                            {{ App\Models\User::whereNot('role', 'admin')->count() }} User
                        </h5>
                    </div>
                </div>
                <a href="{{ route('user.index') }}"
                    class="btn btn-primary w-100 d-flex align-items-center justify-content-between">
                    <span>Lihat Detail</span>
                    <i class="bi bi-arrow-right"></i> <!-- Icon panah -->
                </a>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == "premium")
<!-- Konten untuk premium -->
@elseif(auth()->user()->role == "user")
<!-- Konten untuk user -->
@endif
@endsection