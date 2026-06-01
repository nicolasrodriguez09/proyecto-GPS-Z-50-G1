<x-app-layout>

<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600&display=swap');

* { box-sizing: border-box; }

.mis-wrap {
    min-height: calc(100vh - 64px);
    background: #f4f7fb;
    padding: 2.5rem 1.5rem 4rem;
    font-family: 'Poppins', sans-serif;
}

.mis-container { max-width: 1100px; margin: 0 auto; }

/* Top bar */
.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.topbar-left { display: flex; align-items: center; gap: 1rem; }

.topbar-icon {
    width: 52px; height: 52px;
    background: linear-gradient(135deg, #1a5fa8, #2176d2);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 16px rgba(26,95,168,0.25);
    flex-shrink: 0;
}
.topbar-icon svg { width: 26px; height: 26px; color: white; }

.topbar-title {
    font-family: 'Nunito', sans-serif;
    font-size: 1.75rem; font-weight: 800; color: #0f2d5e; line-height: 1.1;
}
.topbar-subtitle { font-size: 0.875rem; color: #6b7ea4; margin-top: 2px; }

.btn-new {
    display: flex; align-items: center; gap: 0.5rem;
    padding: 0.65rem 1.3rem;
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white;
    border-radius: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.9rem; font-weight: 800;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(249,115,22,0.3);
    transition: transform 0.15s, box-shadow 0.15s;
    white-space: nowrap;
}
.btn-new:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(249,115,22,0.4); }
.btn-new svg { width: 16px; height: 16px; }

/* Alerts */
.alert-success {
    background: #f0fdf4; border: 1.5px solid #86efac;
    border-radius: 10px; padding: 0.85rem 1rem;
    color: #166534; font-size: 0.875rem; font-weight: 500;
    margin-bottom: 1.5rem;
    display: flex; align-items: center; gap: 0.5rem;
}

/* Stats */
.stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

@media (max-width: 640px) { .stats-row { grid-template-columns: 1fr; } }

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    box-shadow: 0 2px 16px rgba(26,95,168,0.06);
    display: flex; align-items: center; gap: 1rem;
}

.stat-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.stat-icon svg { width: 22px; height: 22px; }

.stat-num {
    font-family: 'Nunito', sans-serif;
    font-size: 1.6rem; font-weight: 900; color: #0f2d5e; line-height: 1;
}
.stat-label { font-size: 0.78rem; color: #6b7ea4; margin-top: 2px; }

/* Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.25rem;
}

/* Product card */
.prod-card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 2px 16px rgba(26,95,168,0.06);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    display: flex; flex-direction: column;
}
.prod-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(26,95,168,0.12); }

.prod-img-wrap {
    position: relative;
    height: 190px; overflow: hidden;
    background: linear-gradient(135deg, #e8f0fb, #dce8f7);
}

.prod-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.3s;
}
.prod-card:hover .prod-img-wrap img { transform: scale(1.04); }

.prod-img-placeholder {
    width: 100%; height: 100%;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    color: #9ab3d4; gap: 0.5rem;
    font-size: 0.8rem; font-weight: 500;
}
.prod-img-placeholder svg { width: 36px; height: 36px; opacity: 0.5; }

