<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\DataKematian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SuratKetKematianController extends Controller
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
            return view('adminDashboard.SuratKetKematian', [
                'title' => 'Data Suart Keterangan Kematian',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'mati' => DataKematian::with('keluarga', 'pendu', 'ibu', 'ayah', 'saksi1', 'saksi2', 'pelapor')
                    ->where('nik', 'like', "%" . $cari . "%")
                    ->orWhere('no_kk', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.SuratKetKematian', [
                'title' => 'Data Data Suart Keterangan Kematian',
                'profil' => ProfilDesa::firstWhere('id', 1),
                'mati' => DataKematian::with('keluarga', 'pendu', 'ibu', 'ayah', 'saksi1', 'saksi2', 'pelapor')->paginate(10),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
   
     */
    public function store(Request $request)
    {
        $rules = [
            'tgl_regis_mati' => 'required',
            'no_kk' => 'required|max:16',
            'nama_kepala_keluarga' => 'required|max:255',
            'nik_mati' => 'required|max:16',
            'nama_mati' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'anak_ke' => 'required',
            'tgl_lahir' => 'required',
            'tempat_kelahiran' => 'required',
            'agama_mati' => 'required|max:255',
            'alamat_mati' => 'required|max:255',
            'tgl_mati' => 'required',
            'pukul_mati' => 'required',
            'sebab' => 'required|max:255',
            'tempat_mati' => 'required|max:255',
            'yang_menerangkan' => 'required',
            'nik_ibu' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'tgl_lh_ibu' => 'required',
            'pekerjaan_ibu' => 'required|max:255',
            'alamat_ibu' => 'required|max:255',
            'nik_ayah' => 'required|max:255',
            'nama_ayah' => 'required|max:255',
            'tgl_lh_ayah' => 'required',
            'pekerjaan_ayah' => 'required|max:255',
            'alamat_ayah' => 'required|max:255',
            'nik_pelapor' => 'required|max:255',
            'nama_pelapor' => 'required|max:255',
            'tgl_lh_pelapor' => 'required',
            'pekerjaan_pelapor' => 'required|max:255',
            'alamat_pelapor' => 'required|max:255',
            'nik_saksisatu' => 'required|max:255',
            'nama_saksisatu' => 'required|max:255',
            'tgl_lh_saksisatu' => 'required',
            'pekerjaan_saksisatu' => 'required|max:255',
            'alamat_saksisatu' => 'required|max:255',
            'nik_saksidua' => 'required|max:255',
            'nama_saksidua' => 'required|max:255',
            'tgl_lh_saksidua' => 'required',
            'pekerjaan_saksidua' => 'required|max:255',
            'alamat_saksidua' => 'required|max:255',
        ];


        $validatedData = $request->validate($rules);
        // dd($validatedData);
        DataKematian::create($validatedData);
        return back()->with('successCreatedDataKematian', 'Data Kematian Berhasil Ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
    public function update(Request $request, DataKematian $penduduk, $nik_mati)
    {
        $rules = [
            'verifikasi' => 'max:255'
        ];

        $validatedData = $request->validate($rules);

        DataKematian::where('nik_mati', $nik_mati)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mati)
    {
        DataKematian::where('nik_mati', $nik_mati)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mati)
    {
        $data = [
            'title' => 'Keterangan Beda Nama',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => DataKematian::with('pend')->where('nik_mati', $nik_mati)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetMati', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-Kematian.pdf');
    }

    public function pdflurah($nik_mati)
    {
        $data = [
            'title' => 'Keterangan Beda Nama',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => DataKematian::with('pend')->where('nik_mati', $nik_mati)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratKetMatiLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-Kematian-lurah.pdf');
    }
}
