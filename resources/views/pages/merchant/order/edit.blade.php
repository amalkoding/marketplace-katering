@extends('app.main')

@section('title', 'Edit Order Merchant')
@section('description', 'Edit order yang telah ditambahkan.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Edit Order</h5>
        <a href="{{ route('order.index') }}" class="btn btn-danger">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Customer</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" disabled>Pilih Customer</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="menu_id" class="form-label">Nama Menu</label>
                <select class="form-select" id="menu_id" name="menu_id" required>
                    <option value="" disabled>Pilih Menu</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $menu->id == $order->menu_id ? 'selected' : '' }}>
                        {{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_porsi" class="form-label">Jumlah Porsi</label>
                <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi"
                    value="{{ $order->jumlah_porsi }}" required min="1">
            </div>

            <div class="mb-3">
                <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman"
                    value="{{ $order->tanggal_pengiriman }}" required>
            </div>

            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection