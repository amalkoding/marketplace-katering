@extends('app.main')

@section('title','Menu Merchant')
@section('description','Kelola informasi menu merchant.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Menu Merchant</h5>
        <a href="{{ route('menu.create') }}" class="btn btn-dark">Tambah Menu</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>Rp {{ number_format($menu->price, 2, ',', '.') }}</td>
                        <td><img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" width="100"></td>
                        <td>
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
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