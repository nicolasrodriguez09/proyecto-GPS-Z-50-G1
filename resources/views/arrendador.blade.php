<x-app-layout>

    <div class="max-w-7xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Panel Arrendador
        </h1>

        <div class="bg-white shadow rounded p-6">

            <h2 class="text-xl font-semibold mb-2">
                Tus publicaciones
            </h2>

            <p class="text-gray-600 mb-6">
                Aquí podrás gestionar tus productos y servicios de alquiler.
            </p>

            <a href="{{ route('products.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                Publicar producto
            </a>
            <a href="{{ route('products.index') }}"
   class="bg-gray-800 text-white px-4 py-2 rounded ml-3">

    Ver mis publicaciones

</a>

            </a>

        </div>

    </div>

</x-app-layout>
