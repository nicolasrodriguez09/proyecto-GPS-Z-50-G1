<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    private const TERMS_VERSION = 'v1.0';

    public function store(Request $request)
    {
        $request->validate([
            'product_id'   => 'required|exists:products,id',
            'start_date'   => 'required|date|after_or_equal:today',
            'end_date'     => 'required|date|after:start_date',
            'accept_terms' => 'accepted',
        ], [
            'start_date.after_or_equal' => 'La fecha de inicio debe ser hoy o posterior.',
            'end_date.after'            => 'La fecha de fin debe ser posterior a la de inicio.',
            'accept_terms.accepted'     => 'Debes aceptar los términos y condiciones para confirmar el arriendo.',
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

        $days  = $start->diffInDays($end);
        $total = $days * $product->price;

        Transaction::create([
            'user_id'           => Auth::id(),
            'landlord_id'       => $product->user_id,
            'product_id'        => $product->id,
            'item_name'         => $product->name,
            'starts_at'         => $start,
            'ends_at'           => $end,
            'rental_days'       => $days,
            'total_amount'      => $total,
            'status'            => 'pendiente',
            'terms_version'     => self::TERMS_VERSION,
            'terms_snapshot'    => 'Aceptados',
            'accepted_terms_at' => now(),
        ]);

        return back()->with('success', '¡Solicitud enviada! El arrendador tiene 48h para responder.');
    }
}