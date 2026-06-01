<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">

            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">
                    Panel Arrendador
                </p>

                <h2 class="text-xl font-bold text-slate-900">
                    Solicitudes recibidas
                </h2>
            </div>

            <a
                href="/arrendador"
                class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                Volver
            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- MENSAJES --}}
            @if(session('success'))

                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-medium text-rose-800">
                    {{ session('error') }}
                </div>

            @endif

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="text-lg font-semibold text-slate-900">
                        Gestiona las solicitudes de alquiler
                    </h3>

                    <p class="mt-1 text-sm text-slate-600">
                        Aprueba o rechaza las solicitudes para decidir con quien concretar el negocio.
                    </p>

                </div>

                @if ($transactions->isEmpty())

                    <div class="px-6 py-12 text-center">

                        <p class="text-lg font-semibold text-slate-900">
                            Aún no has recibido solicitudes.
                        </p>

                        <p class="mt-2 text-sm text-slate-500">
                            Cuando un arrendatario confirme una reserva, la verás reflejada aquí.
                        </p>

                    </div>

                @else

                    <div class="divide-y divide-slate-200">

                        @foreach ($transactions as $transaction)

                            <article class="grid gap-6 px-6 py-6 lg:grid-cols-[1.4fr_0.9fr] lg:items-center">

                                {{-- IZQUIERDA --}}
                                <div class="space-y-4">

                                    <div class="flex flex-wrap items-center gap-3">

                                        <h4 class="text-lg font-semibold text-slate-900">
                                            {{ $transaction->item_name }}
                                        </h4>

                                        {{-- BADGE --}}
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold

                                            @if ($transaction->status === 'pending')
                                                bg-amber-100 text-amber-800
                                            @elseif ($transaction->status === 'approved')
                                                bg-emerald-100 text-emerald-800
                                            @else
                                                bg-rose-100 text-rose-800
                                            @endif
                                        ">

                                            @if ($transaction->status === 'pending')
                                                Pendiente
                                            @elseif ($transaction->status === 'approved')
                                                Aprobada
                                            @else
                                                Rechazada
                                            @endif

                                        </span>

                                    </div>

                                    {{-- INFO --}}
                                    <div class="grid gap-3 text-sm text-slate-600 sm:grid-cols-2 xl:grid-cols-4">

                                        {{-- SOLICITANTE --}}
                                        <div class="rounded-2xl bg-slate-50 p-4">

                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                                                Solicitante
                                            </p>

                                            <p class="mt-2 font-semibold text-slate-900">
                                                {{ $transaction->user->name }}
                                            </p>

                                            <p class="text-slate-500">
                                                {{ $transaction->user->email }}
                                            </p>

                                            <p class="text-slate-500">
                                                Documento: {{ $transaction->user->document }}
                                            </p>

                                            <p class="text-slate-500">
                                                Teléfono: {{ $transaction->user->phone }}
                                            </p>

                                        </div>

                                        {{-- FECHAS --}}
                                        <div class="rounded-2xl bg-slate-50 p-4">

                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                                                Fechas
                                            </p>

                                            <p class="mt-2 font-semibold text-slate-900">
                                                {{ $transaction->starts_at->format('d/m/Y') }}
                                                -
                                                {{ $transaction->ends_at->format('d/m/Y') }}
                                            </p>

                                            <p class="text-slate-500">
                                                {{ $transaction->rental_days }} días
                                            </p>

                                        </div>

                                        {{-- VALOR --}}
                                        <div class="rounded-2xl bg-slate-50 p-4">

                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                                                Valor
                                            </p>

                                            <p class="mt-2 font-semibold text-slate-900">
                                                ${{ number_format($transaction->total_amount, 0, ',', '.') }}
                                            </p>

                                            <p class="text-slate-500">
                                                Reserva #{{ $transaction->id }}
                                            </p>

                                        </div>

                                        {{-- ACEPTACIÓN --}}
                                        <div class="rounded-2xl bg-slate-50 p-4">

                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                                                Aceptación
                                            </p>

                                            <p class="mt-2 font-semibold text-slate-900">
                                                {{ $transaction->accepted_terms_at->format('d/m/Y H:i') }}
                                            </p>

                                            <p class="text-slate-500">
                                                Términos {{ $transaction->terms_version }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                {{-- DERECHA --}}
                                <div class="flex flex-col gap-3 lg:items-end">

                                    {{-- PENDIENTE --}}
                                    @if ($transaction->status === 'pending')

                                        {{-- APROBAR --}}
                                        <form
                                            method="POST"
                                            action="{{ route('landlord.requests.update', $transaction) }}"
                                            class="w-full lg:w-auto"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="action"
                                                value="approved"
                                            >

                                            <button
                                                type="submit"
                                                class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-500"
                                            >
                                                Aprobar solicitud
                                            </button>

                                        </form>

                                        {{-- RECHAZAR --}}
                                        <form
                                            method="POST"
                                            action="{{ route('landlord.requests.update', $transaction) }}"
                                            class="w-full lg:w-auto"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="action"
                                                value="rejected"
                                            >

                                            <button
                                                type="submit"
                                                class="inline-flex w-full items-center justify-center rounded-xl border border-rose-300 px-5 py-3 text-sm font-semibold text-rose-700 hover:bg-rose-50"
                                            >
                                                Rechazar solicitud
                                            </button>

                                        </form>

                                    {{-- APROBADA --}}
                                    @elseif ($transaction->status === 'approved')

                                        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                                            Esta solicitud ya fue aprobada.
                                        </div>

                                    {{-- RECHAZADA --}}
                                    @elseif ($transaction->status === 'rejected')

                                        <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                                            Esta solicitud fue rechazada.
                                        </div>

                                    @endif

                                </div>

                            </article>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>