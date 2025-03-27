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
        <div class="col-xxl-3 col-xl-3 col-md-12">
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
                            <p class="h6 bg-primary-transparent rounded-pill">{{ __('Belum Pelunasan : ') }}</p>
                            <h4 class="h6 bg-primary-transparent rounded-pill">
                                &nbsp;{{ $total_nasabah_belum_pelunasan->total_nasabah_belum_pelunasan }}
                            </h4>
                            <a href="{{ route('outstandingdanjaminan.index') }}"
                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                            </a>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-primary-transparent rounded-pill">{{ __('Sudah Pelunasan : ') }}</p>
                            <h4 class="h6 bg-primary-transparent rounded-pill">
                                &nbsp;{{ $total_nasabah_sudah_pelunasan->total_nasabah_sudah_pelunasan }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-12">
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
                            <p class="h6 bg-secondary-transparent rounded-pill">{{ __('Total Gramasi : ') }}
                            </p>
                            <h4 class="h6 bg-secondary-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_gramasi->total_gramasi, 2) }}
                            </h4>
                            {{-- <a href="outstandingdanjaminan/detail/kredit" --}}
                            <a href="{{ route('outstandingdanjaminan.index') }}"
                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                            </a>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-secondary-transparent rounded-pill">{{ __('Total Kepingan : ') }}
                            </p>
                            <h4 class="h6 bg-secondary-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_kepingan->total_kepingan) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-12">
            <div class="col card-background">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <p class="mb-1 fw-medium text-muted">{{ __('Sudah Pelunasan (Rp.)') }}</p>
                                <h4 class="mb-0">{{ formatAmount($total_sudah_lunas->total_sudah_lunas) }}</h4>
                            </div>
                            <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                <i class="bi bi-currency-dollar fs-20"></i>
                            </div>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-info-transparent rounded-pill">{{ __('Total Gramasi : ') }}
                            </p>
                            <h4 class="h6 bg-info-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_gramasi_sudah_pelunasan->total_gramasi_sudah_pelunasan, 2) }}
                            </h4>
                            {{-- <a href="outstandingdanjaminan/detail/sudah-lunas" --}}
                            <a href="{{ route('outstandingdanjaminan.index') }}"
                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                            </a>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-info-transparent rounded-pill">{{ __('Total Kepingan : ') }}
                            </p>
                            <h4 class="h6 bg-info-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_kepingan_sudah_pelunasan->total_kepingan_sudah_pelunasan) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-12">
            <div class="col card-background">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <p class="mb-1 fw-medium text-muted">{{ __('Belum Pelunasan (Rp.)') }}</p>
                                <h4 class="mb-0">{{ formatAmount($total_belum_lunas->total_belum_lunas) }}</h4>
                            </div>
                            <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                <i class="bi bi-bell fs-20"></i>
                            </div>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-danger-transparent rounded-pill">{{ __('Total Gramasi : ') }}
                            </p>
                            <h4 class="h6 bg-danger-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_gramasi_belum_pelunasan->total_gramasi_belum_pelunasan, 2) }}
                            </h4>
                            {{-- <a href="outstandingdanjaminan/detail/belum-lunas" --}}
                            <a href="{{ route('outstandingdanjaminan.index') }}"
                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                            </a>
                        </div>
                        <div class="mt-2 d-flex">
                            <p class="h6 bg-danger-transparent rounded-pill">{{ __('Total Kepingan : ') }}
                            </p>
                            <h4 class="h6 bg-danger-transparent rounded-pill">
                                &nbsp;{{ formatAmount($total_kepingan_belum_pelunasan->total_kepingan_belum_pelunasan) }}
                            </h4>
                        </div>
                        {{-- <div class="mt-2 d-flex">
                            <span class="badge bg-danger-transparent rounded-pill">
                                {{ __('Total Gramasi : ') }}
                            </span>
                            <span class="badge bg-danger-transparent rounded-pill">
                                <b>{{ formatAmount($total_gramasi_belum_pelunasan->total_gramasi_belum_pelunasan, 2) }}</b>
                            </span>
                            <a href="outstandingdanjaminan/detail/belum-lunas"
                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}</a>
                        </div>
                        <div class="mt-2 d-flex">
                            <span class="badge bg-danger-transparent rounded-pill">
                                {{ __('Total Kepingan : ') }}
                            </span>
                            <span class="badge bg-danger-transparent rounded-pill">
                                <b>{{ formatAmount($total_kepingan_belum_pelunasan->total_kepingan_belum_pelunasan) }}</b>
                            </span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                {{-- <div class="col card-background">
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
                                <p class="h6 badge bg-primary-transparent rounded-pill">{{ __('Belum Pelunasan : ') }}</p>
                                <h4 class="h6 badge bg-primary-transparent rounded-pill">
                                    {{ $total_nasabah_belum_pelunasan->total_nasabah_belum_pelunasan }}
                                </h4>
                                <a href="{{ route('outstandingdanjaminan.index') }}"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                                </a>
                            </div>
                            <div class="mt-2 d-flex">
                                <p class="h6 badge bg-primary-transparent rounded-pill">{{ __('Sudah Pelunasan : ') }}</p>
                                <h4 class="h6 badge bg-primary-transparent rounded-pill">
                                    {{ $total_nasabah_sudah_pelunasan->total_nasabah_sudah_pelunasan }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col card-background">
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
                                <p class="h6 badge bg-secondary-transparent rounded-pill">{{ __('Total Gramasi : ') }}
                                </p>
                                <h4 class="h6 badge bg-secondary-transparent rounded-pill">
                                    {{ formatAmount($total_gramasi->total_gramasi, 2) }}
                                </h4>
                                <a href="outstandingdanjaminan/detail/kredit"
                                    class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">{{ __('Lihat Detail') }}
                                </a>
                            </div>
                            <div class="mt-2 d-flex">
                                <p class="h6 badge bg-secondary-transparent rounded-pill">{{ __('Total Kepingan : ') }}
                                </p>
                                <h4 class="h6 badge bg-secondary-transparent rounded-pill">
                                    {{ formatAmount($total_kepingan->total_kepingan) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col card-background">
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
                                <a href="outstandingdanjaminan/detail/keuntungan"
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
                </div> --}}
                {{-- <div class="col card-background">
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
                                <a href="outstandingdanjaminan/detail/sudah-lunas"
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
                </div> --}}
                {{-- <div class="col card-background">
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
                                <a href="outstandingdanjaminan/detail/belum-lunas"
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
                </div> --}}
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div id="kreditstatistic1"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <form action="{{ route('dashboard.index') }}" method="GET" id="form-search1">
        @csrf

        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            &nbsp;
                        </div>

                        {{-- <form action="{{ route('dashboard.index') }}" method="GET" id="form-search1">
                        @csrf --}}

                        <div class="dropdown d-flex">
                            <div class="me-2" id="div-filter1">
                                {{-- <div class="input-group" id="div-filter-daily1"
                                    style="width: 200px; display: {{ request()->get('f1') == 'daily1' ? '' : 'none' }};">
                                    <div class="input-group-text text-muted">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                    <input type="text" class="form-control flatpickr" name="efd1"
                                        value="{{ request()->get('f1') == 'daily1' ? request()->get('efd1') : date($setting_system['default_date_format']) }}">
                                </div>
                                <div id="div-filter-weekly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'weekly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efw1'>
                                        @for ($i = 1; $i <= 53; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efw1') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-monthly1"
                                    style="width: 200px; display: {{ request()->get('f1') == 'monthly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efm1'>
                                        @for ($i = 1; $i < 12; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efm1') == $i ? 'selected' : '' }}>
                                                {{ formatMonth($i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-quarterly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'quarterly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efq1'>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efq1') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-yearly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'yearly1' ? '' : 'none' }};">
                                    <input type="text" class="form-control" name="efy1"
                                        value="{{ request()->get('f1') == 'yearly1' ? request()->get('efy1') : date('Y') }}">
                                </div> --}}
                                <div id="div-filter-yearly1" style="width: 100px;">
                                    <input type="text" class="form-control" name="efy1"
                                        value="{{ !empty(request()->get('efy1')) ? request()->get('efy1') : date('Y') }}">
                                </div>
                            </div>

                            {{-- <div class="me-2" style="width: 150px;">
                                <select class = "form-select" name='f1' style="height: 100%;">
                                    <option value="all1" {{ request()->get('f1') == 'all1' ? 'selected' : '' }}
                                        id="filter-all1">{{ __('Semua Data') }}</option>
                                    <option value="daily1" {{ request()->get('f1') == 'daily1' ? 'selected' : '' }}
                                        id="filter-daily1">{{ __('Daily') }}</option>
                                    <option value="weekly1" {{ request()->get('f1') == 'weekly1' ? 'selected' : '' }}
                                        id="filter-weekly1">{{ __('Weekly') }}</option>
                                    <option value="monthly1" {{ request()->get('f1') == 'monthly1' ? 'selected' : '' }}
                                        id="filter-monthly1">{{ __('Monthly') }}</option>
                                    <option value="quarterly1"
                                        {{ request()->get('f1') == 'quarterly1' ? 'selected' : '' }}
                                        id="filter-quarterly1">{{ __('Quarterly') }}</option>
                                    <option value="yearly1" {{ request()->get('f1') == 'yearly1' ? 'selected' : '' }}
                                        id="filter-yearly1">{{ __('Yearly') }}</option>
                                </select>
                            </div> --}}

                            <button type="submit"
                                class="btn btn-sm btn-primary-light btn-wave waves-effect waves-light d-flex align-items-center me-2"
                                name="submit" value="search">
                                {{ __('Submit') }}
                            </button>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="card-body">
                        <div id="kreditstatistic1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            &nbsp;
                        </div>

                        {{-- <form action="{{ route('dashboard.index') }}" method="GET" id="form-search2">
                            @csrf --}}

                        <div class="dropdown d-flex">
                            <div class="me-2" id="div-filter2">
                                {{-- <div class="input-group" id="div-filter-daily1"
                                    style="width: 200px; display: {{ request()->get('f1') == 'daily1' ? '' : 'none' }};">
                                    <div class="input-group-text text-muted">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                    <input type="text" class="form-control flatpickr" name="efd1"
                                        value="{{ request()->get('f1') == 'daily1' ? request()->get('efd1') : date($setting_system['default_date_format']) }}">
                                </div>
                                <div id="div-filter-weekly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'weekly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efw1'>
                                        @for ($i = 1; $i <= 53; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efw1') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-monthly1"
                                    style="width: 200px; display: {{ request()->get('f1') == 'monthly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efm1'>
                                        @for ($i = 1; $i < 12; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efm1') == $i ? 'selected' : '' }}>
                                                {{ formatMonth($i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-quarterly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'quarterly1' ? '' : 'none' }};">
                                    <select class='js-example-placeholder-single js-states form-control select2'
                                        name='efq1'>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value={{ $i }}
                                                {{ request()->get('efq1') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div id="div-filter-yearly1"
                                    style="width: 100px; display: {{ request()->get('f1') == 'yearly1' ? '' : 'none' }};">
                                    <input type="text" class="form-control" name="efy1"
                                        value="{{ request()->get('f1') == 'yearly1' ? request()->get('efy1') : date('Y') }}">
                                </div> --}}
                                <div id="div-filter-yearly2" style="width: 100px;">
                                    <input type="text" class="form-control" name="efy2"
                                        value="{{ !empty(request()->get('efy2')) ? request()->get('efy2') : date('Y') }}">
                                </div>
                            </div>

                            {{-- <div class="me-2" style="width: 150px;">
                                <select class = "form-select" name='f1' style="height: 100%;">
                                    <option value="all1" {{ request()->get('f1') == 'all1' ? 'selected' : '' }}
                                        id="filter-all1">{{ __('Semua Data') }}</option>
                                    <option value="daily1" {{ request()->get('f1') == 'daily1' ? 'selected' : '' }}
                                        id="filter-daily1">{{ __('Daily') }}</option>
                                    <option value="weekly1" {{ request()->get('f1') == 'weekly1' ? 'selected' : '' }}
                                        id="filter-weekly1">{{ __('Weekly') }}</option>
                                    <option value="monthly1" {{ request()->get('f1') == 'monthly1' ? 'selected' : '' }}
                                        id="filter-monthly1">{{ __('Monthly') }}</option>
                                    <option value="quarterly1"
                                        {{ request()->get('f1') == 'quarterly1' ? 'selected' : '' }}
                                        id="filter-quarterly1">{{ __('Quarterly') }}</option>
                                    <option value="yearly1" {{ request()->get('f1') == 'yearly1' ? 'selected' : '' }}
                                        id="filter-yearly1">{{ __('Yearly') }}</option>
                                </select>
                            </div> --}}

                            <button type="submit"
                                class="btn btn-sm btn-primary-light btn-wave waves-effect waves-light d-flex align-items-center me-2"
                                name="submit" value="search">
                                {{ __('Submit') }}
                            </button>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="card-body">
                        <div id="kreditstatistic2"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

        // var f1 = {{ Js::from(request()->get('f1')) }}
        var e1 = {{ Js::from(request()->get('efy1')) }};
        var e2 = {{ Js::from(request()->get('efy2')) }};

        var yearNow = new Date().getFullYear();

        // if (f1 == 'all1' || !f1) {
        //     e1 = 'Semua Data';
        // } else if (f1 == 'daily1') {
        //     e1 = 'Tanggal ' + {{ Js::from(request()->get('efd1')) }};
        // } else if (f == 'weekly1') {
        //     e1 = 'Minggu ke ' + {{ Js::from(request()->get('efw1')) }};
        // } else if (f == 'monthly1') {
        //     e1 = 'Bulan ' + months[{{ Js::from(request()->get('efm1')) }} - 1];
        // } else if (f == 'quarterly1') {
        //     e1 = 'Quarter ke ' + {{ Js::from(request()->get('efq1')) }};
        // } else if (f == 'yearly1') {
        //     e1 = 'Tahun ' + {{ Js::from(request()->get('efy1')) }};
        // }

        // $(document).ready(function() {
        //     $("#filter-all1").click(function() {
        //         $("#div-filter1").hide();
        //     });

        //     $("#filter-daily1").click(function() {
        //         $("#div-filter1").show();
        //         $("#div-filter-daily1").show();
        //         $("#div-filter-weekly1").hide();
        //         $("#div-filter-monthly1").hide();
        //         $("#div-filter-quarterly1").hide();
        //         $("#div-filter-yearly1").hide();
        //     });

        //     $("#filter-weekly1").click(function() {
        //         $("#div-filter1").show();
        //         $("#div-filter-daily1").hide();
        //         $("#div-filter-weekly1").show();
        //         $("#div-filter-monthly1").hide();
        //         $("#div-filter-quarterly1").hide();
        //         $("#div-filter-yearly1").hide();
        //     });

        //     $("#filter-monthly1").click(function() {
        //         $("#div-filter1").show();
        //         $("#div-filter-daily1").hide();
        //         $("#div-filter-weekly1").hide();
        //         $("#div-filter-monthly1").show();
        //         $("#div-filter-quarterly1").hide();
        //         $("#div-filter-yearly1").hide();
        //     });

        //     $("#filter-quarterly1").click(function() {
        //         $("#div-filter1").show();
        //         $("#div-filter-daily1").hide();
        //         $("#div-filter-weekly1").hide();
        //         $("#div-filter-monthly1").hide();
        //         $("#div-filter-quarterly1").show();
        //         $("#div-filter-yearly1").hide();
        //     });

        //     $("#filter-yearly1").click(function() {
        //         $("#div-filter1").show();
        //         $("#div-filter-daily1").hide();
        //         $("#div-filter-weekly1").hide();
        //         $("#div-filter-monthly1").hide();
        //         $("#div-filter-quarterly1").hide();
        //         $("#div-filter-yearly1").show();
        //     });
        // });

        Highcharts.chart('kreditstatistic1', {
            chart: {
                type: 'line',
                zooming: {
                    type: 'x'
                }
            },
            title: {
                text: 'Statistik Pelunasan Kredit<br>' + (e1 !== null ? e1 : yearNow)
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
                text: 'Statistik Total Emas (Belum Pelunasan)<br>' + (e2 !== null ? e2 : yearNow)
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