.prod-badge {
    position: absolute; top: 0.75rem; right: 0.75rem;
    padding: 0.25rem 0.65rem;
    border-radius: 20px;
    font-size: 0.72rem; font-weight: 700;
    font-family: 'Nunito', sans-serif;
}
.badge-available { background: #dcfce7; color: #166534; }
.badge-unavailable { background: #fee2e2; color: #991b1b; }

.prod-body { padding: 1.15rem 1.25rem; flex: 1; display: flex; flex-direction: column; }

.prod-name {
    font-family: 'Nunito', sans-serif;
    font-size: 1.05rem; font-weight: 800; color: #0f2d5e;
    margin-bottom: 0.4rem;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}

.prod-desc {
    font-size: 0.82rem; color: #6b7ea4; line-height: 1.5;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden; margin-bottom: 0.85rem;
}

.prod-meta {
    display: flex; align-items: center; gap: 1rem;
    margin-bottom: 1rem;
}

.prod-price {
    font-family: 'Nunito', sans-serif;
    font-size: 1.2rem; font-weight: 900; color: #1a5fa8;
}
.prod-price-label { font-size: 0.72rem; color: #9ab3d4; }

.prod-location {
    display: flex; align-items: center; gap: 0.3rem;
    font-size: 0.78rem; color: #6b7ea4; margin-left: auto;
}
.prod-location svg { width: 13px; height: 13px; flex-shrink: 0; }

.prod-actions {
    display: flex; gap: 0.6rem;
    padding: 0 1.25rem 1.25rem;
}

.btn-edit {
    flex: 1; padding: 0.55rem;
    background: #f0f6ff; color: #1a5fa8;
    border: 1.5px solid #c3d9f5;
    border-radius: 10px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.85rem; font-weight: 700;
    text-decoration: none; text-align: center;
    transition: background 0.15s;
}
.btn-edit:hover { background: #dbeafe; }

.btn-delete {
    padding: 0.55rem 0.8rem;
    background: #fff1f1; color: #dc2626;
    border: 1.5px solid #fca5a5;
    border-radius: 10px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.85rem; font-weight: 700;
    cursor: pointer; transition: background 0.15s;
    display: flex; align-items: center; gap: 0.3rem;
}
.btn-delete:hover { background: #fee2e2; }
.btn-delete svg { width: 14px; height: 14px; }

/* Empty state */
.empty-state {
    grid-column: 1/-1;
    text-align: center; padding: 4rem 2rem;
    background: white; border-radius: 18px;
    box-shadow: 0 2px 16px rgba(26,95,168,0.06);
}
.empty-icon {
    width: 72px; height: 72px; margin: 0 auto 1.25rem;
    background: #e8f0fb; border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
}
.empty-icon svg { width: 36px; height: 36px; color: #1a5fa8; opacity: 0.6; }
.empty-title { font-family: 'Nunito', sans-serif; font-size: 1.3rem; font-weight: 800; color: #0f2d5e; margin-bottom: 0.5rem; }
.empty-desc { font-size: 0.875rem; color: #6b7ea4; max-width: 320px; margin: 0 auto 1.5rem; }
</style>

<div class="mis-wrap">
    <div class="mis-container">

        {{-- Top bar --}}
        <div class="topbar">
            <div class="topbar-left">
                <div class="topbar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                </div>
                <div>
                    <div class="topbar-title">Mis publicaciones</div>
                    <div class="topbar-subtitle">Gestiona tus productos en arriendo</div>
                </div>
            </div>
            <a href="{{ route('products.create') }}" class="btn-new">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Nueva publicación
            </a>
        </div>

        @if(session('success'))
        <div class="alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width:18px;height:18px;flex-shrink:0">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Stats --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon" style="background:#e8f0fb">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1a5fa8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                </div>
                <div>
                    <div class="stat-num">{{ $products->count() }}</div>
                    <div class="stat-label">Publicaciones totales</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#f0fdf4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#16a34a">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <div class="stat-num">{{ $products->where('available', true)->count() }}</div>
                    <div class="stat-label">Disponibles</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#fff7ed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f97316">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <div class="stat-num">${{ number_format($products->sum('price'), 0, ',', '.') }}</div>
                    <div class="stat-label">Precio total/día</div>
                </div>
            </div>
        </div>

        {{-- Grid --}}
        <div class="products-grid">

            @forelse($products as $product)
            <div class="prod-card">
                <div class="prod-img-wrap">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    @else
                        <div class="prod-img-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                            Sin imagen
                        </div>
                    @endif
                    <span class="prod-badge {{ $product->available ? 'badge-available' : 'badge-unavailable' }}">
                        {{ $product->available ? 'Disponible' : 'No disponible' }}
                    </span>
                </div>

                <div class="prod-body">
                    <div class="prod-name" title="{{ $product->name }}">{{ $product->name }}</div>
                    <div class="prod-desc">{{ $product->description }}</div>
                    <div class="prod-meta">
                        <div>
                            <div class="prod-price">${{ number_format($product->price, 0, ',', '.') }}</div>
                            <div class="prod-price-label">por día</div>
                        </div>
                        <div class="prod-location">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            {{ $product->city }}
                        </div>
                    </div>
                </div>

                <div class="prod-actions">
                    <a href="{{ route('products.edit', $product) }}" class="btn-edit">
                        ✏️ Editar
                    </a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:contents"
                          onsubmit="return confirm('¿Eliminar esta publicación?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                </div>
                <div class="empty-title">Sin publicaciones todavía</div>
                <div class="empty-desc">Crea tu primera publicación y empieza a generar ingresos con tus productos.</div>
                <a href="{{ route('products.create') }}" class="btn-new" style="display:inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:16px;height:16px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Crear mi primer producto
                </a>
            </div>
            @endforelse

        </div>

    </div>
</div>

</x-app-layout>