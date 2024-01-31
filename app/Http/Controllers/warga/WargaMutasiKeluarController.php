<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\MutasiKeluar;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaMutasiKeluarController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $nik = Auth::user()->nik;
        if ($cari != NULL) {
            return view('wargaDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::where('nik_mk', $nik)->with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'pendudk' => Penduduk::get()
            ]);
        } else {
            return view('wargaDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'MutasiKeluar' => MutasiKeluar::where('nik_mk', $nik)->with('pend')->paginate(10),
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

        Penduduk::where('nik', $request->nik_mk)->update(['sts_penduduk' => 'Pindah Keluar']);
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
        $validatedData = $request->validate([
            'nik_mk' => 'max:16',
            'alamat_tujuan_mk' => 'max:255',
            'prov_tuju' => 'max:16',
            'verifikasi' => 'max:255'
        ]);


        MutasiKeluar::where('nik_mk', $nik_mk)->update($validatedData);

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
}
