<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600&display=swap');

    .nav-root {
        background: white;
        border-bottom: 1px solid #e8f0fb;
        box-shadow: 0 2px 16px rgba(26,95,168,0.08);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .nav-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* ── LOGO ── */
    .nav-logo {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .nav-logo-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .nav-logo-icon svg {
        width: 20px;
        height: 20px;
        fill: white;
    }

    .nav-logo-text {
        font-family: 'Nunito', sans-serif;
        font-weight: 900;
        font-size: 1.25rem;
        color: #1A5FA8;
        line-height: 1;
    }

    .nav-logo-text span {
        color: #F7941D;
    }

    /* ── NAV LINKS ── */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-left: 2rem;
    }

    .nav-link {
        padding: 0.4rem 0.875rem;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4B5563;
        text-decoration: none;
        transition: all 0.2s;
    }

    .nav-link:hover {
        background: #f0f6ff;
        color: #1A5FA8;
    }

    /* ── RIGHT SIDE ── */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .nav-user-name {
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        max-width: 140px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .nav-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #29ABE2, #1A5FA8);
        color: white;
        font-family: 'Nunito', sans-serif;
        font-size: 0.8rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .nav-btn-perfil {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.45rem 1rem;
        border-radius: 9px;
        border: 1.5px solid #e8f0fb;
        background: white;
        font-family: 'Poppins', sans-serif;
        font-size: 0.8125rem;
        font-weight: 600;
        color: #1A5FA8;
        text-decoration: none;
        transition: all 0.2s;
    }

    .nav-btn-perfil:hover {
        background: #f0f6ff;
        border-color: #1A5FA8;
    }

    .nav-btn-perfil svg {
        width: 15px;
        height: 15px;
    }

    .nav-btn-logout {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.45rem 1rem;
        border-radius: 9px;
        border: none;
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        font-family: 'Poppins', sans-serif;
        font-size: 0.8125rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.2s;
    }

    .nav-btn-logout:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(26,95,168,0.3);
    }

    .nav-btn-logout svg {
        width: 15px;
        height: 15px;
    }

    .nav-divider {
        width: 1px;
        height: 28px;
        background: #e8f0fb;
    }
</style>

<nav class="nav-root">
    <div class="nav-inner">

        {{-- ── LOGO + LINKS ── --}}
        <div style="display:flex;align-items:center;">
            <a href="/" class="nav-logo">
                <div class="nav-logo-icon">
                    {{-- Ícono de llave (arriendo) --}}
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.65 10A6 6 0 1 0 10 12.65L19.35 22 22 19.35 12.65 10zM7 11a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"/>
                    </svg>
                </div>
                <span class="nav-logo-text">Alquila<span>Tec</span></span>
            </a>

            @auth
            <div class="nav-links">
                @if(auth()->user()->role === 'admin')
                    <a href="/admin" class="nav-link">Panel Admin</a>
                @endif

                @if(auth()->user()->role === 'arrendador')
                    <a href="/arrendador" class="nav-link">Mi panel</a>
                    <a href="{{ route('products.create') }}" class="nav-link">+ Publicar</a>
                    <a href="{{ route('landlord.requests.index') }}" class="nav-link">Solicitudes</a>
                @endif

                @if(auth()->user()->role === 'arrendatario')
                    <a href="/arrendatario" class="nav-link">Explorar</a>
                @endif
            </div>
            @endauth
        </div>

        {{-- ── USUARIO ── --}}
        @auth
        <div class="nav-right">

            {{-- Avatar + nombre --}}
            <div class="nav-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <span class="nav-user-name">{{ auth()->user()->name }}</span>

            <div class="nav-divider"></div>

            {{-- Perfil --}}
            <a href="{{ route('profile.edit') }}" class="nav-btn-perfil">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Perfil
            </a>

            {{-- Cerrar sesión --}}
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="nav-btn-logout">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>

        </div>
        @endauth

    </div>
</nav>