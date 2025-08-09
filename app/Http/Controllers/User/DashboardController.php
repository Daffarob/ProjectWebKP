<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DashboardItem;

class DashboardController extends Controller
{
    public function index()
    {
        $items = DashboardItem::latest()->get();
        return view('dashboard', compact('items'));
    }
}
