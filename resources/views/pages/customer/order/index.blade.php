@extends('app.main')

@section('title','Order Customer')
@section('description','Informasi order customer.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Order Customer</h5>
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
                    @foreach($orderCustomers as $orderCustomer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $orderCustomer->user->name }}</td>
                        <td>{{ $orderCustomer->menu->name }}</td>
                        <td>{{ $orderCustomer->jumlah_porsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($orderCustomer->tanggal_pengiriman)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('order-customer.invoice', $orderCustomer->id) }}"
                                class="btn btn-dark btn-sm">Invoice</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection