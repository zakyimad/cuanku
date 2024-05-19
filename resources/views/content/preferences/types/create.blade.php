@extends('layouts/contentNavbarLayout')

@section('title', 'types')

@section('page-style')

@endsection

@section('page-script')
    <script>
        $(function () {
            $('#color').colorpicker();
        });
    </script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Kategori/</span> Create </h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Kategori </h5> <small class="text-muted float-end">Buat Baru</small>
      </div>
      <div class="card-body">
        <form method="post" action="/types" enctype="multipart/form-data">
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Kebutuhan" name="name" value="{{ old('name') }}"/>
            <label for="name">Nama Kategori</label>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="primary | #FFFFFF" name="color" value="{{ old('color') }}"/>
                    <label for="color">Input Warna</label>
                </div>
            <div class="text-danger">
                @error('color')
                    {{ $message }}
                @enderror
            </div>
            </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center">
                <p>atau</p>
            </div>
            <div class="col-md-3 justify-content-center align-items-center">
                <div class="input-group mt-1 mb-4">
                    <span class="input-group-text"><i class="mdi mdi-pencil mdi-10px"></i></span>
                    <input type="color" class="form-control form-control-color" id="color2" value="#000000" title="Pilih Warna" name="color2">
                </div>
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
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" placeholder="0.3" name="percentage" value="{{ old('percentage') }}"/>
            <label for="perecentage">Persentase</label>
            <div class="text-danger">
                @error('percentage')
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
