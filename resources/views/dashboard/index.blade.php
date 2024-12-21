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
                                    <p class="mb-1 fw-medium text-muted">Total Sales</p>
                                    <h3 class="mb-0">$18,645</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-primary-transparent ms-auto">
                                    <i class="bi bi-cart-check fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-primary-transparent rounded-pill">+24% <i
                                        class="fe fe-arrow-down"></i></span>
                                <a href="javascript:void(0);"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Revenue</p>
                                    <h3 class="mb-0">$34,876</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-secondary-transparent ms-auto">
                                    <i class="bi bi-archive fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-success-transparent rounded-pill">+0.26% <i
                                        class="fe fe-arrow-down"></i></span>
                                <a href="javascript:void(0);"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Products</p>
                                    <h3 class="mb-0">26,231</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                    <i class="bi bi-handbag fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-danger-transparent rounded-pill">+06% <i
                                        class="fe fe-arrow-down"></i></span>
                                <a href="javascript:void(0);"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Total Expenses</p>
                                    <h3 class="mb-0">$73,579</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-warning-transparent ms-auto">
                                    <i class="bi bi-currency-dollar fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-success-transparent rounded-pill">+10% <i
                                        class="fe fe-arrow-up"></i></span>
                                <a href="javascript:void(0);"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col card-background">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1 fw-medium text-muted">Active Subscribers</p>
                                    <h3 class="mb-0">1,468</h3>
                                </div>
                                <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                    <i class="bi bi-bell fs-20"></i>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <span class="badge bg-danger-transparent rounded-pill">+16% <i
                                        class="fe fe-arrow-down"></i></span>
                                <a href="javascript:void(0);"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                    more</a>
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
    </div>

    <div class="row">
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
    </div>
@endsection
