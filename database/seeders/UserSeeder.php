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
            'name' => 'Admin',
            'userName' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'staff',
            'password' => Hash::make('Admin123'),
            'created_at' => '2024-02-04 10:30:27',
            'updated_at' => '2024-02-04 10:30:27'
        ]);
        User::create([
            'nik' => '12345',
            'name' => 'Warga',
            'userName' => 'Warga',
            'email' => 'warga@warga.com',
            'role' => 'masyarakat',
            'password' => Hash::make('Warga123'),
            'created_at' => '2024-02-04 10:30:27',
            'updated_at' => '2024-02-04 10:30:27'
        ]);
    }
}
