<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .rq-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 3rem;
    }

    /* ── HEADER ── */
    .rq-header {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .rq-header::before {
        content: '';
        position: absolute;
        width: 350px; height: 350px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -120px; right: -60px;
    }

    .rq-header-inner {
        max-width: 1100px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .rq-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        color: rgba(255,255,255,0.6);
        margin-bottom: 1rem;
    }

    .rq-breadcrumb a {
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        transition: color 0.2s;
    }

    .rq-breadcrumb a:hover { color: white; }

    .rq-header-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }

    .rq-header-title span { color: #F7941D; }

    .rq-header-sub {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.7);
        margin-top: 0.35rem;
    }

    /* ── TABS + FILTROS ── */
    .rq-controls {
        max-width: 1100px;
        margin: 0 auto;
        padding: 1.5rem 1.5rem 0;
    }

    .rq-tabs {
        display: flex;
        gap: 0.5rem;
        background: white;
        border-radius: 14px;
        padding: 0.4rem;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 2px 12px rgba(26,95,168,0.07);
        width: fit-content;
    }

    .rq-tab {
        padding: 0.5rem 1.25rem;
        border-radius: 10px;
        font-size: 0.8125rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        text-decoration: none;
        color: #9CA3AF;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }

    .rq-tab:hover { color: #1A5FA8; }

    .rq-tab.active {
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
    }

    .rq-tab-count {
        padding: 0.1rem 0.5rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 800;
        background: rgba(255,255,255,0.2);
        color: inherit;
    }

    .rq-tab.active .rq-tab-count {
        background: rgba(255,255,255,0.25);
        color: white;
    }

    .rq-tab:not(.active) .rq-tab-count {
        background: #f0f6ff;
        color: #1A5FA8;
    }

    /* ── CARDS AREA ── */
    .rq-body {
        max-width: 1100px;
        margin: 1.5rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 1.5rem;
    }

    @media (max-width: 900px) {
        .rq-body { grid-template-columns: 1fr; }
        .rq-sidebar { display: none; }
    }

    /* ── REQUEST CARDS ── */
    .rq-list { display: flex; flex-direction: column; gap: 1rem; }

    .rq-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 20px rgba(26,95,168,0.05);
        overflow: hidden;
        transition: all 0.3s;
    }

    .rq-card:hover {
        border-color: #29ABE2;
        box-shadow: 0 8px 32px rgba(26,95,168,0.12);
    }

    .rq-card-top {
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .rq-user-avatar {
        width: 46px; height: 46px;
        border-radius: 50%;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        font-size: 0.875rem;
        font-weight: 900;
        font-family: 'Nunito', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .rq-user-info { flex: 1; min-width: 0; }

    .rq-user-name {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    .rq-user-email {
        font-size: 0.8rem;
        color: #9CA3AF;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rq-status-badge {
        padding: 0.3rem 0.875rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .rq-status-badge.pending  { background: #fffbeb; color: #d97706; border: 1px solid #fde68a; }
    .rq-status-badge.approved { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .rq-status-badge.rejected { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    .rq-request-date {
        font-size: 0.75rem;
        color: #D1D5DB;
        flex-shrink: 0;
        align-self: flex-start;
    }

    /* Product info strip */
    .rq-product-strip {
        padding: 0.875rem 1.5rem;
        background: #f8fbff;
        border-top: 1px solid #e8f0fb;
        border-bottom: 1px solid #e8f0fb;
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .rq-product-thumb {
        width: 48px; height: 48px;
        border-radius: 10px;
        background: linear-gradient(135deg, #f0f6ff, #e8f0fb);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        overflow: hidden;
        flex-shrink: 0;
    }

    .rq-product-thumb img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .rq-product-name {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    .rq-product-cat {
        font-size: 0.75rem;
        color: #9CA3AF;
    }

    .rq-product-details {
        display: flex;
        gap: 1.5rem;
        margin-left: auto;
        flex-wrap: wrap;
    }

    .rq-detail-item {
        text-align: right;
    }

    .rq-detail-label {
        font-size: 0.7rem;
        color: #9CA3AF;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .rq-detail-value {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    .rq-detail-value.price { color: #1A5FA8; }

    /* Actions */
    .rq-card-actions {
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .rq-message {
        font-size: 0.8rem;
        color: #6B7280;
        line-height: 1.5;
        font-style: italic;
        flex: 1;
        min-width: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rq-action-btns {
        display: flex;
        gap: 0.625rem;
        flex-shrink: 0;
    }

    .rq-btn-approve {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.625rem 1.25rem;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 0.8125rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
    }

    .rq-btn-approve:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(22,163,74,0.3);
    }

    .rq-btn-reject {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.625rem 1.25rem;
        background: white;
        color: #dc2626;
        border: 1.5px solid #fecaca;
        border-radius: 10px;
        font-size: 0.8125rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
    }

    .rq-btn-reject:hover {
        background: #fef2f2;
        border-color: #dc2626;
    }

    .rq-btn-view {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.625rem 1.25rem;
        background: #f0f6ff;
        color: #1A5FA8;
        border: 1.5px solid #e8f0fb;
        border-radius: 10px;
        font-size: 0.8125rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        text-decoration: none;
        transition: all 0.2s;
    }

    .rq-btn-view:hover {
        background: #e8f0fb;
        border-color: #1A5FA8;
    }

    .rq-resolved-label {
        font-size: 0.8rem;
        color: #9CA3AF;
        font-style: italic;
    }

    /* ── SIDEBAR STATS ── */
    .rq-sidebar {}

    .rq-summary-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 24px rgba(26,95,168,0.07);
        margin-bottom: 1.25rem;
    }

    .rq-summary-title {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 1.25rem;
    }

    .rq-summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.625rem 0;
        border-bottom: 1px solid #f0f6ff;
    }

    .rq-summary-row:last-child { border-bottom: none; }

    .rq-summary-left {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        font-size: 0.875rem;
        color: #6B7280;
    }

    .rq-summary-dot {
        width: 10px; height: 10px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .rq-summary-right {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 900;
        color: #1a2b4a;
    }

    .rq-policy-card {
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 20px;
        padding: 1.5rem;
        color: white;
    }

    .rq-policy-title {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        margin-bottom: 0.875rem;
    }

    .rq-policy-text {
        font-size: 0.8rem;
        opacity: 0.85;
        line-height: 1.6;
    }

    /* Empty */
    .rq-empty {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 20px;
        border: 1.5px dashed #E5E7EB;
    }

    .rq-empty-icon { font-size: 3rem; margin-bottom: 1rem; }

    .rq-empty-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 0.5rem;
    }

    .rq-empty p {
        font-size: 0.875rem;
        color: #9CA3AF;
    }
</style>

<div class="rq-wrapper">

    {{-- ── HEADER ── --}}
    <div class="rq-header">
        <div class="rq-header-inner">
            <div class="rq-breadcrumb">
                <a href="{{ route('arrendador') }}">Panel</a>
                <span>›</span>
                <span>Solicitudes de arriendo</span>
            </div>
            <div class="rq-header-title">
                Solicitudes de <span>arriendo</span>
            </div>
            <div class="rq-header-sub">Aprueba o rechaza las solicitudes de arrendatarios</div>
        </div>
    </div>

    {{-- ── TABS ── --}}
    <div class="rq-controls">
        <div class="rq-tabs">
            <a href="{{ route('requests.index', ['status' => 'pending']) }}"
               class="rq-tab {{ ($activeTab ?? 'pending') === 'pending' ? 'active' : '' }}">
                🕓 Pendientes
                <span class="rq-tab-count">{{ $counts['pending'] ?? 0 }}</span>
            </a>
            <a href="{{ route('requests.index', ['status' => 'approved']) }}"
               class="rq-tab {{ ($activeTab ?? '') === 'approved' ? 'active' : '' }}">
                ✅ Aprobadas
                <span class="rq-tab-count">{{ $counts['approved'] ?? 0 }}</span>
            </a>
            <a href="{{ route('requests.index', ['status' => 'rejected']) }}"
               class="rq-tab {{ ($activeTab ?? '') === 'rejected' ? 'active' : '' }}">
                ❌ Rechazadas
                <span class="rq-tab-count">{{ $counts['rejected'] ?? 0 }}</span>
            </a>
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="rq-body">

        {{-- ── REQUEST LIST ── --}}
        <div>
            @if(session('success'))
                <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a;border-radius:12px;
                            padding:0.875rem 1.25rem;font-size:0.875rem;font-weight:600;
                            display:flex;align-items:center;gap:0.5rem;margin-bottom:1rem;">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="rq-list">
                @forelse($requests ?? [] as $req)
                    <div class="rq-card">

                        {{-- Top: usuario + estado --}}
                        <div class="rq-card-top">
                            <div class="rq-user-avatar">
                                {{ strtoupper(substr($req->arrendatario->name ?? 'U', 0, 2)) }}
                            </div>
                            <div class="rq-user-info">
                                <div class="rq-user-name">{{ $req->arrendatario->name ?? 'Arrendatario' }}</div>
                                <div class="rq-user-email">{{ $req->arrendatario->email ?? '' }}</div>
                            </div>
                            <span class="rq-status-badge {{ $req->status ?? 'pending' }}">
                                @if(($req->status ?? 'pending') === 'pending')   🕓 Pendiente
                                @elseif($req->status === 'approved')             ✅ Aprobada
                                @else                                            ❌ Rechazada
                                @endif
                            </span>
                            <div class="rq-request-date">
                                {{ optional($req->created_at)->format('d/m/Y H:i') }}
                            </div>
                        </div>

                        {{-- Producto --}}
                        <div class="rq-product-strip">
                            <div class="rq-product-thumb">
                                @if($req->product->image_url ?? false)
                                    <img src="{{ $req->product->image_url }}" alt="">
                                @else
                                    @php
                                        $icons = ['💻','📷','🏕️','🎮','🛠️','🛵','🧳'];
                                        $name  = $req->product->name ?? '';
                                        echo $icons[abs(crc32($name)) % count($icons)];
                                    @endphp
                                @endif
                            </div>
                            <div>
                                <div class="rq-product-name">{{ $req->product->name ?? '—' }}</div>
                                @if($req->product->category ?? false)
                                    <div class="rq-product-cat">{{ ucfirst($req->product->category) }}</div>
                                @endif
                            </div>
                            <div class="rq-product-details">
                                <div class="rq-detail-item">
                                    <div class="rq-detail-label">Inicio</div>
                                    <div class="rq-detail-value">{{ optional($req->start_date)->format('d/m/Y') ?? '—' }}</div>
                                </div>
                                <div class="rq-detail-item">
                                    <div class="rq-detail-label">Fin</div>
                                    <div class="rq-detail-value">{{ optional($req->end_date)->format('d/m/Y') ?? '—' }}</div>
                                </div>
                                <div class="rq-detail-item">
                                    <div class="rq-detail-label">Total</div>
                                    <div class="rq-detail-value price">${{ number_format($req->total ?? 0, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Acciones --}}
                        <div class="rq-card-actions">
                            @if($req->message ?? false)
                                <div class="rq-message">"{{ $req->message }}"</div>
                            @else
                                <div class="rq-message"></div>
                            @endif

                            <div class="rq-action-btns">
                                @if(($req->status ?? 'pending') === 'pending')
                                    <form method="POST" action="{{ route('requests.reject', $req) }}" style="display:contents;">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="rq-btn-reject"
                                                onclick="return confirm('¿Confirmas el rechazo de esta solicitud?')">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Rechazar
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('requests.approve', $req) }}" style="display:contents;">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="rq-btn-approve">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Aprobar
                                        </button>
                                    </form>
                                @else
                                    <span class="rq-resolved-label">Ya resuelta</span>
                                    <a href="{{ route('requests.show', $req) }}" class="rq-btn-view">Ver detalle</a>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="rq-empty">
                        <div class="rq-empty-icon">
                            {{ ($activeTab ?? 'pending') === 'pending' ? '📭' : '🗂️' }}
                        </div>
                        <div class="rq-empty-title">
                            @if(($activeTab ?? 'pending') === 'pending')
                                Sin solicitudes pendientes
                            @else
                                No hay solicitudes aquí
                            @endif
                        </div>
                        <p>
                            @if(($activeTab ?? 'pending') === 'pending')
                                Cuando los arrendatarios soliciten tus productos, aparecerán aquí.
                            @else
                                Las solicitudes {{ $activeTab ?? '' }} aparecerán aquí.
                            @endif
                        </p>
                    </div>
                @endforelse
            </div>

            @if(isset($requests) && $requests instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div style="margin-top:1.5rem;">{{ $requests->links() }}</div>
            @endif
        </div>

        {{-- ── SIDEBAR ── --}}
        <div class="rq-sidebar">

            <div class="rq-summary-card">
                <div class="rq-summary-title">Resumen de solicitudes</div>

                <div class="rq-summary-row">
                    <div class="rq-summary-left">
                        <div class="rq-summary-dot" style="background:#F7941D;"></div>
                        Pendientes
                    </div>
                    <div class="rq-summary-right">{{ $counts['pending'] ?? 0 }}</div>
                </div>
                <div class="rq-summary-row">
                    <div class="rq-summary-left">
                        <div class="rq-summary-dot" style="background:#22c55e;"></div>
                        Aprobadas
                    </div>
                    <div class="rq-summary-right">{{ $counts['approved'] ?? 0 }}</div>
                </div>
                <div class="rq-summary-row">
                    <div class="rq-summary-left">
                        <div class="rq-summary-dot" style="background:#dc2626;"></div>
                        Rechazadas
                    </div>
                    <div class="rq-summary-right">{{ $counts['rejected'] ?? 0 }}</div>
                </div>
                <div class="rq-summary-row">
                    <div class="rq-summary-left" style="font-weight:700;color:#1a2b4a;">
                        Total
                    </div>
                    <div class="rq-summary-right" style="color:#1A5FA8;">
                        {{ ($counts['pending'] ?? 0) + ($counts['approved'] ?? 0) + ($counts['rejected'] ?? 0) }}
                    </div>
                </div>
            </div>

            <div class="rq-policy-card">
                <div class="rq-policy-title">📜 Recuerda</div>
                <div class="rq-policy-text">
                    Tienes hasta <strong>48 horas</strong> para responder cada solicitud.
                    Pasado ese tiempo, la solicitud se cancelará automáticamente y el
                    arrendatario podrá buscar otras opciones.<br><br>
                    Responder rápido mejora tu reputación en la plataforma.
                </div>
            </div>

        </div>

    </div>
</div>
</x-app-layout>