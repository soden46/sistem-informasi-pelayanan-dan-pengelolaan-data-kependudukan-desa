<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.index', [
            'title' => 'Dashboard',
            'jumlahLahir' => SuratKetKelahiran::all()->count(),
            'jumlahMasyarakat' => User::all()->count(),
            'jumlahMati' => Kematian::all()->count(),
            'jumlahMM' => MutasiMAsuk::all()->count(),
            'jumlahMK' => MutasiKeluar::all()->count(),
            'profil' => ProfilDesa::Where('id', 1)->first(),
        ]);
    }
}
