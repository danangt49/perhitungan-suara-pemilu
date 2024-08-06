@extends('layouts.web.app')

@section('css')
@endsection

@section('content')
    <section class="content-section">
        <div class="table-container">
            <h2>DATA TPS</h2>
                <div class="table-header">
                    <button id="addDataButton" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button> &nbsp;
                    &nbsp;
                    <button id="printButton" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
                </div>
            <table id="datatable" class="table table-striped text-center"></table>
        </div>

        <!-- Use the modal component for Add Data -->
        <x-modal id="addDataModal" title="Tambah Data TPS">
            <form id="addDataForm">
                <label for="kode_tps">Kode TPS:</label>
                <input type="text" id="kode_tps" name="kode_tps" required>
                <label for="no_tps">No TPS:</label>
                <input type="text" id="no_tps" name="no_tps" required>
                <label for="alamat_tps">Alamat:</label>
                <input type="text" id="alamat_tps" name="alamat_tps" required>
                <label for="kelurahan">Kelurahan:</label>
                <input type="text" id="kelurahan" name="kelurahan" required>
                <label for="kecamatan">Kecamatan:</label>
                <input type="text" id="kecamatan" name="kecamatan" required>
                <label for="kota">Kota:</label>
                <input type="text" id="kota" name="kota" required>
                <label for="provinsi">Provinsi:</label>
                <input type="text" id="provinsi" name="provinsi" required>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </x-modal>

        <!-- Use the modal component for Edit Data -->
        <x-modal id="editDataModal" title="Edit Data TPS">
            <form id="editDataForm">
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_kode_tps">Kode TPS:</label>
                <input type="text" id="edit_kode_tps" name="kode_tps" required>
                <label for="edit_no_tps">No TPS:</label>
                <input type="text" id="edit_no_tps" name="no_tps" required>
                <label for="edit_alamat_tps">Alamat:</label>
                <input type="text" id="edit_alamat_tps" name="alamat_tps" required>
                <label for="edit_kelurahan">Kelurahan:</label>
                <input type="text" id="edit_kelurahan" name="kelurahan" required>
                <label for="edit_kecamatan">Kecamatan:</label>
                <input type="text" id="edit_kecamatan" name="kecamatan" required>
                <label for="edit_kota">Kota:</label>
                <input type="text" id="edit_kota" name="kota" required>
                <label for="edit_provinsi">Provinsi:</label>
                <input type="text" id="edit_provinsi" name="provinsi" required>
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
            window.location.href = "{{ route('tps.print') }}";
        });
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ url('/tps-json') }}",
                columns: [{
                        title: 'No',
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        title: 'Kode TPS',
                        data: 'kode_tps'
                    },
                    {
                        title: 'No TPS',
                        data: 'no_tps'
                    },
                    {
                        title: 'Alamat',
                        data: 'alamat_tps'
                    },
                    {
                        title: 'Kelurahan',
                        data: 'kelurahan'
                    },
                    {
                        title: 'Kecamatan',
                        data: 'kecamatan'
                    },
                    {
                        title: 'Kota',
                        data: 'kota'
                    },
                    {
                        title: 'Provinsi',
                        data: 'provinsi'
                    },
                    {
                        title: 'Aksi',
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Open Add Data Modal
            $('#addDataButton').on('click', function() {
                $('#addDataModal').show();
                $('#addDataForm')[0].reset(); // Reset the form fields
            });

            // Close Modal
            $('.close').on('click', function() {
                var modalId = $(this).data('modal');
                $('#' + modalId).hide();
            });

            $(window).on('click', function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(event.target).hide();
                }
            });

            // Handle Add Data Form Submission
            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ url('/tps') }}",
                    type: "POST",
                    data: formData + '&_token=' + "{{ csrf_token() }}",
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Ditambahkan', 'success').then(
                            function() {
                                table.ajax.reload();
                                $('#addDataModal').hide();
                                $('#addDataForm')[0].reset(); // Reset the form fields
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

            // Handle Edit Data
            $('#datatable').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/tps') }}" + '/' + id + '/edit',
                    type: "GET",
                    success: function(data) {
                        $('#edit_id').val(data.id);
                        $('#edit_kode_tps').val(data.kode_tps);
                        $('#edit_no_tps').val(data.no_tps);
                        $('#edit_alamat_tps').val(data.alamat_tps);
                        $('#edit_kelurahan').val(data.kelurahan);
                        $('#edit_kecamatan').val(data.kecamatan);
                        $('#edit_kota').val(data.kota);
                        $('#edit_provinsi').val(data.provinsi);
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

            // Handle Edit Data Form Submission
            $('#editDataForm').on('submit', function(event) {
                event.preventDefault();
                var id = $('#edit_id').val();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ url('/tps') }}" + '/' + id,
                    type: "PUT",
                    data: formData + '&_token=' + "{{ csrf_token() }}",
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Diperbarui', 'success').then(
                            function() {
                                table.ajax.reload();
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

            // Handle Delete Data
            $('#datatable').on('click', '.delete', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda Akan Menghapus Item Ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/tps') }}" + '/' + id,
                            type: "DELETE",
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function() {
                                Swal.fire('Sukses', 'Data Berhasil Dihapus', 'success')
                                    .then(function() {
                                        table.ajax.reload();
                                    });
                            },
                            error: function() {
                                Swal.fire({
                                    title: 'Oops...',
                                    text: 'Terjadi Kesalahan',
                                    icon: 'error'
                                });
                            }
                        });
                    } else {
                        Swal.fire('Dibatalkan', 'Data Tidak Dihapus', 'info');
                    }
                });
            });
        });
    </script>
@endsection
