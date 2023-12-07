<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;


class DataKKController extends Controller
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
            return view('adminDashboard.KK', [
                'title' => 'Data Kepala Keluarga',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'masyarakat' => Penduduk::where('sts_dalam_kk', "Kepala Keluarga")
                    ->orWhere('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")
                    ->orWhere('nama', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.KK', [
                'title' => 'Data Kepala Keluarga',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'masyarakat' => Penduduk::where('sts_dalam_kk', "Kepala Keluarga")->paginate(10),
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
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'no_kk' => 'required|max:255',
            'padukuhan' => 'required|max:255',
            'desa' => 'required|max:255',
            'rt' => 'required|max:255',
            'rw' => 'required|max:255',
            'nama_jalan' => 'required|max:255',
            'kota' => 'required|max:255',
            'prov' => 'required|max:255',
            'jk' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'wn' => 'required|max:255',
            'kebangsaan' => 'required|max:255',
            'agama' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'sts_kawin' => 'required|max:255',
            'sts_penduduk' => 'required|max:255',
            'sts_dalam_kk' => 'max:100'
        ]);

        // dd($validatedData);
        Penduduk::create($validatedData);

        return redirect('/data-penduduk')->with('successCreatedPenduduk', 'Data has ben created');
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
    public function update(Request $request, $nik)
    {
        $rules = [
            'nik' => 'max:16',
            'nama' => 'max:255',
            'no_kk' => 'max:255',
            'padukuhan' => 'max:255',
            'desa' => 'max:255',
            'rt' => 'max:255',
            'rw' => 'max:255',
            'nama_jalan' => 'max:255',
            'kota' => 'max:255',
            'prov' => 'max:255',
            'jk' => 'max:255',
            'tempat_lahir' => 'max:255',
            'tgl_lahir' => 'max:255',
            'wn' => 'max:255',
            'kebangsaan' => 'max:255',
            'agama' => 'max:255',
            'pekerjaan' => 'max:255',
            'pendidikan' => 'max:255',
            'sts_kawin' => 'max:255',
            'sts_penduduk' => 'max:255',
            'sts_dalam_kk' => 'max:100'
        ];


        $validatedData = $request->validate($rules);

        Penduduk::where('nik', $nik)->update($validatedData);

        return redirect('/data-penduduk')->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        Penduduk::where('nik', $nik)->delete();
        return redirect('/data-penduduk')->with('successDeletedMasyarakat', 'Data has ben deleted');
    }
}
