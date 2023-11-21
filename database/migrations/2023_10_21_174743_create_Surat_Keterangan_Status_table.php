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
        Schema::create('Surat_Keterangan_Status', function (Blueprint $table) {
            $table->string('no_surat_sks')->unique()->primary();
            $table->date('tgl_regis_sks');
            $table->text('keperluan_sks');
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
        Schema::dropIfExists('Surat_Keterangan_Status');
    }
};
