@extends('app.main')

@section('title','Dashboard')
@section('description','Selamat datang di halaman dashboard')

@section('content')
@if(auth()->user()->role=="merchant")
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="ms-2 me-4">
                        <i class="bi bi-list-ul fs-1 text-dark"></i>
                    </div>
                    <div>
                        <h5 class="card-title d-flex align-items-center">
                            Total Menu
                        </h5>
                        <p class="card-text fs-3 fw-bold">
                            {{ $totalMenus }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('menu.index') }}" class="btn btn-dark btn-sm">Lihat</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="ms-2 me-4">
                        <i class="bi bi-cart fs-1 text-dark"></i>
                    </div>
                    <div>
                        <h5 class="card-title d-flex align-items-center">
                            Total Order
                        </h5>
                        <p class="card-text fs-3 fw-bold">
                            {{ $totalOrders }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('order.index') }}" class="btn btn-dark btn-sm">Lihat</a>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == "customer")
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="ms-2 me-4">
                        <i class="bi bi-cart fs-1 text-dark"></i>
                    </div>
                    <div>
                        <h5 class="card-title d-flex align-items-center">
                            Total Order Customer
                        </h5>
                        <p class="card-text fs-3 fw-bold">
                            {{ $totalOrderCustomers }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('order-customer.index') }}" class="btn btn-dark btn-sm">Lihat</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection