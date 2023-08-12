<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('level')->insert(
            [
                'id_level' => 1,
                'nama_level' => 'admin',
            ],

        );
        DB::table('level')->insert(
            [
                'id_level' => 2,
                'nama_level' => 'petugas',
            ],

        );
        DB::table('level')->insert(
            [
                'id_level' => 3,
                'nama_level' => 'pelanggan',
            ],

        );
    }
}
