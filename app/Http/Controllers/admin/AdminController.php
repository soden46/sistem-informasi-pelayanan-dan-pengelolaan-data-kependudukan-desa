<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetBedaNama;
use App\Models\SuratKetKelahiran;
use App\Models\SuratKetStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('wdminDashboard.index', [
            'title' => 'Dashboard',
            'jumlahLahir' => SuratKetKelahiran::all()->count(),
            'jumlahMasyarakat' => Penduduk::where('sts_penduduk', 'Tinggal')->count(),
            'jumlahMati' => DataKematian::all()->count(),
            'jumlahBN' => SuratKetBedaNama::all()->count(),
            'jumlahS' => SuratKetStatus::all()->count(),
        ]);
    }
}
