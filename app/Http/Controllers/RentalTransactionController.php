<?php

namespace App\Http\Controllers;

use App\Models\RentalTransaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentalTransactionController extends Controller
{
    private const TERMS_VERSION = '2026-04-29';

    public function create(): View
    {
        return view('rental-transactions.create', [
            'termsVersion' => self::TERMS_VERSION,
            'termsSections' => $this->termsSections(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tenant_name' => ['required', 'string', 'max:255'],
            'tenant_email' => ['required', 'string', 'email', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'],
            'rental_start_date' => ['required', 'date'],
            'rental_end_date' => ['required', 'date', 'after_or_equal:rental_start_date'],
            'terms_accepted' => ['accepted'],
        ], [
            'terms_accepted.accepted' => 'Debes aceptar las politicas, terminos y condiciones antes de confirmar el alquiler.',
        ]);

        RentalTransaction::query()->create([
            'tenant_name' => $validated['tenant_name'],
            'tenant_email' => $validated['tenant_email'],
            'product_name' => $validated['product_name'],
            'rental_start_date' => $validated['rental_start_date'],
            'rental_end_date' => $validated['rental_end_date'],
            'terms_accepted' => true,
            'terms_accepted_at' => now(),
            'terms_version' => self::TERMS_VERSION,
            'terms_snapshot' => json_encode($this->termsSections(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
        ]);

        return redirect()
            ->route('rental-transactions.create')
            ->with('status', 'El alquiler fue confirmado y la aceptacion de terminos quedo registrada correctamente.');
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function termsSections(): array
    {
        return [
            [
                'title' => '1. Objeto del contrato',
                'items' => [
                    'El presente documento regula el alquiler de productos ofrecidos por la empresa, estableciendo los derechos y obligaciones entre el arrendador (empresa) y el arrendatario (cliente).',
                ],
            ],
            [
                'title' => '2. Condiciones de alquiler',
                'items' => [
                    'El cliente debe ser mayor de edad y presentar documento de identidad valido.',
                    'El alquiler se realiza por el tiempo previamente acordado.',
                    'El producto se entrega en buen estado de funcionamiento.',
                ],
            ],
            [
                'title' => '3. Pago',
                'items' => [
                    'El cliente debera pagar el valor del alquiler antes de recibir el producto.',
                    'Se podra solicitar un deposito de garantia, el cual sera reembolsado al devolver el producto en buen estado.',
                    'Los pagos pueden realizarse por los medios autorizados (efectivo, transferencia, etc.).',
                ],
            ],
            [
                'title' => '4. Uso del producto',
                'items' => [
                    'El cliente se compromete a usar el producto de manera adecuada.',
                    'Esta prohibido modificar, desarmar o usar el producto para fines indebidos.',
                    'El cliente es responsable de cualquier dano causado por mal uso.',
                ],
            ],
            [
                'title' => '5. Entrega y devolucion',
                'items' => [
                    'El producto debe devolverse en la fecha y hora acordadas.',
                    'En caso de retraso, se aplicara un cargo adicional.',
                    'El producto debe ser devuelto en las mismas condiciones en que fue entregado.',
                ],
            ],
            [
                'title' => '6. Danos, perdida o robo',
                'items' => [
                    'El cliente sera responsable por danos, perdida o robo del producto.',
                    'En caso de dano, debera cubrir el costo de reparacion o reposicion.',
                    'En caso de perdida total, debera pagar el valor comercial del producto.',
                ],
            ],
            [
                'title' => '7. Cancelaciones',
                'items' => [
                    'Las cancelaciones deben realizarse con anticipacion minima de (X) horas.',
                    'No se realizaran devoluciones si el producto ya fue entregado.',
                ],
            ],
            [
                'title' => '8. Responsabilidad',
                'items' => [
                    'La empresa no se hace responsable por danos o perjuicios derivados del uso incorrecto del producto.',
                    'El cliente asume toda responsabilidad durante el periodo de alquiler.',
                ],
            ],
            [
                'title' => '9. Proteccion de datos',
                'items' => [
                    'La informacion personal del cliente sera utilizada unicamente para fines del servicio.',
                    'No se compartira con terceros sin autorizacion.',
                ],
            ],
        ];
    }
}
