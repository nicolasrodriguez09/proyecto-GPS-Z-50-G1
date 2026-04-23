<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carga de evidencias de identidad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <main class="mx-auto max-w-7xl px-6 py-12">
        <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
            <section class="overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900 shadow-2xl shadow-cyan-950/40">
                <div class="relative px-8 py-10 sm:px-12 sm:py-14">
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

                        <div class="mt-8 rounded-3xl border border-white/10 bg-slate-950/60 p-6">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                                <div>
                                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-cyan-200">Consulta de estado</p>
                                    <h2 class="mt-2 text-2xl font-bold text-white">Resultado visible para el usuario</h2>
                                    <p class="mt-2 max-w-xl text-sm leading-6 text-slate-300">
                                        Ingresa tu correo para consultar si tu verificacion esta pendiente, aprobada o rechazada.
                                    </p>
                                </div>
                                <a href="{{ route('identity-evidence.pending') }}" class="inline-flex rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-slate-200 transition hover:border-cyan-300 hover:text-cyan-200">
                                    Revisar pendientes
                                </a>
                            </div>

                            <form action="{{ route('identity-evidence.create') }}" method="GET" class="mt-6 grid gap-4 sm:grid-cols-[1fr_auto]">
                                <div>
                                    <label for="status_email" class="mb-2 block text-sm font-semibold text-slate-200">Correo del usuario</label>
                                    <input
                                        id="status_email"
                                        name="email"
                                        type="email"
                                        value="{{ $statusLookupEmail }}"
                                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30"
                                        placeholder="usuario@correo.com"
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="self-end rounded-2xl bg-white px-5 py-3 text-sm font-black uppercase tracking-[0.2em] text-slate-950 transition hover:bg-cyan-200"
                                >
                                    Consultar
                                </button>
                            </form>

                            @if ($statusLookupEmail !== '' && ! $statusUser)
                                <div class="mt-4 rounded-2xl border border-slate-400/30 bg-slate-400/10 px-4 py-3 text-sm text-slate-100">
                                    No encontramos evidencias asociadas al correo consultado.
                                </div>
                            @endif

                            @if ($statusUser && $statusMeta)
                                <div class="mt-4 rounded-3xl border px-5 py-5 {{ $statusMeta['classes'] }}">
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em]">{{ $statusMeta['badge'] }}</p>
                                    <h3 class="mt-3 text-2xl font-bold">{{ $statusMeta['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-6">{{ $statusMeta['description'] }}</p>
                                    @if ($statusUser->identity_verification_reviewed_at)
                                        <p class="mt-3 text-xs uppercase tracking-[0.22em]">
                                            Revisado el {{ $statusUser->identity_verification_reviewed_at->format('d/m/Y H:i') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-white/10 bg-slate-900/80 px-8 py-10 shadow-2xl shadow-cyan-950/20 sm:px-10">
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
