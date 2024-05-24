@extends('layouts/contentNavbarLayout')

@section('title', 'dashboard')

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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2">Selamat Datang, {{auth()->user()->name}} !</h4>
                    @if ( $TodayCount == 0)
                        <p class="pb-0">Kamu belum melakukan pengisian catatan keuangan hari ini :( </p>
                    @else
                        <p class="pb-0">Yeay, Kamu hari ini sudah melakukan pengisisan catatan keuangan :) </p>
                    @endif
                    <h4 class="text-primary mb-1">{{ $TodayCount }}</h4>
                    <p class="mb-2 pb-1">Catatan keuangan</p>
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
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
                    @endif
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-trending-up mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Pemasukan</div>
                                    <h5 class="mb-0">Rp. {{ number_format($ThisMonthIncome, 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow">
                                        <i class="mdi mdi-account-outline mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Pengeluaran</div>
                                    <h5 class="mb-0">Rp. {{ number_format($ThisMonthExpense, 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow">
                                        <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Tabungan</div>
                                    <h5 class="mb-0">1.54k</h5>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-currency-usd mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Sisa</div>
                                    <h5 class="mb-0">Rp. {{ number_format(($ThisMonthIncome-$ThisMonthExpense) , 0, '.', ',') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Weekly Overview Chart -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">Weekly Overview</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical mdi-24px"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                <a class="dropdown-item" href="javascript:void(0);">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="weeklyOverviewChart"></div>
                    <div class="mt-1 mt-md-3">
                        <div class="d-flex align-items-center gap-3">
                            <h3 class="mb-0">45%</h3>
                            <p class="mb-0">Your sales performance is 45% 😎 better compared to last month</p>
                        </div>
                        <div class="d-grid mt-3 mt-md-4">
                            <button class="btn btn-primary" type="button">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Weekly Overview Chart -->

        <!-- Total Earnings -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2"> Total Expenses (This Month) </h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="totalEarnings" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarnings">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-md-3 mb-md-5">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">$24,895</h2>
                            <span class="text-success ms-2 fw-medium">
                                <i class="mdi mdi-menu-up mdi-24px"></i>
                                <small>10%</small>
                            </span>
                        </div>
                        <small class="mt-1">Compared to $84,325 last year</small>
                    </div>
                    <ul class="p-0 m-0">



                        <li class="d-flex mb-4 pb-md-2">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/img/icons/misc/zipcar.png') }}" alt="zipcar"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Zipcar</h6>
                                    <small>Vuejs, React & HTML</small>
                                </div>
                                <div>
                                    <h6 class="mb-2">$24,895.65</h6>
                                    <div class="progress bg-label-primary" style="height: 4px;">
                                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-md-2">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/img/icons/misc/bitbank.png') }}" alt="bitbank"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bitbank</h6>
                                    <small>Sketch, Figma & XD</small>
                                </div>
                                <div>
                                    <h6 class="mb-2">$8,6500.20</h6>
                                    <div class="progress bg-label-info" style="height: 4px;">
                                        <div class="progress-bar bg-info" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-md-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('assets/img/icons/misc/aviato.png') }}" alt="aviato"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Aviato</h6>
                                    <small>HTML & Angular</small>
                                </div>
                                <div>
                                    <h6 class="mb-2">$1,2450.80</h6>
                                    <div class="progress bg-label-secondary" style="height: 4px;">
                                        <div class="progress-bar bg-secondary" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Total Earnings -->

        <!-- Four Cards -->
        <div class="col-xl-4 col-md-6">
            <div class="row gy-4">
                <!-- Total Profit line chart -->
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h4 class="mb-0">$86.4k</h4>
                        </div>
                        <div class="card-body">
                            <div id="totalProfitLineChart" class="mb-3"></div>
                            <h6 class="text-center mb-0">Total Profit</h6>
                        </div>
                    </div>
                </div>
                <!--/ Total Profit line chart -->
                <!-- Total Profit Weekly Project -->
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="avatar">
                                <div class="avatar-initial bg-secondary rounded-circle shadow">
                                    <i class="mdi mdi-poll mdi-24px"></i>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="totalProfitID" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfitID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-mg-1">
                            <h6 class="mb-2">Total Profit</h6>
                            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
                                <h4 class="mb-0 me-2">$25.6k</h4>
                                <small class="text-success mt-1">+42%</small>
                            </div>
                            <small>Weekly Project</small>
                        </div>
                    </div>
                </div>
                <!--/ Total Profit Weekly Project -->
                <!-- New Yearly Project -->
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="avatar">
                                <div class="avatar-initial bg-primary rounded-circle shadow-sm">
                                    <i class="mdi mdi-wallet-travel mdi-24px"></i>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="newProjectID" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="newProjectID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-mg-1">
                            <h6 class="mb-2">New Project</h6>
                            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
                                <h4 class="mb-0 me-2">862</h4>
                                <small class="text-danger mt-1">-18%</small>
                            </div>
                            <small>Yearly Project</small>
                        </div>
                    </div>
                </div>
                <!--/ New Yearly Project -->
                <!-- Sessions chart -->
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h4 class="mb-0">2,856</h4>
                        </div>
                        <div class="card-body">
                            <div id="sessionsColumnChart" class="mb-3"></div>
                            <h6 class="text-center mb-0">Sessions</h6>
                        </div>
                    </div>
                </div>
                <!--/ Sessions chart -->
            </div>
        </div>
        <!--/ Total Earning -->

        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <div class="table-responsive mx-3 mb-3">
                    <table id="example" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-truncate">Tanggal</th>
                                <th class="text-truncate">Transaksi</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">From / To</th>
                                {{-- <th class="text-center">User</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $alltransactions as $transaction )
                            <tr>
                                {{-- <th class="text-center" scope="row"></th> --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        {{ \Carbon\Carbon::parse($transaction->date)->format('m/d/Y') }}
                                    </div>
                                </td>
                                <td class="align-left">{{ $transaction->title }}</td>
                                <td class="text-center">
                                    <span class="badge bg-label-{{ $transaction->color_type }}"> {{ $transaction->type }}</span>
                                </td>
                                <td class="text-end">Rp. {{ number_format($transaction->amount, 2, '.', ',') }} </td>
                                <td class="text-left" style="white-space: nowrap"><i class="mdi mdi-{{ $transaction->icon }} mdi-10px" style="color: {{ $transaction->color}}"></i> {{ $transaction->name }}</td>
                                {{-- <td class="text-center">{{ $transaction->user_id }}</td> --}}
                                {{-- <td class="text-center">
                                    <a href="/dashboard/expenses/{{ $expense->id }}" class="btn btn-info btn-sm">
                                        <i class="align-middle" data-feather="eye"></i>
                                    </a>
                                    <a href="/dashboard/expenses/{{ $expense->id }}/edit" class="btn btn-warning btn-sm">
                                        <i class="align-middle" data-feather="edit"></i>
                                    </a>
                                    <form action="/dashboard/expenses/{{ $expense->id }}" method="post" class='d-inline'>
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="align-middle" data-feather="delete"></i>
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                            <small class="text-truncate">@amiccoo</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin
                                </td>
                                <td class="text-truncate">24</td>
                                <td class="text-truncate">34500$</td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                                            <small class="text-truncate">@brossiter15</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">estelle.Bailey10@gmail.com</td>
                                <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
                                    Editor</td>
                                <td class="text-truncate">29</td>
                                <td class="text-truncate">64500$</td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                                            <small class="text-truncate">@bemblinf</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">milo86@hotmail.com</td>
                                <td class="text-truncate"><i class="mdi mdi-cog-outline text-warning mdi-24px me-1"></i>
                                    Author</td>
                                <td class="text-truncate">44</td>
                                <td class="text-truncate">94500$</td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                                            <small class="text-truncate">@bbinerh</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">lonnie35@hotmail.com</td>
                                <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
                                    Editor</td>
                                <td class="text-truncate">19</td>
                                <td class="text-truncate">4500$</td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                                            <small class="text-truncate">@bkrabbe1d</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">ahmad_Collins@yahoo.com</td>
                                <td class="text-truncate"><i class="mdi mdi-chart-donut mdi-24px text-success me-1"></i>
                                    Maintainer</td>
                                <td class="text-truncate">22</td>
                                <td class="text-truncate">10500$</td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                                            <small class="text-truncate">@brosebothamz</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
                                <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
                                    Editor</td>
                                <td class="text-truncate">50</td>
                                <td class="text-truncate">99500$</td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                                            <small class="text-truncate">@bkildayr</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">otho21@gmail.com</td>
                                <td class="text-truncate"><i
                                        class="mdi mdi-account-outline mdi-24px text-primary me-1"></i> Subscriber</td>
                                <td class="text-truncate">23</td>
                                <td class="text-truncate">23500$</td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr class="border-transparent">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Breena Gallemore</h6>
                                            <small class="text-truncate">@bgallemore6</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">florencio.Little@hotmail.com</td>
                                <td class="text-truncate"><i
                                        class="mdi mdi-account-outline mdi-24px text-primary me-1"></i> Subscriber</td>
                                <td class="text-truncate">33</td>
                                <td class="text-truncate">20500$</td>
                                <td><span class="badge bg-label-secondary rounded-pill">Inactive</span></td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->
    </div>

@endsection
