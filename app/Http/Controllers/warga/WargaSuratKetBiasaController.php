<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetBiasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaSuratKetBiasaController extends Controller
{
    public function index(Request $request)
    {
        $nik = Auth::user()->nik;
        return view('wargaDashboard.SuratKetBiasa', [
            'title' => 'Data Surat Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetBiasa::where('nik', $nik)->with('pend')->paginate(10),
            'pendu' => Penduduk::get()
        ]);
    }
}
