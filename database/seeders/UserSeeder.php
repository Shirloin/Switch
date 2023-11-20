<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'id' => Str::uuid(),
            'username' => 'a',
            'email' => 'a@gmail.com',
            'password' => bcrypt('a'),
            'phone' => '012345678912',
            'role' => 'user'
        ]);

        User::factory()->create([
            'id' => Str::uuid(),
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '123456789012',
            'role' => 'admin'
        ]);
    }
}
