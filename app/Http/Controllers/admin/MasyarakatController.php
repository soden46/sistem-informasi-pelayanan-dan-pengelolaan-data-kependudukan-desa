<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportPenduduk;
use App\Imports\ImportUser;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MasyarakatController extends Controller
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
            return view('adminDashboard.Penduduk', [
                'title' => 'Data Penduduk',
                'masyarakat' => Penduduk::orWhere('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")
                    ->orWhere('nama', 'like', "%" . $cari . "%")->paginate(10),
                'pendu' => Penduduk::get()
            ]);
        } else {
            return view('adminDashboard.Penduduk', [
                'title' => 'Data Penduduk',
                'masyarakat' => Penduduk::paginate(10),
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
        $originalDate = $request->tgl_lahir;

        $validatedData = $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'no_kk' => 'required|max:255',
            'padukuhan' => 'required|max:255',
            'rt' => 'required|max:255',
            'rw' => 'required|max:255',
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
        $originalDate = $request->tgl_lahir;
        $newDate = date("d/m/Y", strtotime($originalDate));
        $pass = Hash::make($newDate);
        User::create([
            'nik' => $request->nik,
            'name' => $request->nama,
            'userName' => $request->nama,
            'role' => 'masyarakat',
            'password' => $pass
        ]);

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
            'rt' => 'max:255',
            'rw' => 'max:255',
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

    public function storeExcel(Request $request)
    {
        Excel::import(
            new ImportPenduduk,
            $request->file('file')->store('files')
        );
        Excel::import(
            new ImportUser,
            $request->file('file')->store('files')
        );
        return redirect()->back();
    }
}
