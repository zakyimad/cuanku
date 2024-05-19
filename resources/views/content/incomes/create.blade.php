@extends('layouts/contentNavbarLayout')

@section('title', 'Incomes')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Pemasukan/</span> Tambah Pemasukan</h4>

<!-- Basic Layout -->
<div class="row justify-content-md-center">
  <div class="col-md-5">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Pemasukan</h5> <small class="text-muted float-end">Buat Baru</small>
      </div>
      <div class="card-body">
        <form method="post" action="/incomes" enctype="multipart/form-data">
        @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input class="form-control" type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}"/>
            <label for="date">Tanggal</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Pemasukan" name="title" value="{{ old('title') }}"/>
            <label for="title">Pemasukan</label>
            <div class="text-danger">
                @error('title')
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


          <div class="input-group mb-4">
            <label class="input-group-text" for="source_id" name="source_id">Tipe</label>
            <select class="form-select" id="source_id" name="source_id">
              <@foreach ($sources as $source)
              @if(old('type_id') === $source->id)
              <option value="{{ $source->id }}" selected>
                  {{ $source->name }}
              </option>
              @else
              <option value="{{ $source->id }}">
                  {{ $source->name }}
              </option>
              @endif
          @endforeach
            </select>
          </div>
          <div class="input-group mb-4">
            <label class="input-group-text" for="card_id">Src &nbsp;</label>
            <select class="form-select" id="card_id" name="card_id">
                @foreach ($cards as $card)
                @if(old('payment_id') === $card->id)
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
            <textarea class="form-control h-px-100" id="description" placeholder="Keterangan" name="description">{{ old('description') }}</textarea>
            <label for="description">Keterangan</label>
          </div>
          <div class="input-group mb-4">
            <label class="input-group-text" for="invoice">Invoice</label>
            <input type="file" class="form-control" id="invoice">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
