public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->decimal('deposit', 10, 2)->nullable();
        $table->string('image')->nullable();
        $table->boolean('available')->default(true);
        $table->string('location');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
