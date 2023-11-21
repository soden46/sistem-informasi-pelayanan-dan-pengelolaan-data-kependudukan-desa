<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.profilAdmin', [
            'title' => 'Profil Desa',
            'profil' => ProfilDesa::firstWhere('id', 1),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilDesa  $profilDesa
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilDesa $profilDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilDesa  $profilDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilDesa $profilDesa)
    {
        return view('adminDashboard.profilAdminEdit', [
            'title' => 'Profil Desa',
            'profil' => $profilDesa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilDesa  $profilDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilDesa $profilDesa)
    {
        $rules = [
            'namaDesa' => 'required|max:255',
            'kepalaDesa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'luasDesa' => 'required|max:255',
            'jumlahDusun' => 'required|max:255',
            'jumlahKeluarga' => 'required|max:255',
            'jumlahJiwa' => 'required|max:255',
            'sejarah' => 'required',
            'logoDesa' => 'image|file|max:5024',
        ];

        // cek validasi data, jika lolos lanjutkan
        $validateData = $request->validate($rules);

        // cek jika gambar di isi maka masukan gambar ke folder post-image, dan jika user tidak mengisi gambar tidak apa apa maka gambar akan digantikan oleh api unsplash
        if ($request->file('logoDesa')) {
            // jika ada gambar baru, maka hapus gambar lamanya
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            // inpute ke folder
            $validateData['logoDesa'] = $request->file('logoDesa')->store('logo-images');
        }

        // insert data ke database
        ProfilDesa::where('id', $profilDesa->id)->update($validateData);

        return redirect('/profilDesa')->with('successUpdatedPost', 'Data profil has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilDesa  $profilDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilDesa $profilDesa)
    {
        //
    }
}
