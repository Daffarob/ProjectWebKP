<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DashboardItem;

class DashboardController extends Controller
{
    public function index()
    {
        $items = DashboardItem::latest()->get(); // Ambil data dari DB
        return view('User.dashboard', compact('items'));
    }
}

