@extends('layouts.master')

@section('page_title')
    {{ __('Outstanding & Jaminan') }}
@endsection

@section('section_header_title')
    {{ __('Outstanding & Jaminan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    {{-- <li class="breadcrumb-item">
        <a href="{{ route('outstandingdanjaminan.index') }}" class="text-white-50">
            {{ __('Kredit Nasabah') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Kredit Nasabah') }}</li> --}}
    <x-breadcrumb-item url="{{ route('outstandingdanjaminan.index') }}" title="{{ __('Outstanding & Jaminan') }}" />
    <x-breadcrumb-active title="{!! __('Memperbarui Data Outstanding & Jaminan') !!}" />
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('outstandingdanjaminan.update', $kredit_nasabah->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Outstanding & Jaminan') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses memperbarui data Outstanding & Jaminan') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('outstandingdanjaminan.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <input type="hidden" name="id" id="id" value="{{ old('id') ?? ($kredit_nasabah->id ?? '') }}"> --}}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="row mb-4">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                                <label for="status_kredit"
                                                    class="form-label text-default">{{ __('Status Kredit') }}
                                                    <x-all-not-null /></label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control select2 @error('status_kredit') is-invalid @enderror"
                                                    name="status_kredit" id="status_kredit" required>
                                                    <option value="Berjalan"
                                                        {{ old('status_kredit') == 'Berjalan' ? 'selected' : ($kredit_nasabah->status_kredit == 'Berjalan' ? 'selected' : '') }}>
                                                        {{ __('Berjalan') }}</option>
                                                    <option value="Lunas"
                                                        {{ old('status_kredit') == 'Lunas' ? 'selected' : ($kredit_nasabah->status_kredit == 'Lunas' ? 'selected' : '') }}>
                                                        {{ __('Lunas') }}</option>
                                                </select>
                                                @error('status_kredit')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div id="div_lunas">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                        <label for="tgl_lunas"
                                                            class="form-label text-default">{{ __('Tanggal Pelunasan') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-calendar-line"></i></span>
                                                            <input type="text"
                                                                class="form-control flatpickr @error('tgl_lunas') is-invalid @enderror"
                                                                name="tgl_lunas" id="tgl_lunas"
                                                                value="{{ old('tgl_lunas') ?? ($kredit_nasabah->tgl_lunas ?? '') }}"
                                                                placeholder="{{ __('Tanggal Pelunasan') }}">
                                                            @error('tgl_lunas')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                                <label for="status_kirim_barang"
                                                    class="form-label text-default">{{ __('Status Kirim Barang') }}
                                                    <x-all-not-null /></label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control select2 @error('status_kirim_barang') is-invalid @enderror"
                                                    name="status_kirim_barang" id="status_kirim_barang" required>
                                                    <option value="Belum Dikirim"
                                                        {{ old('status_kirim_barang') == 'Belum Dikirim' ? 'selected' : ($kredit_nasabah->status_kirim_barang == 'Belum Dikirim' ? 'selected' : '') }}>
                                                        {{ __('Belum Dikirim') }}</option>
                                                    <option value="Sudah Dikirim"
                                                        {{ old('status_kirim_barang') == 'Sudah Dikirim' ? 'selected' : ($kredit_nasabah->status_kirim_barang == 'Sudah Dikirim' ? 'selected' : '') }}>
                                                        {{ __('Sudah Dikirim') }}</option>
                                                </select>
                                                @error('status_kirim_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div id="div_kirim_barang">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                                    <label for="tgl_kirim_barang"
                                                        class="form-label text-default">{{ __('Tanggal Kirim Barang') }}</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted">
                                                            <i class="ri-calendar-line"></i>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control flatpickr @error('tgl_kirim_barang') is-invalid @enderror"
                                                            name="tgl_kirim_barang" id="tgl_kirim_barang"
                                                            value="{{ old('tgl_kirim_barang') ?? ($kredit_nasabah->tgl_kirim_barang ?? '') }}"
                                                            placeholder="{{ __('Tanggal Kirim Barang') }}">
                                                        @error('tgl_kirim_barang')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                                    <label for="note_kirim_barang"
                                                        class="form-label text-default">{{ __('Note Kirim Barang') }}</label>
                                                    <textarea class="form-control @error('note_kirim_barang') is-invalid @enderror" name="note_kirim_barang"
                                                        id="note_kirim_barang" placeholder="{{ __('Note Kirim Barang') }}" rows="4">{{ old('note_kirim_barang') ?? ($kredit_nasabah->note_kirim_barang ?? '') }}</textarea>
                                                    @error('note_kirim_barang')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="border shadow-none card custom-card border-dashed-primary">
                                            <div class="p-3 text-center card-body">
                                                <a href="javascript:void(0);">
                                                    <div class="justify-content-between">
                                                        <div class="mb-2 file-format-icon">
                                                            <div class="text-center">
                                                                <img src="{{ !empty($kredit_nasabah->image) ? url(config('common.path_storage') . $kredit_nasabah->image) : url(config('common.path_template') . config('common.image_user_profile_big')) }}"
                                                                    class="rounded img-fluid preview-path_image_barang"
                                                                    width="250" height="250">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="fw-semibold">
                                                                {{ __('Foto / Image Barang (Emas)') }}
                                                            </span>
                                                            <span class="fs-10 d-block text-muted">
                                                                ({{ __('250 x 250') }})
                                                            </span>
                                                            <div class="mt-3">
                                                                <input class="form-control" type="file"
                                                                    name="image_barang"
                                                                    onchange="preview('.preview-path_image_barang', this.files[0])">
                                                                <input type="hidden" name="old_image_barang"
                                                                    value="{{ $kredit_nasabah->image ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <h5>{{ __('Detail Barang') }}</h5>
                                <x-web-alert-message />
                                <table class="table table-hover table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">{{ __('No.') }}</th>
                                            <th width="80%">{{ __('No. Seri') }}</th>
                                            <th width="20%" class="text-end">{{ __('Gramasi') }}</th>
                                            <th width="20%" class="text-end">{{ __('Keping') }}</th>
                                            <th width="20%" class="text-end">{{ __('Total Gram') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $grand_total_keping = 0;
                                            $grand_total_gram = 0;
                                        @endphp
                                        @forelse ($kredit_detail as $kredit_details)
                                            @php
                                                $total_gram =
                                                    (float) $kredit_details->gramasi * (float) $kredit_details->keping;
                                                $grand_total_keping =
                                                    $grand_total_keping + (float) $kredit_details->keping;
                                                $grand_total_gram = $grand_total_gram + $total_gram;
                                            @endphp
                                            <tr>
                                                <td align="center">
                                                    <input class="form-control form-control-sm" name="id_detail[]"
                                                        type="hidden" value="{{ $kredit_details->id }}">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="no_seri[]" id="no_seri[]"
                                                        value="{{ old('no_seri[]') ?? ($kredit_details->no_seri ?? '') }}"
                                                        placeholder="{{ __('No. Seri') }}">
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm text-end" name="gramasi[]"
                                                        type="text" value="{{ $kredit_details->gramasi }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm text-end" name="keping[]"
                                                        type="text" value="{{ $kredit_details->keping }}" disabled>
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm text-end"
                                                        name="total_gram[]" type="text" value="{{ $total_gram }}"
                                                        disabled>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" align="center">{{ __('Tidak ada data') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3"><strong>{{ __('Total') }}</strong></th>
                                            <td class="text-end"><strong>{{ formatAmount($grand_total_keping, 2) }}
                                                </strong></td>
                                            <td class="text-end"><strong>{{ formatAmount($grand_total_gram, 2) }}</strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    @can('kredit nasabah update')
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

@include('layouts.includes.select2')
@include('layouts.includes.flatpickr')

@push('scripts')
    <script>
        var status_kredit = $("#status_kredit option:selected").val();
        var status_kirim_barang = $("#status_kirim_barang option:selected").val();

        $(document).ready(function() {
            if (status_kredit == 'Lunas') {
                $('#div_lunas').show();
            } else {
                $('#div_lunas').hide();
            }

            if (status_kirim_barang == 'Sudah Dikirim') {
                $('#div_kirim_barang').show();
            } else {
                $('#div_kirim_barang').hide();
            }
        });

        $(document.body).on("change", "#status_kredit", function() {
            if (this.value == "Lunas") {
                $('#div_lunas').show();
            } else {
                $('#div_lunas').hide();
            }
        });

        $(document.body).on("change", "#status_kirim_barang", function() {
            if (this.value == "Sudah Dikirim") {
                $('#div_kirim_barang').show();
            } else {
                $('#div_kirim_barang').hide();
            }
        });
    </script>
@endpush
