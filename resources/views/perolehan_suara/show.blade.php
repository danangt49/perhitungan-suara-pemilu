@extends('layouts.web.app')

@section('css')
    <style>
        .dataTables_wrapper .dataTables_info {
            color: #fff;
            margin: 10px 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #ffffff;
            color: #fff;
            margin: 0 2px;
            text-decoration: none;
            display: inline-block;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #ffffff;
            color: #fff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #ffffff;
            color: #fff;
            cursor: not-allowed;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #41054d;
            color: #fff;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <section class="content-section">
        <div class="table-container">
            <h2>DATA PEROLEHAN SUARA</h2>
            <div class="table-header">
                @if (Gate::allows('isAdmin'))
                    <button id="addDataButton" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>&nbsp; &nbsp;
                @endif
                <button id="printButton" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
            </div>

            <!-- Filter Section -->
            <div class="filter-section mb-4">
                <label for="filter_kecamatan">Kecamatan:</label>
                <select id="filter_kecamatan" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                </select>

                <label for="filter_kelurahan">Kelurahan:</label>
                <select id="filter_kelurahan" class="form-control">
                    <option value="">Pilih Kelurahan</option>
                </select>

                <label for="filter_kode_tps">Kode TPS:</label>
                <select id="filter_kode_tps" class="form-control">
                    <option value="">Pilih Kode TPS</option>
                </select>
            </div>

            <table id="datatable" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode TPS</th>
                        <th>Alamat</th>
                        <th>Catatan</th>
                        <th>Jumlah Suara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Suara</th>
                        <th id="totalJumlahSuara">0</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Modal Untuk Add Data -->
        <x-modal id="addDataModal" title="Tambah Data Perolehan Suara">
            <form id="addDataForm">
                <label for="kode_tps">Kode TPS:</label>
                <select id="kode_tps" name="kode_tps" required></select>

                <label for="id_user">Caleg:</label>
                <select id="id_user" name="id_user" required></select>

                <label for="jumlah_suara">Jumlah Suara:</label>
                <input type="number" id="jumlah_suara" name="jumlah_suara" required>

                <label for="catatan">Catatan:</label>
                <textarea id="catatan" name="catatan" cols="3"></textarea>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </x-modal>

        <!-- Modal Untuk Edit Data -->
        <x-modal id="editDataModal" title="Edit Data Perolehan Suara">
            <form id="editDataForm">
                <input type="hidden" id="edit_id" name="id">

                <label for="edit_kode_tps">Kode TPS:</label>
                <select id="edit_kode_tps" name="kode_tps" required></select>

                <label for="edit_id_user">Caleg:</label>
                <select id="edit_id_user" name="id_user" required></select>

                <label for="edit_jumlah_suara">Jumlah Suara:</label>
                <input type="number" id="edit_jumlah_suara" name="jumlah_suara" required>

                <label for="edit_catatan">Catatan:</label>
                <textarea id="edit_catatan" name="catatan" cols="3"></textarea>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-modal>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            var kecamatan = encodeURIComponent($('#filter_kecamatan').val());
            var kelurahan = encodeURIComponent($('#filter_kelurahan').val());
            var kode_tps = encodeURIComponent($('#filter_kode_tps').val());

            var url = "{{ route('perolehan-suaras.print') }}" +
                "?kecamatan=" + kecamatan +
                "&kelurahan=" + kelurahan +
                "&kode_tps=" + kode_tps;

            window.location.href = url;
        });


        $(document).ready(function() {
            function loadOptions(url, target, key, value, additionalParams = {}) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: additionalParams,
                    success: function(data) {
                        var options = `<option value="">Pilih ${target}</option>`;
                        $.each(data, function(index, item) {
                            options += `<option value="${item[key]}">${item[value]}</option>`;
                        });
                        $(`#filter_${key}`).html(options);
                        $(key).html(options);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan: ' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                });
            }

            function loadKecamatanOptions() {
                loadOptions("{{ url('data-kecamatan-options') }}", 'Kecamatan', 'kecamatan', 'kecamatan');
            }

            function loadKelurahanOptions(kecamatan) {
                loadOptions(`{{ url('data-kelurahan-options') }}?kecamatan=${kecamatan}`, 'Kelurahan', 'kelurahan',
                    'kelurahan');
                $('#filter_kode_tps').html('<option value="">Pilih Kode TPS</option>');
            }

            function loadTpsOptions(kelurahan) {
                loadOptions(`{{ url('data-tps-options') }}?kelurahan=${kelurahan}`, 'Kode TPS', 'kode_tps',
                    'kode_tps');
            }

            function fetchTpsOptions() {
                $.ajax({
                    url: "{{ url('/tps-options') }}",
                    type: "GET",
                    success: function(data) {
                        var options = '<option value="">Pilih Kode TPS</option>';
                        data.forEach(function(tps) {
                            options +=
                                `<option value="${tps.kode_tps}">${tps.kode_tps}</option>`;
                        });
                        $('#kode_tps').html(options);
                        $('#edit_kode_tps').html(options);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan: ' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                });
            }

            function loadCalegOptions() {
                $.ajax({
                    url: "{{ url('data-caleg') }}",
                    type: "GET",
                    success: function(data) {
                        var calegOptions =
                            `<option value="${data.id}">${data.nama} - ${data.partai}</option>`;
                        $('#id_user').html(calegOptions);
                        $('#edit_id_user').html(calegOptions);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan: ' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                });
            }

            function loadDataTable() {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url('/perolehan-suara-json') }}",
                        data: function(d) {
                            d.filter_kecamatan = $('#filter_kecamatan').val();
                            d.filter_kelurahan = $('#filter_kelurahan').val();
                            d.filter_kode_tps = $('#filter_kode_tps').val();
                        },
                        error: function(xhr) {
                            console.error("Error fetching data from server:", xhr.responseText);
                            Swal.fire({
                                title: 'Oops...',
                                text: `Terjadi Kesalahan: ${xhr.responseText}`,
                                icon: 'error'
                            });
                        }
                    },
                    columns: [{
                            title: 'No',
                            data: null,
                            searchable: false,
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            title: 'Kode TPS',
                            data: 'kode_tps'
                        },
                        {
                            title: 'Alamat',
                            data: 'alamat_tps'
                        },
                        {
                            title: 'Catatan',
                            data: 'catatan'
                        },
                        {
                            title: 'Jumlah Suara',
                            data: 'jumlah_suara'
                        },
                        {
                            title: 'Aksi',
                            data: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    footerCallback: function(tfoot, data, start, end, display) {
                        var api = this.api();
                        var totalJumlahSuara = api.column(4, {
                            page: 'current'
                        }).data().reduce(function(a, b) {
                            return a + b;
                        }, 0);
                        $(api.column(4).footer()).html(totalJumlahSuara);
                    }
                });
            }

            $('#filter_kecamatan').change(function() {
                var kecamatan = $(this).val();
                loadKelurahanOptions(kecamatan);
                $('#datatable').DataTable().ajax.reload(); // Reload DataTable
            });

            $('#filter_kelurahan').change(function() {
                var kelurahan = $(this).val();
                loadTpsOptions(kelurahan);
                $('#datatable').DataTable().ajax.reload(); // Reload DataTable
            });

            $('#filter_kode_tps').change(function() {
                $('#datatable').DataTable().ajax.reload(); // Reload DataTable
            });

            $('#addDataButton').on('click', function() {
                $('#addDataModal').show();
                $('#addDataForm')[0].reset();
                fetchTpsOptions();
                loadCalegOptions();
            });

            $('.close').on('click', function() {
                var modalId = $(this).data('modal');
                $('#' + modalId).hide();
            });

            $(window).on('click', function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(event.target).hide();
                }
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/perolehan-suara') }}/" + id + "/edit",
                    type: "GET",
                    success: function(data) {
                        $('#edit_id').val(data.id);
                        $('#edit_kode_tps').val(data.kode_tps);
                        $('#edit_id_user').val(data.id_user);
                        $('#edit_jumlah_suara').val(data.jumlah_suara);
                        $('#edit_catatan').val(data.catatan);
                        $('#editDataModal').show();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan: ' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                });
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/perolehan-suara') }}/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire('Terhapus!', 'Data berhasil dihapus.',
                                    'success').then(function() {
                                    $('#datatable').DataTable().ajax.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: 'Oops...',
                                    text: 'Terjadi Kesalahan: ' + xhr
                                        .responseText,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });

            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ url('/perolehan-suara') }}",
                    type: "POST",
                    data: formData + '&_token=' + "{{ csrf_token() }}",
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Ditambahkan', 'success').then(
                            function() {
                                $('#datatable').DataTable().ajax.reload();
                                $('#addDataModal').hide();
                                $('#addDataForm')[0].reset();
                            });
                    },
                    error: function(xhr) {
                        var errorMessage = 'Terjadi Kesalahan: ';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage += xhr.responseJSON.error;
                        } else {
                            errorMessage += xhr.responseText;
                        }
                        Swal.fire({
                            title: 'Oops...',
                            text: errorMessage,
                            icon: 'error'
                        });
                    }
                });
            });

            $('#editDataForm').on('submit', function(event) {
                event.preventDefault();
                var id = $('#edit_id').val();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ url('/perolehan-suara') }}" + '/' + id,
                    type: "PUT",
                    data: formData + '&_token=' + "{{ csrf_token() }}",
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Diperbarui', 'success').then(
                            function() {
                                $('#datatable').DataTable().ajax.reload();
                                $('#editDataModal').hide();
                            });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan: ' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                });
            });

            loadCalegOptions();
            fetchTpsOptions();
            loadKecamatanOptions();
            loadDataTable();
        });
    </script>
@endsection
