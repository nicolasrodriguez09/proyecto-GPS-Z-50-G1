<x-app-layout>

    <div class="max-w-7xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Mis Publicaciones
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @forelse($products as $product)

                <div class="bg-white rounded shadow p-4">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="w-full h-48 object-cover rounded mb-4">
                    @endif

                    <h2 class="text-xl font-bold">
                        {{ $product->name }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ $product->description }}
                    </p>

                    <p class="mt-3 font-semibold">
                        Precio: ${{ $product->price }}
                    </p>

                    <p>
                        Depósito: ${{ $product->deposit }}
                    </p>
                    <p>
                        {{ $product->city }},
                        {{ $product->department }}
                    </p>

                    <div class="mt-4 flex gap-2">

    <a href="{{ route('products.edit', $product) }}"
       class="bg-yellow-500 text-white px-3 py-1 rounded">

        Editar

    </a>

    <form method="POST"
          action="{{ route('products.destroy', $product) }}">

        @csrf
        @method('DELETE')

        <button class="bg-red-600 text-white px-3 py-1 rounded">

            Eliminar

        </button>

    </form>

</div>

                </div>

            @empty

                <p>No tienes publicaciones todavía.</p>

            @endforelse

        </div>

    </div>

</x-app-layout>
