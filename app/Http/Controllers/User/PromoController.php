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

        return view('user.promo.index', compact('promos'));
    }
}
