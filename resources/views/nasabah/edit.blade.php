@extends('layouts.master')

@section('page_title')
    {{ __('Nasabah') }}
@endsection

@section('section_header_title')
    {{ __('Nasabah') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('nasabah.index') }}" class="text-white-50">
            {{ __('Nasabah') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Nasabah') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('nasabah.update', $nasabah) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Nasabah') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses memperbarui data nasabah') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('nasabah.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-xl-12">
                                <label for="kode" class="form-label text-default">{{ __('Kode Nasabah') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                    name="kode" value="{{ old('kode') ?? (!empty($nasabah) ? $nasabah->kode : '') }}"
                                    placeholder="{{ __('Kode Nasabah') }}" disabled>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="nama" class="form-label text-default">{{ __('Nama Nasabah') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') ?? (!empty($nasabah) ? $nasabah->nama : '') }}"
                                    placeholder="{{ __('Nama Nasabah') }}" disabled>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">{{ __('Email') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') ?? (!empty($nasabah) ? $nasabah->email : '') }}"
                                    placeholder="{{ __('Email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="no_tlp" class="form-label text-default">{{ __('No. Tlp') }}</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror"
                                    name="no_tlp"
                                    value="{{ old('no_tlp') ?? (!empty($nasabah) ? $nasabah->no_tlp : '') }}"
                                    placeholder="{{ __('No. Tlp') }}">
                                @error('no_tlp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="alamat" class="form-label text-default">{{ __('Alamat') }}</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                    placeholder="{{ __('Alamat') }}" rows="4">{{ old('alamat') ?? ($nasabah->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @can('nasabah update')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Perbarui') }}
                            </button>
                        </div>
                    @endcan
                </div>
            </form>
        </div>
    </div>
@endsection
