<x-app-layout>

    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">

        <h1 class="text-2xl font-bold mb-6">
            Publicar Producto
        </h1>

        @if(session('success'))
            <div class="bg-green-200 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('products.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <label>Nombre</label>
                <input type="text"
                       name="name"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label>Descripción</label>
                <textarea name="description"
                          class="w-full border rounded p-2"
                          required></textarea>
            </div>

            <div class="mb-4">
                <label>Precio</label>
                <input type="number"
                       name="price"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label>Depósito</label>
                <input type="number"
                       name="deposit"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Ubicación</label>
                <input type="text"
                       name="location"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label>Imagen</label>
                <input type="file"
                       name="image"
                       class="w-full">
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Publicar
            </button>

        </form>

    </div>

</x-app-layout>
