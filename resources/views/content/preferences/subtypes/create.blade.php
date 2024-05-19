@extends('layouts/contentNavbarLayout')

@section('title', 'types')

@section('page-style')

@endsection

@section('page-script')

@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Sub-Kategori/</span> Create </h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Sub-Kategori </h5> <small class="text-muted float-end">Buat Baru</small>
      </div>
      <div class="card-body">
        <form method="post" action="/subtypes" enctype="multipart/form-data">
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Pekerjaan" name="name" value="{{ old('name') }}"/>
            <label for="name">Nama Sub-Kategori</label>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="food-outline" name="icon" value="{{ old('icon') }}"/>
            <label for="icon">Icon</label>
            <div class="text-danger">
                @error('icon')
                    {{ $message }}
                @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
