<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function index()
    {
        $categories = json_decode(File::get(resource_path('js/category.json')), true)['category'];
        $products = json_decode(File::get(resource_path('js/products.json')), true)['products'];
        return view('pages.produk', compact('categories', 'products'));
    }

    public function json()
    {
        $categories = json_decode(File::get(resource_path('js/category.json')), true)['category'];
        $products = json_decode(File::get(resource_path('js/products.json')), true)['products'];
        return response()->json(['categories' => $categories, 'products' => $products]);
    }
    public function store(Request $request)
    {
        try {
            // validasi
            $request->validate([
                'nama_produk' => 'required|string|max:255',
                'kategori_id' => 'required|integer',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // simpan data produk
            $gambarPath = $request->file('gambar')->store('produk', 'public');

            $produk = Product::create([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'gambar' => '/storage/' . $gambarPath,
                'deskripsi' => json_encode(array_map(null, $request->spec_labels, $request->spec_values)),
                'created_at' => now(), // penting untuk kategori "Produk Baru"
            ]);

            return redirect()->back()->with('success', 'Produk anda berhasil di tambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Produk Anda Tidak berhasil di tambahkan, silahkan input kembali !');
        }
    }
}
