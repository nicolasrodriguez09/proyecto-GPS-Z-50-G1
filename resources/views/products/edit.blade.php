<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar publicación
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('products.update', $product) }}"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="block">
                            Nombre
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $product->name }}"
                               class="border rounded w-full p-2"
                               required>

                    </div>

                    <div class="mb-4">

                        <label class="block">
                            Descripción
                        </label>

                        <textarea name="description"
                                  class="border rounded w-full p-2"
                                  required>{{ $product->description }}</textarea>

                    </div>

                    <div class="mb-4">

                        <label class="block">
                            Precio
                        </label>

                        <input type="number"
                               name="price"
                               value="{{ $product->price }}"
                               class="border rounded w-full p-2"
                               required>

                    </div>

                    <div class="mb-4">

                        <label class="block">
                            Depósito
                        </label>

                        <input type="number"
                               name="deposit"
                               value="{{ $product->deposit }}"
                               class="border rounded w-full p-2">

                    </div>

                    <div class="mb-4">

                        <label class="block">
                            Imagen nueva
                        </label>

                        <input type="file"
                               name="image"
                               class="border rounded w-full p-2">

                    </div>

                    <div class="mb-4">

                        <label class="block">
                            Departamento
                        </label>

                        <select name="department"
                                class="border rounded w-full p-2"
                                required>

                            <option value="Valle del Cauca"
                                {{ $product->department == 'Valle del Cauca' ? 'selected' : '' }}>

                                Valle del Cauca

                            </option>

                        </select>

                    </div>

                    <div class="mb-4">

    <label class="block">
        Ciudad
    </label>

    <select name="city"
            class="border rounded w-full p-2"
            required>

        <option value="Cali"
            {{ $product->city == 'Cali' ? 'selected' : '' }}>
            Cali
        </option>

        <option value="Palmira"
            {{ $product->city == 'Palmira' ? 'selected' : '' }}>
            Palmira
        </option>

        <option value="Jamundí"
            {{ $product->city == 'Jamundí' ? 'selected' : '' }}>
            Jamundí
        </option>

        <option value="Yumbo"
            {{ $product->city == 'Yumbo' ? 'selected' : '' }}>
            Yumbo
        </option>

        <option value="Tuluá"
            {{ $product->city == 'Tuluá' ? 'selected' : '' }}>
            Tuluá
        </option>

        <option value="Buga"
            {{ $product->city == 'Buga' ? 'selected' : '' }}>
            Buga
        </option>

        <option value="La Unión"
            {{ $product->city == 'La Unión' ? 'selected' : '' }}>
            La Unión
        </option>

        <option value="La Victoria"
            {{ $product->city == 'La Victoria' ? 'selected' : '' }}>
            La Victoria
        </option>

        <option value="Toro"
            {{ $product->city == 'Toro' ? 'selected' : '' }}>
            Toro
        </option>

        <option value="Bolivar"
            {{ $product->city == 'Bolivar' ? 'selected' : '' }}>
            Bolivar
        </option>

        <option value="Roldanillo"
            {{ $product->city == 'Roldanillo' ? 'selected' : '' }}>
            Roldanillo
        </option>

        <option value="Zarzal"
            {{ $product->city == 'Zarzal' ? 'selected' : '' }}>
            Zarzal
        </option>

        <option value="Sevilla"
            {{ $product->city == 'Sevilla' ? 'selected' : '' }}>
            Sevilla
        </option>

        <option value="Caicedonia"
            {{ $product->city == 'Caicedonia' ? 'selected' : '' }}>
            Caicedonia
        </option>

        <option value="Ginebra"
            {{ $product->city == 'Ginebra' ? 'selected' : '' }}>
            Ginebra
        </option>

        <option value="Guacarí"
            {{ $product->city == 'Guacarí' ? 'selected' : '' }}>
            Guacarí
        </option>

        <option value="Obando"
            {{ $product->city == 'Obando' ? 'selected' : '' }}>
            Obando
        </option>

        <option value="Pradera"
            {{ $product->city == 'Pradera' ? 'selected' : '' }}>
            Pradera
        </option>

        <option value="Trujillo"
            {{ $product->city == 'Trujillo' ? 'selected' : '' }}>
            Trujillo
        </option>

        <option value="Versalles"
            {{ $product->city == 'Versalles' ? 'selected' : '' }}>
            Versalles
        </option>

        <option value="Yotoco"
            {{ $product->city == 'Yotoco' ? 'selected' : '' }}>
            Yotoco
        </option>

        <option value="Ansermanuevo"
            {{ $product->city == 'Ansermanuevo' ? 'selected' : '' }}>
            Ansermanuevo
        </option>

    </select>

</div>

                    <button type="submit"
                            class="bg-yellow-500 text-white px-4 py-2 rounded">

                        Actualizar publicación

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
