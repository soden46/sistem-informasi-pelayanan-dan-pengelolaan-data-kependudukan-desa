<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class SuratKetBedaNama extends Model
{
    use HasFactory;

    public $table = 'surat_keterangan_beda_nama';

    protected $guarded = [];

    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }
}
