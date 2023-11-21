<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class MutasiMAsuk extends Model
{
    use HasFactory;

    public $table = 'data_mutasi_masuk';

    protected $guarded = [];

    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik_mm', 'nik');
    }
}
