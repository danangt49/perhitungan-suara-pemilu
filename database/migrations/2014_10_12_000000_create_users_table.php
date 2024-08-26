<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat_tinggal');
            $table->string('no_ktp')->unique();
            $table->string('no_hp');
            $table->string('password');
            $table->string('kode_tps')->nullable();
            $table->string('partai')->nullable();
            $table->enum('pendidikan', ['SD', 'SMP', 'SMA/SMK', 'Diploma', 'Sarjana', 'Pasca Sarjana']);
            $table->enum('agama', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Konghucu']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan', 'Lainnya']);
            $table->enum('role', ['admin', 'saksi', 'owner']);
            $table->string('dapil')->nullable();
            $table->string('wilayah')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
