<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArrendadorController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $products = Product::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        // Solicitudes reales recibidas por este arrendador
        $allRequests = $user->receivedTransactions()->with('user')->latest()->get();

        $pendingRequests  = $allRequests->where('status', 'pendiente')->count();
        $approvedRequests = $allRequests->where('status', 'aprobada')->count();
        $totalEarnings    = $allRequests->where('status', 'aprobada')->sum('total_amount');

        // Las 3 más recientes pendientes para el sidebar
        $recentRequests = $allRequests->where('status', 'pendiente')->take(3)->values();

        return view('arrendador', [
            'products'         => $products,
            'pendingRequests'  => $pendingRequests,
            'approvedRequests' => $approvedRequests,
            'totalEarnings'    => $totalEarnings,
            'recentRequests'   => $recentRequests,
        ]);
    }
}