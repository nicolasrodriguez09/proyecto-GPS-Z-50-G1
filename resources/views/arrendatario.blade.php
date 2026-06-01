<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .at-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
    }

    /* ── HERO SEARCH BAR ── */
    .at-hero {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2.5rem 2rem 4rem;
        position: relative;
        overflow: hidden;
    }

    .at-hero::after {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -200px; right: -100px;
        pointer-events: none;
    }

    .at-hero-inner {
        max-width: 820px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .at-hero-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(247,148,29,0.2);
        border: 1px solid rgba(247,148,29,0.4);
        border-radius: 50px;
        padding: 0.3rem 0.875rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: #F7941D;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .at-hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.5rem, 4vw, 2.25rem);
        font-weight: 900;
        color: white;
        margin-bottom: 1.75rem;
        line-height: 1.2;
    }

    .at-hero-title span { color: #F7941D; }

    /* Search box */
    .at-search-box {
        background: white;
        border-radius: 20px;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 20px 60px rgba(26,95,168,0.25);
    }

    .at-search-icon {
        padding: 0 0.75rem;
        color: #9CA3AF;
        flex-shrink: 0;
    }

    .at-search-input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 0.9375rem;
        font-family: 'Poppins', sans-serif;
        color: #111827;
        background: transparent;
        padding: 0.75rem 0;
    }

    .at-search-input::placeholder { color: #D1D5DB; }

    .at-search-btn {
        padding: 0.75rem 1.75rem;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        border: none;
        border-radius: 14px;
        font-size: 0.875rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .at-search-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26,95,168,0.35);
    }

    /* ── LAYOUT PRINCIPAL ── */
    .at-body {
        max-width: 1280px;
        margin: 0 auto;
        padding: 2rem 1.5rem;
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 2rem;
        margin-top: -2rem; /* overlap con hero */
    }

    @media (max-width: 900px) {
        .at-body { grid-template-columns: 1fr; }
        .at-filters-panel { display: none; }
        .at-filters-panel.open { display: block; }
    }

    /* ── PANEL DE FILTROS ── */
    .at-filters-panel {
        position: sticky;
        top: 1.5rem;
        height: fit-content;
    }

    .at-filter-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 4px 24px rgba(26,95,168,0.07);
        border: 1.5px solid #e8f0fb;
    }

    .at-filter-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .at-filter-clear {
        font-size: 0.75rem;
        font-weight: 600;
        color: #29ABE2;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
    }

    .at-filter-section {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f0f6ff;
    }

    .at-filter-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .at-filter-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #6B7280;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
        display: block;
    }

    .at-filter-input {
        width: 100%;
        padding: 0.625rem 0.875rem;
        border: 1.5px solid #E5E7EB;
        border-radius: 10px;
        font-size: 0.875rem;
        font-family: 'Poppins', sans-serif;
        color: #111827;
        background: #FAFAFA;
        outline: none;
        transition: all 0.2s;
    }

    .at-filter-input:focus {
        border-color: #29ABE2;
        background: white;
        box-shadow: 0 0 0 3px rgba(41,171,226,0.1);
    }

    .at-price-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
    }

    /* Category chips */
    .at-cat-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .at-cat-chip {
        padding: 0.35rem 0.875rem;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
        border: 1.5px solid #E5E7EB;
        color: #6B7280;
        background: white;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-block;
    }

    .at-cat-chip:hover,
    .at-cat-chip.active {
        border-color: #1A5FA8;
        color: #1A5FA8;
        background: #f0f6ff;
    }

    .at-filter-apply {
        width: 100%;
        padding: 0.75rem;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 0.5rem;
    }

    .at-filter-apply:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26,95,168,0.3);
    }

    /* ── CONTENIDO PRINCIPAL ── */
    .at-main {}

    .at-results-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.25rem;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .at-results-count {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
    }

    .at-results-count span {
        color: #1A5FA8;
    }

    .at-sort-select {
        padding: 0.5rem 1rem;
        border: 1.5px solid #E5E7EB;
        border-radius: 10px;
        font-size: 0.8125rem;
        font-family: 'Poppins', sans-serif;
        color: #374151;
        outline: none;
        background: white;
        cursor: pointer;
    }

    /* ── PRODUCT GRID ── */
    .at-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.25rem;
    }

    .at-product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 20px rgba(26,95,168,0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .at-product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(26,95,168,0.13);
        border-color: #29ABE2;
    }

    .at-product-img {
        height: 160px;
        background: linear-gradient(135deg, #f0f6ff 0%, #e8f0fb 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        position: relative;
        overflow: hidden;
    }

    .at-product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .at-product-badge {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        background: #F7941D;
        color: white;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .at-product-body {
        padding: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .at-product-name {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .at-product-meta {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        margin-bottom: 1rem;
        flex: 1;
    }

    .at-product-meta-item {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: #6B7280;
    }

    .at-product-meta-item svg {
        width: 14px; height: 14px;
        color: #29ABE2;
        flex-shrink: 0;
    }

    .at-product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px solid #f0f6ff;
    }

    .at-product-price {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 900;
        color: #1A5FA8;
    }

    .at-product-price span {
        font-size: 0.75rem;
        font-weight: 500;
        color: #9CA3AF;
        font-family: 'Poppins', sans-serif;
    }

    .at-product-btn {
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }

    .at-product-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(26,95,168,0.3);
    }

    /* ── EMPTY STATE ── */
    .at-empty {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 20px;
        border: 1.5px dashed #E5E7EB;
    }

    .at-empty-icon { font-size: 3rem; margin-bottom: 1rem; }

    .at-empty-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.25rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 0.5rem;
    }

    .at-empty-desc {
        font-size: 0.875rem;
        color: #9CA3AF;
    }

    /* Pagination override */
    .at-pagination { margin-top: 2rem; }
</style>

<div class="at-wrapper">

    {{-- ── HERO SEARCH ── --}}
    <div class="at-hero">
        <div class="at-hero-inner">
            <div class="at-hero-label">🔍 Marketplace</div>
            <h1 class="at-hero-title">
                Encuentra lo que necesitas,<br><span>arriéndalo hoy</span>
            </h1>

            <form method="GET" action="{{ url('/arrendatario') }}">
                {{-- Preservar filtros activos --}}
                <input type="hidden" name="min_price"         value="{{ $filters['min_price'] ?? '' }}">
                <input type="hidden" name="max_price"         value="{{ $filters['max_price'] ?? '' }}">
                <input type="hidden" name="availability_date" value="{{ $filters['availability_date'] ?? '' }}">
                <input type="hidden" name="location"          value="{{ $filters['location'] ?? '' }}">
                <input type="hidden" name="category"          value="{{ $filters['category'] ?? '' }}">

                <div class="at-search-box">
                    <div class="at-search-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                        </svg>
                    </div>
                    <input
                        class="at-search-input"
                        type="text"
                        name="search"
                        placeholder="Ej: Taladro, Cámara, Silla de camping…"
                        value="{{ $filters['search'] ?? '' }}"
                        autocomplete="off"
                    />
                    <button type="submit" class="at-search-btn">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ── BODY: filtros + resultados ── --}}
    <div class="at-body">

        {{-- ── PANEL FILTROS (sidebar) ── --}}
        <aside class="at-filters-panel">
            <div class="at-filter-card">
                <div class="at-filter-title">
                    Filtros
                    <a href="{{ url('/arrendatario') }}" class="at-filter-clear">Limpiar todo</a>
                </div>

                <form method="GET" action="{{ url('/arrendatario') }}" id="filter-form">
                    <input type="hidden" name="search" value="{{ $filters['search'] ?? '' }}">

                    {{-- Precio --}}
                    <div class="at-filter-section">
                        <label class="at-filter-label">Precio por día</label>
                        <div class="at-price-row">
                            <input
                                class="at-filter-input"
                                type="number"
                                name="min_price"
                                placeholder="Mínimo"
                                value="{{ $filters['min_price'] ?? '' }}"
                                min="0" step="1000"
                            />
                            <input
                                class="at-filter-input"
                                type="number"
                                name="max_price"
                                placeholder="Máximo"
                                value="{{ $filters['max_price'] ?? '' }}"
                                min="0" step="1000"
                            />
                        </div>
                    </div>

                    {{-- Categoría --}}
                    <div class="at-filter-section">
                        <label class="at-filter-label">Categoría</label>
                        <div class="at-cat-chips">
                            <a href="{{ url('/arrendatario?' . http_build_query(array_merge($filters ?? [], ['category' => '']))) }}"
                               class="at-cat-chip {{ empty($filters['category'] ?? '') ? 'active' : '' }}">
                                Todas
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ url('/arrendatario?' . http_build_query(array_merge($filters ?? [], ['category' => $cat]))) }}"
                                   class="at-cat-chip {{ ($filters['category'] ?? '') === $cat ? 'active' : '' }}">
                                    {{ ucfirst($cat) }}
                                </a>
                            @endforeach
                        </div>
                        <input type="hidden" name="category" value="{{ $filters['category'] ?? '' }}" id="cat-hidden">
                    </div>

                    {{-- Disponibilidad --}}
                    <div class="at-filter-section">
                        <label class="at-filter-label">Disponible desde</label>
                        <input
                            class="at-filter-input"
                            type="date"
                            name="availability_date"
                            value="{{ $filters['availability_date'] ?? '' }}"
                        />
                    </div>

                    {{-- Ubicación --}}
                    <div class="at-filter-section">
                        <label class="at-filter-label">Ubicación</label>
                        <input
                            class="at-filter-input"
                            type="text"
                            name="location"
                            placeholder="Ej: Cali, Medellín…"
                            value="{{ $filters['location'] ?? '' }}"
                        />
                    </div>

                    <button type="submit" class="at-filter-apply">
                        Aplicar filtros
                    </button>
                </form>
            </div>
        </aside>

        {{-- ── RESULTADOS ── --}}
        <main class="at-main">

            <div class="at-results-header">
                <div class="at-results-count">
                    <span>{{ $products->total() }}</span> producto{{ $products->total() !== 1 ? 's' : '' }} encontrado{{ $products->total() !== 1 ? 's' : '' }}
                </div>
                <select class="at-sort-select" onchange="window.location=this.value">
                    <option value="{{ url('/arrendatario?' . http_build_query(array_merge($filters ?? [], ['sort' => 'recent']))) }}"
                            {{ ($filters['sort'] ?? '') === 'recent' ? 'selected' : '' }}>
                        Más recientes
                    </option>
                    <option value="{{ url('/arrendatario?' . http_build_query(array_merge($filters ?? [], ['sort' => 'price_asc']))) }}"
                            {{ ($filters['sort'] ?? '') === 'price_asc' ? 'selected' : '' }}>
                        Precio: menor a mayor
                    </option>
                    <option value="{{ url('/arrendatario?' . http_build_query(array_merge($filters ?? [], ['sort' => 'price_desc']))) }}"
                            {{ ($filters['sort'] ?? '') === 'price_desc' ? 'selected' : '' }}>
                        Precio: mayor a menor
                    </option>
                </select>
            </div>

            @if ($products->count() === 0)
                <div class="at-empty">
                    <div class="at-empty-icon">📦</div>
                    <div class="at-empty-title">No encontramos resultados</div>
                    <p class="at-empty-desc">Intenta con otros términos o ajusta los filtros</p>
                </div>
            @else
                <div class="at-products-grid">
                    @foreach ($products as $product)
                        <div class="at-product-card">
                            <div class="at-product-img">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                @else
                                    @php
                                        $icons = ['💻','📷','🏕️','🎮','🛠️','🛵','🧳','📺','🎸','⛺'];
                                        $icon  = $icons[abs(crc32($product->name)) % count($icons)];
                                    @endphp
                                    {{ $icon }}
                                @endif
                                <span class="at-product-badge {{ $product->available ? '' : 'at-badge-unavailable' }}">{{ $product->available ? 'Disponible' : 'No disponible' }}</span>
                            </div>

                            <div class="at-product-body">
                                <div class="at-product-name">{{ $product->name }}</div>

                                <div class="at-product-meta">
                                    @if($product->city)
                                        <div class="at-product-meta-item">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $product->city }}
                                        </div>
                                    @endif
                                </div>

                                <div class="at-product-footer">
                                    <div class="at-product-price">
                                        ${{ number_format((float) $product->price, 0, ',', '.') }}
                                        <span>/ día</span>
                                    </div>
                                    <a href="{{ route('products.show', $product) }}" class="at-product-btn">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="at-pagination">
                    {{ $products->appends($filters ?? [])->links() }}
                </div>
            @endif
        </main>

    </div>
</div>
</x-app-layout>