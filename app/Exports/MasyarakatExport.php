<?php

namespace App\Exports;

use App\Models\masyarakat;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasyarakatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return masyarakat::all();
    }
}
