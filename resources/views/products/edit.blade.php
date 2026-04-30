<x-app-layout>

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">
        Editar Producto
    </h1>

    <form method="POST"
          action="{{ route('products.update', $product) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nombre</label>

            <input type="text"
                   name="name"
                   value="{{ $product->name }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label>Descripción</label>

            <textarea name="description"
                      class="w-full border rounded p-2"
                      required>{{ $product->description }}</textarea>
        </div>

        <div class="mb-4">
            <label>Precio</label>

            <input type="number"
                   name="price"
                   value="{{ $product->price }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label>Depósito</label>

            <input type="number"
                   name="deposit"
                   value="{{ $product->deposit }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label>Ubicación</label>

            <input type="text"
                   name="location"
                   value="{{ $product->location }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label>Nueva imagen</label>

            <input type="file"
                   name="image"
                   class="w-full">
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">

            Actualizar

        </button>

    </form>

</div>

</x-app-layout>
