<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class SuratKetKelahiran extends Model
{
    use HasFactory;

    public $table = 'data_kelahiran';

    protected $guarded = [];

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
