<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .ps-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 4rem;
    }

    /* ── HERO ── */
    .ps-hero {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2rem 2rem 5rem;
        position: relative;
        overflow: hidden;
    }

    .ps-hero::after {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px; right: -80px;
        pointer-events: none;
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
        transition: color 0.2s;
    }

    .ps-back:hover { color: white; }
    .ps-back svg { width: 16px; height: 16px; }

    .ps-hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }

    .ps-hero-sub {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.7);
        margin-top: 0.35rem;
    }

    /* ── BODY ── */
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

    /* ── CARD ── */
    .ps-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 8px 30px rgba(26,95,168,0.08);
        overflow: hidden;
    }

    /* Imagen del producto */
    .ps-img {
        width: 100%;
        height: 300px;
        background: linear-gradient(135deg, #f0f6ff, #e8f0fb);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        position: relative;
        overflow: hidden;
    }

    .ps-img img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .ps-available-badge {
        position: absolute;
        top: 1rem; left: 1rem;
        padding: 0.3rem 0.875rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .ps-available-badge.yes { background: #f0fdf4; color: #16a34a; border: 1.5px solid #bbf7d0; }
    .ps-available-badge.no  { background: #fef2f2; color: #dc2626; border: 1.5px solid #fecaca; }

    .ps-card-body {
        padding: 1.75rem;
    }

    .ps-product-name {
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1a2b4a;
        margin-bottom: 0.75rem;
    }

    .ps-meta-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .ps-meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.875rem;
        color: #6B7280;
    }

    .ps-meta-item svg { width: 16px; height: 16px; color: #29ABE2; flex-shrink: 0; }

    .ps-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #9CA3AF;
        margin-bottom: 0.5rem;
    }

    .ps-description {
        font-size: 0.9375rem;
        color: #374151;
        line-height: 1.7;
    }

    /* ── SIDEBAR ── */
    .ps-sidebar {}

    .ps-price-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 8px 30px rgba(26,95,168,0.08);
        padding: 1.75rem;
    }

    .ps-price-label {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #9CA3AF;
        margin-bottom: 0.25rem;
    }

    .ps-price-amount {
        font-family: 'Nunito', sans-serif;
        font-size: 2rem;
        font-weight: 900;
        color: #1A5FA8;
        line-height: 1;
    }

    .ps-price-amount span {
        font-size: 0.9rem;
        font-weight: 500;
        color: #9CA3AF;
        font-family: 'Poppins', sans-serif;
    }

    .ps-divider {
        border: none;
        border-top: 1px solid #f0f6ff;
        margin: 1.25rem 0;
    }

    .ps-detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.875rem;
        margin-bottom: 0.75rem;
    }

    .ps-detail-row .label { color: #9CA3AF; }
    .ps-detail-row .value { font-weight: 600; color: #1a2b4a; }

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
        font-family: 'Nunito', sans-serif;
        font-size: 0.875rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ps-owner-name {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    .ps-owner-label {
        font-size: 0.75rem;
        color: #9CA3AF;
    }

    .ps-btn-rent {
        display: block;
        width: 100%;
        padding: 0.875rem;
        background: linear-gradient(135deg, #F7941D, #e07b0a);
        color: white;
        border: none;
        border-radius: 14px;
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        text-align: center;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .ps-btn-rent:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(247,148,29,0.4);
    }

    .ps-btn-rent svg { width: 18px; height: 18px; }

    .ps-btn-rent.disabled {
        background: #E5E7EB;
        color: #9CA3AF;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .ps-note {
        font-size: 0.75rem;
        color: #9CA3AF;
        text-align: center;
        margin-top: 0.75rem;
        line-height: 1.5;
    }

    /* Info card adicional */
    .ps-info-card {
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 20px;
        padding: 1.5rem;
        margin-top: 1.25rem;
        color: white;
    }

    .ps-info-title {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
    }

    .ps-info-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .ps-info-list li {
        font-size: 0.8rem;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        opacity: 0.9;
        line-height: 1.5;
    }

    .ps-info-list li::before {
        content: '✦';
        color: #F7941D;
        flex-shrink: 0;
        font-size: 0.65rem;
        margin-top: 0.2rem;
    }
</style>

<div class="ps-wrapper">

    {{-- ── HERO ── --}}
    <div class="ps-hero">
        <div class="ps-hero-inner">
            <a href="{{ url('/arrendatario') }}" class="ps-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al marketplace
            </a>
            <div class="ps-hero-title">{{ $product->name }}</div>
            <div class="ps-hero-sub">
                📍 {{ $product->city }}, {{ $product->department }}
            </div>
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="ps-body">

        {{-- ── COLUMNA PRINCIPAL ── --}}
        <div>
            <div class="ps-card">

                {{-- Imagen --}}
                <div class="ps-img">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                    @else
                        @php
                            $icons = ['💻','📷','🏕️','🎮','🛠️','🛵','🧳','📺','🎸','⛺'];
                            echo $icons[abs(crc32($product->name)) % count($icons)];
                        @endphp
                    @endif

                    <span class="ps-available-badge {{ $product->available ? 'yes' : 'no' }}">
                        {{ $product->available ? '✓ Disponible' : '✗ No disponible' }}
                    </span>
                </div>

                {{-- Detalle --}}
                <div class="ps-card-body">
                    <div class="ps-product-name">{{ $product->name }}</div>

                    <div class="ps-meta-row">
                        <div class="ps-meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $product->city }}, {{ $product->department }}
                        </div>
                        <div class="ps-meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Publicado {{ $product->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="ps-section-label">Descripción</div>
                    <p class="ps-description">{{ $product->description }}</p>
                </div>
            </div>
        </div>

        {{-- ── SIDEBAR ── --}}
        <div class="ps-sidebar">

            <div class="ps-price-card">

                {{-- Precio --}}
                <div class="ps-price-label">Precio por día</div>
                <div class="ps-price-amount">
                    ${{ number_format((float) $product->price, 0, ',', '.') }}
                    <span>/ día</span>
                </div>

                <hr class="ps-divider">

                {{-- Detalles --}}
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
                    <span class="value" style="color: {{ $product->available ? '#16a34a' : '#dc2626' }}">
                        {{ $product->available ? 'Disponible' : 'No disponible' }}
                    </span>
                </div>

                <hr class="ps-divider">

                {{-- Arrendador --}}
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

                {{-- Botón --}}
                @if($product->available)
                    <a href="{{ route('rentals.create', ['product' => $product->id]) }}" class="ps-btn-rent">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                        </svg>
                        Solicitar arriendo
                    </a>
                    <p class="ps-note">El arrendador tiene 48h para aprobar o rechazar tu solicitud.</p>
                @else
                    <div class="ps-btn-rent disabled">No disponible</div>
                @endif

            </div>

            {{-- Tips --}}
            <div class="ps-info-card">
                <div class="ps-info-title">💡 Antes de solicitar</div>
                <ul class="ps-info-list">
                    <li>Verifica que las fechas que necesitas estén disponibles.</li>
                    <li>El depósito se devuelve al retornar el artículo en buen estado.</li>
                    <li>Coordina la entrega directamente con el arrendador una vez aprobada.</li>
                </ul>
            </div>

        </div>
    </div>

</div>
</x-app-layout>