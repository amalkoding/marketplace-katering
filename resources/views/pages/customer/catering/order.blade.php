@extends('app.main')

@section('title', 'Order Menu Catering ' . $menu->name)
@section('description', 'Order menu catering ' . $menu->name . '.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0">
        <h5 class="card-title">Order Menu Catering: {{ $menu->name }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('storage/' . $menu->photo) }}" class="img-fluid rounded" alt="{{ $menu->name }}">
            </div>
            <div class="col-lg-6">
                <p><strong>Deskripsi:</strong> {{ $menu->description }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

                <form action="{{ route('catering-customer.ordersubmit', ['menu_id' => $menu->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Order</label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror" min="1"
                            value="{{ old('jumlah', 1) }}" required>

                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                        <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman"
                            class="form-control @error('tanggal_pengiriman') is-invalid @enderror"
                            value="{{ old('tanggal_pengiriman') }}" required>

                        @error('tanggal_pengiriman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm">Order Sekarang</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection