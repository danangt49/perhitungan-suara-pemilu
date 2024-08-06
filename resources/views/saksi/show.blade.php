@extends('layouts.web.app')

@section('css')
@endsection

@section('content')
    <section class="content-section">
        <div class="table-container">
            <h2>DATA SAKSI</h2>
            <div class="table-header">
                <button id="addDataButton" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button> &nbsp;
                &nbsp;
                <button id="printButton" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
            </div>
            <table id="datatable" class="table table-striped text-center"></table>
        </div>

        <!-- Modal for Add Data -->
        <x-modal id="addDataModal" title="Tambah Data Saksi TPS">
            <form id="addDataForm">
                <input type="hidden" id="role" name="role" value="saksi">

                <label for="kode_tps">Kode TPS:</label>
                <select id="kode_tps" name="kode_tps" required></select>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="alamat_tinggal">Alamat Tinggal:</label>
                <input type="text" id="alamat_tinggal" name="alamat_tinggal" required>

                <label for="no_ktp">No KTP:</label>
                <input type="number" id="no_ktp" name="no_ktp" required>

                <label for="no_hp">No HP:</label>
                <input type="number" id="no_hp" name="no_hp" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="pendidikan">Pendidikan:</label>
                <select id="pendidikan" name="pendidikan" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Sarjana">Sarjana</option>
                    <option value="Pasca Sarjana">Pasca Sarjana</option>
                </select>

                <label for="agama">Agama:</label>
                <select id="agama" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </x-modal>

        <!-- Modal for Edit Data -->
        <x-modal id="editDataModal" title="Edit Data Saksi TPS">
            <form id="editDataForm">
                <input type="hidden" id="edit_id" name="id">
                <input type="hidden" id="edit_role" name="role">

                <label for="edit_kode_tps">Kode TPS:</label>
                <select id="edit_kode_tps" name="kode_tps" required></select>

                <label for="edit_nama">Nama:</label>
                <input type="text" id="edit_nama" name="nama" required>

                <label for="edit_email">Email:</label>
                <input type="email" id="edit_email" name="email" required>

                <label for="edit_alamat_tinggal">Alamat Tinggal:</label>
                <input type="text" id="edit_alamat_tinggal" name="alamat_tinggal" required>

                <label for="edit_no_ktp">No KTP:</label>
                <input type="number" id="edit_no_ktp" name="no_ktp" required>

                <label for="edit_no_hp">No HP:</label>
                <input type="number" id="edit_no_hp" name="no_hp" required>

                <label for="edit_password">Password:</label>
                <input type="password" id="edit_password" name="password">

                <label for="edit_pendidikan">Pendidikan:</label>
                <select id="edit_pendidikan" name="pendidikan" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Sarjana">Sarjana</option>
                    <option value="Pasca Sarjana">Pasca Sarjana</option>
                </select>

                <label for="edit_agama">Agama:</label>
                <select id="edit_agama" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

                <label for="edit_jenis_kelamin">Jenis Kelamin:</label>
                <select id="edit_jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

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
            window.location.href = "{{ route('saksi.print') }}";
        });
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ url('/saksi-json') }}",
                columns: [{
                        title: 'No',
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        title: 'Nama',
                        data: 'nama'
                    },
                    {
                        title: 'Email',
                        data: 'email'
                    },
                    {
                        title: 'Alamat Tinggal',
                        data: 'alamat_tinggal'
                    },
                    {
                        title: 'No KTP',
                        data: 'no_ktp'
                    },
                    {
                        title: 'No HP',
                        data: 'no_hp'
                    },
                    {
                        title: 'Pendidikan',
                        data: 'pendidikan'
                    },
                    {
                        title: 'Agama',
                        data: 'agama'
                    },
                    {
                        title: 'Jenis Kelamin',
                        data: 'jenis_kelamin'
                    },
                    {
                        title: 'Aksi',
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            function fetchTpsOptions() {
                $.ajax({
                    url: "{{ url('/tps-options') }}",
                    type: "GET",
                    success: function(data) {
                        var options = '';
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

            $('#addDataButton').on('click', function() {
                $('#addDataModal').show();
                $('#addDataForm')[0].reset();
                fetchTpsOptions();
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

            $('#datatable').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/saksi') }}" + '/' + id + '/edit',
                    type: "GET",
                    success: function(data) {
                        $('#edit_id').val(data.id);
                        $('#edit_nama').val(data.nama);
                        $('#edit_email').val(data.email);
                        $('#edit_role').val(data.role);
                        $('#edit_alamat_tinggal').val(data.alamat_tinggal);
                        $('#edit_no_ktp').val(data.no_ktp);
                        $('#edit_no_hp').val(data.no_hp);
                        $('#edit_kode_tps').val(data.kode_tps);
                        $('#edit_pendidikan').val(data.pendidikan);
                        $('#edit_agama').val(data.agama);
                        $('#edit_jenis_kelamin').val(data.jenis_kelamin);
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

            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ url('/saksi') }}",
                    type: "POST",
                    data: formData + '&_token=' + "{{ csrf_token() }}",
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Ditambahkan', 'success').then(
                            function() {
                                table.ajax.reload();
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
                    url: "{{ url('/saksi') }}" + '/' + id,
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
                            url: "{{ url('/saksi') }}" + '/' + id,
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
            
            fetchTpsOptions();
        });
    </script>
@endsection
