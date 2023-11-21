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
        Schema::create('Surat_Keterangan_Beda_Nama', function (Blueprint $table) {
            $table->string('no_surat_skbn')->unique()->primary();
            $table->date('tgl_regis_skbn');
            $table->string('nik');
            $table->string('tertulis_pada');
            $table->string('nama_baru');
            $table->string('tempat_lh_baru');
            $table->date('tgl_lh_baru');
            $table->text('alamat_baru');
            $table->text('keperluan_skbn');
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
        Schema::dropIfExists('Surat_Keterangan_Beda_Nama');
    }
};
