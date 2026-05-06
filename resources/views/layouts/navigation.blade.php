<nav class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="flex items-center space-x-6">
                <a href="/" class="text-xl font-bold text-gray-800">
                    MiApp
                </a>

                <!-- LINKS SEGÚN ROL -->
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin" class="text-gray-700 hover:text-blue-600 font-medium">
                            Admin
                        </a>
                    @endif

                    @if(auth()->user()->role === 'arrendador')
                        <a href="/arrendador" class="text-gray-700 hover:text-blue-600 font-medium">
                            Arrendador
                        </a>
                    @endif

                    @if(auth()->user()->role === 'arrendatario')
                        <a href="/arrendatario" class="text-gray-700 hover:text-blue-600 font-medium">
                            Arrendatario
                        </a>
                    @endif
                @endauth
            </div>

            <!-- USUARIO -->
            @auth
            <div class="flex items-center space-x-4">

                <span class="text-gray-700 font-medium">
                    {{ auth()->user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Cerrar sesión
                    </button>
                </form>

            </div>
            @endauth

        </div>
    </div>
</nav>

