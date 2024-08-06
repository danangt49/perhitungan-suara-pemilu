@extends('layouts.web.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-section">
        <div class="table-container">
            <h2>DATA PEROLEHAN SUARA</h2>
            <div class="table-header">
                <button id="printButton" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
            </div>

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
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Load options for select elements
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
                        $(`#${target}`).html(options);
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

            // Load Kecamatan options
            function loadKecamatanOptions() {
                loadOptions("{{ url('data-kecamatan-options') }}", 'filter_kecamatan', 'kecamatan', 'kecamatan');
            }

            // Load Kelurahan options based on selected Kecamatan
            function loadKelurahanOptions(kecamatan) {
                loadOptions(`{{ url('data-kelurahan-options') }}?kecamatan=${kecamatan}`, 'filter_kelurahan', 'kelurahan', 'kelurahan');
            }

            // Load TPS options based on selected Kelurahan
            function loadTpsOptions(kelurahan) {
                loadOptions(`{{ url('data-tps-options') }}?kelurahan=${kelurahan}`, 'filter_kode_tps', 'kode_tps', 'kode_tps');
            }

            // Initialize DataTable
            function loadDataTable() {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url('/owner/perolehan-suara-json') }}",
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
                    columns: [
                        { title: 'No', data: null, searchable: false, orderable: false, render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { title: 'Kode TPS', data: 'kode_tps' },
                        { title: 'Alamat', data: 'alamat_tps' },
                        { title: 'Catatan', data: 'catatan' },
                        { title: 'Jumlah Suara', data: 'jumlah_suara' },
                        { title: 'Aksi', data: 'action', orderable: false, searchable: false }
                    ],
                    footerCallback: function(tfoot, data, start, end, display) {
                        var api = this.api();
                        var totalJumlahSuara = api.column(4, { page: 'current' }).data().reduce(function(a, b) {
                            return a + b;
                        }, 0);
                        $(api.column(4).footer()).html(totalJumlahSuara);
                    }
                });
            }

            // Event handlers for filters
            $('#filter_kecamatan').change(function() {
                var kecamatan = $(this).val();
                loadKelurahanOptions(kecamatan);
                $('#filter_kelurahan').val('');
                $('#filter_kode_tps').html('<option value="">Pilih Kode TPS</option>');
                $('#datatable').DataTable().ajax.reload();
            });

            $('#filter_kelurahan').change(function() {
                var kelurahan = $(this).val();
                loadTpsOptions(kelurahan);
                $('#filter_kode_tps').val('');
                $('#datatable').DataTable().ajax.reload();
            });

            $('#filter_kode_tps').change(function() {
                $('#datatable').DataTable().ajax.reload();
            });

            // Print functionality
            $('#printButton').on('click', function() {
                var kecamatan = $('#filter_kecamatan').val();
                var kelurahan = $('#filter_kelurahan').val();
                var kode_tps = $('#filter_kode_tps').val();
                var url = "{{ url('owner/data-perolehan-suara/print') }}";
                window.open(`${url}?kecamatan=${kecamatan}&kelurahan=${kelurahan}&kode_tps=${kode_tps}`, '_blank');
            });

            // Initialize options and DataTable
            loadKecamatanOptions();
            loadDataTable();
        });
    </script>
@endsection
