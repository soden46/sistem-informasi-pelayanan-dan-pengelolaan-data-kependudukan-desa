<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratKetStatusController extends Controller
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
            return view('adminDashboard.SuratKetStatus', [
                'title' => 'Data Surat Keterangan Status',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'surat' => SuratKetStatus::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('nama_baru', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get(),
            ]);
        } else {
            return view('adminDashboard.SuratKetStatus', [
                'title' => 'Data Surat Keterangan Status',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'surat' => SuratKetStatus::with('pend')->paginate(10),
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
            'no_surat_sks' => 'required|max:255',
            'tgl_regis_sks' => 'required',
            'nik' => 'required|max:16',
            'keperluan_sks' => 'required|max:255',
        ]);

        // dd($validatedData);
        SuratKetStatus::create($validatedData);

        return back()->with('successCreatedPenduduk', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKetStatus  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKetStatus $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratKetStatus  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKetStatus $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratKetStatus  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKetStatus $penduduk, $nik)
    {
        $validatedData = $request->validate([
            'no_surat_sks' => 'max:255',
            'nik' => 'max:16',
            'keperluan_sks' => 'max:255',
            'verifikasi' => 'required'
        ]);

        SuratKetStatus::where('nik', $nik)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KemaSuratKetStatusian  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        SuratKetStatus::where('nik', $nik)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik)
    {
        $data = [
            'title' => 'Keterangan Status',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetStatus::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetStatus', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-status.pdf');
    }

    public function pdflurah($nik)
    {
        $data = [
            'title' => 'Keterangan Status',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetStatus::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetStatusLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-status-lurah.pdf');
    }
}
