@extends('layouts/contentNavbarLayout')

@section('title', 'subtypes')

@section('page-style')

@endsection

@section('page-script')
    <script>
        // $(function () {
        //     $('#color').colorpicker();
        // });
    </script>

    <script>
        // function enableCreateUser() {
        //     if (document.getElementById("is_user").checked) {
        //         document.getElementById("manual_color").disabled = true;
        //         document.getElementById("custom_color").disabled = false;
        //     } else {
        //         document.getElementById("manual_color").disabled = false;
        //         document.getElementById("custom_color").disabled = true;
        //     }
        // }
    </script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Sub-Kategori/</span> Update </h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Sub-Kategori </h5> <small class="text-muted float-end">Update</small>
      </div>
      <div class="card-body">
        <form method="post" action="/subtypes/{{ $subtypes->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Pekerjaan" name="name" value="{{ old('name',$subtypes->name) }}"/>
            <label for="name">Nama Kategori</label>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="food-outline" name="icon" value="{{ old('icon', $subtypes->icon) }}"/>
            <label for="icon">Icon</label>
            <div class="text-danger">
                @error('icon')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-warning">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
