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
        Schema::create('Data_Kematian', function (Blueprint $table) {
            $table->integer('id_kematian')->unique()->autoIncrement();
            $table->date('tgl_regis_mt');
            $table->string('no_kk');
            $table->string('nama_kepala_keluarga');
            $table->string('nik_mati');
            $table->string('nama_mati');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('tempat_kelahiran');
            $table->enum('agama_mati', ['Islam', 'Kristen', 'Katolik', 'Budha']);
            $table->string('pekerjaan_mati');
            $table->string('alamat_mati');
            $table->date('tgl_mati');
            $table->time('pukul_mati');
            $table->enum('sebab', ['Kecelakaan', 'Sakit', 'Lain-Lain']);
            $table->enum('tempat_mati', ['Rumah', 'Rumah Sakit', 'Jalan', 'Lain-Lain']);
            $table->enum('yang_menerangkan', ['Keluarga', 'Teman', 'Tetangga', 'Orang Lain']);
            $table->string('nik_ibu');
            $table->string('nik_ayah');
            $table->string('nik_pelapor');
            $table->string('nik_saksisatu');
            $table->string('nik_saksidua');
            $table->string('lampiran');
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
        Schema::dropIfExists('Data_Kematian');
    }
};
