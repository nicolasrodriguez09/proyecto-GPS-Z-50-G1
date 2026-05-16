<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('location');

            $table->date('available_from');
            $table->date('available_until')->nullable();

            $table->string('category')->nullable();
            $table->string('status')->default('active');

            $table->timestamps();

            $table->index('name');
            $table->index('category');
            $table->index('price');
            $table->index('location');
            $table->index('available_from');
            $table->index('available_until');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
