@extends('app.main')

@section('title','Order Merchant')
@section('description','Kelola informasi order merchant.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Order Merchant</h5>
        <a href="{{ route('order.create') }}" class="btn btn-dark">Tambah Order</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Menu</th>
                        <th>Jumlah Porsi</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->menu->name }}</td>
                        <td>{{ $order->jumlah_porsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->tanggal_pengiriman)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-dark btn-sm">Invoice</a>
                            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" id="delete-btn" class="btn btn-outline-dark btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection