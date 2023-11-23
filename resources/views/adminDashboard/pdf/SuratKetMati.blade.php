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
                <img src="{{public_path('storage/asset/sleman.png')}}" id="foto" alt="Logo" height="75px" />
                <h1 class="text-center">PEMERINTAH KABUPATEN SLEMAN</h1>
                <p class="text-center">KAPONEWON GAMPING</p>
                <h1 class="text-center">PEMERINTAH KALURAHAN AMBARKETAWANG</h1>
                <h1 class="text-center"><img src="{{public_path('storage/asset/aksara.png')}}" id="foto2" alt="Logo" /></h1>
                <p class="text-center">Jalan Wates KM 5, Ambarketawang, Gamping, Sleman,55294</p>
                <p class="text-center">Telepon (0274) 797496</p>
                <p class="text-center">Laman: https://ambarketawang.sidesimanis.slemankab.go.id</p>
            </div>
            <div class="divider py-1 bg-dark mb-3 mt-2"></div>
            <div class="header2">
                <h1 class="text-center">SURAT KETERANGAN KEMATIAN</h1>
                <p class="text-center">NOMOR: {{$surat->id_kematian}}/Ket/XI/{{ date('Y') }}</p>
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
            <p class="mt-2"><b>Data Jenazah:</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Nama Lengkap</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nama_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Jenis Kelamin</td>
                    <td width="10px">:</td>
                    <td>{{$surat->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lahir))}}</td>
                </tr>
                <tr>
                    <td width="200px">Agama</td>
                    <td width="10px">:</td>
                    <td>{{$surat->agama_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Anak Ke</td>
                    <td width="10px">:</td>
                    <td>{{$surat->anak_ke}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Kematian</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tgl_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Pukul</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pukul_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Sebab</td>
                    <td width="10px">:</td>
                    <td>{{$surat->sebab}}</td>
                </tr>
                <tr>
                    <td width="200px">Tempat Kematian</td>
                    <td width="10px">:</td>
                    <td>{{$surat->tempat_mati}}</td>
                </tr>
                <tr>
                    <td width="200px">Yang Menerangkan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->yang_menerangkan}}</td>
                </tr>
            </table>
            <p><b>Data AYAH :</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_ayah}}</td>
                </tr>
                <td width="200px">Nama Lengkap</td>
                <td width="10px">:</td>
                <td>{{$surat->nama_ayah}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lh_ayah))}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_ayah}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_ayah}}</td>
                </tr>
            </table>
            <p><b>Data IBU :</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_ibu}}</td>
                </tr>
                <td width="200px">Nama Lengkap</td>
                <td width="10px">:</td>
                <td>{{$surat->nama_ibu}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lh_ibu))}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_ibu}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_ibu}}</td>
                </tr>
            </table>
            <p><b>Data Pelapor :</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_pelapor}}</td>
                </tr>
                <td width="200px">Nama Lengkap</td>
                <td width="10px">:</td>
                <td>{{$surat->nama_pelapor}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lh_pelapor))}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_pelapor}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_pelapor}}</td>
                </tr>
            </table>
            <p><b>Data Saksi Satu :</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_saksisatu}}</td>
                </tr>
                <td width="200px">Nama Lengkap</td>
                <td width="10px">:</td>
                <td>{{$surat->nama_saksisatu}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lh_saksisatu))}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_saksisatu}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_saksisatu}}</td>
                </tr>
            </table>
            <p><b>Data Saksi Dua :</b></p>
            <table class="font-12">
                <tr>
                    <td width="200px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_saksidua}}</td>
                </tr>
                <td width="200px">Nama Lengkap</td>
                <td width="10px">:</td>
                <td>{{$surat->nama_saksidua}}</td>
                </tr>
                <tr>
                    <td width="200px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($surat->tgl_lh_saksidua))}}</td>
                </tr>
                <tr>
                    <td width="200px">Pekerjaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pekerjaan_saksidua}}</td>
                </tr>
                <tr>
                    <td width="200px">Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->alamat_saksidua}}</td>
                </tr>
            </table>
            <div class="tandatangan">

                <br>

                <p style="padding-bottom:100px">
                    Ambarketawang, ......................... {{ date('Y') }}</br>
                    Pemerintah Kalurahan Ambarketawang</p>


                <p>Erma Heni Surya, S.E.</p>
            </div>
        </div>
    </div>
</body>

</html>