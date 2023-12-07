<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\DataKematian;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaSuratKetKematianController extends Controller
{
    public function index(Request $request)
    {
        $nik = Auth::user()->nik;
        return view('wargaDashboard.SuratKetBiasa', [
            'title' => 'Data Surat Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => DataKematian::where('nik_pelapor', $nik)->with('pend')->paginate(10),
            'pendu' => Penduduk::get()
        ]);
    }
}
