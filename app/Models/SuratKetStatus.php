<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetStatus extends Model
{
    use HasFactory;

    public $table = 'surat_keterangan_status';

    protected $guarded = [];

    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }
}
