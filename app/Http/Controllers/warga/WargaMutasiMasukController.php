<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaMutasiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $nik = Auth::user()->nik;
        if ($cari != NULL) {
            return view('wargaDashboard.MutasiMasuk', [
                'title' => 'Data Mutasi Masuk',
                'MutasiMasuk' => MutasiMAsuk::where('nik_mm', $nik)->orWhere('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('wargaDashboard.MutasiMasuk', [
                'title' => 'Data Mutasi Masuk',
                'MutasiMasuk' => MutasiMAsuk::where('nik_mm', $nik)->paginate(10),
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
        $validatedDataMM = $request->validate([
            'tgl_regis_mm' => 'required',
            'nik_pelapor' => 'required|max:16',
            'nama_pelapor' => 'required|max:255',
            'nik_mm' => 'required|max:16',
            'nama_mm' => 'required|max:255',
            'jk_mm' => 'required|max:255',
            'tempat_lh_mm' => 'required|max:255',
            'tgl_lh_mm' => 'required',
            'agama_mm' => 'required|max:255',
            'pekerjaan_mm' => 'required|max:255',
            'status_kawin_mm' => 'required|max:255',
            'no_kk' => 'required|max:16',
            'alamat_asal_mm' => 'required|max:255',
            'padukuhan_tuju' => 'required|max:255',
            'rt_tuju' => 'required|max:255',
            'rw_tuju' => 'required|max:255',
        ]);

        // dd($validatedData);
        $masuk = MutasiMAsuk::create($validatedDataMM);

        Penduduk::create([
            'nik' => $request->nik_mm,
            'nama' => $request->nama_mm,
            'no_kk' => $request->no_kk,
            'padukuhan' => $request->padukuhan_tuju,
            'rt' => $request->rt_tuju,
            'rw' => $request->rw_tuju,
            'jk' => $request->jk_mm,
            'tempat_lahir' => $request->tempat_lh_mm,
            'tgl_lahir' => $request->tgl_lh_mm,
            'wn' => $request->wn,
            'kebangsaan' => $request->kebangsaan,
            'agama' => $request->agama_mm,
            'pekerjaan' => $request->pekerjaan_mm,
            'pendidikan' => $request->pendidikan,
            'sts_kawin' => $request->status_kawin_mm,
            'sts_penduduk' => $request->sts_penduduk,
            'sts_dalam_kk' => $request->sts_dalam_kk
        ]);

        return back()->with('successCreatedMutasiMAsuk', 'Data Sukses Ditambahkan Ke Tabel Mutasi Masuk Dan Data Penduduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MutasiMAsuk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(MutasiMAsuk $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MutasiMAsuk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(MutasiMAsuk $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MutasiMAsuk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MutasiMAsuk $MutasiMAsuk, $nik_mm)
    {
        $validatedData = $request->validate([
            'nik_pelapor' => 'max:16',
            'nama_pelapor' => 'max:255',
            'nik_mm' => 'max:16',
            'nama_mm' => 'max:255',
            'jk_mm' => 'max:255',
            'tempat_lh_mm' => 'max:255',
            'agama_mm' => 'max:255',
            'pekerjaan_mm' => 'max:255',
            'status_kawin_mm' => 'max:255',
            'no_kk' => 'max:16',
            'alamat_asal_mm' => 'max:255',
            'padukuhan_tuju' => 'max:255',
            'rt_tuju' => 'max:255',
            'rw_tuju' => 'max:255',
        ]);


        $masuk = MutasiMAsuk::where('nik_mm', $nik_mm)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MutasiMAsuk  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mm)
    {
        MutasiMAsuk::where('nik_mm', $nik_mm)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mm)
    {
        $data = [
            'title' => 'Mutasi Masuk',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => MutasiMAsuk::with('pend')->where('nik_mm', $nik_mm)->first(),
            'pendu' => Penduduk::get(),
        ];
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('wargaDashboard.pdf.SuratMutasiMasuk', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-permohonan-mutasi-masuk.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik_mm)
    {
        $masuk = MutasiMAsuk::where('nik_mm', $nik_mm)->first();
        $lampiran = json_decode($masuk->lampiran, true);
        // dd($lampiran);
        if (isset($lampiran['kk']) && ($lampiran['ktp_mm'])) {
            // dd($lampiran['pengantar_rt']);
            return view('wargaDashboard.lampiran.LampiranMutasiMasuk', [
                'title' => 'Lampiran Keterangan Mutasi Masuk',
                'kk' => $lampiran['kk'],
                'ktp_mm' => $lampiran['ktp_mm'],
                'ktp_pelapor' => $lampiran['ktp_pelapor'],
            ]);
        } else {
            return view('wargaDashboard.lampiran.LampiranKosong', [
                'title' => 'Lampiran Surat Keterangan Mutasi Masuk',
            ]);
        }
    }

    public function lampiranStore(Request $request, $nik_mm)
    {
        $request->validate([
            'kk' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_mm' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp_pelapor' => 'file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $lampiran = [];
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('lampiran-data-mutasi-masuk');
        }
        if ($request->hasFile('ktp_mm')) {
            $lampiran['ktp_mm'] = $request->file('ktp_mm')->store('lampiran-data-mutasi-masuk');
        }
        if ($request->hasFile('ktp_pelapor')) {
            $lampiran['ktp_pelapor'] = $request->file('ktp_pelapor')->store('lampiran-data-mutasi-masuk');
        }

        // Simpan data lampiran ke dalam database
        MutasiMAsuk::where('nik_mm', $nik_mm)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
