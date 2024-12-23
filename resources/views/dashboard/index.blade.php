@extends('layouts.master')

@section('page_title')
    {{ __('Dashboard') }}
@endsection

@section('section_header_title')
    {{ __('Dashboard') }}
@endsection

@section('section_header_breadcrumb')
    @parent
@endsection

@section('page_content')
    <x-web-alert-message />

    <div class="row">
        <div class="col-xl-12">
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Nasabah</p>
                                    <h3 class="mb-0">{{ $total_nasabah->total_nasabah }}</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-primary-transparent ms-auto">
                                    <i class='bx bxs-user-circle fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/nasabah"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Nilai Kredit (Rp.)</p>
                                    <h3 class="mb-0">{{ formatAmount($total_nilai_kredit->total_nilai_kredit) }}</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-secondary-transparent ms-auto">
                                    <i class='bx bx-credit-card fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/kredit"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Margin Keuntungan (Rp.)</p>
                                    <h3 class="mb-0">{{ formatAmount($total_margin_keuntungan->total_margin_keuntungan) }}
                                    </h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                    <i class='bx bxs-wallet fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/keuntungan"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Pelunasan (Rp.)</p>
                                    <h3 class="mb-0">{{ formatAmount($total_sudah_lunas->total_pelunasan) }}</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-warning-transparent ms-auto">
                                    <i class="bi bi-currency-dollar fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/sudah-lunas"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Belum Pelunasan (Rp.)</p>
                                    <h3 class="mb-0">{{ formatAmount($total_belum_lunas->total_belum_lunas) }}</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                    <i class="bi bi-bell fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/belum-lunas"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Sales Statistics (Data Dummy)</div>
                    <div class="dropdown d-flex">
                        <a href="javascript:void(0);"
                            class="btn btn-sm btn-primary-light btn-wave waves-effect waves-light d-flex align-items-center me-2"><i
                                class="ri-filter-3-line me-1"></i>Filter</a>
                        <a href="javascript:void(0);"
                            class="btn dropdown-toggle btn-sm btn-wave waves-effect waves-light btn-primary d-flex align-items-center"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="ri-calendar-2-line me-1"></i>This Week</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Month</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Share Report</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="earnings"></div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header  justify-content-between">
                    <div class="card-title">Payrol Summary (Data Dummy)</div>
                    <div class="dropdown">
                        <a aria-label="anchor" href="javascript:void(0);"
                            class="btn btn-outline-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Today</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">This Week</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="hrmstatistics"></div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-xl-4 col-md-4  m-1 m-md-0 d-block text-center">
                            <div class="px-4 py-2 border rounded-1">
                                <h4 class="mb-1">$73,970</h4>
                                <p class="mb-0 text-muted"><i class="bx bxs-circle text-primary fs-13  me-1"></i>Gross
                                    Salary </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4  m-1 m-md-0  d-block text-center">
                            <div class="px-4 py-2  border rounded-1">
                                <h4 class="mb-1">45,389</h4>
                                <p class="mb-0 text-muted"><i class="bx bxs-circle text-secondary fs-13 me-1"></i>Net
                                    Salary </p>
                            </div>
                        </div>
                        <div class="col-xl-4  col-md-4  m-1  m-md-0 d-block text-center">
                            <div class="px-4 py-2  border rounded-1">
                                <h4 class="mb-1">19,685</h4>
                                <p class="mb-0 text-muted"> <i class="bx bxs-circle text-light fs-13 me-1"></i>Taxes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header  justify-content-between">
                    <div class="card-title">Statistik Pelunasan Kredit</div>
                    <div class="dropdown">
                        <a aria-label="anchor" href="javascript:void(0);"
                            class="btn btn-outline-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Today</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">This Week</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="kreditstatistic1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header  justify-content-between">
                    <div class="card-title">Statistik Pelunasan Kredit</div>
                    <div class="dropdown">
                        <a aria-label="anchor" href="javascript:void(0);"
                            class="btn btn-outline-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Today</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">This Week</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="kreditstatistic2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    <script src="{{ asset(config('common.path_template') . 'assets/libs/highcharts/highcharts.js') }}"></script>
@endpush

@push('scripts')
    <script>
        Highcharts.chart('kreditstatistic1', {
            chart: {
                type: 'line',
                zooming: {
                    type: 'x'
                }
            },
            title: {
                text: 'Statistik Pelunasan Kredit, tahun 2024'
            },
            subtitle: {
                text: 'Source: goldmart'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Rupiah'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    label: {
                        connectorAllowed: false
                    },
                },
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    animation: {
                        defer: 900
                    },
                    enableMouseTracking: false
                },
            },
            series: [{
                name: 'Total Kredit',
                data: [
                    43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610, 168960
                ]
            }, {
                name: 'Total Pelunasan',
                data: [
                    24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050, 33099
                ]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

        Highcharts.chart('kreditstatistic2', {
            chart: {
                type: 'column',
                zooming: {
                    type: 'x'
                }
            },
            title: {
                text: 'Statistik Pelunasan Kredit, tahun 2024'
            },
            subtitle: {
                text: 'Source: goldmart'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Rupiah'
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true
                    }
                },
                column: {
                    animation: {
                        defer: 900
                    }
                },
            },
            series: [{
                name: 'Total Kredit',
                data: [
                    43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610, 168960
                ]
            }, {
                name: 'Total Pelunasan',
                data: [
                    24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050, 33099
                ]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endpush
