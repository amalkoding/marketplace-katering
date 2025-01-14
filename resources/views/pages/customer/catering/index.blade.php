@extends('app.main')

@section('title', 'Daftar Merchant Catering')
@section('description', 'Cari dan temukan berbagai pilihan merchant catering.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Daftar Merchant Catering</h5>
        <form action="{{ route('catering-customer.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" value="{{ old('search', $search) }}"
                placeholder="Cari Merchant Catering...">
            <button type="submit" class="btn btn-dark ms-2">Cari</button>
        </form>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($profileMerchants as $profileMerchant)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $profileMerchant->company_name }}</h5>
                        <p class="card-text">{{ $profileMerchant->description }}</p>
                        <p class="card-text text-muted">{{ $profileMerchant->address }}</p>
                        <p class="card-text">{{ $profileMerchant->contact }}</p>
                        <a href="{{ route('catering-customer.menu', ['merchant_id' => $profileMerchant->user_id]) }}"
                            class="btn btn-dark btn-sm">Lihat Menu</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection