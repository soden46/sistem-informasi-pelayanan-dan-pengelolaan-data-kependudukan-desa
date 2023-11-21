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
            $table->string('id_penduduk');
            $table->text('alamat_tuju_mk');
            $table->enum('prov_tuju', ['DIY', 'Jawa Tengah']);
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
