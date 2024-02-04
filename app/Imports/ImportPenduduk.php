<?php

namespace App\Imports;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithDates;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ImportPenduduk implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']);
        return new Penduduk([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'no_kk' => $row['nomor_kk'],
            'padukuhan' => $row['padukuhan'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $tanggal,
            'wn' => $row['warganegara'],
            'kebangsaan' => $row['kebangsaan'],
            'agama' => $row['agama'],
            'pekerjaan' => $row['pekerjaan'],
            'pendidikan' => $row['pendidikan'],
            'sts_kawin' => $row['status_kawin'],
            'sts_penduduk' => $row['status_penduduk'],
            'sts_dalam_kk' => $row['status_dalam_kk']
        ]);
    }
}
