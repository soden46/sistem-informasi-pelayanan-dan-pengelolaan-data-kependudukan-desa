<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class DataKeluarga extends Model
{
    use HasFactory;
    public $table = 'data_keluarga';
    protected $guarded = [];

    public function pend()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }
}
