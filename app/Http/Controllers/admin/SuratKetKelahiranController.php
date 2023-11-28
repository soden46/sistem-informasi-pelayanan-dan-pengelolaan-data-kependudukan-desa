<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKetKelahiranController extends Controller
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
            return view('adminDashboard.SuratKetKelahiran', [
                'title' => 'Data Suart Keterangan Kelahiran',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'bayi' => SuratKetKelahiran::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.SuratKetKelahiran', [
                'title' => 'Data Data Suart Keterangan Kelahiran',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'bayi' => SuratKetKelahiran::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->paginate(10),
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

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_regis_lahir' => 'required',
            'no_kk' => 'required|max:16',
            'nama_kepala_keluarga' => 'required|max:255',
            'nik_bayi' => 'required|max:16',
            'nama_bayi' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tempat_dilahirkan' => 'required|max:255',
            'tempat_kelahiran' => 'required|max:255',
            'tgl_lahir' => 'required',
            'pukul' => 'required',
            'jenis_kelahiran' => 'required|max:255',
            'penolong' => 'required|max:255',
            'berat_bayi' => 'required',
            'panjang_bayi' => 'required|max:255',
            'anak_ke' => 'required|max:10',
            'nik_ibu' => 'required|max:255',
            'nik_ayah' => 'required|max:255',
            'tempat_kawin' => 'required|max:255',
            'no_akta_nikah' => 'required|max:255',
            'tgl_akta_nikah' => 'required',
            'nik_pelapor' => 'required|max:255',
            'nik_saksisatu' => 'required|max:255',
            'nik_saksidua' => 'required|max:255'
        ]);

        // dd($validatedData);
        SuratKetKelahiran::create($validatedData);

        return back()->with('successCreatedPenduduk', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKetKelahiran $penduduk, $nik_bayi)
    {
        $rules = [
            'no_kk' => 'max:16',
            'nama_kepala_keluarga' => 'max:255',
            'nik_bayi' => 'max:16',
            'nama_bayi' => 'max:255',
            'tempat_dilahirkan' => 'max:255',
            'tempat_kelahiran' => 'max:255',
            'jenis_kelahiran' => 'max:255',
            'penolong' => 'max:255',
            'panjang_bayi' => 'max:255',
            'nik_ibu' => 'max:255',
            'nik_ayah' => 'max:255',
            'tempat_kawin' => 'max:255',
            'no_akta_nikah' => 'max:255',
            'nik_pelapor' => 'max:255',
            'nama_pelapor' => 'max:255',
            'nik_saksisatu' => 'max:255',
            'nik_saksidua' => 'max:255',
            'verifikasi' => 'max:255'
        ];

        $validatedData = $request->validate($rules);

        SuratKetKelahiran::where('nik_bayi', $nik_bayi)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }


    public function pdf($nik_bayi)
    {
        $surat = SuratKetKelahiran::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_bayi', $nik_bayi);
        $ibu = $surat->mom->tgl_lahir;
        $ageMom = \Carbon\Carbon::parse($ibu)->age;
        $ayah = $surat->dad->tgl_lahir;
        $ageDad = \Carbon\Carbon::parse($ayah)->age;
        $pelaporr = $surat->lapor->tgl_lahir;
        $umpel = \Carbon\Carbon::parse($pelaporr)->age;
        $saksisatuu = $surat->saksi1->tgl_lahir;
        $umsatu = \Carbon\Carbon::parse($saksisatuu)->age;
        $saksiduaa = $surat->saksi2->tgl_lahir;
        $umdua = \Carbon\Carbon::parse($saksiduaa)->age;

        $data = [
            'title' => 'Surat Keterangan Kelahiran',
            'surat' => SuratKetKelahiran::firstWhere('nik_bayi', $nik_bayi),
            'ageMom' => $ageMom,
            'ageDad' => $ageDad,
            'umpel' => $umpel,
            'umsatu' => $umsatu,
            'umdua' => $umdua
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetLahir', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-kelahiran.pdf');
    }

    public function pdflurah($nik_bayi)
    {
        $surat = SuratKetKelahiran::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_bayi', $nik_bayi);
        $ibu = $surat->mom->tgl_lahir;
        $ageMom = \Carbon\Carbon::parse($ibu)->age;
        $ayah = $surat->dad->tgl_lahir;
        $ageDad = \Carbon\Carbon::parse($ayah)->age;
        $pelaporr = $surat->lapor->tgl_lahir;
        $umpel = \Carbon\Carbon::parse($pelaporr)->age;
        $saksisatuu = $surat->saksi1->tgl_lahir;
        $umsatu = \Carbon\Carbon::parse($saksisatuu)->age;
        $saksiduaa = $surat->saksi2->tgl_lahir;
        $umdua = \Carbon\Carbon::parse($saksiduaa)->age;

        $data = [
            'title' => 'Surat Keterangan Kelahiran',
            'surat' => SuratKetKelahiran::firstWhere('nik_bayi', $nik_bayi),
            'ageMom' => $ageMom,
            'ageDad' => $ageDad,
            'umpel' => $umpel,
            'umsatu' => $umsatu,
            'umdua' => $umdua
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetLahirLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-kelahiran-lurah.pdf');
    }
}
