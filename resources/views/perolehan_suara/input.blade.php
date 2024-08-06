@extends('layouts.web.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .form-box {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-box h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .hidden {
            display: none;
        }

        .message-box {
            background-color: #f0f0f0;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            color: #333333;
        }

        .message-box h2 {
            margin-bottom: 10px;
        }

        .message-box p {
            color: #000;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <section class="content-section">
        <!-- Add Data Form -->
        <div class="form-box" id="formDataSection">
            <h2>Tambah Data Perolehan Suara</h2>
            <form id="addDataForm">
                @csrf
                <label for="kode_tps">Kode TPS:</label>
                <input id="kode_tps" name="kode_tps" required readonly value="{{ Auth::user()->kode_tps }}"
                    class="form-control">

                <label for="id_user">Caleg:</label>
                <select id="id_user" name="id_user" required class="form-control"></select>

                <label for="jumlah_suara">Jumlah Suara:</label>
                <input type="number" id="jumlah_suara" name="jumlah_suara" required class="form-control">

                <label for="catatan">Catatan:</label>
                <textarea id="catatan" name="catatan" cols="30" rows="3" class="form-control"></textarea>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <!-- Edit Data Form -->
        <div class="form-box hidden" id="editFormSection">
            <h2>Edit Data Perolehan Suara</h2>
            <form id="editDataForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_kode_tps">Kode TPS:</label>
                <input id="edit_kode_tps" name="kode_tps" required readonly class="form-control">

                <label for="edit_id_user">Caleg:</label>
                <select id="edit_id_user" name="id_user" required class="form-control"></select>

                <label for="edit_jumlah_suara">Jumlah Suara:</label>
                <input type="number" id="edit_jumlah_suara" name="jumlah_suara" required class="form-control">

                <label for="edit_catatan">Catatan:</label>
                <textarea id="edit_catatan" name="catatan" cols="30" rows="3" class="form-control"></textarea>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            function loadCalegOptions() {
                $.ajax({
                    url: "{{ url('data-caleg') }}",
                    type: "GET",
                    success: function(data) {
                        var calegOptions =
                            `<option value="${data.id}">${data.nama} - ${data.partai}</option>`;
                        $('#id_user, #edit_id_user').html(calegOptions);
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

            function checkDataExists() {
                $.ajax({
                    url: "{{ url('/check-data-exists') }}",
                    type: "POST",
                    data: $('#addDataForm').serialize(),
                    success: function(response) {
                        console.log("sini");
                        if (response.exists && response.data) {  
                        console.log("sini");

                            loadEditForm(response.data.id);
                        } else {
                        console.log("sini q")
                            $('#formDataSection').removeClass('hidden');
                            $('#editFormSection').addClass('hidden');
                        }
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

            function loadEditForm(id) {
                $.ajax({
                    url: "{{ url('/perolehan-suara') }}/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#edit_id').val(response.id);
                        $('#edit_kode_tps').val(response.kode_tps);
                        $('#edit_id_user').val(response.id_user);
                        $('#edit_jumlah_suara').val(response.jumlah_suara);
                        $('#edit_catatan').val(response.catatan);

                        $('#formDataSection').addClass('hidden');
                        $('#editFormSection').removeClass('hidden');
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

            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ url('/perolehan-suara') }}",
                    type: "POST",
                    data: $('#addDataForm').serialize(),
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Ditambahkan', 'success').then(
                            function() {
                                $('#addDataForm')[0].reset();
                                checkDataExists();
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

                $.ajax({
                    url: "{{ url('/perolehan-suara') }}/" + $('#edit_id').val(),
                    type: "PUT",
                    data: $('#editDataForm').serialize(),
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Diperbarui', 'success').then(
                            function() {
                                $('#editDataForm')[0].reset();
                                $('#editFormSection').addClass('hidden');
                                $('#formDataSection').removeClass('hidden');
                                checkDataExists();
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

            $(document).on('click', '.edit-button', function() {
                var id = $(this).data('id');
                loadEditForm(id);
            });

            checkDataExists();
            loadCalegOptions();
        });
    </script>
@endsection
