<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $no_kk)
    {
        $cari = $request->cari;

        if ($cari != NULL) {
            return view('adminDashboard.DataKeluarga', [
                'title' => 'Data Keluarga',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'keluarga' => DataKeluarga::with('pend')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
                'no_kk' => $no_kk,
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.DataKeluarga', [
                'title' => 'Data Keluarga',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'keluarga' => DataKeluarga::with('pend')->where('no_kk', $no_kk)->paginate(10),
                'no_kk' => $no_kk,
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
        $validatedData = $request->validate([
            'no_kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'sts_keluarga' => 'required|max:255'
        ]);

        // dd($validatedData);
        DataKeluarga::create($validatedData);

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
    public function update(Request $request, DataKeluarga $penduduk, $nik)
    {
        $rules = [
            'no_kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'sts_keluarga' => 'required|max:255'

        ];

        $validatedData = $request->validate($rules);

        DataKeluarga::where('nik', $nik)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        DataKeluarga::where('nik', $nik)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }
}
