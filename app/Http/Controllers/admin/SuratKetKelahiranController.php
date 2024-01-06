<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
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
                'bayi' => SuratKetKelahiran::with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.SuratKetKelahiran', [
                'title' => 'Data Data Suart Keterangan Kelahiran',
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

        DataKeluarga::create([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik_bayi,
            'sts_keluarga' => 'Anak'
        ]);

        $data_penduduk = Penduduk::where('nama', $request->nama_kepala_keluarga)->first();

        Penduduk::create([
            'nik' => $request->nik_bayi,
            'nama' => $request->nama_bayi,
            'no_kk' => $request->no_kk,
            'padukuhan' => $data_penduduk->padukuhan,
            'rt' => $data_penduduk->rt,
            'rw' => $data_penduduk->rw,
            'jk' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_kelahiran,
            'tgl_lahir' => $request->tgl_lahir,
            'wn' => $data_penduduk->wn,
            'kebangsaan' => 'INDONESIA',
            'agama' => $data_penduduk->agama,
            'pekerjaan' => '-',
            'pendidikan' => '-',
            'sts_kawin' => 'Belum Kawin',
            'sts_penduduk' => 'Hidup',
            'sts_dalam_kk' => 'Anak'
        ]);

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik_bayi)
    {
        $kematian = SuratKetKelahiran::where('nik_bayi', $nik_bayi)->with('keluarga', 'pendu', 'mom', 'dad', 'saksi1', 'saksi2', 'lapor')->first();
        $lampiran = json_decode($kematian->lampiran, true);
        if (isset($lampiran['pengantar_rt']) && ($lampiran['surat_ket_kelahiran'])) {
            // dd($lampiran['pengantar_rt']);
            return view('adminDashboard.LampiranDataKelahiran', [
                'title' => 'Lampiran Keterangan Kelahiran',
                'pendu' => Penduduk::get(),
                'rt' => $lampiran['pengantar_rt'],
                'dokter' => $lampiran['surat_ket_kelahiran'],
                'kk' => $lampiran['kk'],
                'suami' => $lampiran['ktp_suami'],
                'istri' => $lampiran['ktp_istri'],
                'nikah' => $lampiran['buku_nikah'],
                'pelapor' => $lampiran['ktp_pelapor'],
                'saksi' => $lampiran['ktp_saksi'],
                'saksi2' => $lampiran['ktp_saksi2'],

            ]);
        } else {
            // Tindakan jika properti 'pengantar_rt' tidak ada
        }
    }

    public function lampiranStore(Request $request, $nik_bayi)
    {
        $request->validate([
            'pengantar_rt' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'surat_ket_kelahiran' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'kk' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_suami' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_istri' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'buku_nikah' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_pelapor' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_saksi' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_saksi2' => 'file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $lampiran = [];
        if ($request->hasFile('pengantar_rt')) {
            $lampiran['pengantar_rt'] = $request->file('pengantar_rt')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('surat_ket_kelahiran')) {
            $lampiran['surat_ket_kelahiran'] = $request->file('surat_ket_kelahiran')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('ktp_suami')) {
            $lampiran['ktp_suami'] = $request->file('ktp_suami')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('ktp_istri')) {
            $lampiran['ktp_istri'] = $request->file('ktp_istri')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('buku_nikah')) {
            $lampiran['buku_nikah'] = $request->file('buku_nikah')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('ktp_pelapor')) {
            $lampiran['ktp_pelapor'] = $request->file('ktp_pelapor')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('ktp_saksi')) {
            $lampiran['ktp_saksi'] = $request->file('ktp_saksi')->store('lampiran-data-kelahiran');
        }
        if ($request->hasFile('ktp_saksi2')) {
            $lampiran['ktp_saksi2'] = $request->file('ktp_saksi2')->store('lampiran-data-kelahiran');
        }


        // Simpan data lampiran ke dalam database
        SuratKetKelahiran::where('nik_bayi', $nik_bayi)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
