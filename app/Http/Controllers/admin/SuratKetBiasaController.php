<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetBiasa;
use App\Models\SuratKetStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SuratKetBiasaController extends Controller
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
            return view('adminDashboard.SuratKetBiasa', [
                'title' => 'Data Surat Keterangan Biasa',
                'surat' => SuratKetBiasa::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('nama_baru', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get(),
            ]);
        } else {
            return view('adminDashboard.SuratKetBiasa', [
                'title' => 'Data Surat Keterangan Biasa',
                'surat' => SuratKetBiasa::with('pend')->paginate(10),
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
            'tgl_regis_skb' => 'required',
            'nik' => 'required|max:16',
            'keperluan_skb' => 'required|max:255',
        ]);

        // dd($validatedData);
        SuratKetBiasa::create($validatedData);

        return back()->with('successCreatedPenduduk', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKetBiasa  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKetBiasa $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratKetBiasa  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKetBiasa $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratKetBiasa  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKetBiasa $penduduk, $nik)
    {
        $validatedData = $request->validate([
            'nik' => 'max:16',
            'keperluan_sks' => 'max:255',
            'verifikasi' => 'required'
        ]);

        SuratKetBiasa::where('nik', $nik)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KemaSuratKetBiasaian  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        SuratKetBiasa::where('nik', $nik)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik)
    {
        $data = [
            'title' => 'Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetBiasa::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetBiasa', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-biasa.pdf');
    }

    public function pdflurah($nik)
    {
        $data = [
            'title' => 'Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => SuratKetBiasa::with('pend')->where('nik', $nik)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBiasaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-biasa-lurah.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik)
    {
        $kematian = SuratKetBiasa::where('nik', $nik)->with('pend')->first();
        $lampiran = json_decode($kematian->lampiran, true);
        if (isset($lampiran['ktp']) && ($lampiran['kk'])) {
            // dd($lampiran['pengantar_rt']);
            return view('adminDashboard.LampiranDataBiasa', [
                'title' => 'Lampiran Keterangan Biasa',
                'pendu' => Penduduk::get(),
                'ktp' => $lampiran['ktp'],
                'kk' => $lampiran['kk'],

            ]);
        } else {
            // Tindakan jika properti 'pengantar_rt' tidak ada
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
            $lampiran['ktp'] = $request->file('ktp')->store('lampiran-data-status');
        }
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('lampiran-data-status');
        }

        // Simpan data lampiran ke dalam database
        SuratKetBiasa::where('nik', $nik)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
