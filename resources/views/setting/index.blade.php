@extends('layouts.master')

@section('page_title')
    {{ __('Pengaturan Sistem') }}
@endsection

@section('section_header_title')
    {{ __('Pengaturan Sistem') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Pengaturan Sistem') }}</li>
@endsection

@section('page_content')
    <div class="card custom-card">
        <div class="card-body">
            <x-web-alert-message />
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#tab1"
                            aria-selected="true">
                            <i class="align-middle bx bx-info-circle me-2 fs-18"></i>
                            {{ __('Informasi Perusahaan') }}
                        </a>
                        <a class="mt-3 nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#tab2"
                            aria-selected="false" tabindex="-1">
                            <i class="align-middle bx bx-hive me-2 fs-18"></i>
                            {{ __('Persentase Jasa') }}
                        </a>
                        <a class="mt-3 nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#tab4"
                            aria-selected="false" tabindex="-1">
                            <i class="align-middle bx bx-receipt me-2 fs-18"></i>
                            {{ __('Penomoran Transaksi') }}
                        </a>
                        <a class="mt-3 nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#tab3"
                            aria-selected="false" tabindex="-1">
                            <i class="align-middle bx bx-cog me-2 fs-18"></i>
                            {{ __('Lainnya') }}
                        </a>
                    </nav>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tab-content mail-setting-tab mt-lg-0">
                        <div class="tab-pane text-muted active show" id="tab1" role="tabpanel">
                            <form method="POST" action="{{ route('general_setting.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="p-3">
                                    <div class="mb-3 row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                            <div class="border shadow-none card custom-card border-dashed-primary">
                                                <div class="p-3 card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Nama Perusahaan') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('company_name') is-invalid @enderror"
                                                                        name="company_name" id="company_name"
                                                                        value="{{ old('company_name') ?? ($setting_system['company_name'] ?? '') }}"
                                                                        placeholder="{{ __('Nama Perusahaan') }}" required
                                                                        autofocus>
                                                                    @error('company_name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Nama Aplikasi') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('site_title') is-invalid @enderror"
                                                                        name="site_title" id="site_title"
                                                                        value="{{ old('site_title') ?? ($setting_system['site_title'] ?? '') }}"
                                                                        placeholder="{{ __('Nama Aplikasi') }}" required>
                                                                    @error('site_title')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Email Perusahaan') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="email"
                                                                        class="form-control @error('company_email') is-invalid @enderror"
                                                                        name="company_email" id="company_email"
                                                                        value="{{ old('company_email') ?? ($setting_system['company_email'] ?? '') }}"
                                                                        placeholder="{{ __('Email Perusahaan') }}"
                                                                        required>
                                                                    @error('company_email')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('No. Kontak Perusahaan') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('company_phone') is-invalid @enderror"
                                                                        name="company_phone" id="company_phone"
                                                                        value="{{ old('company_phone') ?? ($setting_system['company_phone'] ?? '') }}"
                                                                        placeholder="{{ __('No. Kontak Perusahaan') }}">
                                                                    @error('company_phone')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Alamat Perusahaan') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address"
                                                                        id="company_address" rows="5" placeholder="{{ __('Alamat Perusahaan') }}">{{ old('company_address') ?? ($setting_system['company_address'] ?? '') }}</textarea>
                                                                    @error('company_address')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Logo Perusahaan') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <div class="row">
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="border shadow-none card custom-card border-dashed-primary">
                                                                                <div class="p-3 text-center card-body">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="mb-2 file-format-icon">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ !empty($setting_system['company_logo']) ? url(config('common.path_storage') . $setting_system['company_logo']) : url(config('common.path_template') . config('common.logo_company_main')) }}"
                                                                                                        class="rounded img-fluid preview-path_image_company_logo"
                                                                                                        width="200"
                                                                                                        height="200">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Perusahaan (Utama)') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    (200 x 200)
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_logo"
                                                                                                        onchange="preview('.preview-path_image_company_logo', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_logo"
                                                                                                        value="{{ $setting_system['company_logo'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="border shadow-none card custom-card border-dashed-primary">
                                                                                <div class="p-3 text-center card-body">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="mb-2 file-format-icon">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ !empty($setting_system['company_logo_desktop']) ? url(config('common.path_storage') . $setting_system['company_logo_desktop']) : url(config('common.path_template') . config('common.logo_company_desktop')) }}"
                                                                                                        class="rounded img-fluid preview-path_image_company_logo_desktop"
                                                                                                        width="125"
                                                                                                        height="33">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Perusahaan (Desktop)') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    (125 x 33)
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_logo_desktop"
                                                                                                        onchange="preview('.preview-path_image_company_logo_desktop', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_logo_desktop"
                                                                                                        value="{{ $setting_system['company_logo_desktop'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="border shadow-none card custom-card border-dashed-primary">
                                                                                <div class="p-3 text-center card-body">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="mb-2 file-format-icon">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ !empty($setting_system['company_logo_toggle']) ? url(config('common.path_storage') . $setting_system['company_logo_toggle']) : url(config('common.path_template') . config('common.logo_company_toggle')) }}"
                                                                                                        class="rounded img-fluid preview-path_image_company_logo_toggle"
                                                                                                        width="38"
                                                                                                        height="33">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Perusahaan (Toggle)') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    (38 x 33)
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_logo_toggle"
                                                                                                        onchange="preview('.preview-path_image_company_logo_toggle', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_logo_toggle"
                                                                                                        value="{{ $setting_system['company_logo_toggle'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="gap-2 d-grid">
                                                        <button class="btn btn-primary" type="submit">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane text-muted" id="tab2" role="tabpanel">
                            <form method="POST" action="{{ route('fee_setting.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="p-3">
                                    <div class="mb-3 row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                            <div class="border shadow-none card custom-card border-dashed-primary">
                                                <div class="p-3 card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Pinjaman Reguler') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control number-only default-number @error('fee_loan_regular') is-invalid @enderror"
                                                                            name="fee_loan_regular" id="fee_loan_regular"
                                                                            value="{{ old('fee_loan_regular') ?? (!empty($setting_system['fee_loan_regular']) ? $setting_system['fee_loan_regular'] : '0') }}"
                                                                            placeholder="{{ __('Persentase Jasa Pinjaman Reguler') }}"
                                                                            aria-describedby="basic-addon2" required>
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">%</span>
                                                                    </div>
                                                                    @error('fee_loan_regular')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Pinjaman Pendanaan') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control number-only default-number @error('fee_loan_funding') is-invalid @enderror"
                                                                            name="fee_loan_funding" id="fee_loan_funding"
                                                                            value="{{ old('fee_loan_funding') ?? (!empty($setting_system['fee_loan_funding']) ? $setting_system['fee_loan_funding'] : '0') }}"
                                                                            placeholder="{{ __('Persentase Jasa Pinjaman Pendanaan') }}"
                                                                            aria-describedby="basic-addon2" required>
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">%</span>
                                                                    </div>
                                                                    @error('fee_loan_funding')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Pinjaman Sosial') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control number-only default-number @error('fee_loan_social') is-invalid @enderror"
                                                                            name="fee_loan_social" id="fee_loan_social"
                                                                            value="{{ old('fee_loan_social') ?? (!empty($setting_system['fee_loan_social']) ? $setting_system['fee_loan_social'] : '0') }}"
                                                                            placeholder="{{ __('Persentase Jasa Pinjaman Sosial') }}"
                                                                            aria-describedby="basic-addon2" required>
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">%</span>
                                                                    </div>
                                                                    @error('fee_loan_social')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="gap-2 mt-2 d-grid">
                                                        <button class="btn btn-primary" type="submit">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane text-muted" id="tab3" role="tabpanel">
                            <form method="POST" action="{{ route('other_setting.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="p-3">
                                    <div class="mb-3 row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                            <div class="border shadow-none card custom-card border-dashed-primary">
                                                <div class="p-3 card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Digit Desimal Nominal') }}
                                                                        <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control number-only default-number @error('decimal_digit_amount') is-invalid @enderror"
                                                                        name="decimal_digit_amount"
                                                                        id="decimal_digit_amount"
                                                                        value="{{ old('decimal_digit_amount') ?? (!empty($setting_system['decimal_digit_amount']) ? $setting_system['decimal_digit_amount'] : '0') }}"
                                                                        placeholder="{{ __('Digit Desimal Nominal') }}"
                                                                        aria-describedby="basic-addon2" required>
                                                                    @error('decimal_digit_amount')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Digit Desimal Persen') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control number-only default-number @error('decimal_digit') is-invalid @enderror"
                                                                        name="decimal_digit_percent"
                                                                        id="decimal_digit_percent"
                                                                        value="{{ old('decimal_digit_percent') ?? (!empty($setting_system['decimal_digit_percent']) ? $setting_system['decimal_digit_percent'] : '0') }}"
                                                                        placeholder="{{ __('Digit Desimal Persen') }}"
                                                                        aria-describedby="basic-addon2" required>
                                                                    @error('decimal_digit_percent')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="gap-2 mt-2 d-grid">
                                                        <button class="btn btn-primary" type="submit">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane text-muted" id="tab4" role="tabpanel">
                            <form method="POST" action="{{ route('transaction_setting.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="p-3">
                                    <div class="mb-3 row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                            <div class="border shadow-none card custom-card border-dashed-primary">
                                                <div class="p-3 card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="mb-0 fs-14 fw-semibold">
                                                                        {{ __('Penjualan') }}
                                                                        <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-5">
                                                                    <label for="sale_prefix"
                                                                        class="form-label text-default">
                                                                        {{ __('Prefix') }}
                                                                        <x-all-not-null />
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('sale_prefix') is-invalid @enderror"
                                                                        name="sale_prefix" id="sale_prefix"
                                                                        value="{{ old('sale_prefix') ?? (!empty($setting_system['sale_prefix']) ? $setting_system['sale_prefix'] : '') }}"
                                                                        placeholder="{{ __('Prefix') }}"
                                                                        aria-describedby="basic-addon2" required>
                                                                    @error('sale_prefix')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <label for="sale_last_number"
                                                                        class="form-label text-default">
                                                                        {{ __('Nomor Terakhir') }}
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control number-only default-number @error('sale_last_number') is-invalid @enderror"
                                                                        name="sale_last_number" id="sale_last_number"
                                                                        value="{{ old('sale_last_number') ?? (!empty($setting_system['sale_last_number']) ? $setting_system['sale_last_number'] : '0') }}"
                                                                        placeholder="{{ __('Prefix') }}"
                                                                        aria-describedby="basic-addon2" disabled>
                                                                    @error('sale_last_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="gap-2 mt-2 d-grid">
                                                        <button class="btn btn-primary" type="submit">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".default-number").keyup(
                function() {
                    var fee_loan_regular = $("#fee_loan_regular").val();
                    var fee_loan_funding = $("#fee_loan_funding").val();
                    var fee_loan_social = $("#fee_loan_social").val();
                    var decimal_digit_amount = $("#decimal_digit_amount").val();
                    var decimal_digit_percent = $("#decimal_digit_percent").val();

                    if (fee_loan_regular.length == 0) {
                        $("#fee_loan_regular").val(0);
                    }
                    if (fee_loan_funding.length == 0) {
                        $("#fee_loan_funding").val(0);
                    }
                    if (fee_loan_social.length == 0) {
                        $("#fee_loan_social").val(0);
                    }
                    if (decimal_digit_amount.length == 0) {
                        $("#decimal_digit_amount").val(0);
                    }
                    if (decimal_digit_percent.length == 0) {
                        $("#decimal_digit_percent").val(0);
                    }
                });
        });
    </script>
@endpush
