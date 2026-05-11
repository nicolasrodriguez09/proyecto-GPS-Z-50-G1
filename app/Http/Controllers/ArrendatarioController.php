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
            'search'    => ['nullable', 'string', 'max:100'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
            'location'  => ['nullable', 'string', 'max:100'],
            'sort'      => ['nullable', 'string', 'in:recent,price_asc,price_desc'],
        ])->validate();

        $query = Product::query()->where('available', true);

        // Filtro por nombre
        if (!empty($validated['search'])) {
            $term = $validated['search'];
            $query->where('name', 'like', "%{$term}%");
        }

        // Filtro precio mínimo
        if (!empty($validated['min_price'])) {
            $query->where('price', '>=', $validated['min_price']);
        }

        // Filtro precio máximo
        if (!empty($validated['max_price'])) {
            $query->where('price', '<=', $validated['max_price']);
        }

        // Filtro ubicación (city o department)
        if (!empty($validated['location'])) {
            $location = $validated['location'];
            $query->where(function ($q) use ($location) {
                $q->where('city', 'like', "%{$location}%")
                  ->orWhere('department', 'like', "%{$location}%");
            });
        }

        // Ordenamiento
        $sort = $validated['sort'] ?? 'recent';
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderByDesc('created_at');
        }

        $products = $query
            ->paginate(12)
            ->appends($request->query());

        return view('arrendatario', [
            'products'   => $products,
            'categories' => collect(),
            'filters'    => [
                'search'    => $request->query('search'),
                'min_price' => $request->query('min_price'),
                'max_price' => $request->query('max_price'),
                'location'  => $request->query('location'),
                'sort'      => $request->query('sort', 'recent'),
            ],
        ]);
    }
}