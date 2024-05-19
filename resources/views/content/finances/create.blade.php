@extends('layouts/contentNavbarLayout')

@section('title', 'Financial')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Account/</span> Tambah Account</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Account</h5> <small class="text-muted float-end">Buat Baru</small>
      </div>
      <div class="card-body">
        <form method="post" action="/cards" enctype="multipart/form-data">
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" placeholder="Pemasukan" name="name" value="{{ old('name') }}"/>
            <label for="name">Account Name</label>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="#000000" name="color" value="{{ old('color') }}"/>
            <label for="color">Color</label>
            <div class="text-danger">
                @error('color')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="credit-card" name="icon" value="{{ old('icon') }}"/>
            <label for="icon">Icon</label>
            <div class="text-danger">
                @error('icon')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Total" aria-label="Amount (to the nearest dollar)" name="amount" value="{{ old('amount') }}"/>
            <span class="input-group-text">.00</span>
          </div>
          <div class="mb-4 text-danger">
            @error('amount')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100" id="description" placeholder="Keterangan" name="description">{{ old('description') }}</textarea>
            <label for="description">Keterangan</label>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
