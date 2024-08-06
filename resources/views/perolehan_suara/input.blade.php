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
        <div class="form-box" id="formDataSection">
            <h2>Tambah Data Perolehan Suara</h2>
            <form id="addDataForm">
                @csrf
                <label for="kode_tps">Kode TPS:</label>
                <input id="kode_tps" name="kode_tps" required readonly value="{{ Auth::user()->kode_tps }}" class="form-control">

                <label for="id_user">Caleg:</label>
                <select id="id_user" name="id_user" required class="form-control"></select>

                <label for="jumlah_suara">Jumlah Suara:</label>
                <input type="number" id="jumlah_suara" name="jumlah_suara" required class="form-control">

                <label for="catatan">Catatan:</label>
                <textarea id="catatan" name="catatan" cols="30" rows="3" class="form-control"></textarea>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <div id="messageSection" class="message-box hidden">
            <h2>Terimakasih</h2>
            <p>Data sudah ada. Terimakasih atas partisipasinya.</p>
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
                        if (response.exists) {
                            $('#formDataSection').addClass('hidden');
                            $('#messageSection').removeClass('hidden');
                        } else {
                            $('#formDataSection').removeClass('hidden');
                            $('#messageSection').addClass('hidden');
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

            // Form submission handler
            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "{{ url('/perolehan-suara') }}",
                    type: "POST",
                    data: $('#addDataForm').serialize(),
                    success: function(response) {
                        Swal.fire('Sukses', 'Data Berhasil Ditambahkan', 'success').then(function() {
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

            checkDataExists();
            loadCalegOptions();
        });
    </script>
@endsection
