<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        // Logic to display the cart items
        return view('customer.carts');
    }

    public function add(Request $request)
    {
        // Logic to add an item to the cart
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Validate and process the request
        return redirect()->route('carts.index')->with('success', 'Item added to cart successfully.');
    }

    public function remove($id)
    {
        // Logic to remove an item from the cart by its ID
        return redirect()->route('carts.index')->with('success', 'Item removed from cart successfully.');
    }

    public function clear()
    {
        // Logic to clear all items from the cart
        return redirect()->route('carts.index')->with('success', 'Cart cleared successfully.');
    }
    public function update(Request $request, $id)
    {
        // Logic to update the quantity of an item in the cart
        // Validate and process the request
        return redirect()->route('carts.index')->with('success', 'Cart updated successfully.');
    }
    public function checkout()
    {
        // Logic to handle the checkout process
        return view('carts.checkout');
    }
    public function orderHistory()
    {
        // Logic to display the user's order history
        return view('carts.order_history');
    }
    public function orderDetails($orderId)
    {
        // Logic to display the details of a specific order
        return view('carts.order_details', compact('orderId'));
    }
    public function applyCoupon(Request $request)
    {
        // Logic to apply a coupon code to the cart
        // Validate and process the request
        return redirect()->route('carts.index')->with('success', 'Coupon applied successfully.');
    }
    public function calculateTotal()
    {
        // Logic to calculate the total price of items in the cart
        // This could be used in the checkout process
        return view('carts.total');
    }
}
