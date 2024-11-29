<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AhliBahasaSeeder extends Seeder
{
    public function run()
    {
        DB::table('ahli_bahasa')->insert([
            [
                'firstName' => 'Budi',
                'lastName' => 'Santoso',
                'username' => 'budi.s',
                'password' => Hash::make('password123'),
            ],
            [
                'firstName' => 'Rina',
                'lastName' => 'Andriani',
                'username' => 'rina.a',
                'password' => Hash::make('password123'),
            ],
            // Additional seed data
        ]);
    }
}
