{{-- {{ dd(\Carbon\Carbon::parse($expenses->date)->format('Y-m-d'))}} --}}
{{-- {{ dd($expenses->date)}} --}}

@extends('layouts/contentNavbarLayout')

@section('title', 'Card')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Account/</span> Update Account</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Account</h5> <small class="text-muted float-end">Update</small>
      </div>
      <div class="card-body">
        <form method="post" action="/cards/{{ $cards->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Account" name="name" value="{{ old('name', $cards->name) }}"/>
            <label for="name">Nama Account</label>
            @error('name')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="#000000" name="color" value="{{ old('color', $cards->color) }}"/>
            <label for="Color">Color</label>
            @error('color')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="credit-card" name="icon" value="{{ old('icon', $cards->icon) }}"/>
            <label for="icon">Icon</label>
            @error('icon')
                {{ $message }}
            @enderror
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Total" aria-label="Amount (to the nearest dollar)" name="amount" value="{{ old('amount', $cards->amount) }}"/>
            <span class="input-group-text">.00</span>
            @error('amount')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('notes') is-invalid @enderror" id="notes" placeholder="Keterangan" name="notes">{{ old('notes', $cards->notes) }}</textarea>
            <label for="notes">Keterangan</label>
            @error('notes')
                {{ $message }}
            @enderror
          </div>
          <button type="submit" class="btn btn-warning">Update</button>
        </form>
      </div>
    </div>
  </div>
{{-- <!-- Merged -->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Basic with Icons</h5>
        <small class="text-muted float-end">Merged input group</small>
      </div>
      <div class="card-body">
        <form>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-icon-default-fullname2" />
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-company2" class="input-group-text"><i class="mdi mdi-office-building-outline"></i></span>
            <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Company" aria-label="Company" aria-describedby="basic-icon-default-company2" />
          </div>
          <div class="mb-4">
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
              <input type="text" id="basic-icon-default-email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-icon-default-email2" />
              <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
            </div>
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
            <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Phone No" aria-label="Phone No" aria-describedby="basic-icon-default-phone2" />
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-message2" class="input-group-text"><i class="mdi mdi-message-outline"></i></span>
            <textarea id="basic-icon-default-message" class="form-control" placeholder="Message" aria-label="Message" aria-describedby="basic-icon-default-message2" style="height: 60px;"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div> --}}
</div>

{{-- <script type="text/javascript">
    document.getElementById("date").valueAsDate = new Date();
</script> --}}

@endsection
