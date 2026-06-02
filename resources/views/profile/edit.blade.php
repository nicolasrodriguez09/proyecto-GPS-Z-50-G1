<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

    .pf-wrapper {
        min-height: 100vh;
        background: #f0f6ff;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 3rem;
    }

    /* ── HEADER ── */
    .pf-page-header {
        background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 100%);
        padding: 2.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .pf-page-header::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px; right: -80px;
        pointer-events: none;
    }

    .pf-page-header::after {
        content: '';
        position: absolute;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(247,148,29,0.1);
        bottom: -60px; left: 5%;
        pointer-events: none;
    }

    .pf-header-inner {
        max-width: 780px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .pf-avatar-circle {
        width: 72px; height: 72px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        border: 3px solid rgba(255,255,255,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Nunito', sans-serif;
        font-size: 1.75rem;
        font-weight: 900;
        color: white;
        flex-shrink: 0;
    }

    .pf-header-label {
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
        margin-bottom: 0.5rem;
    }

    .pf-header-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(1.375rem, 3vw, 1.875rem);
        font-weight: 900;
        color: white;
        line-height: 1.2;
    }

    .pf-header-title span { color: #F7941D; }

    .pf-header-subtitle {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.75);
        margin-top: 0.25rem;
    }

    /* ── BODY ── */
    .pf-body {
        max-width: 780px;
        margin: 2rem auto 0;
        padding: 0 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* ── CARDS ── */
    .pf-card {
        background: white;
        border-radius: 20px;
        border: 1.5px solid #e8f0fb;
        box-shadow: 0 4px 24px rgba(26,95,168,0.07);
        overflow: hidden;
    }

    .pf-card-danger {
        border-color: #fee2e2;
    }

    .pf-card-header {
        padding: 1.25rem 1.75rem;
        border-bottom: 1.5px solid #f0f6ff;
        display: flex;
        align-items: center;
        gap: 0.875rem;
    }

    .pf-card-danger .pf-card-header {
        border-bottom-color: #fef2f2;
    }

    .pf-card-icon {
        width: 40px; height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .pf-card-icon.blue   { background: #eff6ff; }
    .pf-card-icon.teal   { background: #f0fdfa; }
    .pf-card-icon.red    { background: #fef2f2; }

    .pf-card-header-text h3 {
        font-family: 'Nunito', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1a2b4a;
        line-height: 1.2;
    }

    .pf-card-danger .pf-card-header-text h3 { color: #b91c1c; }

    .pf-card-header-text p {
        font-size: 0.8rem;
        color: #9CA3AF;
        margin-top: 0.1rem;
    }

    .pf-card-body {
        padding: 1.75rem;
    }

    /* ── FORM ELEMENTS ── */
    .pf-form { display: flex; flex-direction: column; gap: 1.25rem; }

    .pf-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    @media (max-width: 600px) {
        .pf-grid-2 { grid-template-columns: 1fr; }
    }

    .pf-field label {
        display: block;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #6B7280;
        margin-bottom: 0.5rem;
    }

    .pf-field input {
        display: block;
        width: 100%;
        border-radius: 12px;
        border: 1.5px solid #e8f0fb;
        background: #f8fbff;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-family: 'Poppins', sans-serif;
        color: #1a2b4a;
        transition: all 0.2s;
        box-sizing: border-box;
    }

    .pf-field input:focus {
        outline: none;
        border-color: #29ABE2;
        background: white;
        box-shadow: 0 0 0 3px rgba(41,171,226,0.12);
    }

    .pf-field input::placeholder { color: #C4D0E3; }

    /* ── BOTONES ── */
    .pf-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #1A5FA8, #29ABE2);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
    }

    .pf-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26,95,168,0.3);
    }

    .pf-btn-danger {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: #dc2626;
        border: 1.5px solid #fca5a5;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
    }

    .pf-btn-danger:hover {
        background: #fef2f2;
        border-color: #ef4444;
    }

    .pf-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: #4B5563;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
    }

    .pf-btn-secondary:hover { background: #f9fafb; }

    .pf-save-row {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-top: 0.25rem;
    }

    .pf-saved-msg {
        font-size: 0.8rem;
        font-weight: 600;
        color: #16a34a;
    }

    /* ── ALERT WARN ── */
    .pf-alert-warn {
        border-radius: 12px;
        border: 1px solid #fde68a;
        background: #fffbeb;
        padding: 0.875rem 1rem;
        font-size: 0.8rem;
        color: #92400e;
        margin-top: 0.5rem;
    }

    .pf-alert-warn button {
        background: none;
        border: none;
        padding: 0;
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        font-weight: 700;
        cursor: pointer;
        text-decoration: underline;
    }

    /* ── MODAL ── */
    .pf-modal-body { padding: 1.75rem; }

    .pf-modal-title {
        font-family: 'Nunito', sans-serif;
        font-size: 1.125rem;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 0.375rem;
    }

    .pf-modal-desc {
        font-size: 0.8rem;
        color: #6B7280;
        margin-bottom: 1.25rem;
        line-height: 1.6;
    }

    .pf-modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 1.25rem;
    }
</style>

<div class="pf-wrapper">

    {{-- ── HEADER ── --}}
    <div class="pf-page-header">
        <div class="pf-header-inner">

            <div class="pf-avatar-circle">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>

            <div>
                <div class="pf-header-label">👤 Mi cuenta</div>
                <div class="pf-header-title">
                    Hola, <span>{{ explode(' ', auth()->user()->name)[0] }}</span>
                </div>
                <div class="pf-header-subtitle">
                    Actualiza tu información personal, contraseña y preferencias de cuenta
                </div>
            </div>

        </div>
    </div>

    <div class="pf-body">

        {{-- MENSAJES DE SESIÓN --}}
        @if(session('status') === 'profile-updated')
            <div style="border-radius:14px;border:1px solid #bbf7d0;background:#f0fdf4;padding:1rem 1.25rem;font-size:0.875rem;font-weight:600;color:#166534;display:flex;align-items:center;gap:0.625rem;">
                ✅ Perfil actualizado correctamente.
            </div>
        @endif

        @if(session('status') === 'password-updated')
            <div style="border-radius:14px;border:1px solid #bbf7d0;background:#f0fdf4;padding:1rem 1.25rem;font-size:0.875rem;font-weight:600;color:#166534;display:flex;align-items:center;gap:0.625rem;">
                ✅ Contraseña actualizada correctamente.
            </div>
        @endif

        {{-- ── CARD: INFORMACIÓN PERSONAL ── --}}
        <div class="pf-card">

            <div class="pf-card-header">
                <div class="pf-card-icon blue">📋</div>
                <div class="pf-card-header-text">
                    <h3>Información personal</h3>
                    <p>Nombre, correo, documento y teléfono</p>
                </div>
            </div>

            <div class="pf-card-body">

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="pf-form">
                    @csrf
                    @method('patch')

                    <div class="pf-grid-2">

                        <div class="pf-field">
                            <label for="name">Nombre completo</label>
                            <input
                                id="name" name="name" type="text"
                                value="{{ old('name', $user->name) }}"
                                required autofocus autocomplete="name"
                                placeholder="Tu nombre"
                            >
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="pf-field">
                            <label for="email">Correo electrónico</label>
                            <input
                                id="email" name="email" type="email"
                                value="{{ old('email', $user->email) }}"
                                required autocomplete="username"
                                placeholder="correo@ejemplo.com"
                            >
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="pf-field">
                            <label for="document">Número de documento</label>
                            <input
                                id="document" name="document" type="text"
                                value="{{ old('document', $user->document) }}"
                                placeholder="Cédula o documento"
                            >
                            <x-input-error class="mt-2" :messages="$errors->get('document')" />
                        </div>

                        <div class="pf-field">
                            <label for="phone">Teléfono</label>
                            <input
                                id="phone" name="phone" type="tel"
                                value="{{ old('phone', $user->phone) }}"
                                autocomplete="tel"
                                placeholder="Ej. 3001234567"
                            >
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                    </div>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="pf-alert-warn">
                            Tu correo no está verificado.
                            <button form="send-verification">Reenviar correo de verificación.</button>
                            @if (session('status') === 'verification-link-sent')
                                <br><span style="color:#065f46;font-weight:700;">✓ Enlace enviado a tu correo.</span>
                            @endif
                        </div>
                    @endif

                    <div class="pf-save-row">
                        <button type="submit" class="pf-btn-primary">
                            Guardar cambios
                        </button>
                    </div>

                </form>

            </div>
        </div>

        {{-- ── CARD: CONTRASEÑA ── --}}
        <div class="pf-card">

            <div class="pf-card-header">
                <div class="pf-card-icon teal">🔒</div>
                <div class="pf-card-header-text">
                    <h3>Cambiar contraseña</h3>
                    <p>Usa una contraseña larga y aleatoria para mayor seguridad</p>
                </div>
            </div>

            <div class="pf-card-body">
                <form method="post" action="{{ route('password.update') }}" class="pf-form">
                    @csrf
                    @method('put')

                    <div class="pf-grid-2">

                        <div class="pf-field" style="grid-column: 1 / -1;">
                            <label for="update_password_current_password">Contraseña actual</label>
                            <input
                                id="update_password_current_password"
                                name="current_password" type="password"
                                autocomplete="current-password"
                                placeholder="••••••••"
                            >
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="pf-field">
                            <label for="update_password_password">Nueva contraseña</label>
                            <input
                                id="update_password_password"
                                name="password" type="password"
                                autocomplete="new-password"
                                placeholder="••••••••"
                            >
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div class="pf-field">
                            <label for="update_password_password_confirmation">Confirmar contraseña</label>
                            <input
                                id="update_password_password_confirmation"
                                name="password_confirmation" type="password"
                                autocomplete="new-password"
                                placeholder="••••••••"
                            >
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                    </div>

                    <div class="pf-save-row">
                        <button type="submit" class="pf-btn-primary">
                            Actualizar contraseña
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- ── CARD: ELIMINAR CUENTA ── --}}
        <div class="pf-card pf-card-danger">

            <div class="pf-card-header">
                <div class="pf-card-icon red">🗑️</div>
                <div class="pf-card-header-text">
                    <h3>Eliminar cuenta</h3>
                    <p>Esta acción es permanente y no se puede deshacer</p>
                </div>
            </div>

            <div class="pf-card-body">
                <p style="font-size:0.875rem;color:#6B7280;margin-bottom:1.25rem;line-height:1.6;">
                    Una vez que elimines tu cuenta, todos tus datos, publicaciones y solicitudes
                    serán borrados de forma permanente. Descarga cualquier información importante antes de continuar.
                </p>

                <button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="pf-btn-danger"
                >
                    Eliminar mi cuenta
                </button>
            </div>
        </div>

    </div>
</div>

{{-- MODAL CONFIRMACIÓN --}}
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="pf-modal-body">
            <div class="pf-modal-title">¿Seguro que quieres eliminar tu cuenta?</div>
            <div class="pf-modal-desc">
                Esta acción no se puede deshacer. Todos tus datos serán eliminados permanentemente.
                Ingresa tu contraseña para confirmar.
            </div>

            <div class="pf-field">
                <label for="password_delete">Contraseña</label>
                <input
                    id="password_delete"
                    name="password" type="password"
                    placeholder="••••••••"
                >
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="pf-modal-actions">
                <button type="button" x-on:click="$dispatch('close')" class="pf-btn-secondary">
                    Cancelar
                </button>
                <button type="submit" class="pf-btn-danger">
                    Sí, eliminar cuenta
                </button>
            </div>
        </div>

    </form>
</x-modal>

</x-app-layout>