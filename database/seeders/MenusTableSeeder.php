<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            [
                'nama_menu' => 'Bakso Jumbo',
                'harga' => 15000,
                'deskripsi' => 'Bakso besar dengan kuah gurih dan sambal khas',
                'toko_id' => 1,
                'category_id' => 2,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Es Teh',
                'harga' => 5000,
                'deskripsi' => 'Teh manis dingin menyegarkan',
                'toko_id' => 1,
                'category_id' => 4,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Keripik Pisang',
                'harga' => 10000,
                'deskripsi' => 'Keripik pisang manis renyah',
                'toko_id' => 2,
                'category_id' => 5,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Tahu Bakso',
                'harga' => 12000,
                'deskripsi' => 'Tahu isi bakso daging, enak dinikmati selagi hangat',
                'toko_id' => 3,
                'category_id' => 2,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Jus Alpukat',
                'harga' => 12000,
                'deskripsi' => 'Jus alpukat segar dengan coklat kental manis',
                'toko_id' => 1,
                'category_id' => 4,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Risol Mayo',
                'harga' => 10000,
                'deskripsi' => 'Risol isi telur, sosis, dan mayonnaise',
                'toko_id' => 4,
                'category_id' => 3,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Es Campur',
                'harga' => 8000,
                'deskripsi' => 'Campuran buah, cincau, dan sirup manis',
                'toko_id' => 5,
                'category_id' => 4,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Donat Kentang',
                'harga' => 6000,
                'deskripsi' => 'Donat empuk dengan topping coklat dan keju',
                'toko_id' => 2,
                'category_id' => 3,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Sate Ayam',
                'harga' => 20000,
                'deskripsi' => 'Sate ayam bumbu kacang khas',
                'toko_id' => 6,
                'category_id' => 2,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_menu' => 'Kerupuk Rambak',
                'harga' => 7000,
                'deskripsi' => 'Kerupuk kulit sapi renyah',
                'toko_id' => 7,
                'category_id' => 5,
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

