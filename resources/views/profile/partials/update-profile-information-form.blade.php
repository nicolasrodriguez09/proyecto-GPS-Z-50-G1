<section>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- NOMBRE --}}
        <div>
            <label for="name" class="block text-xs font-semibold uppercase tracking-[0.15em] text-slate-500 mb-1.5">
                Nombre completo
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100"
            >
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- CORREO --}}
        <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-[0.15em] text-slate-500 mb-1.5">
                Correo electrónico
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100"
            >
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3">
                    <p class="text-sm text-amber-800">
                        Tu correo no está verificado.
                        <button form="send-verification" class="underline font-semibold hover:text-amber-900">
                            Reenviar correo de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-1 text-sm font-medium text-emerald-700">
                            Se envió un nuevo enlace de verificación a tu correo.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- DOCUMENTO --}}
        <div>
            <label for="document" class="block text-xs font-semibold uppercase tracking-[0.15em] text-slate-500 mb-1.5">
                Número de documento
            </label>
            <input
                id="document"
                name="document"
                type="text"
                value="{{ old('document', $user->document) }}"
                autocomplete="off"
                class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100"
                placeholder="Cédula o documento de identidad"
            >
            <x-input-error class="mt-2" :messages="$errors->get('document')" />
        </div>

        {{-- TELÉFONO --}}
        <div>
            <label for="phone" class="block text-xs font-semibold uppercase tracking-[0.15em] text-slate-500 mb-1.5">
                Teléfono
            </label>
            <input
                id="phone"
                name="phone"
                type="tel"
                value="{{ old('phone', $user->phone) }}"
                autocomplete="tel"
                class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-100"
                placeholder="Ej. 3001234567"
            >
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        {{-- BOTÓN --}}
        <div class="flex items-center gap-4 pt-1">

            <button
                type="submit"
                class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
            >
                Guardar cambios
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm font-medium text-emerald-700"
                >
                    ¡Guardado correctamente!
                </p>
            @endif

        </div>

    </form>

</section>