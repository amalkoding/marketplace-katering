@extends('app.main')

@section('title', 'Tambah Order Merchant')
@section('description', 'Tambah order baru untuk merchant.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Tambah Order</h5>
        <a href="{{ route('order.index') }}" class="btn btn-danger">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Customer</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" disabled selected>Pilih Customer</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="menu_id" class="form-label">Nama Menu</label>
                <select class="form-select" id="menu_id" name="menu_id" required>
                    <option value="" disabled selected>Pilih Menu</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_porsi" class="form-label">Jumlah Porsi</label>
                <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi" required min="1">
            </div>

            <div class="mb-3">
                <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" required>
            </div>

            <button type="submit" class="btn btn-dark">Tambah Order</button>
        </form>
    </div>
</div>
@endsection