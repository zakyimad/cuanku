@extends('layouts/contentNavbarLayout')

@section('title', 'types')

@section('page-style')

@endsection

@section('page-script')
    <script>
        // $(function () {
        //     $('#color').colorpicker();
        // });
    </script>

    <script>
        function enableCreateUser() {
            if (document.getElementById("is_user").checked) {
                document.getElementById("manual_color").disabled = true;
                document.getElementById("custom_color").disabled = false;
            } else {
                document.getElementById("manual_color").disabled = false;
                document.getElementById("custom_color").disabled = true;
            }
        }
    </script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Kategori/</span> Update </h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Kategori </h5> <small class="text-muted float-end">Update</small>
      </div>
      <div class="card-body">
        <form method="post" action="/types/{{ $types->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Kebutuhan" name="name" value="{{ old('name',$types->name) }}"/>
            <label for="name">Nama Kategori</label>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
                <div class="form-floating form-floating-outline">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="manual_color" placeholder="primary | #FFFFFF" name="color" value="{{ old('color', $types->color) }}"/>
                    <label for="color">Input Warna</label>
                </div>
            </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center">
                <p>atau</p>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center form-inline">
                <div class="input-group">
                    <span class="input-group-text" style="height: 50px"><input type="checkbox" name="is_user" id="is_user" value="true" onclick="enableCreateUser()" /> &nbsp; Custom</i></span>
                    <input type="color" style="height: 50px;" class="form-control form-control-color" id="custom_color" value="{{ old('color', $types->color, '#5778ff') }}" title="Pilih Warna" name="color2" disabled>
                </div>
            </div>
            <div class="text-danger mb-4">
                @error('color')
                    {{ $message }}
                @enderror
            </div>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="food-outline" name="icon" value="{{ old('icon', $types->icon) }}"/>
            <label for="icon">Icon</label>
            <div class="text-danger">
                @error('icon')
                    {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" placeholder="0.3" name="percentage" value="{{ old('percentage', $types->percentage) }}"/>
            <label for="perecentage">Persentase</label>
            <div class="text-danger">
                @error('percentage')
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
