<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {
        //     Produk::create([
        //         'nama' => $faker->word(), 
        //         'kategori' => $faker->randomElement(['Elektronik', 'Minuman', 'Makanan', 'Mainan']), 
        //         'harga' => $faker->numberBetween(1, 10) * $faker->randomElement([1000, 10000]), 
        //         'stok' => $faker->numberBetween(1, 100), 
        //     ]);
        // }
        Produk::create([
            'nama' => 'Laptop Gaming',
            'kategori' => 'Elektronik',
            'harga' => 15000000,
            'stok' => 10,
        ]);

        Produk::create([
            'nama' => 'Smartphone',
            'kategori' => 'Elektronik',
            'harga' => 8000000,
            'stok' => 20,
        ]);

        Produk::create([
            'nama' => 'Kopi Instan',
            'kategori' => 'Minuman',
            'harga' => 50000,
            'stok' => 100,
        ]);

        Produk::create([
            'nama' => 'Snack Roti',
            'kategori' => 'Makanan',
            'harga' => 20000,
            'stok' => 50,
        ]);

        Produk::create([
            'nama' => 'Action Figure',
            'kategori' => 'Mainan',
            'harga' => 120000,
            'stok' => 15,
        ]);
    }
}
