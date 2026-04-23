<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios pendientes por verificar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <main class="mx-auto max-w-7xl px-6 py-12">
        <div class="rounded-[2rem] border border-white/10 bg-slate-900 p-8 shadow-2xl shadow-cyan-950/30 sm:p-10">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.26em] text-cyan-200">Panel de validacion</p>
                    <h1 class="mt-3 text-4xl font-black tracking-tight text-white">Usuarios pendientes por verificar</h1>
                    <p class="mt-3 max-w-3xl text-sm leading-6 text-slate-300">
                        Revisa la foto personal y el documento cargado. Desde aqui puedes aprobar o rechazar cada solicitud y guardar el estado de validacion del usuario.
                    </p>
                </div>
                <a href="{{ route('identity-evidence.create') }}" class="inline-flex rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-slate-200 transition hover:border-cyan-300 hover:text-cyan-200">
                    Volver al formulario
                </a>
            </div>

            @if (session('status'))
                <div class="mt-6 rounded-2xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-rose-400/30 bg-rose-400/10 px-4 py-3 text-sm text-rose-100">
                    Revisa la informacion del rechazo antes de enviar la decision.
                </div>
            @endif

            @if ($pendingUsers->isEmpty())
                <div class="mt-8 rounded-3xl border border-white/10 bg-slate-950/70 px-6 py-8 text-center">
                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-400">Sin pendientes</p>
                    <h2 class="mt-3 text-2xl font-bold text-white">No hay usuarios en revision.</h2>
                    <p class="mt-2 text-sm text-slate-300">Cuando alguien cargue sus evidencias, aparecera aqui para su aprobacion o rechazo.</p>
                </div>
            @endif

            <div class="mt-8 grid gap-6">
                @foreach ($pendingUsers as $user)
                    <article class="overflow-hidden rounded-[2rem] border border-white/10 bg-slate-950/60">
                        <div class="grid gap-6 p-6 lg:grid-cols-[1.15fr_0.85fr]">
                            <div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="inline-flex rounded-full border border-amber-400/30 bg-amber-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">
                                        Pendiente
                                    </span>
                                    <p class="text-sm text-slate-300">{{ $user->email }}</p>
                                </div>
                                <h2 class="mt-4 text-3xl font-black text-white">{{ $user->name }}</h2>
                                <p class="mt-2 text-sm leading-6 text-slate-300">
                                    Revisa la evidencia cargada y define si la informacion del usuario es valida para generar mayor confianza en la plataforma.
                                </p>

                                <div class="mt-6 grid gap-5 md:grid-cols-2">
                                    <figure class="rounded-3xl border border-cyan-400/20 bg-slate-900 p-4">
                                        <figcaption class="mb-3 text-sm font-semibold uppercase tracking-[0.22em] text-cyan-200">Foto personal</figcaption>
                                        <img
                                            src="{{ asset('storage/'.$user->personal_photo_path) }}"
                                            alt="Foto personal de {{ $user->name }}"
                                            class="h-72 w-full rounded-2xl object-cover"
                                        >
                                    </figure>
                                    <figure class="rounded-3xl border border-orange-400/20 bg-slate-900 p-4">
                                        <figcaption class="mb-3 text-sm font-semibold uppercase tracking-[0.22em] text-orange-200">Documento de identidad</figcaption>
                                        <img
                                            src="{{ asset('storage/'.$user->identity_document_path) }}"
                                            alt="Documento de identidad de {{ $user->name }}"
                                            class="h-72 w-full rounded-2xl object-cover"
                                        >
                                    </figure>
                                </div>
                            </div>

                            <div class="flex flex-col justify-between rounded-3xl border border-white/10 bg-slate-900/80 p-5">
                                <div>
                                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-300">Decision de validacion</p>
                                    <p class="mt-3 text-sm leading-6 text-slate-300">
                                        Aprueba si las evidencias coinciden y son legibles. Rechaza si la informacion no es suficiente o presenta inconsistencias.
                                    </p>
                                </div>

                                <div class="mt-6 space-y-4">
                                    <form action="{{ route('identity-evidence.approve', $user) }}" method="POST">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="w-full rounded-2xl bg-gradient-to-r from-emerald-300 to-cyan-300 px-4 py-3 text-sm font-black uppercase tracking-[0.22em] text-slate-950 transition hover:scale-[1.01]"
                                        >
                                            Aprobar verificacion
                                        </button>
                                    </form>

                                    <form action="{{ route('identity-evidence.reject', $user) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div>
                                            <label for="identity_verification_notes_{{ $user->id }}" class="mb-2 block text-sm font-semibold text-slate-200">
                                                Motivo de rechazo
                                            </label>
                                            <textarea
                                                id="identity_verification_notes_{{ $user->id }}"
                                                name="identity_verification_notes"
                                                rows="4"
                                                class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-slate-100 outline-none transition focus:border-rose-400 focus:ring-2 focus:ring-rose-400/30"
                                                placeholder="Describe brevemente por que el usuario debe volver a cargar sus evidencias."
                                            >{{ old('identity_verification_notes') }}</textarea>
                                            @error('identity_verification_notes')
                                                <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button
                                            type="submit"
                                            class="w-full rounded-2xl border border-rose-400/40 bg-rose-400/10 px-4 py-3 text-sm font-black uppercase tracking-[0.22em] text-rose-100 transition hover:bg-rose-400/20"
                                        >
                                            Rechazar verificacion
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
