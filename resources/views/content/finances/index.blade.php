@extends('layouts/contentNavbarLayout')

@section('title', 'Card')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4">
        <!-- Congratulations card -->
        <div class="col-md-12 col-lg-4">
            <div class="card" style="height: 100%;">
                <div class="card-body">
                    <h4 class="card-title mb-1">Keuangan Mu</h4>
                    <p class="pb-0">Pantau terus uang dan Tabunganmu ! </p>
                    {{-- <h4 class="text-primary mb-1">$42.8k</h4> --}}
                    {{-- <p class="mb-2 pb-1">78% of target 🚀</p> --}}
                    {{-- <a href={{url("/cards/create")}} class="btn btn-sm btn-success">Tambah Akun</a> --}}
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
                        <h5 class="card-title m-0 me-2">Finansial</h5>
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
                                    {{-- <h6 class="mb-0">Rp. {{ number_format($Today, 0, '.', ',') }}</h6> --}}
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
                                    {{-- <h6 class="mb-0">Rp. {{ number_format($ThisWeek, 0, '.', ',')}}</h6> --}}
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
                                    {{-- <h6 class="mb-0">Rp. {{ number_format($ThisMonth, 0, '.', ',') }}</h6> --}}
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
                                    {{-- <h6 class="mb-0">Rp. {{ number_format($ThisYear, 0, '.', ',') }}</h6> --}}
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
                <h5 class="card-header">Finansial</h5>
                <div class="row d-flex items-align-center justify-content-center mx-2">
                    @foreach ($cards as $card )
                    <div class="col-sm-3 mb-5">
                        <a href="/cards/{{ $card->id }}">
                            <div class="card bg-transparent">
                                <div class="card" style="background-color: {{ $card->color }}; width: auto; height: 180px;">
                                    <div class="card-header text-white">
                                        <i class="col-sm-6 mdi mdi-{{ $card->icon }} mdi-36px mb-3"></i>
                                    </div>
                                    <div class="card-body text-white">
                                        <div class="row">
                                            <h5 class="text-white" style="white-space: nowrap">{{ $card->name}}</h5>
                                        </div>
                                        <div class="row text-end">
                                            <h4 class="text-white">Rp. {{ number_format($card->amount, 2, '.', ',') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="col-sm-3 mb-5">
                        <a href="{{url("/cards/create")}}">
                            <div class="card bg-transparent">
                                <div class="card" style="background-color: rgb(119, 114, 114); width: auto; height: 180px;">
                                    <div class="card-body d-flex items-align-center justify-content-center">
                                        <h1 class="text-white text-center mt-2" style="font-size: 7em;"> <strong> + </strong> </h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--/ Data Tables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
            { responsivePriority: 1, targets: 5 }
            ],
            // layout: {
            // topStart: 'searchPanes' },
        });
    </script>

@endsection
