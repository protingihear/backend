<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomunitasSeeder extends Seeder
{
    public function run()
    {
        DB::table('komunitas')->insert([
            ['namaKomunitas' => 'Komunitas Bahasa Isyarat', 'idTemanTuli' => 1, 'idTemanDengar' => 1],
            ['namaKomunitas' => 'Komunitas Seni', 'idTemanTuli' => 2, 'idTemanDengar' => 2],
        ]);
    }
}
