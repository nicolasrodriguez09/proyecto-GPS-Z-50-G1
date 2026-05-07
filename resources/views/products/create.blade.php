<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear publicación
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

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
                      action="{{ route('products.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">
                        <label class="block">
                            Nombre
                        </label>

                        <input type="text"
                               name="name"
                               class="border rounded w-full p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block">
                            Descripción
                        </label>

                        <textarea name="description"
                                  class="border rounded w-full p-2"
                                  required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block">
                            Precio
                        </label>

                        <input type="number"
                               name="price"
                               class="border rounded w-full p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block">
                            Depósito
                        </label>

                        <input type="number"
                               name="deposit"
                               class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block">
                            Imagen
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

                            <option value="">
                                Seleccione
                            </option>

                            <option value="Valle del Cauca">
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

                            <option value="">
                                Seleccione
                            </option>

                            <option value="Cali">Cali</option>
                <option value="Palmira">Palmira</option>
                <option value="Jamundí">Jamundí</option>
                <option value="Yumbo">Yumbo</option>
                <option value="Tuluá">Tuluá</option>
                <option value="Buga">Buga</option>
                <option value="La Unión">La Unión</option>
                <option value="La Victoria">La Victoria</option>
                <option value="Toro">Toro</option>
                <option value="Bolivar">Bolivar</option>
                <option value="La Victoria">La Victoria</option>
                <option value="Roldanillo">Roldanillo</option>
                <option value="Zarzal">Zarzal</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Caicedonia">Caicedonia</option>
                <option value="Ginebra">Ginebra</option>
                <option value="Guacarí">Guacarí</option>
                <option value="Obando">Obando</option>
                <option value="Pradera">Pradera</option>
                <option value="Trujillo">Trujillo</option>
                <option value="Versalles">Versalles</option>
                <option value="Yotoco">Yotoco</option>
                <option value="Ansermanuevo">Ansermanuevo</option>

                        </select>
                    </div>

                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded">

                        Guardar publicación

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
