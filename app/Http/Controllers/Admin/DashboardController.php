<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DashboardItem;

class DashboardController extends Controller
{
    public function index()
    {
        $items = DashboardItem::latest()->get();
        return view('admin.dashboard', compact('items'));
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'brand' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'brand']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('dashboard', 'public');
        }

        DashboardItem::create($data);

        // Setelah simpan → redirect ke dashboard user
        return redirect()->route('dashboard')->with('success', 'Item berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = DashboardItem::findOrFail($id);

        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return back()->with('success', 'Item berhasil dihapus.');
    }
}
