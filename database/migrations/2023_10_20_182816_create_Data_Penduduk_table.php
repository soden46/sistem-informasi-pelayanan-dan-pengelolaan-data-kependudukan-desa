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
        Schema::create('Data_Penduduk', function (Blueprint $table) {
            $table->string('nik')->unique()->primary();
            $table->string('nama');
            $table->string('no_kk');
            $table->string('padukuhan');
            $table->float('rt');
            $table->float('rw');
            $table->enum('jk', ['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('wn', ['WNI', 'WNA']);
            $table->string('kebangsaan');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Budha', 'Konghucu', 'Hindu']);
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->enum('sts_kawin', ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('sts_penduduk', ['Warga Baru Menunggu Verifikasi', 'Meninggal', 'Tinggal', 'Pindah Keluar', 'Warga Pindah Menunggu Verifikasi', 'Warga Meninggal Menunggu Verifikasi']);
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
        Schema::dropIfExists('Data_Penduduk');
    }
};
