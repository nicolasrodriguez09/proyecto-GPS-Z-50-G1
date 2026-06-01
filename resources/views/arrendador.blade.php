<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .ar-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 3rem;
    }

    /* ── PAGE HEADER ── */
    .ar-page-header {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .ar-page-header::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px; right: -80px;
        pointer-events: none;
    }

    .ar-page-header::after {
        content: '';
        position: absolute;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(247,148,29,0.1);
        bottom: -60px; left: 5%;
        pointer-events: none;
    }

    .ar-header-inner {
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

    .ar-header-label {
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

    .ar-header-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }

    .ar-header-title span { color: #F7941D; }

    .ar-header-subtitle {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.75);
        margin-top: 0.35rem;
    }

    .ar-header-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .ar-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: #1A5FA8;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        text-decoration: none;
        transition: all 0.2s;
    }

    .ar-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .ar-btn-outline {
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

    .ar-btn-outline:hover {
        background: rgba(255,255,255,0.2);
    }

    /* ── STATS ── */
    .ar-stats-row {
        max-width: 1200px;
        margin: -1.5rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        position: relative;
        z-index: 2;
    }

    .ar-stat-card {
        background: white;
        border-radius: 18px;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 8px 30px rgba(26,95,168,0.1);
        border: 1.5px solid #e8f0fb;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .ar-stat-icon {
        width: 48px; height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .ar-stat-icon.blue   { background: #eff6ff; }
    .ar-stat-icon.orange { background: #fff7ed; }
    .ar-stat-icon.green  { background: #f0fdf4; }
    .ar-stat-icon.purple { background: #faf5ff; }

    .ar-stat-value {
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1a2b4a;
        line-height: 1;
    }

    .ar-stat-label {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin-top: 0.2rem;
    }

    /* ── BODY ── */
    .ar-body {
        max-width: 1200px;
        margin: 2rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 1.5rem;
    }

    @media (max-width: 1024px) {
        .ar-body { grid-template-columns: 1fr; }
    }

    /* ── PUBLICACIONES ── */
    .ar-section-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ar-section-link {
        font-size: 0.8rem;
        color: #29ABE2;
        font-weight: 600;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
    }

    .ar-products-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .ar-product-row {
        background: white;
        border-radius: 16px;
        padding: 1.25rem;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 2px 12px rgba(26,95,168,0.05);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.2s;
    }

    .ar-product-row:hover {
        border-color: #29ABE2;
        box-shadow: 0 6px 24px rgba(26,95,168,0.1);
    }

    .ar-product-thumb {
        width: 64px; height: 64px;
        border-radius: 12px;
        background: linear-gradient(135deg, #f0f6ff, #e8f0fb);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        flex-shrink: 0;
        overflow: hidden;
    }

    .ar-product-thumb img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .ar-product-info { flex: 1; min-width: 0; }

    .ar-product-info-name {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ar-product-info-meta {
        font-size: 0.8rem;
        color: #9CA3AF;
        margin-top: 0.2rem;
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .ar-product-info-meta span {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .ar-status-pill {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .ar-status-pill.active    { background: #f0fdf4; color: #16a34a; }
    .ar-status-pill.pending   { background: #fffbeb; color: #d97706; }
    .ar-status-pill.inactive  { background: #f9fafb; color: #9CA3AF; }

    .ar-product-price {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 900;
        color: #1A5FA8;
        white-space: nowrap;
    }

    .ar-product-actions {
        display: flex;
        gap: 0.5rem;
        flex-shrink: 0;
    }

    .ar-icon-btn {
        width: 34px; height: 34px;
        border-radius: 9px;
        border: 1.5px solid #E5E7EB;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #6B7280;
        text-decoration: none;
        transition: all 0.2s;
    }

    .ar-icon-btn:hover {
        border-color: #1A5FA8;
        color: #1A5FA8;
        background: #f0f6ff;
    }

    .ar-icon-btn svg { width: 16px; height: 16px; }

    .ar-empty-list {
        background: white;
        border-radius: 16px;
        padding: 3rem 2rem;
        text-align: center;
        border: 1.5px dashed #E5E7EB;
    }

    .ar-empty-list p {
        font-size: 0.875rem;
        color: #9CA3AF;
        margin-top: 0.5rem;
    }

    /* ── SIDEBAR: Solicitudes recientes ── */
    .ar-sidebar {}

    .ar-requests-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 24px rgba(26,95,168,0.07);
    }

    .ar-request-item {
        padding: 1rem 0;
        border-bottom: 1px solid #f0f6ff;
    }

    .ar-request-item:last-child { border-bottom: none; }

    .ar-request-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 0.5rem;
        margin-bottom: 0.625rem;
    }

    .ar-request-user {
        display: flex;
        align-items: center;
        gap: 0.625rem;
    }

    .ar-request-avatar {
        width: 34px; height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        font-size: 0.75rem;
        font-weight: 800;
        font-family: 'Nunito', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ar-request-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1a2b4a;
        font-family: 'Nunito', sans-serif;
    }

    .ar-request-product {
        font-size: 0.75rem;
        color: #9CA3AF;
    }

    .ar-request-date {
        font-size: 0.7rem;
        color: #D1D5DB;
        white-space: nowrap;
    }

    .ar-request-detail {
        font-size: 0.78rem;
        color: #6B7280;
        margin-bottom: 0.875rem;
        line-height: 1.5;
    }

    .ar-request-actions {
        display: flex;
        gap: 0.5rem;
    }

    .ar-approve-btn {
        flex: 1;
        padding: 0.5rem;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        border: none;
        border-radius: 9px;
        font-size: 0.78rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }

    .ar-approve-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(22,163,74,0.3);
    }

    .ar-reject-btn {
        flex: 1;
        padding: 0.5rem;
        background: white;
        color: #EF4444;
        border: 1.5px solid #FEE2E2;
        border-radius: 9px;
        font-size: 0.78rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }

    .ar-reject-btn:hover {
        background: #FEF2F2;
        border-color: #EF4444;
    }

    .ar-view-all-link {
        display: block;
        text-align: center;
        margin-top: 1.25rem;
        font-size: 0.8125rem;
        font-weight: 700;
        color: #1A5FA8;
        text-decoration: none;
        font-family: 'Nunito', sans-serif;
        padding: 0.625rem;
        border-radius: 10px;
        border: 1.5px solid #e8f0fb;
        transition: all 0.2s;
    }

    .ar-view-all-link:hover {
        background: #f0f6ff;
        border-color: #1A5FA8;
    }

    /* Tipss card */
    .ar-tips-card {
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 20px;
        padding: 1.5rem;
        margin-top: 1.5rem;
        color: white;
    }

    .ar-tips-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
    }

    .ar-tips-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .ar-tips-list li {
        font-size: 0.8rem;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        opacity: 0.9;
        line-height: 1.5;
    }

    .ar-tips-list li::before {
        content: '✦';
        color: #F7941D;
        flex-shrink: 0;
        font-size: 0.7rem;
        margin-top: 0.15rem;
    }
</style>

<div class="ar-wrapper">

    {{-- ── PAGE HEADER ── --}}
    <div class="ar-page-header">
        <div class="ar-header-inner">
            <div>
                <div class="ar-header-label">📋 Panel Arrendador</div>
                <div class="ar-header-title">
                    Gestiona tus <span>publicaciones</span>
                </div>
                <div class="ar-header-subtitle">Revisa solicitudes, edita productos y monitorea tu actividad</div>
            </div>
            <div class="ar-header-actions">
                <a href="{{ route('products.create') }}" class="ar-btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nueva publicación
                </a>
                <a href="{{ route('products.index') }}" class="ar-btn-outline">
                    Ver todas
                </a>
            </div>
        </div>
    </div>

    {{-- ── STATS ROW ── --}}
    <div class="ar-stats-row">
        <div class="ar-stat-card">
            <div class="ar-stat-icon blue">📦</div>
            <div>
                <div class="ar-stat-value">{{ $products->total() ?? 0 }}</div>
                <div class="ar-stat-label">Publicaciones activas</div>
            </div>
        </div>
        <div class="ar-stat-card">
            <div class="ar-stat-icon orange">🔔</div>
            <div>
                <div class="ar-stat-value">{{ $pendingRequests ?? 0 }}</div>
                <div class="ar-stat-label">Solicitudes pendientes</div>
            </div>
        </div>
        <div class="ar-stat-card">
            <div class="ar-stat-icon green">✅</div>
            <div>
                <div class="ar-stat-value">{{ $approvedRequests ?? 0 }}</div>
                <div class="ar-stat-label">Arriendos aprobados</div>
            </div>
        </div>
        <div class="ar-stat-card">
            <div class="ar-stat-icon purple">💰</div>
            <div>
                <div class="ar-stat-value">${{ number_format($totalEarnings ?? 0, 0, ',', '.') }}</div>
                <div class="ar-stat-label">Ingresos este mes</div>
            </div>
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="ar-body">

        {{-- ── PUBLICACIONES ── --}}
        <div>
            <div class="ar-section-title">
                Mis publicaciones
                <a href="{{ route('products.index') }}" class="ar-section-link">Ver todas →</a>
            </div>

            <div class="ar-products-list">
                @forelse($products as $product)
                    <div class="ar-product-row">
                        <div class="ar-product-thumb">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                                @php
                                    $icons = ['💻','📷','🏕️','🎮','🛠️','🛵','🧳','📺'];
                                    echo $icons[abs(crc32($product->name)) % count($icons)];
                                @endphp
                            @endif
                        </div>

                        <div class="ar-product-info">
                            <div class="ar-product-info-name">{{ $product->name }}</div>
                            <div class="ar-product-info-meta">
                                @if($product->city)
                                    <span>📍 {{ $product->city }}</span>
                                @endif
                            </div>
                        </div>

                        <span class="ar-status-pill active">Activo</span>

                        <div class="ar-product-price">
                            ${{ number_format((float) $product->price, 0, ',', '.') }}/día
                        </div>

                        <div class="ar-product-actions">
                            <a href="{{ route('products.edit', $product) }}" class="ar-icon-btn" title="Editar">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="ar-empty-list">
                        <div style="font-size:2.5rem;">📭</div>
                        <p>Aún no tienes publicaciones.</p>
                        <a href="{{ route('products.create') }}" class="ar-btn-primary" style="display:inline-flex;margin-top:1rem;">
                            Crear mi primera publicación
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- ── SIDEBAR ── --}}
        <div class="ar-sidebar">

            {{-- Solicitudes recientes --}}
            <div class="ar-requests-card">
                <div class="ar-section-title" style="margin-bottom:0.5rem;">
                    Solicitudes recientes
                    @if(isset($pendingRequests) && $pendingRequests > 0)
                        <span style="background:#FFF7ED;color:#F7941D;font-size:0.7rem;font-weight:700;
                                     padding:0.2rem 0.6rem;border-radius:50px;font-family:'Nunito',sans-serif;">
                            {{ $pendingRequests }} nuevas
                        </span>
                    @endif
                </div>

                @forelse($recentRequests ?? [] as $req)
                    <div class="ar-request-item">
                        <div class="ar-request-top">
                            <div class="ar-request-user">
                                <div class="ar-request-avatar">
                                    {{ strtoupper(substr($req->user->name ?? 'U', 0, 2)) }}
                                </div>
                                <div>
                                    <div class="ar-request-name">{{ $req->user->name ?? 'Arrendatario' }}</div>
                                    <div class="ar-request-product">{{ $req->item_name ?? '—' }}</div>
                                </div>
                            </div>
                            <div class="ar-request-date">{{ optional($req->created_at)->diffForHumans() }}</div>
                        </div>
                        <div class="ar-request-detail">
                            Del {{ optional($req->starts_at)->format('d/m') }}
                            al {{ optional($req->ends_at)->format('d/m/Y') }}
                            · ${{ number_format($req->total_amount ?? 0, 0, ',', '.') }}
                        </div>
                        <div class="ar-request-actions">
                            <form method="POST" action="{{ route('landlord.requests.update', $req) }}" style="flex:1;">
                                @csrf @method('PATCH')
                                <input type="hidden" name="decision" value="aprobada">
                                <button type="submit" class="ar-approve-btn">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Aprobar
                                </button>
                            </form>
                            <form method="POST" action="{{ route('landlord.requests.update', $req) }}" style="flex:1;">
                                @csrf @method('PATCH')
                                <input type="hidden" name="decision" value="rechazada">
                                <button type="submit" class="ar-reject-btn">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Rechazar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div style="text-align:center;padding:2rem 0;color:#9CA3AF;font-size:0.875rem;">
                        <div style="font-size:2rem;margin-bottom:0.5rem;">🕓</div>
                        Sin solicitudes pendientes
                    </div>
                @endforelse

                <a href="{{ route('landlord.requests.index') }}" class="ar-view-all-link">
                    Ver todas las solicitudes →
                </a>
            </div>

            {{-- Tips --}}
            <div class="ar-tips-card">
                <div class="ar-tips-title">💡 Consejos para arrendadores</div>
                <ul class="ar-tips-list">
                    <li>Agrega fotos claras para atraer más arrendatarios.</li>
                    <li>Responde las solicitudes dentro de 24 horas.</li>
                    <li>Describe el estado actual del artículo con detalle.</li>
                    <li>Fija un precio competitivo revisando publicaciones similares.</li>
                </ul>
            </div>
        </div>

    </div>
</div>
</x-app-layout>