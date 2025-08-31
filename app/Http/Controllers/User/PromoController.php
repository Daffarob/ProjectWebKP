<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        // Ambil semua data promo dari database, urut terbaru
        $promos = Promo::latest()->get();

        return view('pages.loggedin.promo.index', compact('promos'));
    }
    public function show(Promo $promo)
    {
        // $promo adalah model yang di-binding otomatis (id)
        return view('pages.loggedin.promo.show', compact('promo'));
    }
}
