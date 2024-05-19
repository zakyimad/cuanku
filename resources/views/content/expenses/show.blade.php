{{-- {{dd($expenses)}} --}}
@extends('layouts/contentNavbarLayout')

@section('title', 'Expenses')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Pengeluaran/</span> Detail</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <div class="col-sm-6 text-left">
            <h5 class="mb-0">Detail Transaksi</h5>
            {{-- <small class="text-muted float-end">Pengeluaran</small> --}}
        </div>
        <div class="col-sm-6 d-flex items-align-center justify-content-end">
            <div class="avatar mx-1">
                <a href="/expenses/{{ $expenses->id }}/edit" class="avatar-initial bg-warning rounded shadow">
                <i class="mdi mdi-pencil mdi-10px"></i>
                </a>
            </div>
            <div class="avatar mx-1">
                <form action="/expenses/{{ $expenses->id }}" method="post" class='d-inline'>
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
            {{-- <h5 class="card-header">{{ $expenses -> title }}</h5> --}}
            <div class="card-body">
                <h3 class="text-center"> {{ $expenses -> title }}</h3>
                {{-- <p> {{ $expenses -> date }}</p> --}}
                <div class="row">
                    <div class="col-sm-6 mb-4 mt-3 d-flex align-items-center">
                        <div class="mx-2 mt-3">
                            <i class="mdi mdi-cash-multiple mdi-36px"></i>
                        </div>
                        <div class="text-left mx-2">
                            <h7 class="card-title">Nilai</h7>
                            <h2 class="card-text">Rp. {{ number_format($expenses->amount, 0, '.', ',')}}</h2>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4 mt-3">
                        <div class="text-left items-align-center">
                            <h6 class="card-title">Tanggal Transaksi</h6>
                            <p class="card-text mb-1">{{ \Carbon\Carbon::parse($expenses->date)->format('l, d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="mx-2 mt-3">
                                <i class="mdi mdi-list-box mdi-36px"></i>
                            </div>
                            <div class="mt-3 mx-2">
                                <h5>Tipe</h5>
                                <span class="badge bg-primary">{{ $expenses->type->name }}</span>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card text-left bg-warning text-white" style="opacity: 0.7;">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <i class="mdi mdi-cart-variant mdi-36px"></i>
                                </div>
                                <div class="mx-3">
                                    <h7 class="card-title text-white">Kategori</h7>
                                    <h5 class="card-text text-white mt-2">{{ $expenses->subtype->name }}</h5>
                                </div>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="card-body bg-success text-white d-flex items-align-center justify-content-center text-center" style="opacity: 0.7;">
                                <i class="mdi mdi-credit-card-fast-outline mdi-36px"></i>
                                <div class="mx-4">
                                    <h7 class="card-title text-white mb-2">Sumber Pembayaran</h7>
                                    <h5 class="card-text text-white">{{ $expenses->card->name }}</h5>
                                </div>
                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <i class="mdi mdi-note-outline mdi-8px"></i>
                        <h7 class="mb-2">Catatan</h7>
                        <div class="card text-left mt-2">
                            <div class="card-body">
                            <p class="card-text">
                                @if ($expenses->description == "")
                                    Tidak ada catatan
                                @else
                                    {{ $expenses->description }}
                                @endif
                            </p>
                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                            <img src="{{ asset('storage/' . $expenses->image) }}" alt="Image">
                        </div>
                    </div>
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
