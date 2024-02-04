<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
            'nik' => '12345',
            'nama' => 'Warga',
            'no_kk' => '101123',
            'padukuhan' => 'Depok',
            'rt' => '12',
            'rw' => '12',
            'jk' => 'Laki-Laki',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => '1999-06-08',
            'wn' => 'WNI',
            'kebangsaan' => 'Indonesia',
            'agama' => 'Islam',
            'pekerjaan' => 'Pelajar',
            'pendidikan' => 'Sarjana',
            'sts_kawin' => 'Belum Kawin',
            'sts_penduduk' => 'Tinggal',
            'sts_dalam_kk' => 'Anak'
        ]);
        Penduduk::create([
            'nik' => '1234',
            'nama' => 'Admin',
            'no_kk' => '10112',
            'padukuhan' => 'Depok',
            'rt' => '12',
            'rw' => '12',
            'jk' => 'Laki-Laki',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => '1999-06-08',
            'wn' => 'WNI',
            'kebangsaan' => 'Indonesia',
            'agama' => 'Islam',
            'pekerjaan' => 'Staff Desa',
            'pendidikan' => 'Sarjana',
            'sts_kawin' => 'Belum Kawin',
            'sts_penduduk' => 'Tinggal',
            'sts_dalam_kk' => 'Anak'
        ]);
    }
}
