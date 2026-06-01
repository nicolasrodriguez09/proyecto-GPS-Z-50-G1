<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $arrendador = User::query()->where('role', 'arrendador')->first();

        if (!$arrendador) {
            $arrendador = User::create([
                'name' => 'Arrendador Demo',
                'email' => 'arrendador.demo@example.com',
                'password' => Hash::make('password'),
                'role' => 'arrendador',
                'document' => 'DEMO-ARR-001',
                'phone' => '0000000000',
            ]);
        }

        if (Product::query()->exists()) {
            return;
        }

        $products = [
            [
                'name' => 'Taladro percutor',
                'price' => 25.00,
                'location' => 'Medellín',
                'available_from' => now()->toDateString(),
                'available_until' => now()->addDays(30)->toDateString(),
                'category' => 'herramienta',
                'status' => 'active',
            ],
            [
                'name' => 'Carpa 4 personas',
                'price' => 18.50,
                'location' => 'Bogotá',
                'available_from' => now()->subDays(5)->toDateString(),
                'available_until' => null,
                'category' => 'camping',
                'status' => 'active',
            ],
            [
                'name' => 'Silla plegable',
                'price' => 4.00,
                'location' => 'Medellín',
                'available_from' => now()->addDays(3)->toDateString(),
                'available_until' => now()->addDays(10)->toDateString(),
                'category' => 'mueble',
                'status' => 'active',
            ],
            [
                'name' => 'Parlante bluetooth',
                'price' => 12.00,
                'location' => 'Cali',
                'available_from' => now()->toDateString(),
                'available_until' => now()->addDays(7)->toDateString(),
                'category' => 'tecnologia',
                'status' => 'active',
            ],
            [
                'name' => 'Bicicleta de montaña',
                'price' => 35.00,
                'location' => 'Medellín',
                'available_from' => now()->toDateString(),
                'available_until' => now()->addDays(15)->toDateString(),
                'category' => 'deporte',
                'status' => 'active',
            ],
            [
                'name' => 'Cámara DSLR',
                'price' => 45.00,
                'location' => 'Bogotá',
                'available_from' => now()->addDays(2)->toDateString(),
                'available_until' => null,
                'category' => 'tecnologia',
                'status' => 'active',
            ],
            [
                'name' => 'Mesa plegable',
                'price' => 8.00,
                'location' => 'Cali',
                'available_from' => now()->toDateString(),
                'available_until' => now()->addDays(20)->toDateString(),
                'category' => 'mueble',
                'status' => 'active',
            ],
            [
                'name' => 'Sierra circular',
                'price' => 15.00,
                'location' => 'Medellín',
                'available_from' => now()->subDays(2)->toDateString(),
                'available_until' => now()->addDays(5)->toDateString(),
                'category' => 'herramienta',
                'status' => 'active',
            ],
            [
                'name' => 'Set de ollas para camping',
                'price' => 10.00,
                'location' => 'Bogotá',
                'available_from' => now()->toDateString(),
                'available_until' => null,
                'category' => 'camping',
                'status' => 'active',
            ],
            [
                'name' => 'Proyector de video',
                'price' => 30.00,
                'location' => 'Medellín',
                'available_from' => now()->addDays(1)->toDateString(),
                'available_until' => now()->addDays(12)->toDateString(),
                'category' => 'tecnologia',
                'status' => 'active',
            ],
        ];

        foreach ($products as $data) {
            Product::create([
                'user_id' => $arrendador->id,
                ...$data,
            ]);
        }
    }
}
