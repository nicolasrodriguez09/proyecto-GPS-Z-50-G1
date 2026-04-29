<?php

namespace Tests\Feature;

use App\Models\RentalTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RentalTransactionAcceptanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_rental_confirmation_form_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Confirma tu alquiler con aceptacion expresa de responsabilidades.');
        $response->assertSee('Politicas y terminos y condiciones de alquiler');
    }

    public function test_the_rental_cannot_be_confirmed_without_accepting_terms(): void
    {
        $response = $this->from('/')->post(route('rental-transactions.store'), [
            'tenant_name' => 'Laura Martinez',
            'tenant_email' => 'laura@example.com',
            'product_name' => 'Taladro industrial',
            'rental_start_date' => '2026-05-01',
            'rental_end_date' => '2026-05-03',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['terms_accepted']);
        $this->assertDatabaseCount('rental_transactions', 0);
    }

    public function test_the_rental_is_confirmed_and_acceptance_is_registered(): void
    {
        $response = $this->post(route('rental-transactions.store'), [
            'tenant_name' => 'Laura Martinez',
            'tenant_email' => 'laura@example.com',
            'product_name' => 'Taladro industrial',
            'rental_start_date' => '2026-05-01',
            'rental_end_date' => '2026-05-03',
            'terms_accepted' => '1',
        ]);

        $response->assertRedirect(route('rental-transactions.create'));
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $transaction = RentalTransaction::query()->first();

        $this->assertNotNull($transaction);
        $this->assertSame('Laura Martinez', $transaction->tenant_name);
        $this->assertSame('laura@example.com', $transaction->tenant_email);
        $this->assertSame('Taladro industrial', $transaction->product_name);
        $this->assertTrue($transaction->terms_accepted);
        $this->assertSame('2026-04-29', $transaction->terms_version);
        $this->assertNotNull($transaction->terms_accepted_at);
        $this->assertStringContainsString('Objeto del contrato', $transaction->terms_snapshot);

        $this->assertDatabaseHas('rental_transactions', [
            'tenant_email' => 'laura@example.com',
            'terms_accepted' => true,
            'terms_version' => '2026-04-29',
        ]);
    }
}
