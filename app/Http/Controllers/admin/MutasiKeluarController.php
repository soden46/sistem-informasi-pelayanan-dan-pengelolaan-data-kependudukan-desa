<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MutasiKeluar;
use App\Models\Penduduk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MutasiKeluarController extends Controller
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
            return view('adminDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'pendudk' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::with('pend', 'kel1', 'kel2')->paginate(10),
                'pendudk' => Penduduk::get()
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
        $nik = Penduduk::where('nik', $request->nik_mk)->first();
        $alamat = json_encode(['Padukuhan: ' . $nik->padukuhan, 'RT: ' . $nik->rt, 'RW:' . $nik->rw]);
        $validatedData = $request->validate([
            'tgl_regis_mk' => 'required',
            'nik_pelapor' => 'required|max:16',
            'nama_pelapor' => 'required|max:255',
            'padukuhan_tuju' => 'required|max:255',
            'rt_tuju' => 'required|max:255',
            'rw_tuju' => 'required|max:255',
        ]);

        MutasiKeluar::create([
            'tgl_regis_mk' => $request->tgl_regis_mk,
            'nik_pelapor' => $request->nik_pelapor,
            'nama_pelapor' => $request->nama_pelapor,
            'nik_mk' => $request->nik_mk,
            'nama_mk' => $nik->nama,
            'jk_mk' => $nik->jk,
            'tempat_lh_mk' => $nik->tempat_lahir,
            'tgl_lh_mk' => $nik->tgl_lahir,
            'agama_mk' => $nik->agama,
            'pekerjaan_mk' => $nik->pekerjaan,
            'status_kawin_mk' => $nik->sts_kawin,
            'no_kk' => $nik->no_kk,
            'alamat_asal_mk' => $alamat,
            'padukuhan_tuju' => $request->padukuhan_tuju,
            'rt_tuju' => $request->rt_tuju,
            'rw_tuju' => $request->rw_tuju,
        ]);

        Penduduk::where('nik', $request->nik_mk)->update(['sts_penduduk' => 'Warga Pindah Menunggu Verifikasi']);
        return back()->with('successUpdatedMasyarakat', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(MutasiKeluar $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(MutasiKeluar $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MutasiKeluar  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MutasiKeluar $MutasiKeluar, $nik_mk)
    {
        $rules = [
            'verifikasi' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Penduduk::where('nik', $nik_mk)->update(['sts_penduduk' => $request->sts_penduduk]);

        $masuk = MutasiKeluar::where('nik_mk', $nik_mk)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MutasiKeluar  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mk)
    {
        MutasiKeluar::where('nik_mk', $nik_mk)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mk)
    {
        $surat = MutasiKeluar::with('pend', 'kel1', 'kel2')->where('nik_mk', $nik_mk)->first();
        $data = [
            'title' => 'Mutasi Keluar',
            'surat' => MutasiKeluar::with('pend', 'kel1', 'kel2')->where('nik_mk', $nik_mk)->first(),
            'alamat' => json_decode($surat->alamat_asal_mk, true),
            'pendu' => Penduduk::get(),
        ];
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratMutasiKeluar', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-permohonan-mutasi-keluar.pdf');
    }

    public function pdflurah($nik_mk)
    {
        $data = [
            'title' => 'Mutasi Keluar',
            'surat' => MutasiKeluar::with('pend')->where('nik_mk', $nik_mk)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBiasaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-mutasi-keluar.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLampiran($nik_mk)
    {
        $masuk = MutasiKeluar::where('nik_mk', $nik_mk)->first();
        $lampiran = json_decode($masuk->lampiran, true);
        if (isset($lampiran['kk']) && ($lampiran['ktp'])) {
            // dd($lampiran['pengantar_rt']);
            return view('adminDashboard.lampiran.LampiranMutasiKeluar', [
                'title' => 'Lampiran Keterangan Mutasi Keluar',
                'kk' => $lampiran['kk'],
                'ktp' => $lampiran['ktp'],
            ]);
        } else {
            return view('adminDashboard.lampiran.LampiranKosong', [
                'title' => 'Lampiran Surat Keterangan Mutasi Keluar',
            ]);
        }
    }

    public function lampiranStore(Request $request, $nik_mk)
    {
        $request->validate([
            'kk' => 'file|mimes:pdf,jpg,jpeg|max:2048',
            'ktp' => 'file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $lampiran = [];
        if ($request->hasFile('kk')) {
            $lampiran['kk'] = $request->file('kk')->store('lampiran-data-mutasi-keluar');
        }
        if ($request->hasFile('ktp')) {
            $lampiran['ktp'] = $request->file('ktp')->store('lampiran-data-mutasi-keluar');
        }

        // Simpan data lampiran ke dalam database
        MutasiKeluar::where('nik_mk', $nik_mk)->update(['lampiran' => json_encode($lampiran)]);

        return redirect()->back()->with('success', 'Lampiran berhasil disimpan.');
    }
}
