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
                <form action="{{ route('outstandingdanjaminan.post_import_data') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
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
                data: 'kode_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'nama_nasabah',
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
                "targets": [6, 7, 8]
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
                data: 'kode_nasabah',
                searchable: true,
                sortable: true,
            }, {
                data: 'nama_nasabah',
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
                "targets": [6, 7, 8]
            }, ],
            order: [
                [9, 'desc']
            ]
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

                    $('#data_nasabah').html("Nasabah : " + response.nasabah.nama + " (" + response
                        .nasabah.kode +
                        ")");

                    var $tableBody = $('#table tbody');
                    var no = 1;
                    var total = 0;

                    $tableBody.empty();

                    if (response.kredit_detail.length > 0) {
                        $.each(response.kredit_detail, function(index, rowData) {
                            var $newRow = $('<tr>');
                            total = total + Number(rowData.gramasi);
                            $newRow.append('<td align="center">' + no + '</td>');
                            $newRow.append('<td>' + rowData.no_seri + '</td>');
                            $newRow.append('<td align="right">' + formatAmount(rowData
                                .gramasi) + '</td>');
                            $tableBody.append($newRow);

                            no++;
                        });
                        var $newRow = $('<tr>');
                        $newRow.append('<td colspan="2"><b>Total</b></td>');
                        $newRow.append('<td align="right"><b>' + formatAmount(total) + '</b></td>');
                        $tableBody.append($newRow);
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
