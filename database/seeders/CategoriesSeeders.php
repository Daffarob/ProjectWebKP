<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nama_kategori' => 'Digital Labels & Packaging',
                'deskripsi' => 'Kategori ini mencakup berbagai jenis mesin yang digunakan dalam sektor pertanian.',
                'gambar' => 'mesin_pertanian.jpg',
            ],
            [
                'nama_kategori' => 'Digital Commercial Printing',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam industri manufaktur.',
                'gambar' => 'mesin_industri.jpg',
            ],
            [
                'nama_kategori' => 'Finishing Digital & Label Printing',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam proyek konstruksi.',
                'gambar' => 'mesin_konstruksi.jpg',
            ],
            [
                'nama_kategori' => '3D Printer',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam industri otomotif.',
                'gambar' => 'mesin_otomotif.jpg',
            ],
            [
                'nama_kategori' => 'Garment Textile',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang berfokus pada energi terbarukan.',
                'gambar' => 'mesin_energi_terbarukan.jpg',
            ],
            [
                'nama_kategori' => 'Large Format Printing',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
            [
                'nama_kategori' => 'UV Print & Finishing',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
            [
                'nama_kategori' => 'Office & Retail',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
            [
                'nama_kategori' => 'POS & PDT',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
            [
                'nama_kategori' => 'Sports & Wellnes',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
            [
                'nama_kategori' => 'Medical',
                'deskripsi' => 'Kategori ini mencakup mesin-mesin yang digunakan dalam pengolahan makanan.',
                'gambar' => 'mesin_pengolahan_makanan.jpg',
            ],
        ]);
    }
}
