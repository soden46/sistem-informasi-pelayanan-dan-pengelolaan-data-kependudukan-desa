<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetStatus;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaSuratKetStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nik = Auth::user()->nik;
        return view('wargaDashboard.SuratKetStatus', [
            'title' => 'Surat Keterangan Status',
            'surat' => SuratKetStatus::with('pend')
                ->where('nik', $nik)->paginate(10),
            'pendu' => Penduduk::where('nik', $nik)->get(),
        ]);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik)
    {
        $kematian = SuratKetStatus::where('nik', $nik)->with('pend')->first();
        $lampiran = json_decode($kematian->lampiran, true);
        if (isset($lampiran['ktp']) && ($lampiran['kk'])) {
            // dd($lampiran['pengantar_rt']);
            return view('wargaDashboard.lampiran.LampiranDataStatus', [
                'title' => 'Lampiran Keterangan Status',
                'pendu' => Penduduk::get(),
                'ktp' => $lampiran['ktp'],
                'kk' => $lampiran['kk'],

            ]);
        } else {
            return view('wargaDashboard.lampiran.LampiranKosong', [
                'title' => 'Lampiran Surat Keterangan Status',
            ]);
        }
    }

    public function lampiranStore(Request $request, $nik)
    {
        $request->validate([
            'ktp' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'kk' => 'file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $lampiran = [];
        if ($request->hasFile('ktp')) {
            $lampiran['ktp'] = $request->file('ktp')->store('warga/lampiran-data-status');
        }
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('warga/lampiran-data-status');
        }

        // Simpan data lampiran ke dalam database
        SuratKetStatus::where('nik', $nik)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
