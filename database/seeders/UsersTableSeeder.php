<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'faza',
                'email' => 'faza@mail.com',
                'password' => '$2y$12$tU8WCNfvU.Oy.KhJXzdSjeNwXoKdy3tAafUvDr1IMicnUT/tZ2IU.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'faza',
                'email' => 'faza2@mail.com',
                'password' => '$2y$12$nylAKnVLVZGAm0RsUJDlN.c1VPwutTs0Hjv00oDXt/qsurSCBazbS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
