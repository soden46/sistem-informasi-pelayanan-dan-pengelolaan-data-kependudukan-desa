<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Agung',
            'userName' => 'Agung1331',
            'status' => 'admin',
            'password' => '$2y$10$/.GcYVvXN1p2nQeysYfYqO5cH.id.sB1UtZPUKGQSjk.Due2zuSQi',
            'created_at' => '2022-11-29 10:30:27',
            'updated_at' => '2022-11-29 10:30:27'
        ]);
    }
}
