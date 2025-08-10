<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'HP',
                'price' => '10000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 1,
                'stock' => 1,
            ],
            [
                'name' => 'Canon',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 2,
                'stock' => 1,
            ],
            [
                'name' => 'Scodix',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 3,
                'stock' => 1,
            ],
            [
                'name' => 'Mimaki',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 4,
                'stock' => 1,
            ],
            [
                'name' => 'Epson',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 5,
                'stock' => 1,
            ],
            [
                'name' => 'Canon',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 6,
                'stock' => 1,
            ],
            [
                'name' => 'Jetrix',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 7,
                'stock' => 1,
            ],
            [
                'name' => 'Canon',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 8,
                'stock' => 1,
            ],
            [
                'name' => 'Sunmi',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 9,
                'stock' => 1,
            ],
            [
                'name' => 'Monkefit',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 10,
                'stock' => 1,
            ],
            [
                'name' => 'Edan',
                'price' => '12000000.00',
                'image' => '',
                'description' => '',
                'category_id' => 11,
                'stock' => 1,
            ],
        ]);
    }
}
