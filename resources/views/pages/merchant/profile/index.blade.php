@extends('app.main')

@section('title','Profil Merchant')
@section('description','Kelola informasi profil merchant.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0">
        <h5 class="card-title">Profil Merchant</h5>
    </div>
    <div class="card-body">
        @if($profileMerchant)
        <form action="{{ route('merchant.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="company_name" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    name="company_name" value="{{ $profileMerchant->company_name }}" required>
                @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    rows="3" required>{{ $profileMerchant->address }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Kontak</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact"
                    name="contact" value="{{ $profileMerchant->contact }}" required>
                @error('contact')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" rows="4">{{ $profileMerchant->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </form>
        @else
        <form action="{{ route('merchant.profile.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="company_name" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    name="company_name" value="{{ old('company_name') }}" required>
                @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Kontak</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact"
                    name="contact" value="{{ old('contact') }}" required>
                @error('contact')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Simpan</button>
        </form>
        @endif
    </div>
</div>
@endsection