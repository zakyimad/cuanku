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
        {{-- <div class="col-sm-6 text-left"> --}}
            {{-- <h5 class="mb-0">Transaksi Pengeluaran</h5> --}}
            {{-- <small class="text-muted float-end">Pengeluaran</small> --}}
        {{-- </div> --}}
        <div class="col d-flex items-align-center justify-content-end">
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
        <div class="row border-bottom mx-1">
            <div class="col-6">
                <h5 class="text-left"> {{ $expenses -> title }}</h5>
            </div>
            <div class="col-6 float-end">
                <p class="card-text mb-1">{{ \Carbon\Carbon::parse($expenses->date)->format('l, d/m/Y') }}</p>
            </div>
        </div>
        <div class="row mt-4 mx-1">
            <div class="col-6">
                <p class="m-0">
                    Nilai
                </p>
                <h2 class="card-text mt-2">Rp. {{ number_format($expenses->amount, 0, '.', ',')}}</h2>
            </div>
            <div class="col-6 float-end text-end">
                <p class="m-0">
                    Payment Method
                </p>
                <h2 class="card-text">
                    <i class="mdi mdi-{{ $expenses->card->icon }} mdi-36px" style="color: {{ $expenses->card->color}}"></i> {{ $expenses->card->name }}
                </h2>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="m-0">
                            Kategori
                        </p>
                        <div class="mt-2">
                            <span class="badge bg-label-{{ $expenses->type->color }}"><i class="mdi mdi-{{ $expenses->type->icon }} mdi-10px"></i> {{ $expenses->type->name }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="m-0">
                            Sub-Kategori
                        </p>
                        <div class="mt-2">
                            <i class="mdi mdi-{{ $expenses->subtype->icon }} mdi-10px"></i> {{ $expenses->subtype->name }}
                        </div>
                    </div>
                </div>

                <div class="row border-top mt-3">
                    <div class="col p-3">
                        <i class="mdi mdi-note-outline mdi-10px"></i>
                        <h7 class="mb-2">Catatan</h7>
                    </div>
                </div>
                <div class="row">
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
                    </div>
                </div>
                <div class="row mt-4">
                    <img src="{{ asset('storage/' . $expenses->image) }}" alt="Image">
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
