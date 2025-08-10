<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories; // Import the Categories model

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        // PASTIKAN Anda mengirim variabel DENGAN NAMA 'categories'
        return view('customer.categories', compact('categories'));
    }

    // Contoh kode yang benar di Controller
    public function show($nama_kategori)
    {
        $category = Categories::with('products')
            ->where('nama_kategori', $nama_kategori)
            ->firstOrFail();

        // PASTIKAN Anda mengirim variabel DENGAN NAMA 'category'
        return view('customer.category_show', compact('category'));

        return view('admin.categories.show', compact('category'));
    }
}
