@extends('layouts/contentNavbarLayout')

@section('title', 'Expenses')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    {{-- <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script> --}}
    <!--/ Data Tables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script> --}}

    <script>
        // $(document).ready(function() {
        //     $.fn.dataTable.moment( 'DD/MM/YYYY' );
        // });
        // DataTable.datetime('D/MM/YYYY');
        new DataTable('#expenses_table', {
            responsive: true,
            columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 1, targets: 2 },
            { responsivePriority: 1, targets: 6 }
            ],
            // order: [[0, 'desc']]
            // layout: {
            // topStart: 'searchPanes' },
        });
    </script>
@endsection

@section('content')
    <div class="row gy-4">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session()->has('danger'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <!-- Congratulations card -->
        <div class="col-md-12 col-lg-4">
            <div class="card" style="height: 100%; display: flex; flex-direction: column; flex:1;">
                <div class="card-body">
                    <h4 class="card-title mb-1">Catatan Pengeluaran</h4>
                    <p class="pb-0">Catat semua pengeluaranmu ! </p>
                    {{-- <h4 class="text-primary mb-1">$42.8k</h4> --}}
                    {{-- <p class="mb-2 pb-1">78% of target 🚀</p> --}}
                    <a href={{url("/expenses/create")}} class="btn btn-sm btn-warning">Tambah Pengeluaran</a>
                </div>
                {{-- <img src="{{ asset('assets/img/icons/misc/triangle-light.png') }}"
                    class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background">
                <img src="{{ asset('assets/img/illustrations/trophy.png') }}"
                    class="scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-4 pb-2" width="83" alt="view sales"> --}}
            </div>
        </div>
        <!--/ Congratulations card -->

        <!-- Transactions -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Rekap Pengeluaran</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical mdi-24px"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                <a class="dropdown-item" href="javascript:void(0);">Update</a>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3"><span class="fw-medium">Total 48.5% growth</span> 😎 this month</p> --}}
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-calendar-today mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Hari ini</div>
                                    <h6 class="mb-0">Rp. {{ number_format($Today, 0, '.', ',') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow">
                                        <i class="mdi mdi-calendar-week mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Minggu ini</div>
                                    <h6 class="mb-0">Rp. {{ number_format($ThisWeek, 0, '.', ',')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow">
                                        <i class="mdi mdi-calendar-month mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Bulan ini</div>
                                    <h6 class="mb-0">Rp. {{ number_format($ThisMonth, 0, '.', ',') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-calendar-check mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Tahun ini</div>
                                    <h6 class="mb-0">Rp. {{ number_format($ThisYear, 0, '.', ',') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Riwayat Pengeluaran</h5>
                <div class="table-responsive mx-3 mb-3">
                    <table id="expenses_table" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-truncate">Tanggal</th>
                                <th class="text-truncate">Transaksi</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Sub</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Sumber</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $expenses as $expense )
                            <tr>
                                {{-- <th class="text-center" scope="row"></th> --}}
                                <td data-sort='YYYYMMDD'>
                                    <div class="d-flex align-items-center">
                                        {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="align-left">{{ $expense->title }}</td>
                                <td class="text-center">
                                    <span class="badge bg-label-{{ $expense->type->color }}"><i class="mdi mdi-{{ $expense->type->icon }} mdi-10px"></i> {{ $expense->type->name }}</span>
                                </td>
                                <td class="text-center" style="white-space: nowrap"><i class="mdi mdi-{{ $expense->subtype->icon }} mdi-10px"></i> {{ $expense->subtype->name }}</td>
                                <td class="text-end" style="white-space: nowrap">Rp. {{ number_format($expense->amount, 2, '.', ',') }} </td>
                                <td class="text-left" style="white-space: nowrap"><i class="mdi mdi-{{ $expense->card->icon }} mdi-10px" style="color: {{ $expense->card->color}}"></i> {{ $expense->card->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar mx-1">
                                            <a href="/expenses/{{ $expense->id }}" class="avatar-initial bg-info rounded shadow">
                                                <i class="mdi mdi-eye mdi-10px"></i>
                                            </a>
                                        </div>
                                        <div class="avatar mx-1">
                                            <a href="/expenses/{{ $expense->id }}/edit" class="avatar-initial bg-warning rounded shadow">
                                                <i class="mdi mdi-pencil mdi-10px"></i>
                                            </a>
                                        </div>
                                        <div class="avatar mx-1">
                                            <form action="/expenses/{{ $expense->id }}" method="post" class='d-inline'>
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
                                {{-- <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                          <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Laravel Pagination
                <div class="row mt-4">
                    @if ($expenses->lastPage() > 1)
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $expenses->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $expenses->previousPageUrl() }}" aria-label="Previous">
                                        <i class="tf-icon mdi mdi-chevron-double-left mdi-20px"></i>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $expenses->lastPage(); $i++)
                                    <li class="page-item {{ $expenses->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $expenses->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $expenses->currentPage() == $expenses->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $expenses->nextPageUrl() }}" aria-label="Next">
                                        <i class="tf-icon mdi mdi-chevron-double-right mdi-20px"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div> --}}
            </div>
        </div>

    </div>
@endsection

{{-- @push('page-script')
@endpush --}}
