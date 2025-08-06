<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $machineTypes = [
            'Digital Labels & Packaging',
            'Digital Commercial Printing',
            'Finishing Digital & Label Printing',
            '3D Printer',
            'Garment Textile',
            'Large Format Printing',
            'UV Print & Finishing',
            'Office & Retail',
            'POS & PDT',
            'Sports & Wellnes',
            'Medical',
        ];

        return view('Customer.pilih-mesin', compact('machineTypes'));
    }

    public function show($jenis)
    {
        return view('Customer.pilih-mesin', ['jenis' => $jenis]);
    }
}
