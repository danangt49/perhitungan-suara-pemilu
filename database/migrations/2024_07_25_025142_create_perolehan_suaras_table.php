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
        Schema::create('perolehan_suaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('kode_tps');
            $table->integer('jumlah_suara');
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('kode_tps')->references('kode_tps')->on('tps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perolehan_suaras', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['kode_tps']);
        });
        Schema::dropIfExists('perolehan_suaras');
    }
};
