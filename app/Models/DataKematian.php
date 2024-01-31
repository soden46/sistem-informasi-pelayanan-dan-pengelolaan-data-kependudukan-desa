<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;
use App\Models\DataKeluarga;

class DataKematian extends Model
{
    use HasFactory;

    public $table = 'data_kematian';

    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'no_kk', 'no_kk');
    }
    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik_mati', 'nik');
    }
    public function mom()
    {
        return $this->belongsTo(Penduduk::class, 'nik_ibu', 'nik');
    }
    public function dad()
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
    public function lapor()
    {
        return $this->belongsTo(Penduduk::class, 'nik_pelapor', 'nik');
    }
}
