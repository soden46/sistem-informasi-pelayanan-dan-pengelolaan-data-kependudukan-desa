<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetBedaNama;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaSuratKetBedaNamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nik = Auth::user()->nik;
        $user = Penduduk::where('nik', Auth::user()->nik)->first();
        return view('wargaDashboard.SuratKetBedaNama', [
            'title' => 'Surat Keterangan Beda Nama',
            'surat' => SuratKetBedaNama::with('pend')
                ->where('nik', $nik)->paginate(10),
            'pendu' => Penduduk::where('nik', $nik)->get(),
            'user' => $user
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
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBedaNamaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-beda-nama-lurah.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik)
    {
        $kematian = SuratKetBedaNama::where('nik', $nik)->with('pend')->first();
        $lampiran = json_decode($kematian->lampiran, true);
        if (isset($lampiran['ktp']) && ($lampiran['kk'])) {
            // dd($lampiran['pengantar_rt']);
            return view('wargaDashboard.lampiran.LampiranDataBedaNama', [
                'title' => 'Lampiran Keterangan Beda Nama',
                'pendu' => Penduduk::get(),
                'ktp' => $lampiran['ktp'],
                'kk' => $lampiran['kk'],
                'dokumen' => $lampiran['dokumen'],

            ]);
        } else {
            return view('wargaDashboard.lampiran.LampiranKosong', [
                'title' => 'Lampiran Surat Keterangan Beda Nama',
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
            $lampiran['ktp'] = $request->file('ktp')->store('warga/lampiran-data-beda-nama');
        }
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('warga/lampiran-data-beda-nama');
        }
        if ($request->hasFile('dokumen')) {
            $lampiran['dokumen'] = $request->file('dokumen')->store('warga/lampiran-data-beda-nama');
        }

        // Simpan data lampiran ke dalam database
        SuratKetBedaNama::where('nik', $nik)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
