<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaSuratKetKelahiranController extends Controller
{
    public function index(Request $request)
    {
        $nik = Auth::user()->nik;
        return view('wargaDashboard.SuratKetKelahiran', [
            'title' => 'Data Surat Keterangan kelahiran',
            'bayi' => SuratKetKelahiran::where('nik_ayah', $nik)->with('pend')->paginate(10),
            'pendu' => Penduduk::get()
        ]);
    }
}
