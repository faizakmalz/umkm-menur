<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TokosTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tokos')->insert([
            [
                'nama_toko' => 'Dapur Bu Santi',
                'alamat' => 'Jl. Menur III No. 71',
                'no_telepon' => '+6282783827269',
                'deskripsi' => 'UMKM yang memproduksi Berbagai olahan makanan berupa nasi tumpeng, nasi kuning, nasi bungkus dengan sajian yang menarik. Dapur Bu Santi juga menjual olahan makanan lain sejenis camilan seperti risoles yang terdiri dari varian ayam dan mayo, berbagai jenis gorengan, kering tempe, dimsum, dan lainnya.',
                'logo' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_toko' => 'Dapur Bunda Sarii',
                'alamat' => 'JL. Menur III No. 75. A',
                'no_telepon' => '+6285749733725',
                'deskripsi' => 'UMKM Spesialis Nasi Kuning dengan berbagai pilihan lauk diatasnya seperti ayam goreng, sate, telur dadar, dan ikan. Dapur Bunda Sari juga menawarkan berbagai macam kue dan dessert yang rasanya dijamin akan memanjakan lidah.',
                'logo' => 'logos/JoPG8SN4T6eAa2TulzMcLZvt2iuBHWsZlLhisLZL.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_toko' => 'TIGA PUTRI',
                'alamat' => 'Jl. Menur III No. 71',
                'no_telepon' => '+6285645858655',
                'deskripsi' => 'UMKM spesialis produksi keripik tempe rumahan yang dalam komposisinya tidak menggunakan bahan kimia maupun pengawet. UMKM Tiga Putri menjual keripik tempe dalam berbagai ukuran, diantaranya 1 ons, 1/4kg, dan 1/2 kg.',
                'logo' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_toko' => 'Pawon Mama 25',
                'alamat' => 'Jl. Menur III No. 25',
                'no_telepon' => '+6285749733736',
                'deskripsi' => 'Pawon Mama 25 memproduksi berbagai olahan kue basah dan kering. Kue kering diantaranya seperti kue sagu keju, kue pastel, naster, dan kue salju. Untuk Kue basah diantaranya seperti lemper, nagasari, lumpia. Pawon Mama 25 juga menjual minuman coklat dalam kemasan botol.',
                'logo' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_toko' => "D'teguk Ing Eijaz",
                'alamat' => 'Jl. Menur III No. 49',
                'no_telepon' => '+6285749733736',
                'deskripsi' => "D'teguk Ing Eijaz merupakan nama sebuah produk sari kedelai D'teguk Ing Eijaz memiliki varian raswa original dan coklat yang tentunya sangat nikmat. Sari kedelai D'teguk Ing Eijaz memiliki berbagai manfaat bagi tubuh kita. Seperti menurunkan berat badan dan lain-lain.",
                'logo' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_toko' => 'Jamu Tradisional Mak e',
                'alamat' => 'Jl. Menur III No. 21',
                'no_telepon' => '+6285749733723',
                'deskripsi' => 'Menjual berbagai macam jamu tradisional khas jawa, terdiri dari jamu beras kencur, kunyit asam, dan pahitan. Semua jamu ini dibuat menggunakan resep turun-temurun dan dijamin tidak menggunakan bahan pengawet.',
                'logo' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
