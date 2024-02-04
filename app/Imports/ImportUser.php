<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithDates;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']);
        $tanggal2 = $tanggal->format('d/m/Y');
        $originalDate = $tanggal2;
        $pass = Hash::make($originalDate);

        return new User([
            'nik' => $row['nik'],
            'name' => $row['nama'],
            'userName' => $row['nama'],
            'role' => 'masyarakat',
            'password' => $pass
        ]);
    }
}
