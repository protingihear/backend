<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KosakataSeeder extends Seeder
{
    public function run()
    {
        DB::table('kosakata')->insert([
            ['kata' => 'rumah', 'artiKata' => 'house', 'idAhliBahasa' => 1],
            ['kata' => 'makan', 'artiKata' => 'eat', 'idAhliBahasa' => 2],
            ['kata' => 'minum', 'artiKata' => 'drink', 'idAhliBahasa' => 3],
        ]);
    }
}
