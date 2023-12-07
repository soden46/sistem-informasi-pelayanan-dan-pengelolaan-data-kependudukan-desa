<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\DataKematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        return view('WargaDashboard.index', [
            'title' => 'Dashboard Warga',
            'jumlahLahir' => SuratKetKelahiran::all()->count(),
            'jumlahMasyarakat' => User::all()->count(),
            'jumlahMati' => DataKematian::all()->count(),
            'profil' => ProfilDesa::Where('id', 1)->first(),
        ]);
    }
}
