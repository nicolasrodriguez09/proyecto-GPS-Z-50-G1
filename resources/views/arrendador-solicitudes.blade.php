<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .sol-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 3rem;
    }

    /* ── PAGE HEADER ── */
    .sol-page-header {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .sol-page-header::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px; right: -80px;
        pointer-events: none;
    }

    .sol-page-header::after {
        content: '';
        position: absolute;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(247,148,29,0.1);
        bottom: -60px; left: 5%;
        pointer-events: none;
    }

    .sol-header-inner {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .sol-header-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(247,148,29,0.2);
        border: 1px solid rgba(247,148,29,0.4);
        border-radius: 50px;
        padding: 0.3rem 0.875rem;
        font-size: 0.7rem;
        font-weight: 700;
        color: #F7941D;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
    }

    .sol-header-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }

    .sol-header-title span { color: #F7941D; }

    .sol-header-subtitle {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.75);
        margin-top: 0.35rem;
    }

    .sol-header-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .sol-btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255,255,255,0.12);
        border: 1.5px solid rgba(255,255,255,0.3);
        color: white;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
        text-decoration: none;
        transition: all 0.2s;
    }

    .sol-btn-outline:hover {
        background: rgba(255,255,255,0.2);
    }

    /* ── STATS ── */
    .sol-stats-row {
        max-width: 1200px;
        margin: -1.5rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        position: relative;
        z-index: 2;
    }

    .sol-stat-card {
        background: white;
        border-radius: 18px;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 8px 30px rgba(26,95,168,0.1);
        border: 1.5px solid #e8f0fb;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .sol-stat-icon {
        width: 48px; height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .sol-stat-icon.orange { background: #fff7ed; }
    .sol-stat-icon.green  { background: #f0fdf4; }
    .sol-stat-icon.red    { background: #fff1f2; }
    .sol-stat-icon.blue   { background: #eff6ff; }

    .sol-stat-value {
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1a2b4a;
        line-height: 1;
    }

    .sol-stat-label {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin-top: 0.2rem;
    }

    /* ── BODY ── */
    .sol-body {
        max-width: 1200px;
        margin: 2rem auto 0;
        padding: 0 1.5rem;
    }

    /* ── FILTROS ── */
    .sol-filters {
        display: flex;
        gap: 0.625rem;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }

    .sol-filter-btn {
        padding: 0.5rem 1.125rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        border: 1.5px solid #e8f0fb;
        background: white;
        color: #6B7280;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .sol-filter-btn:hover,
    .sol-filter-btn.active {
        background: #1A5FA8;
        border-color: #1A5FA8;
        color: white;
    }

    .sol-filter-badge {
        background: rgba(255,255,255,0.25);
        border-radius: 50px;
        padding: 0.1rem 0.45rem;
        font-size: 0.7rem;
    }

    .sol-filter-btn:not(.active) .sol-filter-badge {
        background: #f0f6ff;
        color: #1A5FA8;
    }

    /* ── SECTION TITLE ── */
    .sol-section-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 1.25rem;
    }

    /* ── CARDS LISTA ── */
    .sol-list {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .sol-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 20px rgba(26,95,168,0.06);
        overflow: hidden;
        transition: all 0.2s;
    }

    .sol-card:hover {
        border-color: #29ABE2;
        box-shadow: 0 8px 32px rgba(26,95,168,0.12);
        transform: translateY(-1px);
    }

    /* Franja de color superior según estado */
    .sol-card-bar {
        height: 4px;
        width: 100%;
    }
    .sol-card-bar.pending  { background: linear-gradient(90deg, #F7941D, #fbbf24); }
    .sol-card-bar.approved { background: linear-gradient(90deg, #22c55e, #16a34a); }
    .sol-card-bar.rejected { background: linear-gradient(90deg, #f43f5e, #e11d48); }

    .sol-card-inner {
        padding: 1.5rem;
        display: grid;
        gap: 1.25rem;
        grid-template-columns: 1fr auto;
    }

    @media (max-width: 768px) {
        .sol-card-inner { grid-template-columns: 1fr; }
    }

    /* Header de la card */
    .sol-card-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }

    .sol-card-product-name {
        font-family: 'Nunito', sans-serif;
        font-size: 1.0625rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    /* Badge de estado */
    .sol-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.3rem 0.875rem;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .sol-badge.pending  { background: #FFF7ED; color: #D97706; border: 1px solid #FDE68A; }
    .sol-badge.approved { background: #F0FDF4; color: #16A34A; border: 1px solid #BBF7D0; }
    .sol-badge.rejected { background: #FFF1F2; color: #E11D48; border: 1px solid #FECDD3; }

    .sol-badge-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .sol-badge.pending  .sol-badge-dot { background: #D97706; }
    .sol-badge.approved .sol-badge-dot { background: #16A34A; }
    .sol-badge.rejected .sol-badge-dot { background: #E11D48; }

    /* Imagen del producto */
    .sol-product-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 1rem;
        border: 1px solid #e8f0fb;
    }

    /* Grid de info chips */
    .sol-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 0.75rem;
    }

    .sol-info-chip {
        background: #f8fbff;
        border: 1px solid #e8f0fb;
        border-radius: 14px;
        padding: 0.875rem 1rem;
    }

    .sol-info-chip-label {
        font-size: 0.65rem;
        font-weight: 700;
        color: #9CA3AF;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 0.375rem;
    }

    .sol-info-chip-value {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
        line-height: 1.3;
    }

    .sol-info-chip-sub {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin-top: 0.2rem;
    }

    /* Avatar iniciales */
    .sol-avatar {
        width: 30px; height: 30px;
        border-radius: 50%;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        font-size: 0.7rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        vertical-align: middle;
        margin-right: 0.375rem;
    }

    /* Columna derecha: acciones */
    .sol-card-actions {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.625rem;
        min-width: 180px;
    }

    @media (max-width: 768px) {
        .sol-card-actions { flex-direction: row; min-width: 0; }
    }

    .sol-approve-btn {
        width: 100%;
        padding: 0.75rem 1rem;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .sol-approve-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(22,163,74,0.35);
    }

    .sol-reject-btn {
        width: 100%;
        padding: 0.75rem 1rem;
        background: white;
        color: #E11D48;
        border: 1.5px solid #FECDD3;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .sol-reject-btn:hover {
        background: #FFF1F2;
        border-color: #E11D48;
        transform: translateY(-1px);
    }

    .sol-status-box {
        padding: 0.875rem 1rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
        text-align: center;
        line-height: 1.5;
    }

    .sol-status-box.approved {
        background: #F0FDF4;
        border: 1.5px solid #BBF7D0;
        color: #16A34A;
    }

    .sol-status-box.rejected {
        background: #FFF1F2;
        border: 1.5px solid #FECDD3;
        color: #E11D48;
    }

    /* ── VACÍO ── */
    .sol-empty {
        background: white;
        border-radius: 20px;
        border: 2px dashed #e8f0fb;
        padding: 4rem 2rem;
        text-align: center;
    }

    .sol-empty-icon {
        font-size: 3.5rem;
        margin-bottom: 1rem;
    }

    .sol-empty-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 0.5rem;
    }

    .sol-empty-sub {
        font-size: 0.875rem;
        color: #9CA3AF;
    }

    /* ── FLASH ── */
    .sol-flash {
        border-radius: 14px;
        padding: 1rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.625rem;
    }

    .sol-flash.success {
        background: #F0FDF4;
        border: 1px solid #BBF7D0;
        color: #16A34A;
    }

    .sol-flash.error {
        background: #FFF1F2;
        border: 1px solid #FECDD3;
        color: #E11D48;
    }
</style>

<div class="sol-wrapper">

    {{-- ── PAGE HEADER ── --}}
    <div class="sol-page-header">
        <div class="sol-header-inner">
            <div>
                <div class="sol-header-label">🔔 Panel Arrendador</div>
                <div class="sol-header-title">
                    Solicitudes <span>recibidas</span>
                </div>
                <div class="sol-header-subtitle">Aprueba o rechaza las solicitudes para concretar el negocio</div>
            </div>
            <div class="sol-header-actions">
                <a href="{{ route('arrendador') }}" class="sol-btn-outline">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Volver al panel
                </a>
            </div>
        </div>
    </div>

    {{-- ── STATS ── --}}
    @php
        $total    = $transactions->count();
        $pending  = $transactions->where('status', 'pendiente')->count();
        $approved = $transactions->where('status', 'aprobada')->count();
        $rejected = $transactions->where('status', 'rechazada')->count();
    @endphp

    <div class="sol-stats-row">
        <div class="sol-stat-card">
            <div class="sol-stat-icon blue">📋</div>
            <div>
                <div class="sol-stat-value">{{ $total }}</div>
                <div class="sol-stat-label">Total solicitudes</div>
            </div>
        </div>
        <div class="sol-stat-card">
            <div class="sol-stat-icon orange">⏳</div>
            <div>
                <div class="sol-stat-value">{{ $pending }}</div>
                <div class="sol-stat-label">Pendientes</div>
            </div>
        </div>
        <div class="sol-stat-card">
            <div class="sol-stat-icon green">✅</div>
            <div>
                <div class="sol-stat-value">{{ $approved }}</div>
                <div class="sol-stat-label">Aprobadas</div>
            </div>
        </div>
        <div class="sol-stat-card">
            <div class="sol-stat-icon red">❌</div>
            <div>
                <div class="sol-stat-value">{{ $rejected }}</div>
                <div class="sol-stat-label">Rechazadas</div>
            </div>
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="sol-body">

        {{-- Flash --}}
        @if(session('success'))
            <div class="sol-flash success">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="sol-flash error">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v4m0 4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Filtros --}}
        <div class="sol-filters">
            <span class="sol-filter-btn active">
                Todas
                <span class="sol-filter-badge">{{ $total }}</span>
            </span>
            <span class="sol-filter-btn" data-filter="pendiente">
                ⏳ Pendientes
                <span class="sol-filter-badge">{{ $pending }}</span>
            </span>
            <span class="sol-filter-btn" data-filter="aprobada">
                ✅ Aprobadas
                <span class="sol-filter-badge">{{ $approved }}</span>
            </span>
            <span class="sol-filter-btn" data-filter="rechazada">
                ❌ Rechazadas
                <span class="sol-filter-badge">{{ $rejected }}</span>
            </span>
        </div>

        <div class="sol-section-title">
            Gestiona las solicitudes de alquiler
        </div>

        @if ($transactions->isEmpty())

            <div class="sol-empty">
                <div class="sol-empty-icon">📭</div>
                <div class="sol-empty-title">Aún no has recibido solicitudes</div>
                <p class="sol-empty-sub">Cuando un arrendatario confirme una reserva, la verás reflejada aquí.</p>
            </div>

        @else

            <div class="sol-list" id="sol-list">

                @foreach ($transactions as $transaction)

                    <div class="sol-card" data-status="{{ $transaction->status }}">

                        {{-- Franja de color --}}
                        <div class="sol-card-bar {{ $transaction->status }}"></div>

                        <div class="sol-card-inner">

                            {{-- IZQUIERDA --}}
                            <div>
                                {{-- Header --}}
                                <div class="sol-card-header">
                                    <div class="sol-card-product-name">{{ $transaction->item_name }}</div>

                                    <span class="sol-badge {{ $transaction->status }}">
                                        <span class="sol-badge-dot"></span>
                                        @if ($transaction->status === 'pendiente')  Pendiente
                                        @elseif ($transaction->status === 'aprobada') Aprobada
                                        @else Rechazada
                                        @endif
                                    </span>
                                </div>

                                {{-- Imagen del producto --}}
                                @if ($transaction->product && $transaction->product->image)
                                    <img
                                        src="{{ Storage::url($transaction->product->image) }}"
                                        alt="{{ $transaction->item_name }}"
                                        class="sol-product-img"
                                    >
                                @endif

                                {{-- Info chips --}}
                                <div class="sol-info-grid">

                                    {{-- Solicitante --}}
                                    <div class="sol-info-chip">
                                        <div class="sol-info-chip-label">Solicitante</div>
                                        <div class="sol-info-chip-value">
                                            <span class="sol-avatar">
                                                {{ strtoupper(substr($transaction->user->name ?? 'U', 0, 2)) }}
                                            </span>
                                            {{ $transaction->user->name }}
                                        </div>
                                        <div class="sol-info-chip-sub">{{ $transaction->user->email }}</div>
                                        @if ($transaction->user->document)
                                            <div class="sol-info-chip-sub">Doc: {{ $transaction->user->document }}</div>
                                        @endif
                                        @if ($transaction->user->phone)
                                            <div class="sol-info-chip-sub">Tel: {{ $transaction->user->phone }}</div>
                                        @endif
                                    </div>

                                    {{-- Fechas --}}
                                    <div class="sol-info-chip">
                                        <div class="sol-info-chip-label">Período</div>
                                        <div class="sol-info-chip-value">
                                            {{ $transaction->starts_at->format('d/m/Y') }}
                                        </div>
                                        <div class="sol-info-chip-sub">
                                            hasta {{ $transaction->ends_at->format('d/m/Y') }}
                                        </div>
                                        <div class="sol-info-chip-sub">{{ $transaction->rental_days }} días</div>
                                    </div>

                                    {{-- Valor --}}
                                    <div class="sol-info-chip">
                                        <div class="sol-info-chip-label">Valor total</div>
                                        <div class="sol-info-chip-value" style="color:#1A5FA8;">
                                            ${{ number_format($transaction->total_amount, 0, ',', '.') }}
                                        </div>
                                        <div class="sol-info-chip-sub">Reserva #{{ $transaction->id }}</div>
                                    </div>

                                    {{-- Aceptación --}}
                                    <div class="sol-info-chip">
                                        <div class="sol-info-chip-label">Términos aceptados</div>
                                        <div class="sol-info-chip-value">
                                            {{ $transaction->accepted_terms_at->format('d/m/Y') }}
                                        </div>
                                        <div class="sol-info-chip-sub">
                                            {{ $transaction->accepted_terms_at->format('H:i') }}
                                            · v{{ $transaction->terms_version }}
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- DERECHA: Acciones --}}
                            <div class="sol-card-actions">

                                @if ($transaction->status === 'pendiente')

                                    <form
                                        method="POST"
                                        action="{{ route('landlord.requests.update', $transaction) }}"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="aprobada">
                                        <button type="submit" class="sol-approve-btn">
                                            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Aprobar solicitud
                                        </button>
                                    </form>

                                    <form
                                        method="POST"
                                        action="{{ route('landlord.requests.update', $transaction) }}"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="rechazada">
                                        <button type="submit" class="sol-reject-btn">
                                            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Rechazar solicitud
                                        </button>
                                    </form>

                                @elseif ($transaction->status === 'aprobada')

                                    <div class="sol-status-box approved">
                                        ✅ Solicitud aprobada
                                    </div>

                                @elseif ($transaction->status === 'rechazada')

                                    <div class="sol-status-box rejected">
                                        ❌ Solicitud rechazada
                                    </div>

                                @endif

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        @endif

    </div>
</div>

<script>
    // Filtros por estado
    document.querySelectorAll('.sol-filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.sol-filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;
            document.querySelectorAll('.sol-card').forEach(card => {
                if (!filter || card.dataset.status === filter) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>

</x-app-layout>