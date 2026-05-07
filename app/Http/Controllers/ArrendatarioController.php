<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArrendatarioController extends Controller
{
    public function index(Request $request): View
    {
        $validated = validator($request->query(), [
            'search' => ['nullable', 'string', 'max:100'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0', 'gte:min_price'],
            'availability_date' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:50'],
        ])->validate();

        $query = Product::query()->where('status', 'active');

        if (!empty($validated['search'])) {
            $term = $validated['search'];
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%");
            });
        }

        if (array_key_exists('min_price', $validated) && $validated['min_price'] !== null) {
            $query->where('price', '>=', $validated['min_price']);
        }

        if (array_key_exists('max_price', $validated) && $validated['max_price'] !== null) {
            $query->where('price', '<=', $validated['max_price']);
        }

        if (!empty($validated['location'])) {
            $location = $validated['location'];
            $query->where('location', 'like', "%{$location}%");
        }

        if (!empty($validated['category'])) {
            $category = $validated['category'];
            $query->where('category', $category);
        }

        if (!empty($validated['availability_date'])) {
            $date = $validated['availability_date'];

            $query
                ->whereDate('available_from', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->whereNull('available_until')
                        ->orWhereDate('available_until', '>=', $date);
                });
        }

        $products = $query
            ->orderByDesc('created_at')
            ->paginate(12)
            ->appends($request->query());

        $categories = Product::query()
            ->where('status', 'active')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('arrendatario', [
            'products' => $products,
            'categories' => $categories,
            'filters' => [
                'search' => $request->query('search'),
                'min_price' => $request->query('min_price'),
                'max_price' => $request->query('max_price'),
                'availability_date' => $request->query('availability_date'),
                'location' => $request->query('location'),
                'category' => $request->query('category'),
            ],
        ]);
    }
}
