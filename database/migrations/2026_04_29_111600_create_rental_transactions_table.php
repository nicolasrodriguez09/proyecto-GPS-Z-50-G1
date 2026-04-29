<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_email');
            $table->string('product_name');
            $table->date('rental_start_date');
            $table->date('rental_end_date');
            $table->boolean('terms_accepted');
            $table->timestamp('terms_accepted_at');
            $table->string('terms_version', 20);
            $table->longText('terms_snapshot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_transactions');
    }
};
