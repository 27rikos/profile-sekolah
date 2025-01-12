<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin1234'),
        ]);
        User::create([
            'name' => 'Budi Sastro',
            'email' => 'budi@gmail.com',
            'role' => 'users',
            'password' => bcrypt('budi'),
        ]);
    }
}
