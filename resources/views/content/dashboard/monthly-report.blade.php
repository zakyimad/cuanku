{{-- {{ dd($years)}} --}}
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <!--/ Data Tables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script>
        new DataTable('#example', {
            responsive: true,
            columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 1, targets: 2 },
            { responsivePriority: 1, targets: 4 }
            ],
            // layout: {
            // topStart: 'searchPanes' },
        });

    </script>

@endsection

@section('content')
    <div class="row gy-4">
        <!-- Congratulations card -->
        <div class="col-md-12 col-lg-4">
            <div class="card" style="height: 100%; display: flex; flex-direction: column; flex:1;">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-2">Selamat Datang, {{auth()->user()->name}} !</h4>
                    @if ( $TodayCount == 0)
                        <p class="pb-0">Kamu belum melakukan pengisian catatan keuangan hari ini :( </p>
                    @else
                        <p class="pb-0">Yeay, Kamu hari ini sudah melakukan pengisisan catatan keuangan :) </p>
                    @endif
                    <h4 class="text-primary mb-1">{{ $TodayCount }}</h4>
                    <p class="mb-2 pb-1">Catatan keuangan</p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary">Ayo Lihat di sini !</a> --}}
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
            <div class="card" style="height: 100%; display: flex; flex-direction: column; flex:1;">
                <div class="card-header">
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2"> Summary </h5>
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
                    @if ( $ThisMonthExpense <= $ThisMonthIncome )
                        <p class="mt-3"><span class="fw-medium">Pemasukanmu lebih besar dari Pengeluaranmu</span> 😎 Pertahankan !</p>
                    @else
                        <p class="mt-3"><span class="fw-medium">Pengeluaranmu lebih besar dari Pemasukanmu</span> lebih hemat lagi yaa !</p>
                    @endif --}}
                </div>
                <div class="card-body">
                    {{-- <div class="row g-3">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-trending-up mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Pemasukan</div>
                                    <h5 class="mb-0" style="white-space: nowrap">Rp. {{ number_format($ThisMonthIncome, 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow">
                                        <i class="mdi mdi-account-outline mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Pengeluaran</div>
                                    <h5 class="mb-0" style="white-space: nowrap">Rp. {{ number_format($ThisMonthExpense, 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-currency-usd mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Sisa</div>
                                    <h5 class="mb-0" style="white-space: nowrap">Rp. {{ number_format(($ThisMonthIncome-$ThisMonthExpense) , 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <h4 class="m-4">Rekap Pengeluaran : </h4>
                <div class="table-responsive mx-3 mb-3">
                    <table id="basictable" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-truncate"></th>
                                <th class="text-truncate"></th>
                                @foreach ( $types as $type )
                                    <th class="text-center" colspan="2">{{$type->name}}</th>
                                @endforeach
                                <th class="text-center"></th>
                                {{-- <th class="text-center">User</th> --}}
                            </tr>
                            <tr>
                                <th class="text-truncate">Tahun</th>
                                <th class="text-truncate">Bulan</th>
                                @foreach ( $types as $type )
                                    <th class="text-center" >Amount</th>
                                    <th class="text-center" >Percentage</th>
                                @endforeach
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $years as $year )
                                @foreach ( $months as $month )
                                <tr>
                                    <td>{{ $year->year }}</td>
                                    {{-- <th class="text-center" scope="row"></th> --}}
                                    <td>{{ $month->month }}</td>
                                    @foreach ( $types as $type )
                                        <td class="text-end">
                                            <p>
                                                Rp. {{ number_format(
                                                        $monthlyExpenses
                                                        ->where('month', $month->month)
                                                        ->where('year', $year->year)
                                                        ->where('type_id', $type->id)
                                                        ->sum('total_amount')
                                                    , 0, '.', ',') }}
                                            </p>
                                        </td>
                                        <td class="text-end">
                                            <p>%</p>
                                        </td>
                                    @endforeach
                                    <td class="text-end">
                                        Rp. {{ number_format(
                                            $monthlyExpenses
                                            ->where('month', $month->month)
                                            ->where('year', $year->year)
                                            ->sum('total_amount')
                                        , 0, '.', ',') }}
                                    </td>
                                    {{-- <td data-sort='YYYYMMDD'>
                                        <div class="d-flex align-items-center">
                                            {{ \Carbon\Carbon::parse($transaction->date)->format('m/d/Y') }}
                                        </div>
                                    </td>
                                    <td class="align-left">{{ $transaction->title }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-label-{{ $transaction->color_type }}"> {{ $transaction->type }}</span>
                                    </td>
                                    <td class="text-end">Rp. {{ number_format($transaction->amount, 2, '.', ',') }} </td>
                                    <td class="text-left" style="white-space: nowrap"><i class="mdi mdi-{{ $transaction->icon }} mdi-10px" style="color: {{ $transaction->color}}"></i> {{ $transaction->name }}</td> --}}
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->
    </div>

@endsection
