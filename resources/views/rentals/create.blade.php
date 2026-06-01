<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .rc-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 4rem;
    }

    /* HERO */
    .rc-hero {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2rem 2rem 5rem;
        position: relative;
        overflow: hidden;
    }
    .rc-hero::after {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px; right: -80px;
        pointer-events: none;
    }
    .rc-hero-inner {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .rc-back {
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
    .rc-back:hover { color: white; }
    .rc-back svg { width: 16px; height: 16px; }
    .rc-hero-label {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(247,148,29,0.2);
        border: 1px solid rgba(247,148,29,0.4);
        border-radius: 50px;
        padding: 0.25rem 0.75rem;
        font-size: 0.7rem;
        font-weight: 700;
        color: #F7941D;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
    }
    .rc-hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.4rem, 3vw, 1.875rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }
    .rc-hero-sub {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.7);
        margin-top: 0.35rem;
    }

    /* BODY */
    .rc-body {
        max-width: 900px;
        margin: -3rem auto 0;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 1.5rem;
        position: relative;
        z-index: 2;
    }
    @media (max-width: 800px) {
        .rc-body { grid-template-columns: 1fr; }
    }

    /* CARDS */
    .rc-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 8px 30px rgba(26,95,168,0.08);
        padding: 1.75rem;
        margin-bottom: 1.25rem;
    }
    .rc-section-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .rc-section-title span {
        width: 28px; height: 28px;
        background: #f0f6ff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
    }

    /* Producto mini */
    .rc-product-mini {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f0f6ff;
        border-radius: 14px;
        margin-bottom: 1.5rem;
    }
    .rc-product-mini-img {
        width: 60px; height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #e8f0fb, #dbeafe);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        flex-shrink: 0;
        overflow: hidden;
    }
    .rc-product-mini-img img { width: 100%; height: 100%; object-fit: cover; }
    .rc-product-mini-name {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
    }
    .rc-product-mini-meta {
        font-size: 0.8rem;
        color: #6B7280;
        margin-top: 0.2rem;
    }
    .rc-product-mini-price {
        margin-left: auto;
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 900;
        color: #1A5FA8;
        white-space: nowrap;
    }

    /* Fechas */
    .rc-dates-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    .rc-field label {
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #6B7280;
        margin-bottom: 0.5rem;
    }
    .rc-field input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #E5E7EB;
        border-radius: 12px;
        font-size: 0.875rem;
        font-family: 'Poppins', sans-serif;
        color: #111827;
        background: #FAFAFA;
        outline: none;
        transition: all 0.2s;
        box-sizing: border-box;
    }
    .rc-field input:focus {
        border-color: #29ABE2;
        background: white;
        box-shadow: 0 0 0 3px rgba(41,171,226,0.1);
    }

    /* Resumen dinámico */
    .rc-summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.875rem;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0f6ff;
        color: #6B7280;
    }
    .rc-summary-row:last-child { border-bottom: none; }
    .rc-summary-row .val { font-weight: 700; color: #1a2b4a; }
    .rc-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 2px solid #e8f0fb;
    }
    .rc-total-label {
        font-family: 'Nunito', sans-serif;
        font-size: 0.9375rem;
        font-weight: 800;
        color: #1a2b4a;
    }
    .rc-total-amount {
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1A5FA8;
    }

    /* Términos */
    .rc-terms-box {
        background: #f8faff;
        border: 1.5px solid #e8f0fb;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        max-height: 160px;
        overflow-y: auto;
        margin-bottom: 1rem;
    }
    .rc-terms-box p {
        font-size: 0.8125rem;
        color: #4B5563;
        line-height: 1.7;
        margin: 0;
        white-space: pre-line;
    }
    .rc-checkbox-row {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        cursor: pointer;
    }
    .rc-checkbox-row input[type="checkbox"] {
        width: 18px; height: 18px;
        margin-top: 2px;
        accent-color: #1A5FA8;
        flex-shrink: 0;
        cursor: pointer;
    }
    .rc-checkbox-row span {
        font-size: 0.875rem;
        color: #374151;
        line-height: 1.5;
    }

    /* Error */
    .rc-error {
        background: #fef2f2;
        border: 1.5px solid #fecaca;
        border-radius: 12px;
        padding: 0.875rem 1.25rem;
        margin-bottom: 1.25rem;
        font-size: 0.875rem;
        color: #dc2626;
    }

    /* Notificación estado */
    .rc-notification {
        border-radius: 14px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.25rem;
        border-width: 1.5px;
        border-style: solid;
    }
    .rc-notification.success { background: #f0fdf4; border-color: #bbf7d0; color: #15803d; }
    .rc-notification.error   { background: #fef2f2; border-color: #fecaca; color: #dc2626; }
    .rc-notification-title { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.9375rem; margin-bottom: 0.25rem; }
    .rc-notification-msg   { font-size: 0.8125rem; opacity: 0.9; }

    /* Sidebar */
    .rc-info-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 8px 30px rgba(26,95,168,0.08);
        padding: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .rc-steps {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .rc-step {
        display: flex;
        align-items: flex-start;
        gap: 0.875rem;
    }
    .rc-step-num {
        width: 28px; height: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        color: white;
        font-family: 'Nunito', sans-serif;
        font-size: 0.8rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .rc-step-text {
        font-size: 0.8125rem;
        color: #4B5563;
        line-height: 1.5;
        padding-top: 0.2rem;
    }
    .rc-step-text strong { color: #1a2b4a; font-weight: 700; }

    .rc-tips-card {
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        border-radius: 20px;
        padding: 1.5rem;
        color: white;
    }
    .rc-tips-title { font-family: 'Nunito', sans-serif; font-size: 0.9375rem; font-weight: 800; margin-bottom: 0.75rem; }
    .rc-tips-list { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
    .rc-tips-list li { font-size: 0.8rem; display: flex; align-items: flex-start; gap: 0.5rem; opacity: 0.9; line-height: 1.5; }
    .rc-tips-list li::before { content: '✦'; color: #F7941D; flex-shrink: 0; font-size: 0.65rem; margin-top: 0.2rem; }

    /* Botón submit */
    .rc-submit-btn {
        width: 100%;
        padding: 0.9rem;
        background: linear-gradient(135deg, #F7941D, #e07b0a);
        color: white;
        border: none;
        border-radius: 14px;
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.2s;
        margin-top: 1.5rem;
    }
    .rc-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(247,148,29,0.4);
    }
    .rc-submit-btn svg { width: 18px; height: 18px; }
</style>

<div class="rc-wrapper">

    {{-- HERO --}}
    <div class="rc-hero">
        <div class="rc-hero-inner">
            <a href="{{ url()->previous() }}" class="rc-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al producto
            </a>
            <div class="rc-hero-label">📋 Confirmar arriendo</div>
            <div class="rc-hero-title">Solicitud de arriendo</div>
            <div class="rc-hero-sub">Selecciona las fechas y acepta los términos para enviar tu solicitud</div>
        </div>
    </div>

    {{-- BODY --}}
    <div class="rc-body">

        {{-- COLUMNA PRINCIPAL --}}
        <div>

            {{-- Notificación de estado --}}
            @if($statusNotification)
                <div class="rc-notification {{ $statusNotification['type'] }}">
                    <div class="rc-notification-title">{{ $statusNotification['title'] }}</div>
                    <div class="rc-notification-msg">{{ $statusNotification['message'] }}</div>
                </div>
            @endif

            {{-- Éxito --}}
            @if(session('status'))
                <div class="rc-notification success">
                    <div class="rc-notification-title">✓ {{ session('status') }}</div>
                </div>
            @endif

            {{-- Errores --}}
            @if($errors->any())
                <div class="rc-error">
                    <ul style="margin:0;padding-left:1.25rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('rentals.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                {{-- Producto --}}
                <div class="rc-card">
                    <div class="rc-section-title"><span>📦</span> Artículo a arrendar</div>

                    <div class="rc-product-mini">
                        <div class="rc-product-mini-img">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                            @else
                                @php
                                    $icons = ['💻','📷','🏕️','🎮','🛠️','🛵','🧳','📺','🎸','⛺'];
                                    echo $icons[abs(crc32($product->name)) % count($icons)];
                                @endphp
                            @endif
                        </div>
                        <div>
                            <div class="rc-product-mini-name">{{ $product->name }}</div>
                            <div class="rc-product-mini-meta">📍 {{ $product->city }}, {{ $product->department }}</div>
                        </div>
                        <div class="rc-product-mini-price">${{ number_format($product->price, 0, ',', '.') }}/día</div>
                    </div>
                </div>

                {{-- Fechas --}}
                <div class="rc-card">
                    <div class="rc-section-title"><span>📅</span> Selecciona las fechas</div>

                    <div class="rc-dates-grid">
                        <div class="rc-field">
                            <label for="starts_at">Fecha de inicio</label>
                            <input type="date" id="starts_at" name="starts_at"
                                   min="{{ now()->toDateString() }}"
                                   value="{{ old('starts_at') }}"
                                   onchange="calcTotal()">
                        </div>
                        <div class="rc-field">
                            <label for="ends_at">Fecha de devolución</label>
                            <input type="date" id="ends_at" name="ends_at"
                                   min="{{ now()->addDay()->toDateString() }}"
                                   value="{{ old('ends_at') }}"
                                   onchange="calcTotal()">
                        </div>
                    </div>

                    {{-- Resumen calculado --}}
                    <div id="summary-box" style="display:none; margin-top:1rem;">
                        <div class="rc-summary-row">
                            <span>Días de arriendo</span>
                            <span class="val" id="days-count">0 días</span>
                        </div>
                        <div class="rc-summary-row">
                            <span>Precio por día</span>
                            <span class="val">${{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        @if($product->deposit)
                        <div class="rc-summary-row">
                            <span>Depósito</span>
                            <span class="val">${{ number_format($product->deposit, 0, ',', '.') }}</span>
                        </div>
                        @endif
                        <div class="rc-total-row">
                            <span class="rc-total-label">Total estimado</span>
                            <span class="rc-total-amount" id="total-amount">$0</span>
                        </div>
                    </div>
                </div>

                {{-- Términos --}}
                <div class="rc-card">
                    <div class="rc-section-title"><span>📄</span> Términos y condiciones <small style="font-size:0.7rem;color:#9CA3AF;font-weight:500;">{{ $termsVersion }}</small></div>

                    <div class="rc-terms-box">
                        <p>{{ $termsContent }}</p>
                    </div>

                    <label class="rc-checkbox-row">
                        <input type="checkbox" name="accept_terms" value="1" {{ old('accept_terms') ? 'checked' : '' }}>
                        <span>He leído y acepto los <strong>términos y condiciones</strong> del arriendo en AlquilaTec.</span>
                    </label>
                </div>

                <button type="submit" class="rc-submit-btn">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Confirmar y enviar solicitud
                </button>
            </form>
        </div>

        {{-- SIDEBAR --}}
        <div>
            <div class="rc-info-card">
                <div class="rc-section-title" style="margin-bottom:1rem;">¿Cómo funciona?</div>
                <div class="rc-steps">
                    <div class="rc-step">
                        <div class="rc-step-num">1</div>
                        <div class="rc-step-text"><strong>Envías la solicitud</strong> con las fechas y aceptas los términos.</div>
                    </div>
                    <div class="rc-step">
                        <div class="rc-step-num">2</div>
                        <div class="rc-step-text"><strong>El arrendador revisa</strong> tu solicitud y tiene 48h para responder.</div>
                    </div>
                    <div class="rc-step">
                        <div class="rc-step-num">3</div>
                        <div class="rc-step-text"><strong>Si es aprobada</strong>, coordinan la entrega directamente.</div>
                    </div>
                    <div class="rc-step">
                        <div class="rc-step-num">4</div>
                        <div class="rc-step-text"><strong>Devuelves</strong> el artículo en la fecha acordada para recuperar el depósito.</div>
                    </div>
                </div>
            </div>

            <div class="rc-tips-card">
                <div class="rc-tips-title">💡 Recomendaciones</div>
                <ul class="rc-tips-list">
                    <li>Verifica que el artículo esté en buen estado al recibirlo.</li>
                    <li>Guarda evidencia fotográfica antes de usarlo.</li>
                    <li>Respeta las fechas acordadas para evitar recargos.</li>
                    <li>Reporta cualquier daño de inmediato a la plataforma.</li>
                </ul>
            </div>
        </div>

    </div>
</div>

<script>
const pricePerDay = {{ $product->price }};

function calcTotal() {
    const start = document.getElementById('starts_at').value;
    const end   = document.getElementById('ends_at').value;

    if (!start || !end) return;

    const startDate = new Date(start);
    const endDate   = new Date(end);
    const diff      = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24));

    if (diff <= 0) return;

    const total = diff * pricePerDay;
    document.getElementById('days-count').textContent  = diff + (diff === 1 ? ' día' : ' días');
    document.getElementById('total-amount').textContent = '$' + total.toLocaleString('es-CO');
    document.getElementById('summary-box').style.display = 'block';
}
</script>
</x-app-layout>