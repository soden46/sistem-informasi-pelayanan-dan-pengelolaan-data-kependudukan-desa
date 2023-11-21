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
        Schema::create('Profil_Desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kepala_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('luas_desa');
            $table->string('jumlah_dusun');
            $table->string('jumla_keluarga');
            $table->string('jumlah_juwa');
            $table->text('sejarah');
            $table->string('logo_desa');
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
        Schema::dropIfExists('Profil_Desa');
    }
};
