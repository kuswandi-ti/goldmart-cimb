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
    <div class="row">
        <div class="col-xl-12">
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">{{ __('Total Nasabah (orang)') }}</p>
                                    <h4 class="mb-0">{{ $total_nasabah->total_nasabah }}</h4>
                                </div>
                                <div class="avatar avatar-md br-4 bg-primary-transparent ms-auto">
                                    <i class='bx bxs-user-circle fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-primary-transparent rounded-pill">
                                    {{ __('Belum Pelunasan : ') }}
                                </span>
                                <span class="badge bg-primary-transparent rounded-pill">
                                    <b>{{ $total_nasabah_belum_pelunasan->total_nasabah_belum_pelunasan }}</b>
                                </span>
                                <a href="{{ route('kreditnasabah.index') }}"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                                </a>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-primary-transparent rounded-pill">
                                    {{ __('Sudah Pelunasan : ') }}
                                </span>
                                <span class="badge bg-primary-transparent rounded-pill">
                                    <b>{{ $total_nasabah_sudah_pelunasan->total_nasabah_sudah_pelunasan }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">{{ __('Total Nilai Kredit (Rp.)') }}</p>
                                    <h4 class="mb-0">{{ formatAmount($total_nilai_kredit->total_nilai_kredit) }}</h4>
                                </div>
                                <div class="avatar avatar-md br-4 bg-secondary-transparent ms-auto">
                                    <i class='bx bx-credit-card fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <a href="kreditnasabah/detail/kredit"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">{{ __('Total Gramasi & Kepingan') }}</p>
                                </div>
                                <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                    <i class='bx bxs-wallet fs-20'></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-info-transparent rounded-pill">
                                    {{ __('Total Gramasi : ') }}
                                </span>
                                <span class="badge bg-info-transparent rounded-pill">
                                    <b>{{ formatAmount($total_gramasi->total_gramasi, 2) }}</b>
                                </span>
                                <a href="kreditnasabah/detail/keuntungan"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}</a>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-info-transparent rounded-pill">
                                    {{ __('Total Kepingan : ') }}
                                </span>
                                <span class="badge bg-info-transparent rounded-pill">
                                    <b>{{ formatAmount($total_kepingan->total_kepingan) }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">{{ __('Sudah Pelunasan') }}</p>
                                </div>
                                <div class="avatar avatar-md br-4 bg-warning-transparent ms-auto">
                                    <i class="bi bi-currency-dollar fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-warning-transparent rounded-pill">
                                    {{ __('Total Gramasi : ') }}
                                </span>
                                <span class="badge bg-warning-transparent rounded-pill">
                                    <b>{{ formatAmount($total_gramasi_sudah_pelunasan->total_gramasi_sudah_pelunasan, 2) }}</b>
                                </span>
                                <a href="kreditnasabah/detail/sudah-lunas"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}</a>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-warning-transparent rounded-pill">
                                    {{ __('Total Kepingan : ') }}
                                </span>
                                <span class="badge bg-warning-transparent rounded-pill">
                                    <b>{{ formatAmount($total_kepingan_sudah_pelunasan->total_kepingan_sudah_pelunasan) }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">{{ __('Belum Pelunasan') }}</p>
                                </div>
                                <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                    <i class="bi bi-bell fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-danger-transparent rounded-pill">
                                    {{ __('Total Gramasi : ') }}
                                </span>
                                <span class="badge bg-danger-transparent rounded-pill">
                                    <b>{{ formatAmount($total_gramasi_belum_pelunasan->total_gramasi_belum_pelunasan, 2) }}</b>
                                </span>
                                <a href="kreditnasabah/detail/belum-lunas"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}</a>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-danger-transparent rounded-pill">
                                    {{ __('Total Kepingan : ') }}
                                </span>
                                <span class="badge bg-danger-transparent rounded-pill">
                                    <b>{{ formatAmount($total_kepingan_belum_pelunasan->total_kepingan_belum_pelunasan) }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div id="kreditstatistic1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div id="kreditstatistic2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@push('scripts_vendor')
    <script src="{{ asset(config('common.path_template') . 'assets/libs/highcharts/highcharts.js') }}"></script>
@endpush

@push('scripts')
    <script>
        var total_nilai_kredit_graph = {{ Js::from($total_nilai_kredit_graph) }};
        var total_nilai_pelunasan_graph = {{ Js::from($total_nilai_pelunasan_graph) }};
        var total_emas_graph = {{ Js::from($total_emas_graph) }};

        Highcharts.chart('kreditstatistic1', {
            chart: {
                type: 'line',
                zooming: {
                    type: 'x'
                }
            },
            title: {
                text: 'Statistik Pelunasan Kredit<br>{{ activePeriod() }}'
            },
            subtitle: {
                text: 'Source: <a href="https://www.goldmart.co.id/" target="_blank">goldmart</a>'
            },
            xAxis: {
                title: {
                    text: 'Bulan'
                },
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
                    enableMouseTracking: true
                },
            },
            series: [{
                name: 'Total Kredit',
                data: total_nilai_kredit_graph,
                lineWidth: 4
            }, {
                name: 'Total Pelunasan',
                data: total_nilai_pelunasan_graph,
                lineWidth: 4
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
                text: 'Statistik Total Emas (Belum Pelunasan)<br>{{ activePeriod() }}'
            },
            subtitle: {
                text: 'Source: <a href="https://www.goldmart.co.id/" target="_blank">goldmart</a>'
            },
            xAxis: {
                title: {
                    text: 'Gramasi'
                },
                categories: ['0,5', '1', '2', '3', '5', '10', '25', '50', '100']
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
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
                name: 'Total Emas',
                data: total_emas_graph
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
