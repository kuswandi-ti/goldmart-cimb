@extends('layouts.master')

@section('page_title')
    {{ __('Import Data') }}
@endsection

@section('section_header_title')
    {{ __('Import Data') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Kredit Nasabah') }}</li> --}}
    <x-breadcrumb-active title="{!! __('Import Data') !!}" />
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Import Data') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Import file excel data kredit nasabah') }}
                            </p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('importdata.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <x-web-alert-message />

                        <div class="row gy-4">
                            <div class="col-xl-12">
                                <label for="file" class="form-label text-default">{{ __('Pilih File Excel') }}
                                    <x-all-not-null /></label>
                                <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Import Data') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />
