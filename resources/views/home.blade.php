<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center text-center">

        <h1 class="text-4xl font-bold text-gray-800 mb-6">
            Bienvenido al sistema
        </h1>

        <p class="text-gray-600 mb-8">
            Gestiona tu acceso de forma segura
        </p>

        <div class="flex gap-4">
            <a href="{{ route('login') }}" 
               class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Iniciar sesión
            </a>

            <a href="{{ route('register') }}" 
               class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                Registrarse
            </a>
        </div>

    </div>

</body>
</html>
