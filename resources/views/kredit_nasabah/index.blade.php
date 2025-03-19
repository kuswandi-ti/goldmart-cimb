@extends('layouts.master')

@section('page_title')
    {{ __('Outstanding & Jaminan') }}
@endsection

@section('section_header_title')
    {{ __('Outstanding & Jaminan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    {{-- <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Kredit Nasabah') }}</li> --}}
    <x-breadcrumb-active title="{!! __('Daftar Data Outstanding & Jaminan') !!}" />
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Outstanding & Jaminan') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data Outstanding & Jaminan') }}
                            </p>
                        </div>
                    </div>
                    {{-- @can('external update')
                        <div class="d-flex" role="search">
                            <a href="#" class="btn btn-danger">
                                {{ __('Update Eksternal Data') }}
                            </a>
                        </div>
                    @endcan --}}
                </div>
                <div class="card-body">
                    {{-- <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="pills-tab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" role="tab"
                                data-bs-target="#tab_kredit_berjalan" aria-selected="true">{{ __('Berjalan') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" role="tab" data-bs-target="#tab_kredit_lunas"
                                aria-selected="false">{{ __('Lunas') }}</a>
                        </li>
                    </ul> --}}

                    <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="kredit_berjalan_tab" data-bs-toggle="tab"
                                data-bs-target="#tab_kredit_berjalan" type="button" role="tab"
                                aria-controls="kredit_berjalan" aria-selected="true">{{ __('Berjalan') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kredit_lunas_tab" data-bs-toggle="tab"
                                data-bs-target="#tab_kredit_lunas" type="button" role="tab"
                                aria-controls="kredit_lunas" aria-selected="false">{{ __('Lunas') }}</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active text-muted" id="tab_kredit_berjalan" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_data">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">{{ __('No.') }}</th>
                                            <th scope="col" width="12%">{{ __('Aksi') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kredit') }}</th>
                                            <th scope="col">{{ __('Kode Nasabah') }}</th>
                                            <th scope="col">{{ __('Nama Nasabah') }}</th>
                                            <th scope="col">{{ __('No. Loan') }}</th>
                                            <th scope="col">{{ __('Total Keping') }}</th>
                                            <th scope="col">{{ __('Total Gram') }}</th>
                                            <th scope="col">{{ __('Total Nilai Kredit') }}</th>
                                            <th scope="col">{{ __('Tgl Pencairan') }}</th>
                                            <th scope="col">{{ __('Tgl Pelunasan') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane text-muted" id="tab_kredit_lunas" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_data_lunas">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">{{ __('No.') }}</th>
                                            <th scope="col" width="5%">{{ __('Aksi') }}</th>
                                            <th scope="col" width="7%">{{ __('Status Kredit') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kirim') }}</th>
                                            <th scope="col">{{ __('Kode Nasabah') }}</th>
                                            <th scope="col">{{ __('Nama Nasabah') }}</th>
                                            <th scope="col">{{ __('No. Loan') }}</th>
                                            <th scope="col">{{ __('Total Keping') }}</th>
                                            <th scope="col">{{ __('Total Gram') }}</th>
                                            <th scope="col">{{ __('Total Nilai Kredit') }}</th>
                                            <th scope="col">{{ __('Tgl Pencairan') }}</th>
                                            <th scope="col">{{ __('Tgl Pelunasan') }}</th>
                                            <th scope="col">{{ __('Tgl Kirim Barang') }}</th>
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
        </div>
    </div>

    <div class="modal fade" id="viewDataModal" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="viewDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id"></input>
                    <h6 class="modal-title" id="viewDataLabel"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="modal-title" id="data_nasabah"></h6>
                            <hr>
                            <table class="table table-hover table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th width="15%" class="text-center">{{ __('No.') }}</th>
                                        <th width="40%">{{ __('No. Seri') }}</th>
                                        <th width="15%" class="text-end">{{ __('Gramasi') }}</th>
                                        <th width="15%" class="text-end">{{ __('Keping') }}</th>
                                        <th width="15%" class="text-end">{{ __('Total Gram') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@include('layouts.includes.datatable')
@include('layouts.includes.select2')
@include('layouts.includes.flatpickr')

@push('scripts')
    <script>
        let table_data;
        let table_data_lunas;

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
                url: '{{ route('outstandingdanjaminan.data') }}',
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
                data: 'status_kredit',
                searchable: true,
                sortable: true,
            }, {
                data: 'nasabah_code',
                searchable: true,
                sortable: true,
            }, {
                data: 'nasabah_name',
                searchable: true,
                sortable: true,
            }, {
                data: 'no_loan',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_keping',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_gram',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_nilai_kredit',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_lunas',
                searchable: true,
                sortable: true,
            }],
            columnDefs: [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [8]
            }, ],
            order: [
                [9, 'desc']
            ]
        });

        table_data_lunas = $('#table_data_lunas').DataTable({
            processing: true,
            autoWidth: false,
            responsive: true,
            serverSide: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            ajax: {
                url: '{{ route('outstandingdanjaminan.datalunas') }}',
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
                data: 'status_kredit',
                searchable: true,
                sortable: true,
            }, {
                data: 'status_kirim_barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'nasabah_code',
                searchable: true,
                sortable: true,
            }, {
                data: 'nasabah_name',
                searchable: true,
                sortable: true,
            }, {
                data: 'no_loan',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_keping',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_gram',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_nilai_kredit',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_lunas',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_kirim_barang',
                searchable: true,
                sortable: true,
            }],
            columnDefs: [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [9]
            }, ],
            order: [
                [9, 'desc']
            ]
        });

        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(event) {
            var tabID = $(event.target).attr('data-bs-target');
            if (tabID === '#tab_kredit_berjalan') {
                table_data.columns.adjust().responsive.recalc();
            }
            if (tabID === '#tab_kredit_lunas') {
                table_data_lunas.columns.adjust().responsive.recalc();
            }
        });

        // $('#status_lunas, #status_kirim_barang').select2({
        //     dropdownParent: $('#editDataModal')
        // });

        // $(document).ready(function() {
        //     $('#div_lunas').hide();
        //     $('#div_kirim_barang').hide();
        // });

        // $(document.body).on("change", "#status_lunas", function() {
        //     if (this.value == "Sudah Lunas") {
        //         $('#div_lunas').show();
        //     } else {
        //         $('#div_lunas').hide();
        //     }
        // });

        // $(document.body).on("change", "#status_kirim_barang", function() {
        //     if (this.value == "Sudah Dikirim") {
        //         $('#div_kirim_barang').show();
        //     } else {
        //         $('#div_kirim_barang').hide();
        //     }
        // });

        $('body').on('click', '#id_kredit_nasabah', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: `outstandingdanjaminan/detail/show_detail/${id}`,
                type: "GET",
                cache: false,
                success: function(response) {
                    $('#viewDataLabel').html("Detail Data Barang");

                    $('#data_nasabah').html("Nasabah : " + response.nasabah.nama + " (" +
                        response.nasabah.kode + ")");

                    var $tableBody = $('#table tbody');
                    var no = 1;
                    var total_gram = 0;
                    var grand_total_keping = 0;
                    var grand_total_gram = 0;

                    $tableBody.empty();

                    if (response.kredit_detail.length > 0) {
                        $.each(response.kredit_detail, function(index, rowData) {
                            var $newRow = $('<tr>');
                            total_gram = Number(rowData.gramasi) * Number(rowData.keping);
                            grand_total_keping = grand_total_keping + Number(rowData.keping);
                            grand_total_gram = grand_total_gram + total_gram;
                            $newRow.append('<td align="center">' + no + '</td>');
                            $newRow.append('<td>' + rowData.no_seri + '</td>');
                            $newRow.append('<td align="right">' + formatAmount(rowData
                                .gramasi) + '</td>');
                            $newRow.append('<td align="right">' + formatAmount(rowData
                                .keping) + '</td>');
                            $newRow.append('<td align="right">' + formatAmount(total_gram) +
                                '</td>');
                            $tableBody.append($newRow);

                            no++;
                        });
                        var $newRow = $('<tr>');
                        $newRow.append('<td colspan="3"><b>Total</b></td>');
                        $newRow.append('<td align="right"><b>' + formatAmount(grand_total_keping) +
                            '</b></td>');
                        $newRow.append('<td align="right"><b>' + formatAmount(grand_total_gram) +
                            '</b></td>');
                        $tableBody.append($newRow);
                    } else {
                        var $newRow = $('<tr>');
                        $newRow.append('<td colspan="4" align="center">Tidak ada data</td>');
                        $tableBody.append($newRow);
                    }

                    // $('#id').val(response.id);
                    // $("#status_lunas").val(response.status_lunas).trigger('change');
                    // $('#tgl_lunas').val(response.tgl_lunas);
                    // $("#status_kirim_barang").val(response.status_kirim_barang).trigger('change');
                    // $('#tgl_kirim_barang').val(response.tgl_kirim_barang);
                    // $('#note_kirim_barang').val(response.note_kirim_barang);

                    $('#viewDataModal').modal('show');
                }
            });
        });

        // $('body').on('click', '.edit', function(e) {
        //     e.preventDefault();
        //     var id = $(this).data('id');

        //     $.ajax({
        //         url: `outstandingdanjaminan/${id}/edit`,
        //         type: "GET",
        //         cache: false,
        //         success: function(response) {
        //             $('#editDataLabel').html("Perbarui Data");
        //             $('#id').val(response.id);
        //             $("#status_lunas").val(response.status_lunas).trigger('change');
        //             $('#tgl_lunas').val(response.tgl_lunas);
        //             $("#status_kirim_barang").val(response.status_kirim_barang).trigger('change');
        //             $('#tgl_kirim_barang').val(response.tgl_kirim_barang);
        //             $('#note_kirim_barang').val(response.note_kirim_barang);
        //             $('#editDataModal').modal('show');
        //         }
        //     });
        // });

        // $('#update').click(function(e) {
        //     e.preventDefault();

        //     let id = $('#id').val();
        //     let status_lunas = $("#status_lunas option:selected").val();
        //     let tgl_lunas = $('#tgl_lunas').val();
        //     let status_kirim_barang = $("#status_kirim_barang option:selected").val();
        //     let tgl_kirim_barang = $('#tgl_kirim_barang').val();
        //     let note_kirim_barang = $('#note_kirim_barang').val();

        //     $.ajax({
        //         method: 'PUT',
        //         url: `outstandingdanjaminan/${id}`,
        //         cache: false,
        //         data: {
        //             "status_lunas": status_lunas,
        //             "tgl_lunas": tgl_lunas,
        //             "status_kirim_barang": status_kirim_barang,
        //             "tgl_kirim_barang": tgl_kirim_barang,
        //             "note_kirim_barang": note_kirim_barang
        //         },
        //         success: function(data) {
        //             //console.log(data)
        //             if (data.success == true) {
        //                 Swal.fire(
        //                     "{{ __('Perbarui Data !') }}",
        //                     data.message,
        //                     'success'
        //                 ).then(() => {
        //                     window.location.reload();
        //                 });
        //             } else if (data.success == false) {
        //                 Swal.fire(
        //                     'Error!',
        //                     data.message,
        //                     'error'
        //                 )
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });
    </script>
@endpush
