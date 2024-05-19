@extends('layouts/contentNavbarLayout')

@section('title', 'Preferences')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Settings /</span> Preferences
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
      <li class="nav-item"><a class="nav-link" href="{{url('types')}}"><i class="mdi mdi-tune mdi-20px me-1"></i> Kategori</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-file-tree mdi-20px me-1"></i> Sub-Kategori</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('sources')}}"><i class="mdi mdi-currency-usd mdi-20px me-1"></i> Sumber Pemasukan</a></li>
    </ul>
    <div class="card">
      <!-- Types -->
      <h5 class="card-header">List Sub-Kategori</h5>
      <div class="card-body">
        <div class="row">
            <div class="col-sm-7">
                <div class="table-responsive mx-3 mb-3">
                    <table id="expenses_table" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-truncate">No.</th>
                                <th class="text-truncate">Sub-Kategori</th>
                                <th class="text-truncate">Icon</th>
                                {{-- <th class="text-truncate">Color</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $subtypes as $subtype )
                            <tr>
                                <td class="text-center"> {{ $loop->index + 1 }} </td>
                                <td class="align-left">{{ $subtype->name }}</td>
                                <td class="text-left" style="white-space: nowrap">
                                    <i class="mdi mdi-{{ $subtype->icon }} mdi-10px"></i> {{ $subtype->icon }} </span>
                                </td>
                                {{-- <td class="text-left" style="white-space: nowrap">
                                    <p><span class="badge bg-{{ $subtype->color }}" style="background-color: {{ $subtype->color }}">  &nbsp; </span> : "{{ $subtype->color }}"</p>
                                </td> --}}
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar mx-1">
                                            <a href="/subtypes/{{ $subtype->id }}/edit" class="avatar-initial bg-warning rounded shadow">
                                                <i class="mdi mdi-pencil mdi-10px"></i>
                                            </a>
                                        </div>
                                        <div class="avatar mx-1">
                                            <form action="/subtypes/{{ $subtype->id }}" method="post" class='d-inline'>
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <div class="avatar mx-1">
                                        <a href="/subtypes/create" class="avatar-initial bg-grey rounded shadow">
                                            <i class="mdi mdi-plus-thick mdi-10px"></i>
                                        </a>
                                    </div>
                                </td>
                                <td colspan="5"><strong>klik <i class="mdi mdi-plus-thick mdi-10px"></i> untuk tambah </strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-sm-5">
                <h5 class="card-header">Petunjuk Pengisian</h5>
                <div class="card-body">
                    <div class="row">
                        <h5>Icon : </h5>
                        <p>Visit link -> <a href="https://pictogrammers.com/library/mdi/" target="_blank">MDI Icon</a> </p>
                        <p>Pilih Icon dan ambil namanya, contoh : 'wallet-plus'</p>
                        <p style="color: red">*pastikan nama sudah sesuai !</p>
                    </div>
                    <div class="row">
                        <h5>Color : </h5>
                        <p>Silahkan gunakan kode warna untuk Custom Warna atau gunakan Basic Color yang telah tersedia</a> </p>
                        <p class="mb-0">Warna tersedia : </p>
                        <div class="demo-inline-spacing">
                            <span class="badge bg-primary">Primary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-success">Success</span>
                            <span class="badge bg-danger">Danger</span>
                            <span class="badge bg-warning">Warning</span>
                            <span class="badge bg-info">Info</span>
                            <span class="badge bg-dark">Dark</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Types -->
    </div>
  </div>
</div>
@endsection
