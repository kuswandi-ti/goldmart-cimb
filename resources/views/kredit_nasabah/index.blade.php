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
                    @can('external update')
                        <div class="d-flex" role="search">
                            <a href="#" class="btn btn-danger">
                                {{ __('Update Eksternal Data') }}
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="pills-tab"
                        role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" role="tab" href="#tab_kredit_berjalan"
                                aria-selected="true">{{ __('Berjalan') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#tab_kredit_lunas"
                                aria-selected="false">{{ __('Lunas') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active text-muted" id="tab_kredit_berjalan" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_data">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                            <th scope="col" width="12%">{{ __('Aksi') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kredit') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kirim Barang') }}</th>
                                            <th scope="col">{{ __('Nama Nasabah') }}</th>
                                            <th scope="col">{{ __('Alamat Nasabah') }}</th>
                                            <th scope="col">{{ __('Telp. Nasabah') }}</th>
                                            <th scope="col">{{ __('Rekening Pencairan') }}</th>
                                            <th scope="col">{{ __('Nama Barang') }}</th>
                                            <th scope="col">{{ __('Jumlah Barang') }}</th>
                                            <th scope="col">{{ __('Total Nilai Kredit') }}</th>
                                            <th scope="col">{{ __('Margin Keuntungan') }}</th>
                                            <th scope="col">{{ __('Angsuran') }}</th>
                                            <th scope="col">{{ __('Tenor') }}</th>
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
                        <div class="tab-pane text-muted" id="tab_kredit_lunas" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_data_lunas">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                            <th scope="col" width="12%">{{ __('Aksi') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kredit') }}</th>
                                            <th scope="col" width="10%">{{ __('Status Kirim Barang') }}</th>
                                            <th scope="col">{{ __('Nama Nasabah') }}</th>
                                            <th scope="col">{{ __('Alamat Nasabah') }}</th>
                                            <th scope="col">{{ __('Telp. Nasabah') }}</th>
                                            <th scope="col">{{ __('Rekening Pencairan') }}</th>
                                            <th scope="col">{{ __('Nama Barang') }}</th>
                                            <th scope="col">{{ __('Jumlah Barang') }}</th>
                                            <th scope="col">{{ __('Total Nilai Kredit') }}</th>
                                            <th scope="col">{{ __('Margin Keuntungan') }}</th>
                                            <th scope="col">{{ __('Angsuran') }}</th>
                                            <th scope="col">{{ __('Tenor') }}</th>
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
                            <table class="table table-hover table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th width="15%" class="text-center">No.</th>
                                        <th width="55%">No. Seri</th>
                                        <th width="30%" class="text-end">Gramasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                data: 'status_kredit',
                searchable: true,
                sortable: true,
            }, {
                data: 'status_kirim_barang',
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
                data: 'no_tlp',
                searchable: true,
                sortable: true,
            }, {
                data: 'rekening_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'nama_barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'qty',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_nilai_kredit',
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
            "columnDefs": [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [10, 11, 12]
            }, ]
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
                url: '{{ route('kreditnasabah.datalunas') }}',
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
                data: 'nama_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'alamat_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'no_tlp',
                searchable: true,
                sortable: true,
            }, {
                data: 'rekening_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'nama_barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'qty',
                searchable: true,
                sortable: true,
            }, {
                data: 'total_nilai_kredit',
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
            "columnDefs": [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [10, 11, 12]
            }, ]
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
                url: `kreditnasabah/detail/show_detail/${id}`,
                type: "GET",
                cache: false,
                success: function(response) {
                    $('#viewDataLabel').html("Detail Data Barang");

                    // console.log(response);

                    var $tableBody = $('#table tbody');
                    var no = 1;

                    $tableBody.empty();

                    if (response.length > 0) {
                        $.each(response, function(index, rowData) {
                            var $newRow = $('<tr>');
                            $newRow.append('<td align="center">' + no + '</td>');
                            $newRow.append('<td>' + rowData.no_seri + '</td>');
                            $newRow.append('<td align="right">' + formatAmount(rowData
                                .gramasi) + '</td>');
                            $tableBody.append($newRow);

                            no++;
                        });
                    } else {
                        var $newRow = $('<tr>');
                        $newRow.append('<td colspan="3" align="center">Tidak ada data</td>');
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
        //         url: `kreditnasabah/${id}/edit`,
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
        //         url: `kreditnasabah/${id}`,
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
