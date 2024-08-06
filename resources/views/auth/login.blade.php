@extends('layouts.web.app')

@section("css")
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<section class="content-section">
    <div class="login-container">
        <div class="login-section">
            <h2>Masuk</h2>
            <form  method="POST" action="{{ route('login') }}" id="login-form">
                @csrf
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" placeholder="Masukkan email" required>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>

    <div class="map-image">
        <img src="{{ asset('public/web/img/map.png') }}" alt="Peta Hasil Pemilu">
    </div>
    <div class="map-info">
        <p>SELAMAT DATANG DI SISTEM PERHITUNGAN SUARA</p>
    </div>
</section>
@section("js")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<script>
    $('#form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Email Harus Di isi!",
                email: "Harus Berupa Alamat Email"
            },
            password: {
                required: "Password Harus Di isi!",
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
@endsection
@endsection