<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Arrendatario
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Arrendador
            $table->unsignedBigInteger('landlord_id')->nullable();
            $table->foreign('landlord_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            // Producto (opcional FK)
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->string('item_name');
            $table->date('starts_at');
            $table->date('ends_at');
            $table->unsignedInteger('rental_days');
            $table->decimal('total_amount', 12, 2);

            // pendiente | aprobada | rechazada
            $table->string('status')->default('pendiente');

            $table->string('terms_version')->nullable();
            $table->text('terms_snapshot')->nullable();
            $table->timestamp('accepted_terms_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
