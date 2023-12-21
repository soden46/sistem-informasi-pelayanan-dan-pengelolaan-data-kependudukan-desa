<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\DataKematian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SuratKetKematianController extends Controller
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
            return view('adminDashboard.SuratKetKematian', [
                'title' => 'Data Suart Keterangan Kematian',
                'mati' => DataKematian::where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.SuratKetKematian', [
                'title' => 'Data Data Suart Keterangan Kematian',
                'mati' => DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $rules = [
            'tgl_regis_mati' => 'required',
            'no_kk' => 'required|max:16',
            'nama_kepala_keluarga' => 'required|max:255',
            'nik_mati' => 'required|max:16',
            'nama_mati' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'anak_ke' => 'required',
            'tgl_lahir' => 'required',
            'tempat_kelahiran' => 'required',
            'agama_mati' => 'required|max:255',
            'pekerjaan_mati' => 'required|max:255',
            'alamat_mati' => 'required|max:255',
            'tgl_mati' => 'required',
            'pukul_mati' => 'required',
            'sebab' => 'required|max:255',
            'tempat_mati' => 'required|max:255',
            'yang_menerangkan' => 'required',
            'nik_ibu' => 'required|max:255',
            'nik_ayah' => 'required|max:255',
            'nik_pelapor' => 'required|max:255',
            'nik_saksisatu' => 'required|max:255',
            'nik_saksidua' => 'required|max:255',
        ];

        Penduduk::where('nik', $request->nik_mati)->update(['sts_penduduk' => 'Meninggal']);

        $validatedData = $request->validate($rules);
        // dd($validatedData);
        DataKematian::create($validatedData);
        return back()->with('successCreatedDataKematian', 'Data Kematian Berhasil Ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
    public function update(Request $request, DataKematian $penduduk, $nik_mati)
    {
        $rules = [
            'verifikasi' => 'max:255'
        ];

        $validatedData = $request->validate($rules);

        DataKematian::where('nik_mati', $nik_mati)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mati)
    {
        DataKematian::where('nik_mati', $nik_mati)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mati)
    {
        $surat = DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_mati', $nik_mati);
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
            'title' => 'Surat Keterangan Kematian',
            'surat' => DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_mati', $nik_mati),
            'ageDad' => $ageDad,
            'ageMom' => $ageMom,
            'umpel' => $umpel,
            'umdua' => $umdua,
            'umsatu' => $umsatu
        ];

        // dd($data);

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetMati', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-Kematian.pdf');
    }

    public function pdflurah($nik_mati)
    {
        $surat = DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_mati', $nik_mati);
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
            'title' => 'Surat Keterangan Kematian',
            'surat' => DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->firstWhere('nik_mati', $nik_mati),
            'ageDad' => $ageDad,
            'ageMom' => $ageMom,
            'umpel' => $umpel,
            'umdua' => $umdua,
            'umsatu' => $umsatu
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetMatiLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-Kematian-lurah.pdf');
    }
}
