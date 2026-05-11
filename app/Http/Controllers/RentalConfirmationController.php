<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentalConfirmationController extends Controller
{
    private const TERMS_VERSION = 'v1.0';

    public function index(Request $request): View
    {
        $product = Product::findOrFail($request->query('product'));

        $latestTransaction = auth()->user()
            ->transactions()
            ->latest()
            ->first();

        return view('rentals.create', [
            'product'            => $product,
            'termsVersion'       => self::TERMS_VERSION,
            'termsContent'       => $this->termsContent(),
            'latestTransaction'  => $latestTransaction,
            'statusNotification' => $this->statusNotification($latestTransaction),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id'   => ['required', 'exists:products,id'],
            'starts_at'    => ['required', 'date', 'after_or_equal:today'],
            'ends_at'      => ['required', 'date', 'after:starts_at'],
            'accept_terms' => ['accepted'],
        ], [
            'starts_at.after_or_equal' => 'La fecha de inicio debe ser hoy o posterior.',
            'ends_at.after'            => 'La fecha de fin debe ser posterior a la de inicio.',
            'accept_terms.accepted'    => 'Debes aceptar los términos y condiciones para confirmar el alquiler.',
        ]);

        $product    = Product::findOrFail($request->product_id);
        $startsAt   = \Carbon\Carbon::parse($request->starts_at);
        $endsAt     = \Carbon\Carbon::parse($request->ends_at);
        $rentalDays = (int) $startsAt->diffInDays($endsAt);
        $total      = $rentalDays * $product->price;

        Transaction::create([
            'user_id'           => $request->user()->id,
            'landlord_id'       => $product->user_id,
            'product_id'        => $product->id,
            'item_name'         => $product->name,
            'starts_at'         => $request->starts_at,
            'ends_at'           => $request->ends_at,
            'rental_days'       => $rentalDays,
            'total_amount'      => $total,
            'status'            => 'pendiente',
            'terms_version'     => self::TERMS_VERSION,
            'terms_snapshot'    => $this->termsContent(),
            'accepted_terms_at' => now(),
        ]);

        return redirect()
            ->route('arrendatario')
            ->with('status', '¡Solicitud enviada! El arrendador tiene 48h para responder.');
    }

    private function termsContent(): string
    {
        return implode("\n", [
            '1. El arrendatario se compromete a usar el artículo de forma responsable y conforme a su finalidad.',
            '2. El arrendatario debe devolver el artículo en la fecha acordada y en condiciones equivalentes a las de la entrega.',
            '3. Cualquier daño, pérdida o uso indebido puede generar cobros adicionales y afectaciones sobre el depósito.',
            '4. El arrendatario debe reportar incidentes o fallas relevantes a la plataforma de manera inmediata.',
            '5. La confirmación del alquiler deja constancia de que el arrendatario conoce sus responsabilidades.',
        ]);
    }

    private function statusNotification(?Transaction $transaction): ?array
    {
        if (! $transaction || ! in_array($transaction->status, ['aprobada', 'rechazada'], true)) {
            return null;
        }

        if ($transaction->status === 'aprobada') {
            return [
                'type'    => 'success',
                'title'   => '¡Tu solicitud fue aprobada!',
                'message' => 'El arrendador aprobó la renta de ' . $transaction->item_name . '. Ya puedes coordinar la entrega.',
            ];
        }

        return [
            'type'    => 'error',
            'title'   => 'Tu solicitud fue rechazada',
            'message' => 'El arrendador rechazó la renta de ' . $transaction->item_name . '. Puedes buscar otras opciones.',
        ];
    }
}