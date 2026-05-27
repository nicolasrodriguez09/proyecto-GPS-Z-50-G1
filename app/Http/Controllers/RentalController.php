<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $product = Product::findOrFail($request->product_id);

        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);

        // Validar conflicto de fechas
        $conflict = Transaction::where('product_id', $product->id)
            ->where(function ($query) use ($start, $end) {

                $query->whereBetween('starts_at', [$start, $end])
                      ->orWhereBetween('ends_at', [$start, $end]);

            })
            ->exists();

        if ($conflict) {

            return back()->with('error', 'Las fechas seleccionadas ya están ocupadas.');
        }

        $days = $start->diffInDays($end) + 1;

        $total = $days * $product->price;

        Transaction::create([

            'user_id' => Auth::id(),

            'landlord_id' => $product->user_id,

            'product_id' => $product->id,

            'item_name' => $product->name,

            'starts_at' => $start,

            'ends_at' => $end,

            'rental_days' => $days,

            'total_amount' => $total,

            'status' => 'pending',

            'terms_version' => '1.0',

            'terms_snapshot' => 'Aceptados',

            'accepted_terms_at' => now(),
        ]);

        return back()->with('success', 'Solicitud enviada correctamente.');
    }
}