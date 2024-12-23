<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostinganRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postingan_relations')->insert([
            [
                'kontenPostingan' => 'Ini adalah postingan pertama saya di platform ini!',
                'likes' => 10,
                'comments' => 5,
                'image' => 'https://example.com/images/postingan1.jpg',
                'username' => 'budi123',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'kontenPostingan' => 'Hari ini cuaca sangat cerah, saya senang sekali!',
                'likes' => 20,
                'comments' => 8,
                'image' => null,
                'username' => 'siti456',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'kontenPostingan' => 'Sedang belajar sesuatu yang baru. Semoga berhasil!',
                'likes' => 15,
                'comments' => 3,
                'image' => 'https://example.com/images/postingan2.jpg',
                'username' => 'andi789',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
