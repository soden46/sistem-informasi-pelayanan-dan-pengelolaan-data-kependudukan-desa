<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class MutasiMAsukController extends Controller
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
            return view('adminDashboard.MutasiMasuk', [
                'title' => 'Data Mutasi Masuk',
                'MutasiMasuk' => MutasiMAsuk::where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.MutasiMasuk', [
                'title' => 'Data Mutasi Masuk',
                'MutasiMasuk' => MutasiMAsuk::paginate(10),
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
            'nik1' => 'max:16',
            'nama1' => 'max:255',
            'jk1' => 'max:255',
            'agama1' => 'max:255',
            'sts_kawin1' => 'max:255',
            'ket_kel1' => 'max:255',
            'nik2' => 'max:16',
            'nama2' => 'max:255',
            'jk2' => 'max:255',
            'agama2' => 'max:255',
            'sts_kawin2' => 'max:255',
            'ket_kel2' => 'max:255',
            'nik3' => 'max:16',
            'nama3' => 'max:255',
            'jk3' => 'max:255',
            'agama3' => 'max:255',
            'sts_kawin3' => 'max:255',
            'ket_kel3' => 'max:255',
            'nik5' => 'max:16',
            'nama5' => 'max:255',
            'jk5' => 'max:255',
            'agama5' => 'max:255',
            'sts_kawin5' => 'max:255',
            'ket_kel5' => 'max:255',
            'nik6' => 'max:16',
            'nama6' => 'max:255',
            'jk6' => 'max:255',
            'agama6' => 'max:255',
            'sts_kawin6' => 'max:255',
            'ket_kel6' => 'max:255',
            'prov_asal' => 'required|max:16',
        ]);

        // dd($validatedData);
        MutasiMAsuk::create($validatedData);

        return back()->with('successCreatedMutasiMAsuk', 'Data has ben created');
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
            'nik1' => 'max:16',
            'nama1' => 'max:255',
            'jk1' => 'max:255',
            'agama1' => 'max:255',
            'sts_kawin1' => 'max:255',
            'ket_kel1' => 'max:255',
            'nik2' => 'max:16',
            'nama2' => 'max:255',
            'jk2' => 'max:255',
            'agama2' => 'max:255',
            'sts_kawin2' => 'max:255',
            'ket_kel2' => 'max:255',
            'nik3' => 'max:16',
            'nama3' => 'max:255',
            'jk3' => 'max:255',
            'agama3' => 'max:255',
            'sts_kawin3' => 'max:255',
            'ket_kel3' => 'max:255',
            'nik5' => 'max:16',
            'nama5' => 'max:255',
            'jk5' => 'max:255',
            'agama5' => 'max:255',
            'sts_kawin5' => 'max:255',
            'ket_kel5' => 'max:255',
            'nik6' => 'max:16',
            'nama6' => 'max:255',
            'jk6' => 'max:255',
            'agama6' => 'max:255',
            'sts_kawin6' => 'max:255',
            'ket_kel6' => 'max:255',
            'prov_asal' => 'max:16',
            'verifikasi' => 'max:255'
        ]);


        MutasiMAsuk::where('nik_mm', $nik_mm)->update($validatedData);

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
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratMutasiMasuk', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-permohonan-mutasi-masuk.pdf');
    }
}
