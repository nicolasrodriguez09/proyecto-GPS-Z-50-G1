<x-app-layout>
    <div class="p-6">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-2">Buscar</h3>
            <p class="mb-4">Aquí podrás ver y solicitar lo que necesites arrendar.</p>

            <div class="space-y-4">
                <form method="GET" action="{{ url('/arrendatario') }}" class="space-y-2">
                    <div>
                        <x-input-label for="search" value="Búsqueda por nombre" />
                        <x-text-input id="search" name="search" type="text" class="mt-1 block w-full" value="{{ $filters['search'] ?? '' }}" placeholder="Ej: Taladro, Silla, Carpa" />
                    </div>

                    <input type="hidden" name="min_price" value="{{ $filters['min_price'] ?? '' }}" />
                    <input type="hidden" name="max_price" value="{{ $filters['max_price'] ?? '' }}" />
                    <input type="hidden" name="availability_date" value="{{ $filters['availability_date'] ?? '' }}" />
                    <input type="hidden" name="location" value="{{ $filters['location'] ?? '' }}" />
                    <input type="hidden" name="category" value="{{ $filters['category'] ?? '' }}" />

                    <div class="flex gap-2">
                        <x-primary-button>Buscar</x-primary-button>
                        <a class="underline text-sm" href="{{ url('/arrendatario') }}">Limpiar</a>
                    </div>
                </form>

                <div class="border-t pt-4">
                    <h4 class="font-semibold mb-2">Filtros</h4>
                    <form method="GET" action="{{ url('/arrendatario') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <input type="hidden" name="search" value="{{ $filters['search'] ?? '' }}" />

                        <div>
                            <x-input-label for="min_price" value="Precio mínimo" />
                            <x-text-input id="min_price" name="min_price" type="number" step="0.01" min="0" class="mt-1 block w-full" value="{{ $filters['min_price'] ?? '' }}" />
                        </div>

                        <div>
                            <x-input-label for="max_price" value="Precio máximo" />
                            <x-text-input id="max_price" name="max_price" type="number" step="0.01" min="0" class="mt-1 block w-full" value="{{ $filters['max_price'] ?? '' }}" />
                        </div>

                        <div>
                            <x-input-label for="availability_date" value="Disponibilidad (fecha)" />
                            <x-text-input id="availability_date" name="availability_date" type="date" class="mt-1 block w-full" value="{{ $filters['availability_date'] ?? '' }}" />
                        </div>

                        <div>
                            <x-input-label for="location" value="Ubicación" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" value="{{ $filters['location'] ?? '' }}" placeholder="Ej: Medellín" />
                        </div>

                        <div>
                            <x-input-label for="category" value="Categoría" />
                            <select id="category" name="category" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Todas</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ (isset($filters['category']) && $filters['category'] === $cat) ? 'selected' : '' }}>
                                        {{ ucfirst($cat) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-5 flex gap-2">
                            <x-primary-button>Aplicar filtros</x-primary-button>
                            <a class="underline text-sm" href="{{ url('/arrendatario') }}">Limpiar</a>
                        </div>
                    </form>
                </div>

                <div class="border-t pt-4">
                    <h3 class="text-lg font-bold">Resultados</h3>
                </div>
            </div>
        </div>

        <div class="mt-6">
            @if ($products->count() === 0)
                <div class="bg-white p-6 rounded shadow">
                    <p>No hay productos que coincidan con tu búsqueda/filtros.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        <div class="bg-white p-4 rounded shadow relative">
                            @if($product->category)
                                <span class="absolute top-2 right-2 bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ ucfirst($product->category) }}</span>
                            @endif
                            <div class="font-semibold">{{ $product->name }}</div>
                            <div class="text-sm mt-1">Ubicación: {{ $product->location }}</div>
                            <div class="text-sm">Precio: {{ number_format((float) $product->price, 2) }}</div>
                            <div class="text-sm">Disponible desde: {{ optional($product->available_from)->format('Y-m-d') }}</div>
                            <div class="text-sm">Disponible hasta: {{ $product->available_until ? $product->available_until->format('Y-m-d') : 'Sin fecha límite' }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
