@extends('app.main')

@section('title', 'Daftar Menu Catering ' . $merchant->company_name)
@section('description', 'Cari dan temukan berbagai pilihan menu catering ' . $merchant->company_name . '.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Daftar Menu Catering dari {{ $merchant->company_name }}</h5>
        <form action="{{ route('catering-customer.menu', ['merchant_id' => $merchant->id]) }}" method="GET"
            class="d-flex mt-3">
            <input type="text" name="search" class="form-control" value="{{ old('search', $search) }}"
                placeholder="Cari Menu Catering...">
            <button type="submit" class="btn btn-dark ms-2">Cari</button>
        </form>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card border-0 shadow-sm">
                    <img src="{{ asset('storage/' . $menu->photo) }}" class="card-img-top" alt="{{ $menu->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="card-text">Harga: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                        <a href="{{ route('catering-customer.order', ['menu_id' => $menu->id]) }}"
                            class="btn btn-dark btn-sm">Order</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection