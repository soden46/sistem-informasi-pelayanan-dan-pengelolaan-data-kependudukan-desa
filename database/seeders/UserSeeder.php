<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nik' => '1234',
            'name' => 'Soden',
            'userName' => 'SodenS',
            'email' => 'soden@masyarakat.com',
            'role' => 'masyarakat',
            'password' => Hash::make('Soden123'),
            'created_at' => '2024-01-08 10:30:27',
            'updated_at' => '2024-01-08 10:30:27'
        ]);
    }
}
