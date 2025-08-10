<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;

class AdminPromoController extends Controller
{
    public function index() {
        $promos = Promo::all();
        return view('admin.promos.index', compact('promos'));
    }

    public function create() {
        return view('admin.promos.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
    'name' => 'required|string',
    'vendor' => 'required|string',
    'label' => 'nullable|string',
    'periode' => 'required|date',
    'discount' => 'nullable|string',
    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
]);

    // Simpan gambar ke folder public/images
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $path = $request->file('image')->store('promo_images', 'public');
        $validated['image'] = $filename;
    }

    Promo::create($validated);

    return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil ditambahkan');
}

    public function edit(Promo $promo) {
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo) {
        $data = $request->validate([
            'name' => 'required',
            'vendor' => 'required',
            'label' => 'required',
            'discount' => 'required',
            'periode' => 'required|date',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('promo_images', 'public');
        }

        $promo->update($data);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil diperbarui');
    }

    public function destroy(Promo $promo) {
        $promo->delete();
        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil dihapus');
    }
}
