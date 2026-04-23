<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carga de evidencias de identidad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <main class="mx-auto flex min-h-screen max-w-6xl items-center px-6 py-12">
        <div class="grid w-full gap-8 overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900 shadow-2xl shadow-cyan-950/40 lg:grid-cols-[1.1fr_0.9fr]">
            <section class="relative overflow-hidden px-8 py-10 sm:px-12 sm:py-14">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(34,211,238,0.18),_transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(249,115,22,0.16),_transparent_32%)]"></div>
                <div class="relative">
                    <span class="inline-flex rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.28em] text-cyan-200">
                        Verificacion de identidad
                    </span>
                    <h1 class="mt-6 max-w-xl text-4xl font-black tracking-tight text-white sm:text-5xl">
                        Carga tus evidencias para validar tu perfil.
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                        Sube una foto personal reciente y la imagen de tu documento de identidad. Ambos archivos se guardaran y quedaran asociados al usuario registrado con el correo que ingreses.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-cyan-200">Formatos permitidos</p>
                            <p class="mt-3 text-2xl font-bold text-white">{{ $allowedFormats }}</p>
                            <p class="mt-2 text-sm leading-6 text-slate-300">Peso maximo por archivo: 5 MB.</p>
                        </article>
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-orange-200">Campos obligatorios</p>
                            <p class="mt-3 text-2xl font-bold text-white">4 datos clave</p>
                            <p class="mt-2 text-sm leading-6 text-slate-300">Nombre, correo, foto personal y documento de identidad.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="border-t border-white/10 bg-slate-900/80 px-8 py-10 sm:px-10 lg:border-l lg:border-t-0">
                @if (session('status'))
                    <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-4 rounded-2xl border border-rose-400/30 bg-rose-400/10 px-4 py-3 text-sm text-rose-100">
                        Revisa los campos obligatorios antes de enviar el formulario.
                    </div>
                @endif

                <form action="{{ route('identity-evidence.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-200">Nombre completo</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30"
                            placeholder="Ejemplo: Laura Martinez"
                            required
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Correo electronico</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30"
                            placeholder="usuario@correo.com"
                            required
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="personal_photo" class="mb-2 block text-sm font-semibold text-slate-200">Foto personal</label>
                        <input
                            id="personal_photo"
                            name="personal_photo"
                            type="file"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="block w-full rounded-2xl border border-dashed border-cyan-400/40 bg-cyan-400/5 px-4 py-4 text-sm text-slate-200 file:mr-4 file:rounded-full file:border-0 file:bg-cyan-300 file:px-4 file:py-2 file:font-semibold file:text-slate-950 hover:file:bg-cyan-200"
                            required
                        >
                        <p class="mt-2 text-xs uppercase tracking-[0.22em] text-slate-400">Solo {{ $allowedFormats }}</p>
                        @error('personal_photo')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="identity_document" class="mb-2 block text-sm font-semibold text-slate-200">Documento de identidad</label>
                        <input
                            id="identity_document"
                            name="identity_document"
                            type="file"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="block w-full rounded-2xl border border-dashed border-orange-400/40 bg-orange-400/5 px-4 py-4 text-sm text-slate-200 file:mr-4 file:rounded-full file:border-0 file:bg-orange-300 file:px-4 file:py-2 file:font-semibold file:text-slate-950 hover:file:bg-orange-200"
                            required
                        >
                        <p class="mt-2 text-xs uppercase tracking-[0.22em] text-slate-400">Solo {{ $allowedFormats }}</p>
                        @error('identity_document')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-gradient-to-r from-cyan-300 via-cyan-400 to-orange-300 px-5 py-4 text-sm font-black uppercase tracking-[0.28em] text-slate-950 transition hover:scale-[1.01]"
                    >
                        Enviar evidencias
                    </button>
                </form>
            </section>
        </div>
    </main>
</body>
</html>
