<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandlordRentalRequestController extends Controller
{
    public function index(): View
    {
        $transactions = Transaction::with(['user', 'product'])
            ->where('landlord_id', auth()->id())
            ->latest()
            ->get();

       return view('arrendador-solicitudes', compact('transactions'));
    }

    public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'action' => 'required|in:aprobada,rechazada',
    ]);

    if ($transaction->landlord_id !== auth()->id()) {
        abort(403);
    }

    if ($transaction->status === 'aprobada' || $transaction->status === 'rechazada') {
        return back()->with('error', 'Esta solicitud ya fue procesada.');
    }

    $transaction->status = $request->action;
    $transaction->save();

    return back()->with(
        'success',
        $request->action === 'aprobada'
            ? 'Solicitud aprobada correctamente.'
            : 'Solicitud rechazada correctamente.'
    );
}
}