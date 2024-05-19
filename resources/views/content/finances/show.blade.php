{{-- {{dd($cards)}} --}}

@extends('layouts/contentNavbarLayout')

@section('title', 'Card')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Account/</span> Detail</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-sm-6">
    <div class="card mb-3">
      <div class="card-header d-flex align-items-center">
        <div class="col-sm-6 text-left">
            <h5 class="mb-0">Detail Acoount</h5>
            {{-- <small class="text-muted float-end">Pengeluaran</small> --}}
        </div>
        <div class="col-sm-6 d-flex items-align-center justify-content-end">
            <div class="avatar mx-1">
                <a href="/cards/{{ $cards->id }}/edit" class="avatar-initial bg-warning rounded shadow">
                <i class="mdi mdi-pencil mdi-10px"></i>
                </a>
            </div>
            <div class="avatar mx-1">
                <form action="/cards/ {{ $cards->id }} " method="post" class='d-inline'>
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')">
                        <div class="avatar-initial bg-danger rounded shadow">
                            <i class="mdi mdi-trash-can mdi-10px"></i>
                        </div>
                    </button>
                </form>
            </div>
        </div>
      </div>
      <div class="card-body">
        <div class="card">
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <div class="card bg-transparent">
                        <div class="card" style="background-color: {{ $cards->color }}">
                            <div class="card-header text-white">
                                <i class="col-sm-6 mdi mdi-{{ $cards->icon }} mdi-36px mb-3"></i>
                            </div>
                            <div class="card-body text-white">
                                <div class="row">
                                    <h5 class="text-white" style="white-space: nowrap">{{ $cards->name}}</h5>
                                </div>
                                <div class="row text-end">
                                    <h4 class="text-white">Rp. {{ number_format($cards->amount, 2, '.', ',') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mt-2 mx-2">
                        <h4>Color</h4>
                    </div>
                    <span class="badge items-align-center mx-2" style="background-color: {{ $cards->color}}">
                        {{ $cards->color }}
                    </span>

                    <div class="mt-4 mx-2">
                        <h4>Icon</h4>
                    </div>
                    <h6 class="mx-2">
                        {{ $cards->icon }}
                    </h6>
                </div>
            </div>
        </div>
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
@endsection
