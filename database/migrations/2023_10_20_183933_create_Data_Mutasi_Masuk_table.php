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
        Schema::create('Data_Mutasi_Masuk', function (Blueprint $table) {
            $table->integer('id_mm')->unique()->primary();
            $table->date('tgl_regis_mk');
            $table->string('nik');
            $table->string('nik_mm');
            $table->string('no_kk');
            $table->string('nama_mm');
            $table->enum('jk_mm', ['Laki-Laki', 'Perempuan']);
            $table->enum('wn_kk', ['WNI', 'WNA']);
            $table->string('tempat_lh_mm');
            $table->date('tgl_lh_mk');
            $table->enum('agama_lh', ['Islam', 'Kristen', 'Katolik']);
            $table->string('pekerjaan_mm');
            $table->string('pendidikan_mm');
            $table->enum('agama_mm', ['Islam', 'Kristen', 'Katolik']);
            $table->enum('sts_penduduk_mm', ['Meninggal', 'Hidup', 'Pindah keluar']);
            $table->enum('sts_keluarga_mm', ['Meninggal', 'Hidup', 'Pindah keluar']);
            $table->enum('sts_kawin', ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->text('alamat_asal_mm');
            $table->enum('padukuhan_tuju', ['Dukuh 1', 'Dukuh 2']);
            $table->integer('rt_tuju');
            $table->integer('rw_tuju');
            $table->enum('prov_asal', ['DIY', 'Jawa Tengah']);
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
        Schema::dropIfExists('Data_Mutasi_Masuk');
    }
};
