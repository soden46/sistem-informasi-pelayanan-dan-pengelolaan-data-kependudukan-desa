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
                'title' => 'Data Surat Keterangan Kematian',
                'mati' => DataKematian::where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.SuratKetKematian', [
                'title' => 'Data Surat Keterangan Kematian',
                'mati' => DataKematian::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->paginate(10),
                'pendu' => Penduduk::get(),
                'kepala' => Penduduk::where('sts_dalam_kk', 'Kepala Keluarga')->get()
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
        $data = Penduduk::where('nik', $request->nik_mati)->first();
        $alamat = json_encode(['Padukuhan: ' . $data->padukuhan, 'RT: ' . $data->rt, 'RW:' . $data->rw]);

        $validatedData = $request->validate([
            'tgl_regis_mati' => 'required',
            'no_kk' => 'required|max:16',
            'nama_kepala_keluarga' => 'required|max:255',
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
        ]);

        Penduduk::where('nik', $request->nik_mati)->update(['sts_penduduk' => 'Meninggal']);
        DataKematian::create([
            'tgl_regis_mati' => $request->tgl_regis_mati,
            'no_kk' => $request->no_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'nik_mati' => $request->nik_mati,
            'nama_mati' => $data->nama,
            'jenis_kelamin' => $data->jk,
            'tgl_lahir' => $data->tgl_lahir,
            'tempat_kelahiran' => $data->tempat_lahir,
            'agama_mati' => $data->agama,
            'pekerjaan_mati' => $data->pekerjaan,
            'alamat_mati' => $alamat,
            'tgl_mati' => $request->tgl_mati,
            'pukul_mati' => $request->pukul_mati,
            'sebab' => $request->sebab,
            'tempat_mati' => $request->tempat_mati,
            'yang_menerangkan' => $request->yang_menerangkan,
            'nik_ibu' => $request->nik_ibu,
            'nik_ayah' => $request->nik_ayah,
            'nik_pelapor' => $request->nik_pelapor,
            'nik_saksisatu' => $request->nik_saksisatu,
            'nik_saksidua' => $request->nik_saksidua,
        ]);

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik_mati)
    {
        $kematian = DataKematian::where('nik_mati', $nik_mati)->with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->first();
        $lampiran = json_decode($kematian->lampiran, true);
        if (isset($lampiran['pengantar_rt']) && ($lampiran['pengantar_dokter'])) {
            // dd($lampiran['pengantar_rt']);
            return view('adminDashboard.lampiran.LampiranDataKematian', [
                'title' => 'Lampiran Keterangan Kematian',
                'pendu' => Penduduk::get(),
                'rt' => $lampiran['pengantar_rt'],
                'dokter' => $lampiran['pengantar_dokter'],
                'kk' => $lampiran['kk'],
                'jenazah' => $lampiran['ktp_jenazah'],
                'pelapor' => $lampiran['ktp_pelapor'],
                'saksi' => $lampiran['ktp_saksi'],
                'saksi2' => $lampiran['ktp_saksi2'],

            ]);
        } else {
            return view('adminDashboard.lampiran.LampiranKosong', [
                'title' => 'Lampiran Surat Keterangan Kematian',
            ]);
        }
    }

    public function lampiranStore(Request $request, $nik_mati)
    {
        $request->validate([
            'pengantar_rt' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'pengantar_dokter' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'kk' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_jenazah' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_pelapor' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_saksi' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_saksi2' => 'file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $lampiran = [];
        if ($request->hasFile('pengantar_rt')) {
            $lampiran['pengantar_rt'] = $request->file('pengantar_rt')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('pengantar_dokter')) {
            $lampiran['pengantar_dokter'] = $request->file('pengantar_dokter')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('ktp_jenazah')) {
            $lampiran['ktp_jenazah'] = $request->file('ktp_jenazah')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('ktp_pelapor')) {
            $lampiran['ktp_pelapor'] = $request->file('ktp_pelapor')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('ktp_saksi')) {
            $lampiran['ktp_saksi'] = $request->file('ktp_saksi')->store('lampiran-data-kematian');
        }
        if ($request->hasFile('ktp_saksi2')) {
            $lampiran['ktp_saksi2'] = $request->file('ktp_saksi2')->store('lampiran-data-kematian');
        }

        // Simpan data lampiran ke dalam database
        DataKematian::where('nik_mati', $nik_mati)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
