<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cabang_toko")->insert([
            ['nama' =>'Malik Grosir', 'alamat'=> 'Cipanas', 'user_id'=> 2],
            ['nama' =>'Andalas Grosir', 'alamat'=> 'Cipanas', 'user_id'=> 3],
            ['nama' =>'Maulana Grosir', 'alamat'=> 'Cipanas', 'user_id'=> 4],
            ['nama' =>'Ibrahim Grosir', 'alamat'=> 'Cipanas', 'user_id'=> 5],
            ['nama' =>'Aper Grosir', 'alamat'=> 'Cipanas', 'user_id'=> 6]
        ]);
    }
}
