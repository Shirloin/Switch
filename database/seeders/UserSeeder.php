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
        User::factory()->create([
            'username' => 'Shirloin',
            'email' => 'shirloin@gmail.com',
            'password' => bcrypt('abc'),
            'phone' => '012345678912',
            'role' => 'user'
        ]);

        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '123456789012',
            'role' => 'admin'
        ]);
    }
}
