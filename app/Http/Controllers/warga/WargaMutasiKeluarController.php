<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\MutasiKeluar;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class WargaMutasiKeluarController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        if ($cari != NULL) {
            return view('wargaDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'MutasiKeluar' => MutasiKeluar::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('wargaDashboard.MutasiKeluar', [
                'title' => 'Data Mutasi Keluar',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'MutasiKeluar' => MutasiKeluar::with('pend')->paginate(10),
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
            'tgl_regis_mk' => 'required',
            'nik_mk' => 'required|max:16',
            'alamat_tuju_mk' => 'required|max:255',
            'prov_tuju' => 'required|max:16',
        ]);

        // dd($validatedData);
        MutasiKeluar::create($validatedData);

        return back()->with('successCreatedMutasiKeluar', 'Data has ben created');
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
