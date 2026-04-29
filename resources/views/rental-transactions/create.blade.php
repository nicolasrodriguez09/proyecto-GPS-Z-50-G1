<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmacion de alquiler</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-950 text-stone-100">
    <main class="mx-auto flex min-h-screen max-w-7xl items-center px-6 py-12">
        <div class="grid w-full gap-8 overflow-hidden rounded-[2rem] border border-amber-200/10 bg-stone-900 shadow-2xl shadow-black/40 lg:grid-cols-[1.05fr_0.95fr]">
            <section class="relative overflow-hidden px-8 py-10 sm:px-12 sm:py-14">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(251,191,36,0.16),_transparent_34%),radial-gradient(circle_at_bottom_right,_rgba(45,212,191,0.15),_transparent_34%)]"></div>
                <div class="relative">
                    <span class="inline-flex rounded-full border border-amber-300/30 bg-amber-300/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.28em] text-amber-100">
                        Flujo de alquiler
                    </span>
                    <h1 class="mt-6 max-w-2xl text-4xl font-black tracking-tight text-white sm:text-5xl">
                        Confirma tu alquiler con aceptacion expresa de responsabilidades.
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-stone-300 sm:text-lg">
                        Antes de finalizar, el arrendatario debe revisar las politicas, terminos y condiciones del alquiler y aceptar de forma obligatoria para dejar trazabilidad en la transaccion.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-200">Control obligatorio</p>
                            <p class="mt-3 text-2xl font-bold text-white">Aceptacion previa</p>
                            <p class="mt-2 text-sm leading-6 text-stone-300">No se puede continuar sin marcar la casilla de conformidad.</p>
                        </article>
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-amber-200">Registro legal</p>
                            <p class="mt-3 text-2xl font-bold text-white">Version {{ $termsVersion }}</p>
                            <p class="mt-2 text-sm leading-6 text-stone-300">Se almacena fecha, version y copia del contenido aceptado.</p>
                        </article>
                    </div>

                    <div class="mt-8 rounded-3xl border border-white/10 bg-stone-950/70 p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-400">Incluye</p>
                        <ul class="mt-4 space-y-3 text-sm leading-6 text-stone-300">
                            <li>Vista modal con el texto completo de politicas, terminos y condiciones.</li>
                            <li>Validacion en interfaz y en servidor para impedir confirmaciones sin aceptacion.</li>
                            <li>Registro persistente de la aceptacion en la transaccion de alquiler.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="border-t border-white/10 bg-stone-900/90 px-8 py-10 sm:px-10 lg:border-l lg:border-t-0">
                @if (session('status'))
                    <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-4 rounded-2xl border border-rose-400/30 bg-rose-400/10 px-4 py-3 text-sm text-rose-100">
                        Revisa la informacion y acepta las condiciones antes de confirmar el alquiler.
                    </div>
                @endif

                <form action="{{ route('rental-transactions.store') }}" method="POST" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <label for="tenant_name" class="mb-2 block text-sm font-semibold text-stone-200">Nombre del arrendatario</label>
                        <input
                            id="tenant_name"
                            name="tenant_name"
                            type="text"
                            value="{{ old('tenant_name') }}"
                            class="w-full rounded-2xl border border-white/10 bg-stone-950 px-4 py-3 text-stone-100 outline-none transition focus:border-amber-300 focus:ring-2 focus:ring-amber-300/30"
                            placeholder="Ejemplo: Laura Martinez"
                            required
                        >
                        @error('tenant_name')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tenant_email" class="mb-2 block text-sm font-semibold text-stone-200">Correo del arrendatario</label>
                        <input
                            id="tenant_email"
                            name="tenant_email"
                            type="email"
                            value="{{ old('tenant_email') }}"
                            class="w-full rounded-2xl border border-white/10 bg-stone-950 px-4 py-3 text-stone-100 outline-none transition focus:border-amber-300 focus:ring-2 focus:ring-amber-300/30"
                            placeholder="usuario@correo.com"
                            required
                        >
                        @error('tenant_email')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="product_name" class="mb-2 block text-sm font-semibold text-stone-200">Producto a alquilar</label>
                        <input
                            id="product_name"
                            name="product_name"
                            type="text"
                            value="{{ old('product_name') }}"
                            class="w-full rounded-2xl border border-white/10 bg-stone-950 px-4 py-3 text-stone-100 outline-none transition focus:border-teal-300 focus:ring-2 focus:ring-teal-300/30"
                            placeholder="Ejemplo: Taladro industrial"
                            required
                        >
                        @error('product_name')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="rental_start_date" class="mb-2 block text-sm font-semibold text-stone-200">Inicio del alquiler</label>
                            <input
                                id="rental_start_date"
                                name="rental_start_date"
                                type="date"
                                value="{{ old('rental_start_date') }}"
                                class="w-full rounded-2xl border border-white/10 bg-stone-950 px-4 py-3 text-stone-100 outline-none transition focus:border-teal-300 focus:ring-2 focus:ring-teal-300/30"
                                required
                            >
                            @error('rental_start_date')
                                <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="rental_end_date" class="mb-2 block text-sm font-semibold text-stone-200">Fin del alquiler</label>
                            <input
                                id="rental_end_date"
                                name="rental_end_date"
                                type="date"
                                value="{{ old('rental_end_date') }}"
                                class="w-full rounded-2xl border border-white/10 bg-stone-950 px-4 py-3 text-stone-100 outline-none transition focus:border-teal-300 focus:ring-2 focus:ring-teal-300/30"
                                required
                            >
                            @error('rental_end_date')
                                <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-amber-100">Politicas y terminos</p>
                                <p class="mt-2 text-sm leading-6 text-stone-300">Lee el documento completo antes de confirmar el alquiler.</p>
                            </div>
                            <button
                                type="button"
                                id="open-terms-modal"
                                class="rounded-full border border-amber-300/40 bg-amber-300/10 px-5 py-3 text-sm font-bold text-amber-100 transition hover:border-amber-200 hover:bg-amber-300/20"
                            >
                                Ver terminos y condiciones
                            </button>
                        </div>

                        <label for="terms_accepted" class="mt-5 flex cursor-pointer items-start gap-3 rounded-2xl border border-white/10 bg-stone-950/70 p-4">
                            <input
                                id="terms_accepted"
                                name="terms_accepted"
                                type="checkbox"
                                value="1"
                                class="mt-1 h-5 w-5 rounded border-white/20 bg-stone-950 text-amber-300 focus:ring-amber-300"
                                {{ old('terms_accepted') ? 'checked' : '' }}
                                required
                            >
                            <span class="text-sm leading-6 text-stone-200">
                                Acepto las politicas, terminos y condiciones del alquiler y reconozco mis responsabilidades como arrendatario.
                            </span>
                        </label>
                        @error('terms_accepted')
                            <p class="mt-3 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        id="confirm-rental-button"
                        class="w-full rounded-2xl bg-gradient-to-r from-amber-300 via-amber-200 to-teal-300 px-5 py-4 text-sm font-black uppercase tracking-[0.28em] text-stone-950 transition disabled:cursor-not-allowed disabled:opacity-40"
                        {{ old('terms_accepted') ? '' : 'disabled' }}
                    >
                        Confirmar alquiler
                    </button>
                </form>
            </section>
        </div>
    </main>

    <div
        id="terms-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 px-4 py-8"
        aria-hidden="true"
        role="dialog"
        aria-labelledby="terms-modal-title"
    >
        <div class="max-h-full w-full max-w-4xl overflow-hidden rounded-[2rem] border border-white/10 bg-stone-900 shadow-2xl shadow-black/50">
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                <div>
                    <h2 id="terms-modal-title" class="text-2xl font-black text-white">Politicas y terminos y condiciones de alquiler</h2>
                    <p class="mt-1 text-sm text-stone-400">Version {{ $termsVersion }}</p>
                </div>
                <button
                    type="button"
                    id="close-terms-modal"
                    class="rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-stone-200 transition hover:bg-white/10"
                >
                    Cerrar
                </button>
            </div>

            <div class="max-h-[70vh] space-y-6 overflow-y-auto px-6 py-6">
                @foreach ($termsSections as $section)
                    <section class="rounded-3xl border border-white/10 bg-white/5 p-5">
                        <h3 class="text-lg font-bold text-white">{{ $section['title'] }}</h3>
                        <ul class="mt-3 space-y-3 text-sm leading-6 text-stone-300">
                            @foreach ($section['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </section>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const openTermsModalButton = document.getElementById('open-terms-modal');
        const closeTermsModalButton = document.getElementById('close-terms-modal');
        const termsModal = document.getElementById('terms-modal');
        const termsAcceptedCheckbox = document.getElementById('terms_accepted');
        const confirmRentalButton = document.getElementById('confirm-rental-button');

        const toggleModal = (show) => {
            termsModal.classList.toggle('hidden', !show);
            termsModal.classList.toggle('flex', show);
            termsModal.setAttribute('aria-hidden', show ? 'false' : 'true');
        };

        const syncSubmitState = () => {
            confirmRentalButton.disabled = !termsAcceptedCheckbox.checked;
        };

        openTermsModalButton.addEventListener('click', () => toggleModal(true));
        closeTermsModalButton.addEventListener('click', () => toggleModal(false));
        termsModal.addEventListener('click', (event) => {
            if (event.target === termsModal) {
                toggleModal(false);
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                toggleModal(false);
            }
        });
        termsAcceptedCheckbox.addEventListener('change', syncSubmitState);

        syncSubmitState();
    </script>
</body>
</html>
