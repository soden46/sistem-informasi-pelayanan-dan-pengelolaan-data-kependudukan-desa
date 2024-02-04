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
        Schema::create('Data_Mutasi_Keluar', function (Blueprint $table) {
            $table->integer('id_mk')->unique()->primary();
            $table->date('tgl_regis_mk');
            $table->string('nik_pelapor');
            $table->string('nama_pelapor');
            $table->string('nik_mk');
            $table->string('nama_mk');
            $table->string('jk_mk');
            $table->string('tempat_lh_mk');
            $table->string('tgl_lh_mk');
            $table->string('agama_mk');
            $table->string('pekerjaan_mk');
            $table->string('status_kawin_mk');
            $table->string('no_kk');
            $table->string('alamat_asal_mk');
            $table->string('padukuhan_tuju');
            $table->string('rt_tuju');
            $table->string('rw_tuju');
            $table->text('lampiran');
            $table->string('verifikasi');
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
        Schema::dropIfExists('Data_Mutasi_Keluar');
    }
};
