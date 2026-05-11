<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
       

        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'deposit'     => 'nullable|numeric',
            'image'       => 'nullable|image|max:5120',
            'department'  => 'required',
            'city'        => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'deposit' => $request->deposit,
            'image' => $imagePath,
            'available' => true,
            'department' => $request->department,
            'city' => $request->city,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', 'Producto publicado');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function index()
    {
        $products = Product::where('user_id', auth()->id())
            ->get();

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
            'department' => 'required',
            'city' => 'required',
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
            'department' => $request->department,
            'city' => $request->city,
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