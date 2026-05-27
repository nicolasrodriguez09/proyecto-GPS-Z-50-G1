<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<x-app-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .ps-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 4rem;
    }

    .ps-hero {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2rem 2rem 5rem;
        position: relative;
        overflow: hidden;
    }

    .ps-hero::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px;
        right: -80px;
    }

    .ps-hero-inner {
        max-width: 1100px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .ps-back {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: rgba(255,255,255,0.8);
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        margin-bottom: 1rem;
    }

    .ps-back:hover { color: white; }

    .ps-hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 900;
        color: white;
    }

    .ps-hero-sub {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.7);
        margin-top: 0.35rem;
    }

    .ps-body {
        max-width: 1100px;
        margin: -3rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 1.5rem;
        position: relative;
        z-index: 2;
    }

    @media (max-width: 900px) {
        .ps-body { grid-template-columns: 1fr; }
    }

    .ps-card, .ps-price-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 8px 30px rgba(26,95,168,0.08);
        overflow: hidden;
    }

    .ps-price-card { padding: 1.75rem; }

    .ps-img {
        width: 100%;
        height: 320px;
        background: #eef6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .ps-img img { width: 100%; height: 100%; object-fit: cover; }

    .ps-available-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.3rem 0.875rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
    }

    .ps-available-badge.yes { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .ps-available-badge.no  { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    .ps-card-body { padding: 1.75rem; }

    .ps-product-name {
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1a2b4a;
        margin-bottom: 1rem;
    }

    .ps-meta-row { display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; }
    .ps-meta-item { font-size: 0.875rem; color: #6B7280; }

    .ps-section-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #9CA3AF;
        margin-bottom: 0.5rem;
    }

    .ps-description { font-size: 0.95rem; color: #374151; line-height: 1.7; }

    .ps-price-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #9CA3AF;
        margin-bottom: 0.3rem;
        text-transform: uppercase;
    }

    .ps-price-amount {
        font-family: 'Nunito', sans-serif;
        font-size: 2rem;
        font-weight: 900;
        color: #1A5FA8;
    }

    .ps-divider { border: none; border-top: 1px solid #edf2f7; margin: 1.25rem 0; }

    .ps-detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.75rem;
        font-size: 0.875rem;
    }

    .ps-detail-row .label { color: #9CA3AF; }
    .ps-detail-row .value { color: #1a2b4a; font-weight: 600; }

    .ps-owner-card {
        background: #f0f6ff;
        border-radius: 14px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 0.875rem;
        margin-bottom: 1.25rem;
    }

    .ps-owner-avatar {
        width: 42px; height: 42px;
        border-radius: 50%;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
    }

    .ps-owner-name { font-family: 'Nunito', sans-serif; font-weight: 800; color: #1a2b4a; }
    .ps-owner-label { font-size: 0.75rem; color: #9CA3AF; }

    .ps-btn-rent {
        width: 100%;
        padding: 0.95rem;
        background: linear-gradient(135deg, #F7941D, #e07b0a);
        border: none;
        border-radius: 14px;
        color: white;
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        cursor: pointer;
        transition: 0.2s;
    }

    .ps-btn-rent:hover { transform: translateY(-2px); }

    .ps-btn-rent.disabled {
        background: #E5E7EB;
        color: #9CA3AF;
        cursor: not-allowed;
    }

    .ps-note { font-size: 0.75rem; color: #9CA3AF; text-align: center; margin-top: 0.75rem; }

    .ps-info-card {
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 20px;
        padding: 1.5rem;
        margin-top: 1.25rem;
        color: white;
    }

    .ps-info-title { font-family: 'Nunito', sans-serif; font-weight: 800; margin-bottom: 0.75rem; }
    .ps-info-list { list-style: none; padding: 0; margin: 0; }
    .ps-info-list li { margin-bottom: 0.5rem; font-size: 0.85rem; }

    .calendar-input {
        width: 100%;
        box-sizing: border-box;
        margin-top: 0.4rem;
        padding: 0.75rem;
        border: 1px solid #dbeafe;
        border-radius: 12px;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
    }

    .calendar-input:focus { border-color: #29ABE2; }

    .occupied-box {
        margin-top: 1rem;
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 12px;
        padding: 0.75rem;
        font-size: 0.8rem;
    }

    /* ── Términos y condiciones ── */
    .ps-terms-box {
        background: #f8fbff;
        border: 1.5px solid #e8f0fb;
        border-radius: 12px;
        padding: 1rem 1.125rem;
        max-height: 140px;
        overflow-y: auto;
        margin-bottom: 0.875rem;
        font-size: 0.8rem;
        color: #4B5563;
        line-height: 1.7;
        white-space: pre-line;
    }

    .ps-checkbox-row {
        display: flex;
        align-items: flex-start;
        gap: 0.625rem;
        margin-bottom: 1rem;
        cursor: pointer;
    }

    .ps-checkbox-row input[type="checkbox"] {
        width: 17px; height: 17px;
        margin-top: 2px;
        accent-color: #1A5FA8;
        flex-shrink: 0;
        cursor: pointer;
    }

    .ps-checkbox-row span {
        font-size: 0.8125rem;
        color: #374151;
        line-height: 1.5;
    }

    /* Errores de validación */
    .ps-errors {
        background: #fef2f2;
        border: 1.5px solid #fecaca;
        border-radius: 12px;
        padding: 0.875rem 1rem;
        margin-bottom: 1rem;
        font-size: 0.8rem;
        color: #dc2626;
    }

    .ps-errors ul { margin: 0; padding-left: 1.25rem; }

    .ps-flash-success {
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        color: #15803d;
        border-radius: 12px;
        padding: 0.875rem 1rem;
        margin-bottom: 1rem;
        font-size: 0.875rem;
        font-weight: 600;
    }
</style>

<div class="ps-wrapper">

    {{-- HERO --}}
    <div class="ps-hero">
        <div class="ps-hero-inner">
            <a href="{{ url('/arrendatario') }}" class="ps-back">
                ← Volver al marketplace
            </a>
            <div class="ps-hero-title">{{ $product->name }}</div>
            <div class="ps-hero-sub">📍 {{ $product->city }}, {{ $product->department }}</div>
        </div>
    </div>

    {{-- BODY --}}
    <div class="ps-body">

        {{-- IZQUIERDA --}}
        <div>
            <div class="ps-card">

                <div class="ps-img">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                    @endif
                    <span class="ps-available-badge {{ $product->available ? 'yes' : 'no' }}">
                        {{ $product->available ? '✓ Disponible' : '✗ No disponible' }}
                    </span>
                </div>

                <div class="ps-card-body">
                    <div class="ps-product-name">{{ $product->name }}</div>

                    <div class="ps-meta-row">
                        <div class="ps-meta-item">📍 {{ $product->city }}, {{ $product->department }}</div>
                        <div class="ps-meta-item">📅 Publicado {{ $product->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="ps-section-label">Descripción</div>
                    <p class="ps-description">{{ $product->description }}</p>
                </div>

            </div>
        </div>

        {{-- DERECHA --}}
        <div>
            <div class="ps-price-card">

                <div class="ps-price-label">Precio por día</div>
                <div class="ps-price-amount">${{ number_format((float) $product->price, 0, ',', '.') }}</div>

                <hr class="ps-divider">

                @if($product->deposit)
                    <div class="ps-detail-row">
                        <span class="label">Depósito</span>
                        <span class="value">${{ number_format((float) $product->deposit, 0, ',', '.') }}</span>
                    </div>
                @endif

                <div class="ps-detail-row">
                    <span class="label">Ubicación</span>
                    <span class="value">{{ $product->city }}</span>
                </div>

                <div class="ps-detail-row">
                    <span class="label">Estado</span>
                    <span class="value">{{ $product->available ? 'Disponible' : 'No disponible' }}</span>
                </div>

                <hr class="ps-divider">

                <div class="ps-section-label">Publicado por</div>

                <div class="ps-owner-card">
                    <div class="ps-owner-avatar">
                        {{ strtoupper(substr($product->user->name ?? 'U', 0, 2)) }}
                    </div>
                    <div>
                        <div class="ps-owner-name">{{ $product->user->name ?? 'Arrendador' }}</div>
                        <div class="ps-owner-label">Arrendador verificado</div>
                    </div>
                </div>

                {{-- FORMULARIO --}}
                @if($product->available)

                    <hr class="ps-divider">

                    <div class="ps-section-label">Selecciona fechas</div>

                    {{-- Mensajes flash --}}
                    @if(session('success'))
                        <div class="ps-flash-success">✓ {{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="ps-errors">{{ session('error') }}</div>
                    @endif

                    {{-- Errores de validación --}}
                    @if($errors->any())
                        <div class="ps-errors">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('rentals.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- Fecha inicio --}}
                        <div style="margin-bottom:1rem;">
                            <label style="font-size:0.8rem;color:#6B7280;">Fecha inicio</label>
                            <input
                                type="text"
                                id="start_date"
                                name="start_date"
                                class="calendar-input"
                                value="{{ old('start_date') }}"
                                placeholder="Selecciona fecha"
                                required
                            >
                        </div>

                        {{-- Fecha fin --}}
                        <div style="margin-bottom:1rem;">
                            <label style="font-size:0.8rem;color:#6B7280;">Fecha fin</label>
                            <input
                                type="text"
                                id="end_date"
                                name="end_date"
                                class="calendar-input"
                                value="{{ old('end_date') }}"
                                placeholder="Selecciona fecha"
                                required
                            >
                        </div>

                        @if(count($occupiedDates) > 0)
                            <div class="occupied-box">
                                <strong>Fechas ocupadas:</strong><br><br>
                                {{ implode(', ', $occupiedDates) }}
                            </div>
                        @endif

                        {{-- Términos y condiciones --}}
                        <hr class="ps-divider">
                        <div class="ps-section-label">📄 Términos y condiciones</div>

                        <div class="ps-terms-box">1. El arrendatario se compromete a usar el artículo de forma responsable y conforme a su finalidad.
2. El arrendatario debe devolver el artículo en la fecha acordada y en condiciones equivalentes a las de la entrega.
3. Cualquier daño, pérdida o uso indebido puede generar cobros adicionales y afectaciones sobre el depósito.
4. El arrendatario debe reportar incidentes o fallas relevantes a la plataforma de manera inmediata.
5. La confirmación del alquiler deja constancia de que el arrendatario conoce sus responsabilidades.</div>

                        <label class="ps-checkbox-row">
                            <input
                                type="checkbox"
                                name="accept_terms"
                                value="1"
                                {{ old('accept_terms') ? 'checked' : '' }}
                            >
                            <span>He leído y acepto los <strong>términos y condiciones</strong> del arriendo.</span>
                        </label>

                        <button type="submit" class="ps-btn-rent">
                            Solicitar arriendo
                        </button>

                        <p class="ps-note">
                            El arrendador tiene 48h para aprobar o rechazar tu solicitud.
                        </p>

                    </form>

                @else

                    <div class="ps-btn-rent disabled">No disponible</div>

                @endif

            </div>

            <div class="ps-info-card">
                <div class="ps-info-title">¿Por qué arrendar con nosotros?</div>
                <ul class="ps-info-list">
                    <li>✅ Variedad de productos.</li>
                    <li>✅ Arrendadores verificados.</li>
                    <li>✅ Reservas seguras.</li>
                    <li>✅ Soporte dedicado.</li>
                </ul>
            </div>

        </div>

    </div>

</div>

<script>
    const occupiedDates = @json($occupiedDates);

    flatpickr("#start_date", {
        minDate: "today",
        disable: occupiedDates,
        dateFormat: "Y-m-d",
        locale: { firstDayOfWeek: 1 }
    });

    flatpickr("#end_date", {
        minDate: "today",
        disable: occupiedDates,
        dateFormat: "Y-m-d",
        locale: { firstDayOfWeek: 1 }
    });
</script>

</x-app-layout>