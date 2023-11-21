<?php

namespace App\Imports;

use App\Models\masyarakat;
use Maatwebsite\Excel\Concerns\ToModel;

class MasyarakatImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row )
    {
        return new masyarakat([
            'nama' => $row[1],
            'nik' => $row[2],
            'alamat' => $row[3],
            'rentangUmur' => $row[4],
            'penghasilan' => $row[5]
        ]);
    }
}
