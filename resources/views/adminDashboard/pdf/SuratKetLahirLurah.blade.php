<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-size: 12px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        .table,
        .td,
        .th,
        thead {
            border: 1px solid black;
            text-align: center
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-success {
            color: green
        }

        .text-danger {
            color: red
        }

        .fw-bold {
            font-weight: bold
        }

        .tandatangan {
            text-align: center;
            margin-left: 400px;

        }

        #foto {
            float: left;
            width: 120px;
            height: 150px;
            background: transparent;
        }

        #foto2 {
            justify-content: center;
            width: 60%;
            height: 30px;
            background: transparent;
        }

        .header h1 {
            font-size: 18px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 1px;
        }

        .header p {
            font-size: 13px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 1px;
        }

        .header2 h1 {
            font-size: 14px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 2px;
            text-decoration: underline;
        }

        .header2 p {
            font-size: 12px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 2px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="header">
                <img src="{{asset('sip.png')}}" id="foto" alt="Logo" height="75px" />
                <h1 class="text-center">PEMERINTAH KABUPATEN</h1>
                <p class="text-center">KAPONEWON</p>
                <h1 class="text-center">LURAH</h1>
                <p class="text-center">Jalan</p>
                <p class="text-center">Telepon </p>
                <p class="text-center">Laman: </p>
            </div>
            <div class="divider py-1 bg-dark mb-3 mt-2"></div>
            <div class="header2">
                <h1 class="text-center">SURAT KETERANGAN KELAHIRAN</h1>
                <p class="text-center">NOMOR: {{$surat->id_lahir}}/Ket/XI/{{ date('Y') }}</p>
            </div>
            <table class="font-12">
                <tr>
                    <td width="200px">Nama Kepala Keluarga</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nama_kepala_keluarga}}</td>
                </tr>
                <tr>
                    <td width="200px">NO KK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->no_kk}}</td>
                </tr>
            </table>
            <p class="mt-2"><b>Data Anak:</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_bayi}}</td>
                </tr>
                <tr>
                    <td width="200px">Nama Lengkap</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nama_bayi}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td width="200px">Jenis Kelamin/Anak Ke</td>
                    <td width="10px">:</td>
                    <td>{{$surat->jenis_kelamin}} / Anak Ke: {{$surat->anak_ke}}</td>
                </tr>
                <tr>
                    <td width="200px">Tempat Dilahirkan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tempat_dilahirkan}}</td>
                </tr>
                <tr>
                    <td width="200px">Tempat Kelahiran</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tempat_kelahiran}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td width="200px">Pukul</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pukul}}</td>
                </tr>
                <tr>
                    <td width="200px">Jenis Kelahiran</td>
                    <td width="10px">:</td>
                    <td>{{$surat->jenis_kelahiran}}</td>
                </tr>
                <tr>
                    <td width="200px">Penolong Kelahiran</td>
                    <td width="10px">:</td>
                    <td>{{$surat->penolong}}</td>
                </tr>
                <tr>
                    <td width="200px">Berat Bayi</td>
                    <td width="10px">:</td>
                    <td>{{$surat->berat_bayi}} KG Panjang Bayi: {{$surat->panjang_bayi}} CM</td>
                </tr>
            </table>
            <p><b>Data IBU Kandung:</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_ibu}}</td>
                </tr>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->mom->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->mom->tgl_lahir))}} Umur: {{$ageMom}} Tahun</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->mom->pekerjaan}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->mom->padukuhan}}, {{$surat->mom->rt}}, {{$surat->mom->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">Kewarganegaraan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->mom->wn}} / Kebangsaan: {{$surat->mom->kebangsaan}}</td>
                </tr>
                <tr>
                    <td width="200px"></td>
                    <td width="10px">:</td>
                    <td>Nomor Akta Nikah{{$surat->no_akta_nikah}}</td>
                </tr>
                <tr>
                    <td width="200px"></td>
                    <td width="10px">:</td>
                    <td>Tanggal Akta Nikah{{$surat->tgl_akta_nikah}}</td>
                </tr>
            </table>
            <p><b>Data AYAH Kandung:</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_ayah}}</td>
                </tr>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->dad->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->dad->tgl_lahir))}} Umur: {{$ageDad}} Tahun</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->dad->pekerjaan}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->dad->padukuhan}}, {{$surat->dad->rt}}, {{$surat->dad->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">Kewarganegaraan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->dad->wn}} / Kebangsaan: {{$surat->dad->kebangsaan}}</td>
                </tr>
            </table>
            <p><b>Data Pelapor:</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_pelapor}}</td>
                </tr>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->lapor->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->lapor->tgl_lahir))}} Umur: {{$ageDad}} Tahun</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->lapor->pekerjaan}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->lapor->padukuhan}}, {{$surat->lapor->rt}}, {{$surat->lapor->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">Kewarganegaraan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->lapor->wn}} / Kebangsaan: {{$surat->lapor->kebangsaan}}</td>
                </tr>
            </table>
            <table class="font-12">
                <p>Saksi Satu:</p>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_saksisatu}}</td>
                </tr>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi1->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->saksi1->tgl_lahir))}} Umur: {{$umsatu}} Tahun</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi1->pekerjaan}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi1->padukuhan}}, {{$surat->saksi1->rt}}, {{$surat->saksi1->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">Kewarganegaraan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi1->wn}} / Kebangsaan: {{$surat->saksi1->kebangsaan}}</td>
                </tr>
                <p></p>
                <p>Saksi Dua:</p>
                <p></p>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_saksidua}}</td>
                </tr>
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi2->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->saksi2->tgl_lahir))}} Umur: {{$umdua}} Tahun</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi2->pekerjaan}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi2->padukuhan}}, {{$surat->saksi2->rt}}, {{$surat->saksi2->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">Kewarganegaraan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->saksi2->wn}} / Kebangsaan: {{$surat->saksi2->kebangsaan}}</td>
                </tr>
            </table>
            <div class="tandatangan">

                <br>

                <p style="padding-bottom:100px">
                    Desa, ......................... {{ date('Y') }}</br>
                    Lurah</p>


                <p>Lurag</p>
            </div>
        </div>
    </div>
</body>

</html>