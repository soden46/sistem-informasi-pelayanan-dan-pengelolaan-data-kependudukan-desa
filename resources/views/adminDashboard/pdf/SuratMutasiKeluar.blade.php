<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        .text-right {
            text-align: right;
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

        .header2 p {
            text-align: justify;
            /* For Edge */
            text-align-last: right;
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
            <p class="mt-2">Perihal: Permihonan Pindah Penduduk</p>
            <p class="text-right">Kepada YTH:</br>Bapak Bupati </br>Di </p>
            <p class="mt-2">Saya Yang bertanda tangan dibawah ini:</p>

            <table class="font-12">
                <tr>
                    <td width="150px">Nama Lengkap</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->nama}}</td>
                </tr>
                <tr>
                    <td width="150px">NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik_mk}}</td>
                </tr>
                <tr>
                    <td width="150px">NO Kartu Keluarga</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->no_kk}}</td>
                </tr>
                <tr>
                    <td width="150px">Tempat Lahir</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td width="150px">Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y', strtotime($surat->pend->tgl_lahir))}}</td>
                </tr>
                <tr>
                    <td width="150px">Agama</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->agama}}</td>
                </tr>
                <tr>
                    <td width="150px">Status Dalam Keluarga</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->sts_dalam_kk}}</td>
                </tr>
                <tr>
                    <td width="150px">Warganegara</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->wn}}</td>
                </tr>
                <tr>
                    <td width="150px">Kebangsaan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->kebangsaan}}</td>
                </tr>
                <tr>
                    <td width="150px">Alamat Asal</td>
                    <td width="10px">:</td>
                    <td>{{$alamat[0]}}, {{$alamat[1]}}, {{$alamat[2]}}</td>
                </tr>
            </table>
            <p>Mengajukan permohonan untuk pindah penduduk ke:</p>
            <table class="font-12">
                <tr>
                    <td width="150px">Alamat Yang Dituju</td>
                    <td width="10px">:</td>
                    <td>Padukuhan: {{$surat->padukuhan_tuju }}, RT: {{$surat->rt_tuju }}, RW: {{$surat->rw_tuju }}</td>
                </tr>
                <td width="150px">Pindah Pada</td>
                <td width="10px">:</td>
                <td>{{date('d/m/Y', strtotime($surat->pend->tgl_regis_mk))}}</td>
                </tr>
            </table>

            <div class="tandatangan">

                <br>
                <p style="padding-bottom:100px">
                    Desa, ......................... {{ date('Y') }}</br>
                    Lurah</p>


                <p>Lurah</p>
            </div>
        </div>
    </div>
</body>

</html>