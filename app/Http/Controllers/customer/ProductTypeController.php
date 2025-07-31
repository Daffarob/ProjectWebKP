<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $machineTypes = [
            'Finishing Digital & Label Printing',
            'Garment Textile',
            'Large Format Printing',
            'Office Solution',
            'Packaging & Label Converting',
        ];

        return view('katalog.pilih-mesin', compact('machineTypes'));
    }

    public function show($jenis)
    {
        return view('katalog.produk', ['jenis' => $jenis]);
    }
}
