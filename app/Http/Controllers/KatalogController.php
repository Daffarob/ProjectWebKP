<?php

// app/Http/Controllers/KatalogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    public function index($jenis)
    {
        $katalogs = Katalog::where('jenis', $jenis)->get();
        return view('admin.katalog-index', compact('katalogs', 'jenis'));
    }

    public function create($jenis)
    {
        return view('admin.katalog-create', compact('jenis'));
    }

    public function store(Request $request, $jenis)
    {
        $request->validate([
            'nama_mesin' => 'required',
            'harga' => 'required',
            'spesifikasi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $katalog = new Katalog;
        $katalog->nama_mesin = $request->nama_mesin;
        $katalog->harga = $request->harga;
        $katalog->spesifikasi = $request->spesifikasi;

        // SIMPAN jenis/kategori ke dalam kolom
        $katalog->kategori = $jenis; // <--- INI PENTING

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('katalog', 'public');
            $katalog->gambar = $gambar;
        }

        $katalog->save();

        return redirect()->route('admin.katalog-index', $jenis)->with('success', 'Katalog berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $katalog = Katalog::findOrFail($id);
        return view('admin.katalog-edit', compact('katalog'));
    }

    public function update(Request $request, $id)
    {
        $katalog = Katalog::findOrFail($id);

        $request->validate([
            'nama_mesin' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'spesifikasi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($katalog->gambar) {
                Storage::disk('public')->delete($katalog->gambar);
            }
            $katalog->gambar = $request->file('gambar')->store('katalog', 'public');
        }

        $katalog->update([
            'nama_mesin' => $request->nama_mesin,
            'harga' => $request->harga,
            'spesifikasi' => $request->spesifikasi,
            'gambar' => $katalog->gambar
        ]);

        return redirect()->route('katalog-index', $katalog->jenis)->with('success', 'Katalog berhasil diupdate!');
    }

    public function destroy($id)
    {
        $katalog = Katalog::findOrFail($id);

        if ($katalog->gambar) {
            Storage::disk('public')->delete($katalog->gambar);
        }

        $jenis = $katalog->jenis;
        $katalog->delete();

        return redirect()->route('katalog-index', $jenis)->with('success', 'Katalog berhasil dihapus!');
    }
}
