<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKematian extends Model
{
    use HasFactory;

    public $table = 'data_kematian';

    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'no_kk', 'no_kk');
    }
    public function pendu()
    {
        return $this->belongsTo(Penduduk::class, 'nik_mati', 'nik');
    }
    public function ibu()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ibu', 'nik');
    }
    public function ayah()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ayah', 'nik');
    }
    public function saksi1()
    {
        return $this->belongsTo(Penduduk::class, 'nik_saksisatu', 'nik');
    }
    public function saksi2()
    {
        return $this->belongsTo(Penduduk::class, 'nik_saksidua', 'nik');
    }
    public function pelapor()
    {
        return $this->belongsTo(Penduduk::class, 'nik_pelapor', 'nik');
    }
}
