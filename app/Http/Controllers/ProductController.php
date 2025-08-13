<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model
use App\Models\Categories; // Import the Category model
use Illuminate\Support\Facades\Log; // Import Log facade for error logging

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Return the view with the products data
        return view('customer.products.index', compact('products'));
    }
    public function show($id)
    {
        // Fetch a single product by its ID
        $product = Product::findOrFail($id);

        // Return the view with the product data
        return view('customer.products.show', compact('product'));
    }
    public function create()
    {
        // Ambil semua kategori dari database
        $categories = Categories::all();

        // Kirim data kategori ke view 'admin.products.create'
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        try {
            // Perbaiki nama-nama field validasi agar sesuai dengan Form HTML
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'stock' => 'required|integer|min:0',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) { // Gunakan 'image' dari form
                $imagePath = $request->file('image')->store('products', 'public');
                $imagePath = str_replace('public/', '', $imagePath);
            }

            // Gunakan nama kolom database yang sudah divalidasi
            Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'] ?? null,
                'price' => $validatedData['price'],
                'category_id' => $validatedData['category_id'],
                'image' => $imagePath,
                'stock' => $validatedData['stock'],
            ]);

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Produk gagal ditambahkan.');
        }
    }
    public function edit($id)
    {
        // Fetch the product to edit
        $product = Product::findOrFail($id);

        // Return the view to edit the product
        return view('admin.products.edit', compact('product'));
    }
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
