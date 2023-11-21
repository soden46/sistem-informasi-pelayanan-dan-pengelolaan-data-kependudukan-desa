<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetBedaNama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratKetBedaNamaController extends Controller
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
            return view('adminDashboard.SuratKetBedaNama', [
                'title' => 'Data Surat Keterangan Beda Nama',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'surat' => SuratKetBedaNama::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('nama_baru', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.SuratKetBedaNama', [
                'title' => 'Data Suart Keterangan Beda Nama',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'surat' => SuratKetBedaNama::with('pend')->paginate(10),
                'pendu' => Penduduk::get()
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
            'no_surat_skbn' => 'required|max:255',
            'tgl_regis_skbn' => 'required',
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'tertulis_pada' => 'required|max:16',
            'nama_baru' => 'required|max:255',
            'tempat_lh_baru' => 'required|max:255',
            'tgl_lh_baru' => 'required',
            'alamat_baru' => 'required|max:255',
            'keperluan_skbn' => 'required|max:255',
        ]);

        // dd($validatedData);
        SuratKetBedaNama::create($validatedData);

        return back()->with('successCreatedPenduduk', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKetBedaNama  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKetBedaNama $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratKetBedaNama  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKetBedaNama $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratKetBedaNama  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKetBedaNama $penduduk, $nik)
    {
        $validatedData = $request->validate([
            'no_surat_skbn' => 'max:255',
            'nik' => 'max:16',
            'tertulis_pada' => 'max:16',
            'nama_baru' => 'max:255',
            'tempat_lh_baru' => 'max:255',
            'alamat_baru' => 'max:255',
            'keperluan_skbn' => 'max:255',
            'verifikasi' => 'required'
        ]);

        SuratKetBedaNama::where('nik', $nik)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KemaSuratKetBedaNamaian  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        SuratKetBedaNama::where('nik', $nik)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik)
    {
        $data = [
            'title' => 'Keterangan Beda Nama',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetBedaNama::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetBedaNama', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-beda-nama.pdf');
    }

    public function pdflurah($nik)
    {
        $data = [
            'title' => 'Keterangan Beda Nama',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetBedaNama::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetBedaNamaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-beda-nama-lurah.pdf');
    }
}
