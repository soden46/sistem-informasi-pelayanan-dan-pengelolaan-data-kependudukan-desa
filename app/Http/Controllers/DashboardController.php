<?php

namespace App\Http\Controllers;

use App\Models\DataKematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            abort(403);
        }
        if (auth()->user()->role == 'staff') {
            return view('adminDashboard.index', [
                'title' => 'Dashboard Admin',
                'jumlahLahir' => SuratKetKelahiran::all()->count(),
                'jumlahMasyarakat' => User::all()->count(),
                'jumlahMati' => DataKematian::all()->count(),
            ]);
        }
        if (auth()->user()->role == 'masyarakat') {
            return view('wargaDashboard.index', [
                'title' => 'Dashboard',
                'jumlahLahir' => SuratKetKelahiran::all()->count(),
                'jumlahMasyarakat' => User::all()->count(),
                'jumlahMati' => DataKematian::all()->count(),
            ]);
        }
    }
}
