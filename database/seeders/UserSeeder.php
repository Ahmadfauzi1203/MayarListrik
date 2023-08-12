<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'id_user' => 1,
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('Admin*123'),
            'id_level' => 1,
        ]);
        DB::table('user')->insert([
            'id_user' => 2,
            'nama' => 'Petugas',
            'username' => 'petugas',
            'password' => Hash::make('Petugas*123'),
            'id_level' => 2,
        ]);
    }
}
