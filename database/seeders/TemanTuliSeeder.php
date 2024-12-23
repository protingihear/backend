<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TemanTuliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teman_tuli')->insert([
            [
                'email' => 'user1@example.com',
                'firstName' => 'Budi',
                'lastName' => 'Santoso',
                'username' => 'budi123',
                'password' => Hash::make('password123'),
                'bio' => 'Saya seorang pengguna aktif.',
                'picture' => 'https://example.com/pictures/budi123.jpg',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user2@example.com',
                'firstName' => 'Siti',
                'lastName' => 'Aminah',
                'username' => 'siti456',
                'password' => Hash::make('password456'),
                'bio' => 'Halo, saya Siti!',
                'picture' => 'https://example.com/pictures/siti456.jpg',
                'gender' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user3@example.com',
                'firstName' => 'Andi',
                'lastName' => 'Wijaya',
                'username' => 'andi789',
                'password' => Hash::make('password789'),
                'bio' => null,
                'picture' => null,
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
