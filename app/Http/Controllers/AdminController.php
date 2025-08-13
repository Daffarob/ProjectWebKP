<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories; // Import the Categories model

class AdminController extends Controller
{
    public function index()
    {
        // Return the admin dashboard view
        return view('admin.dashboard.index');
    }

    // Additional methods for admin functionality can be added here
    // For example, managing users, products, orders, etc.
    public function manageUsers()
    {
        // Logic to manage users
        return view('admin.users.index');
    }
    public function manageProducts()
    {
        // Logic to manage products
        return view('admin.products.index');
    }
    public function manageOrders()
    {
        // Logic to manage orders
        return view('admin.orders.index');
    }
    public function showCategories($nama_kategori)
    {
        // Logic to show categories
        $category = Categories::with('products')
            ->where('nama_kategori', $nama_kategori)
            ->firstOrFail();

        return view('admin.categories.show', compact('category'));
    }
    public function manageCategories()
    {
        $categories = Categories::all();
        // Logic to manage categories
        return view('admin.categories.index', compact('categories'));
    }
    public function settings()
    {
        // Logic for admin settings
        return view('admin.settings.index');
    }
    public function reports()
    {
        // Logic for admin reports
        return view('admin.reports.index');
    }
    public function logs()
    {
        // Logic for admin logs
        return view('admin.logs.index');
    }
    public function notifications()
    {
        // Logic for admin notifications
        return view('admin.notifications.index');
    }
    public function profile()
    {
        // Logic for admin profile
        return view('admin.profile.index');
    }
}
