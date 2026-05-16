<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'deposit' => 'nullable|numeric',
            'image' => 'nullable|image',
            'location' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'deposit' => $request->deposit,
            'image' => $imagePath,
            'location' => $request->location,
            'available' => true,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Producto publicado');
    }
    public function index()
{
    $products = Product::where('user_id', auth()->id())->get();

    return view('products.index', compact('products'));
}

public function edit(Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403);
    }

    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'deposit' => 'nullable|numeric',
        'location' => 'required',
    ]);

    if ($request->hasFile('image')) {

        $imagePath = $request->file('image')
            ->store('products', 'public');

        $product->image = $imagePath;
    }

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'deposit' => $request->deposit,
        'location' => $request->location,
    ]);

    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Producto actualizado');
}

public function destroy(Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403);
    }

    $product->delete();

    return redirect()->back()
        ->with('success', 'Producto eliminado');
}

}

