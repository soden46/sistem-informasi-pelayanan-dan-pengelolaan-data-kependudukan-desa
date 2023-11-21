<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class MutasiKeluar extends Model
{
    use HasFactory;

    public $table = 'data_mutasi_keluar';

    protected $guarded = [];
    protected $primary = 'nik';

    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik_mk', 'nik');
    }

    public function kel()
    {
        return $this->belongsTo(DataKeluarga::class, 'nik_mk', 'nik');
    }

    public function kel1()
    {
        return $this->hasOne(DataKeluarga::class, 'nik', 'nik1');
    }

    public function kel2()
    {
        return $this->hasOne(DataKeluarga::class, 'nik', 'nik2');
    }
}
