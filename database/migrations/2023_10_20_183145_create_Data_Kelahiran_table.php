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
        Schema::create('Data_Kelahiran', function (Blueprint $table) {
            $table->integer('id_lahir')->unique()->primary();
            $table->date('tgl_regis_lahir');
            $table->string('no_kk');
            $table->string('nama_kepala_keluarga');
            $table->string('nik_bayi');
            $table->string('nama_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('tempat_dilahirkan', ['Rumah Sakit', 'Rumah Bersalin', 'Puskesmas', 'Polindes', 'Rumah', 'Lain-Lain']);
            $table->string('tempat_kelahiran');
            $table->date('tgl_lahir');
            $table->time('pukul');
            $table->enum('jenis_kelahiran', ['Tunggal', 'Kembar 2', 'Kembar 3', 'Kembar 4', 'Lainnya']);
            $table->enum('penolong', ['Dokter', 'Bidan', 'Perwat', 'Dukun', 'Lainnya']);
            $table->float('berat_bayi');
            $table->float('panjang_bayi');
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->date('tgl_lh_ibu');
            $table->integer('umur_ibu');
            $table->string('pekerjaan_ibu');
            $table->enum('wn_ibu', ['WNI', 'WNA']);
            $table->string('kebangsan_ibu');
            $table->text('alamat_ibu');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->date('tgl_lh_ayah');
            $table->integer('umur_ayah');
            $table->string('pekerjaan_ayah');
            $table->enum('wn_ayah', ['WNI', 'WNA']);
            $table->string('kebangsan_ayah');
            $table->text('alamat_ayah');
            $table->string('tempat_kawin');
            $table->string('no_akta_nikah');
            $table->date('tgl_akta_nikah');
            $table->string('nik_pelapor');
            $table->string('nama_pelapor');
            $table->date('tgl_lh_pelapor');
            $table->string('pekerjaan_pelapor');
            $table->text('alamat_pelapor');
            $table->string('nik_saksisatu');
            $table->string('nama_saksisatu');
            $table->integer('umur_saksisatu');
            $table->text('alamat_saksisatu');
            $table->string('nik_saksidua');
            $table->string('nama_saksidua');
            $table->integer('umur_saksidua');
            $table->text('alamat_saksidua');
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
        Schema::dropIfExists('Data_Kelahiran');
    }
};
