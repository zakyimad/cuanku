{{-- {{ dd(\Carbon\Carbon::parse($expenses->date)->format('Y-m-d'))}} --}}
{{-- {{ dd($expenses->date)}} --}}

@extends('layouts/contentNavbarLayout')

@section('title', 'Expenses')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Pengeluaran/</span> Tambah Transaksi</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Transaksi Pengeluaran</h5> <small class="text-muted float-end">Buat Baru</small>
      </div>
      <div class="card-body">
        <form method="post" action="/expenses/{{ $expenses->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="date" id="date" name="date" value={{ old('date', \Carbon\Carbon::parse($expenses->date)->format('Y-m-d')) }} />
            <label for="date">Tanggal</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Transaksi" name="title" value="{{ old('title', $expenses->title) }}"/>
            <label for="title">Judul Transaksi</label>
            @error('title')
                {{ $message }}
            @enderror
          </div>
          <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Total" aria-label="Amount (to the nearest dollar)" name="amount" value="{{ old('amount', $expenses->amount) }}"/>
            <span class="input-group-text">.00</span>
          </div>
          <div class="mb-4">
              @error('amount')
                  {{ $message }}
              @enderror
          </div>

          <div class="input-group mb-4">
            <label class="input-group-text" for="type_id" name="type_id">Tipe</label>
            <select class="form-select" id="type_id" name="type_id">
              <@foreach ($types as $type)
              @if(old('type_id', $expenses->type_id) == $type->id)
              <option value="{{ $type->id }}" selected>
                  {{ $type->name }}
              </option>
              @else
              <option value="{{ $type->id }}">
                  {{ $type->name }}
              </option>
              @endif
          @endforeach
            </select>
          </div>
          <div class="input-group mb-4">
            <label class="input-group-text" for="subtype_id">Sub&nbsp;</label>
            <select class="form-select" id="subtype_id" name="subtype_id">
                @foreach ($subtypes as $subtype)
                    @if(old('subtype_id', $expenses->subtype_id) == $subtype->id)
                    <option value="{{ $subtype->id }}" selected>
                        {{ $subtype->name }}
                    </option>
                    @else
                    <option value="{{ $subtype->id }}">
                        {{ $subtype->name }}
                    </option>
                    @endif
                @endforeach
            </select>
          </div>
          <div class="input-group mb-4">
            <label class="input-group-text" for="card_id">Src &nbsp;</label>
            <select class="form-select" id="card_id" name="card_id">
                @foreach ($cards as $card)
                @if(old('payment_id', $expenses->card_id) == $card->id)
                <option value="{{ $card->id }}" selected>
                    {{ $card->name }}
                </option>
                @else
                <option value="{{ $card->id }}">
                    {{ $card->name }}
                </option>
                @endif
            @endforeach
            </select>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('description') is-invalid @enderror" id="description" placeholder="Keterangan" name="description">{{ old('description', $expenses->description) }}</textarea>
            <label for="description">Keterangan</label>
            @error('description')
                {{ $message }}
            @enderror
          </div>
          <div class="input-group mb-4">
            <label class="input-group-text" for="invoice">Invoice</label>
            <input type="file" class="form-control" id="invoice">
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
