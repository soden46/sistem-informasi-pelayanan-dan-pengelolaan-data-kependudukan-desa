<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MutasiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        if ($cari != NULL) {
            return view('adminDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::with('pend', 'kel1', 'kel2')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::with('pend', 'kel1', 'kel2')->paginate(10),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_regis_mk' => 'required',
            'nik_mk' => 'required|max:16',
            'sts_dalam_keluarga' => 'required|max:255',
            'kel_ikut' => 'required|max:255',
            'alamat_tuju_mk' => 'required|max:255',
            'prov_tuju' => 'required|max:255',
            'nik1' => 'max:16',
            'nama1' => 'max:255',
            'jk1' => 'max:255',
            'agama1' => 'max:255',
            'sts_kawin1' => 'max:255',
            'ket_kel1' => 'max:255',
            'nik2' => 'max:16',
            'nama2' => 'max:255',
            'jk2' => 'max:255',
            'agama2' => 'max:255',
            'sts_kawin2' => 'max:255',
            'ket_kel2' => 'max:255',
            'nik3' => 'max:16',
            'nama3' => 'max:255',
            'jk3' => 'max:255',
            'agama3' => 'max:255',
            'sts_kawin3' => 'max:255',
            'ket_kel3' => 'max:255',
            'nik5' => 'max:16',
            'nama5' => 'max:255',
            'jk5' => 'max:255',
            'agama5' => 'max:255',
            'sts_kawin5' => 'max:255',
            'ket_kel5' => 'max:255',
            'nik6' => 'max:16',
            'nama6' => 'max:255',
            'jk6' => 'max:255',
            'agama6' => 'max:255',
            'sts_kawin6' => 'max:255',
            'ket_kel6' => 'max:255',
        ]);

        // dd($validatedData);
        MutasiKeluar::create($validatedData);

        return back()->with('successCreatedMutasiKeluar', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(MutasiKeluar $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(MutasiKeluar $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MutasiKeluar $MutasiKeluar, $nik_mk)
    {
        $validatedData = $request->validate([
            'nik_mk' => 'max:16',
            'alamat_tujuan_mk' => 'max:255',
            'prov_tuju' => 'max:255',
            'nik1' => 'max:16',
            'nama1' => 'max:255',
            'jk1' => 'max:255',
            'agama1' => 'max:255',
            'sts_kawin1' => 'max:255',
            'ket_kel1' => 'max:255',
            'nik2' => 'max:16',
            'nama2' => 'max:255',
            'jk2' => 'max:255',
            'agama2' => 'max:255',
            'sts_kawin2' => 'max:255',
            'ket_kel2' => 'max:255',
            'nik3' => 'max:16',
            'nama3' => 'max:255',
            'jk3' => 'max:255',
            'agama3' => 'max:255',
            'sts_kawin3' => 'max:255',
            'ket_kel3' => 'max:255',
            'nik5' => 'max:16',
            'nama5' => 'max:255',
            'jk5' => 'max:255',
            'agama5' => 'max:255',
            'sts_kawin5' => 'max:255',
            'ket_kel5' => 'max:255',
            'nik6' => 'max:16',
            'nama6' => 'max:255',
            'jk6' => 'max:255',
            'agama6' => 'max:255',
            'sts_kawin6' => 'max:255',
            'ket_kel6' => 'max:255',
            'verifikasi' => 'max:255'
        ]);


        MutasiKeluar::where('nik_mk', $nik_mk)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MutasiKeluar  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mk)
    {
        MutasiKeluar::where('nik_mk', $nik_mk)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mk)
    {
        $data = [
            'title' => 'Mutasi Keluar',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => MutasiKeluar::with('pend', 'kel1', 'kel2')->where('nik_mk', $nik_mk)->first(),
            'pendu' => Penduduk::get(),
        ];
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratMutasiKeluar', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-permohonan-mutasi-keluar.pdf');
    }

    public function pdflurah($nik_mk)
    {
        $data = [
            'title' => 'Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => MutasiKeluar::with('pend')->where('nik_mk', $nik_mk)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBiasaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-mutasi-keluar.pdf');
    }
}
