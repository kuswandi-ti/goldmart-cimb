@extends('layouts.master')

@section('page_title')
    {{ __('Kredit Nasabah') }}
@endsection

@section('section_header_title')
    {{ __('Kredit Nasabah') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Kredit Nasabah') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Kredit Nasabah') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data kredit nasabah') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                    <th scope="col" width="12%">{{ __('Aksi') }}</th>
                                    <th scope="col">{{ __('Tgl Incoming') }}</th>
                                    <th scope="col">{{ __('Tgl Pencairan') }}</th>
                                    <th scope="col">{{ __('Nama Nasabah') }}</th>
                                    <th scope="col">{{ __('Alamat Nasabah') }}</th>
                                    <th scope="col">{{ __('Telp. Nasabah') }}</th>
                                    <th scope="col">{{ __('Rekening Pencairan') }}</th>
                                    <th scope="col">{{ __('Nama Barang') }}</th>
                                    <th scope="col">{{ __('Nilai Pencairan') }}</th>
                                    <th scope="col">{{ __('Margin Keuntungan') }}</th>
                                    <th scope="col">{{ __('Angsuran') }}</th>
                                    <th scope="col">{{ __('Tenor') }}</th>
                                    <th scope="col">{{ __('Turun Plafon') }}</th>
                                    <th scope="col">{{ __('Periode Bulan') }}</th>
                                    <th scope="col" width="10%">{{ __('Status Pelunasan') }}</th>
                                    <th scope="col" width="10%">{{ __('Status Pengambilan Barang') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@include('layouts.includes.datatable')

@push('scripts')
    <script>
        let table_data;

        table_data = $('#table_data').DataTable({
            processing: true,
            autoWidth: false,
            responsive: true,
            serverSide: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            ajax: {
                url: '{{ route('kreditnasabah.data') }}',
            },
            columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                sortable: false,
            }, {
                data: 'action',
                searchable: false,
                sortable: false,
            }, {
                data: 'tgl_incoming',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'nama_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'alamat_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'tlp_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'rekening_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'nilai_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'margin_keuntungan',
                searchable: true,
                sortable: true,
            }, {
                data: 'angsuran',
                searchable: true,
                sortable: true,
            }, {
                data: 'tenor',
                searchable: true,
                sortable: true,
            }, {
                data: 'turun_plafon',
                searchable: true,
                sortable: true,
            }, {
                data: 'periode_bulan',
                searchable: true,
                sortable: true,
            }, {
                data: 'status_lunas',
                searchable: true,
                sortable: true,
            }, {
                data: 'status_pengambilan_barang',
                searchable: true,
                sortable: true,
            }],
            "columnDefs": [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [9, 10, 11]
            }, ]
        });
    </script>
@endpush
