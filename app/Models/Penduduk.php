<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKeluarga;

class Penduduk extends Model
{
    use HasFactory;

    public $table = 'data_penduduk';
    protected $primary = 'nik';

    protected $guarded = [];

    public function kel()
    {
        return $this->belongsTo(DataKeluarga::class, 'no_kk', 'no_kk');
    }
}
