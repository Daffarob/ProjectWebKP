<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Category::truncate();
        
        // Tambahkan kategori dengan ID yang sesuai dengan JSON
        $categories = [
            ["id" => "e5f6g7h8-i9j0-1234-k5l6-m7n8o9p0q1r2", "name" => "Garment Textile"],
            ["id" => "f6g7h8i9-j0k1-2345-l6m7-n8o9p0q1r2s3", "name" => "Large Format Printing"],
            ["id" => "g7h8i9j0-k1l2-3456-m7n8-o9p0q1r2s3t4", "name" => "UV Printing"],
            ["id" => "h8i9j0k1-l2m3-4567-n8o9-p0q1r2s3t4u5", "name" => "Cutting & Finishing"],
            ["id" => "i9j0k1l2-m3n4-5678-o9p0-q1r2s3t4u5v6", "name" => "Office & Retail"],
            ["id" => "j0k1l2m3-n4o5-6789-p0q1-r2s3t4u5v6w7", "name" => "Pos & PDT"],
            ["id" => "k1l2m3n4-o5p6-7890-q1r2-s3t4u5v6w7x8", "name" => "Sport & Wellness"],
            ["id" => "l2m3n4o5-p6q7-8901-r2s3-t4u5v6w7x8y9", "name" => "Medical"],
            ["id" => "a1b2c3d4-e5f6-7890-g1h2-i3j4k5l6m7n8", "name" => "Digital Labels & Packaging"],
            ["id" => "b2c3d4e5-f6g7-8901-h2i3-j4k5l6m7n8o9", "name" => "Digital Commercial Printing"],
            ["id" => "c3d4e5f6-g7h8-9012-i3j4-k5l6m7n8o9p0", "name" => "Finishing Digital & Label Printing"],
            ["id" => "d4e5f6g7-h8i9-0123-j4k5-l6m7n8o9p0q1", "name" => "3D Printer"],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Tambahkan produk dari JSON
        if (File::exists(database_path('data/products.json'))) {
            $json = File::get(database_path('data/products.json'));
            $data = json_decode($json, true);
            
            foreach ($data['products'] as $item) {
                // Pastikan deskripsi dalam format array
                $deskripsi = $item['deskripsi'];
                if (is_string($deskripsi)) {
                    $deskripsi = [['label' => 'Deskripsi', 'value' => $deskripsi]];
                }

                Product::create([
                    'id' => $item['id'],
                    'kategori_id' => $item['kategori_id'],
                    'nama_produk' => $item['nama_produk'],
                    'deskripsi' => $deskripsi,
                    'gambar' => $item['gambar'],
                ]);
            }
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}