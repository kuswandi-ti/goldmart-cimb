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
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                    <th scope="col" width="12%">{{ __('Aksi') }}</th>
                                    <th scope="col" width="10%">{{ __('Status Pelunasan') }}</th>
                                    <th scope="col" width="10%">{{ __('Status Pengambilan Barang') }}</th>
                                    <th scope="col">{{ __('Tgl Incoming') }}</th>
                                    <th scope="col">{{ __('Tgl Pencairan') }}</th>
                                    <th scope="col">{{ __('Tgl Pelunasan') }}</th>
                                    <th scope="col">{{ __('Nama Nasabah') }}</th>
                                    <th scope="col">{{ __('Alamat Nasabah') }}</th>
                                    <th scope="col">{{ __('Telp. Nasabah') }}</th>
                                    <th scope="col">{{ __('Rekening Pencairan') }}</th>
                                    <th scope="col">{{ __('Nama Barang') }}</th>
                                    <th scope="col">{{ __('Jumlah Barang') }}</th>
                                    <th scope="col">{{ __('Nilai Pencairan') }}</th>
                                    <th scope="col">{{ __('Margin Keuntungan') }}</th>
                                    <th scope="col">{{ __('Angsuran') }}</th>
                                    <th scope="col">{{ __('Tenor') }}</th>
                                    <th scope="col">{{ __('Turun Plafon') }}</th>
                                    <th scope="col">{{ __('Periode Bulan') }}</th>
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

    <!-- Modal - Begin -->
    <div class="modal fade" id="editDataModal" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id"></input>
                    <h6 class="modal-title" id="editDataLabel"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4 row gy-4">
                        <div class="col-xl-12">
                            <label for="status_pelunasan" class="form-label text-default">{{ __('Status Pelunasan') }}
                                <x-all-not-null /></label>
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('status_pelunasan') is-invalid @enderror"
                                name="status_pelunasan" id="status_pelunasan" required>
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Sudah Lunas">Sudah Lunas</option>
                            </select>
                            @error('status_pelunasan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xl-12">
                            <label for="status_pengambilan_barang"
                                class="form-label text-default">{{ __('Status Pengambilan Barang') }}
                                <x-all-not-null /></label>
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('status_pengambilan_barang') is-invalid @enderror"
                                name="status_pengambilan_barang" id="status_pengambilan_barang" required>
                                <option value="Belum Diambil">Belum Diambil</option>
                                <option value="Pending">Pending</option>
                                <option value="Sudah Diambil">Sudah Diambil</option>
                            </select>
                            @error('status_pengambilan_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="div_pengambilan_barang">
                            <div class="col-xl-12">
                                <label for="tgl_pengambilan_barang"
                                    class="form-label text-default">{{ __('Tanggal Pengambilan Barang') }}</label>
                                <div class="input-group">
                                    <div class="input-group-text text-muted">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                    <input type="text"
                                        class="form-control flatpickr @error('tgl_pengambilan_barang') is-invalid @enderror"
                                        name="tgl_pengambilan_barang" id="tgl_pengambilan_barang"
                                        value="{{ old('tgl_pengambilan_barang') }}"
                                        placeholder="{{ __('Tanggal Pengambilan Barang') }}" required>
                                    @error('tgl_pengambilan_barang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-xl-12">
                                <label for="note_pengambilan_barang"
                                    class="form-label text-default">{{ __('Note Pengambilan Barang') }}</label>
                                <input type="text"
                                    class="form-control @error('note_pengambilan_barang') is-invalid @enderror"
                                    name="note_pengambilan_barang" id="note_pengambilan_barang"
                                    value="{{ old('note_pengambilan_barang') }}"
                                    placeholder="{{ __('Note Pengambilan Barang') }}">
                                @error('note_pengambilan_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal - End -->
@endsection

<x-web-sweet-alert />

@include('layouts.includes.datatable')
@include('layouts.includes.select2')
@include('layouts.includes.flatpickr')

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
                data: 'status_lunas',
                searchable: true,
                sortable: true,
            }, {
                data: 'status_pengambilan_barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_incoming',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_pencairan',
                searchable: true,
                sortable: true,
            }, {
                data: 'tgl_pelunasan',
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
                data: 'nama_barang',
                searchable: true,
                sortable: true,
            }, {
                data: 'qty',
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
            }],
            "columnDefs": [{
                "render": function(data, type, row) {
                    return formatAmount(data);
                },
                "targets": [13, 14, 15]
            }, ]
        });

        $('#status_pelunasan, #status_pengambilan_barang').select2({
            dropdownParent: $('#editDataModal')
        });

        $(document).ready(function() {
            $('#div_pengambilan_barang').hide();
        });

        $(document.body).on("change", "#status_pengambilan_barang", function() {
            if (this.value == "Sudah Diambil") {
                $('#div_pengambilan_barang').show();
            } else {
                $('#div_pengambilan_barang').hide();
            }
        });

        $('body').on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: `kreditnasabah/${id}/edit`,
                type: "GET",
                cache: false,
                success: function(response) {
                    // console.log(response);
                    $('#editDataLabel').html("Perbarui Data");
                    $('#id').val(response.id);
                    $("#status_pelunasan").val(response.status_lunas).trigger('change');
                    $("#status_pengambilan_barang").val(response.status_pengambilan_barang).trigger(
                        'change');
                    $('#tgl_pengambilan_barang').val(response.tgl_pengambilan_barang);
                    $('#note_pengambilan_barang').val(response.note_pengambilan_barang);
                    $('#editDataModal').modal('show');
                }
            });
        });

        $('#update').click(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let status_pelunasan = $("#status_pelunasan option:selected").val();
            let status_pengambilan_barang = $("#status_pengambilan_barang option:selected").val();
            let tgl_pengambilan_barang = $('#tgl_pengambilan_barang').val();
            let note_pengambilan_barang = $('#note_pengambilan_barang').val();

            $.ajax({
                method: 'PUT',
                url: `kreditnasabah/${id}`,
                cache: false,
                data: {
                    "status_pelunasan": status_pelunasan,
                    "status_pengambilan_barang": status_pengambilan_barang,
                    "tgl_pengambilan_barang": tgl_pengambilan_barang,
                    "note_pengambilan_barang": note_pengambilan_barang
                },
                success: function(data) {
                    //console.log(data)
                    if (data.success == true) {
                        Swal.fire(
                            "{{ __('Perbarui Data !') }}",
                            data.message,
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    } else if (data.success == false) {
                        Swal.fire(
                            'Error!',
                            data.message,
                            'error'
                        )
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endpush
