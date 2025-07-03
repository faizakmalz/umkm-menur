<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'nama_kategori' => 'Makanan'],
            ['id' => 2, 'nama_kategori' => 'Minuman'],
            ['id' => 3, 'nama_kategori' => 'Kue'],
            ['id' => 4, 'nama_kategori' => 'Jajanan'],
        ]);
    }
}

