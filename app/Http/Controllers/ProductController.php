<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display Events Table (based on logged-in user)
    public function productsTable()
    {
        $userId = session('user_id');
        $products = Product::where('user_id', $userId)->get();
        
        return view('products', compact('products'));
    }

    // Add Event
    public function addProduct(Request $request)
    {
        $userId = session('user_id');
        
        if (!$userId) {
            return redirect()->back()->with('error', 'Please login first');
        }

        $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'place'        => 'nullable|string|max:255',
            'event_date'   => 'nullable|date',
            'status'       => 'nullable|string',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'description'  => $request->description,
            'place'        => $request->place,
            'event_date'   => $request->event_date,
            'status'       => $request->status ?? 'Upcoming',
            'user_id'      => $userId,
        ]);

        return back()->with('success', 'Event added successfully');
    }

    // Update Event
    public function updateProduct(Request $request, $id)
    {
        $userId = session('user_id');
        
        $product = Product::where('id', $id)->where('user_id', $userId)->first();
        
        if (!$product) {
            return back()->with('error', 'Event not found');
        }

        $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'place'        => 'nullable|string|max:255',
            'event_date'   => 'nullable|date',
            'status'       => 'nullable|string',
        ]);

        $product->update([
            'product_name' => $request->product_name,
            'description'  => $request->description,
            'place'        => $request->place,
            'event_date'   => $request->event_date,
            'status'       => $request->status ?? $product->status,
        ]);

        return back()->with('success', 'Event updated successfully');
    }

    // Delete Event
    public function deleteProduct($id)
    {
        $userId = session('user_id');
        
        $product = Product::where('id', $id)->where('user_id', $userId)->first();
        
        if (!$product) {
            return back()->with('error', 'Event not found or access denied');
        }
        
        $product->delete();
        
        return back()->with('success', 'Event deleted successfully');
    }
}