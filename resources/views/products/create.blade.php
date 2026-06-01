<x-app-layout>

<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600&display=swap');

* { box-sizing: border-box; }

.pub-wrap {
    min-height: calc(100vh - 64px);
    background: #f4f7fb;
    padding: 2.5rem 1.5rem 4rem;
    font-family: 'Poppins', sans-serif;
}

.pub-container {
    max-width: 900px;
    margin: 0 auto;
}

/* Header */
.pub-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.pub-header-icon {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, #1a5fa8, #2176d2);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(26,95,168,0.25);
    flex-shrink: 0;
}

.pub-header-icon svg { width: 26px; height: 26px; color: white; }

.pub-title {
    font-family: 'Nunito', sans-serif;
    font-size: 1.75rem;
    font-weight: 800;
    color: #0f2d5e;
    line-height: 1.1;
}

.pub-subtitle {
    font-size: 0.875rem;
    color: #6b7ea4;
    margin-top: 2px;
}

/* Layout */
.pub-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 1.5rem;
}

@media (max-width: 768px) {
    .pub-layout { grid-template-columns: 1fr; }
}

/* Card */
.pub-card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 2px 20px rgba(26,95,168,0.07);
    overflow: hidden;
}

.pub-card-header {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #eef2f9;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.pub-card-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1a5fa8, #f97316);
}

.pub-card-title {
    font-family: 'Nunito', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: #1a2f5e;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.pub-card-body {
    padding: 1.5rem;
}

/* Fields */
.field-group {
    margin-bottom: 1.25rem;
}

.field-group:last-child { margin-bottom: 0; }

.field-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

label {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    color: #3a5080;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 0.45rem;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 0.65rem 0.9rem;
    border: 1.5px solid #dce6f5;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.9rem;
    color: #1a2f5e;
    background: #fafcff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

input:focus, textarea:focus, select:focus {
    border-color: #1a5fa8;
    box-shadow: 0 0 0 3px rgba(26,95,168,0.1);
    background: white;
}

textarea {
    resize: vertical;
    min-height: 110px;
}

select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%231a5fa8' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.9rem center;
    padding-right: 2.5rem;
}

.price-wrap {
    position: relative;
}

.price-prefix {
    position: absolute;
    left: 0.9rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.85rem;
    font-weight: 600;
    color: #6b7ea4;
    pointer-events: none;
}

.price-wrap input { padding-left: 2.2rem; }

/* Image upload */
.img-upload-zone {
    border: 2px dashed #c3d4ee;
    border-radius: 12px;
    padding: 2rem 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s;
    background: #f8fbff;
    position: relative;
}

.img-upload-zone:hover {
    border-color: #1a5fa8;
    background: #f0f6ff;
}

.img-upload-zone input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
    border: none;
    padding: 0;
}

.img-upload-icon {
    width: 44px;
    height: 44px;
    margin: 0 auto 0.75rem;
    background: #e8f0fb;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.img-upload-icon svg { width: 22px; height: 22px; color: #1a5fa8; }
.img-upload-label { font-size: 0.88rem; font-weight: 600; color: #1a5fa8; }
.img-upload-hint { font-size: 0.77rem; color: #6b7ea4; margin-top: 0.25rem; }

#img-preview {
    display: none;
    width: 100%;
    max-height: 180px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 1rem;
}

/* Sidebar */
.sidebar-tip {
    background: linear-gradient(135deg, #0f2d5e 0%, #1a5fa8 100%);
    border-radius: 18px;
    padding: 1.5rem;
    color: white;
    margin-bottom: 1rem;
}

.sidebar-tip-title {
    font-family: 'Nunito', sans-serif;
    font-size: 1rem;
    font-weight: 800;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tip-item {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    margin-bottom: 0.9rem;
    font-size: 0.82rem;
    line-height: 1.5;
    opacity: 0.92;
}

.tip-num {
    width: 20px;
    height: 20px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    font-size: 0.7rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
}

/* Submit button */
.btn-submit {
    width: 100%;
    padding: 0.85rem;
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white;
    border: none;
    border-radius: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 1rem;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(249,115,22,0.35);
    transition: transform 0.15s, box-shadow 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1rem;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(249,115,22,0.45);
}

.btn-submit svg { width: 18px; height: 18px; }

/* Alerts */
.alert-success {
    background: #f0fdf4;
    border: 1.5px solid #86efac;
    border-radius: 10px;
    padding: 0.85rem 1rem;
    color: #166534;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.alert-error {
    background: #fef2f2;
    border: 1.5px solid #fca5a5;
    border-radius: 10px;
    padding: 0.85rem 1rem;
    color: #991b1b;
    font-size: 0.875rem;
    margin-bottom: 1.5rem;
}

.alert-error ul { margin: 0.3rem 0 0 1rem; }
.alert-error li { margin-bottom: 0.2rem; }

.field-hint {
    font-size: 0.75rem;
    color: #6b7ea4;
    margin-top: 0.35rem;
}
</style>

<div class="pub-wrap">
    <div class="pub-container">

        {{-- Header --}}
        <div class="pub-header">
            <div class="pub-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
            <div>
                <div class="pub-title">Nueva publicación</div>
                <div class="pub-subtitle">Publica tu producto o herramienta para arrendar</div>
            </div>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
        <div class="alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width:18px;height:18px;flex-shrink:0">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert-error">
            <strong>Corrige los siguientes errores:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="pub-layout">

            {{-- Main column --}}
            <div>

                {{-- Info básica --}}
                <div class="pub-card" style="margin-bottom:1.25rem">
                    <div class="pub-card-header">
                        <div class="pub-card-dot"></div>
                        <div class="pub-card-title">Información del producto</div>
                    </div>
                    <div class="pub-card-body">

                        <div class="field-group">
                            <label for="name">Nombre del producto</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   placeholder="Ej: Taladro Bosch 700W, Bicicleta de montaña..." required>
                        </div>

                        <div class="field-group">
                            <label for="description">Descripción</label>
                            <textarea id="description" name="description" required
                                      placeholder="Describe el estado, características, accesorios incluidos...">{{ old('description') }}</textarea>
                            <div class="field-hint">Sé específico: marca, modelo, estado, accesorios. Más detalle = más confianza.</div>
                        </div>

                        <div class="field-row">
                            <div class="field-group" style="margin-bottom:0">
                                <label for="price">Precio por día</label>
                                <div class="price-wrap">
                                    <span class="price-prefix">$</span>
                                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                                           placeholder="0" min="0" required>
                                </div>
                            </div>
                            <div class="field-group" style="margin-bottom:0">
                                <label for="deposit">Depósito (opcional)</label>
                                <div class="price-wrap">
                                    <span class="price-prefix">$</span>
                                    <input type="number" id="deposit" name="deposit" value="{{ old('deposit') }}"
                                           placeholder="0" min="0">
                                </div>
                                <div class="field-hint">Garantía reembolsable</div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Imagen --}}
                <div class="pub-card" style="margin-bottom:1.25rem">
                    <div class="pub-card-header">
                        <div class="pub-card-dot"></div>
                        <div class="pub-card-title">Foto del producto</div>
                    </div>
                    <div class="pub-card-body">
                        <div class="img-upload-zone" id="dropzone">
                            <input type="file" name="image" id="imageInput" accept="image/*">
                            <div class="img-upload-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </div>
                            <div class="img-upload-label">Haz clic o arrastra una imagen</div>
                            <div class="img-upload-hint">JPG, PNG, WEBP · Máx. 5MB</div>
                            <img id="img-preview" alt="Vista previa">
                        </div>
                    </div>
                </div>

                {{-- Ubicación --}}
                <div class="pub-card">
                    <div class="pub-card-header">
                        <div class="pub-card-dot"></div>
                        <div class="pub-card-title">Ubicación</div>
                    </div>
                    <div class="pub-card-body">
                        <div class="field-row">
                            <div class="field-group" style="margin-bottom:0">
                                <label for="department">Departamento</label>
                                <select id="department" name="department" required>
                                    <option value="">Seleccione</option>
                                    <option value="Valle del Cauca" {{ old('department') == 'Valle del Cauca' ? 'selected' : '' }}>Valle del Cauca</option>
                                </select>
                            </div>
                            <div class="field-group" style="margin-bottom:0">
                                <label for="city">Ciudad</label>
                                <select id="city" name="city" required>
                                    <option value="">Seleccione</option>
                                    @foreach(['Cali','Palmira','Jamundí','Yumbo','Tuluá','Buga','La Unión','La Victoria','Toro','Bolivar','Roldanillo','Zarzal','Sevilla','Caicedonia','Ginebra','Guacarí','Obando','Pradera','Trujillo','Versalles','Yotoco','Ansermanuevo'] as $city)
                                        <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div>
                <div class="sidebar-tip">
                    <div class="sidebar-tip-title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width:18px;height:18px;opacity:0.9">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd"/>
                        </svg>
                        Consejos para publicar
                    </div>
                    <div class="tip-item">
                        <div class="tip-num">1</div>
                        <span>Usa un nombre claro con la marca y modelo para aparecer en más búsquedas.</span>
                    </div>
                    <div class="tip-item">
                        <div class="tip-num">2</div>
                        <span>Sube una foto bien iluminada — los arrendatarios confían más en publicaciones con imagen.</span>
                    </div>
                    <div class="tip-item">
                        <div class="tip-num">3</div>
                        <span>El depósito es opcional pero genera más seguridad para ambas partes.</span>
                    </div>
                    <div class="tip-item">
                        <div class="tip-num">4</div>
                        <span>Puedes editar o pausar tu publicación en cualquier momento desde "Mis productos".</span>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Publicar producto
                </button>

                <a href="{{ route('products.index') }}"
                   style="display:flex;align-items:center;justify-content:center;gap:0.4rem;margin-top:0.75rem;padding:0.7rem;color:#6b7ea4;font-size:0.85rem;font-weight:600;text-decoration:none;border-radius:10px;transition:background 0.15s"
                   onmouseover="this.style.background='#f0f4fb'" onmouseout="this.style.background='transparent'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:15px;height:15px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                    </svg>
                    Volver a Mis productos
                </a>
            </div>

        </div>
        </form>

    </div>
</div>

<script>
const input = document.getElementById('imageInput');
const preview = document.getElementById('img-preview');
const dropzone = document.getElementById('dropzone');

input.addEventListener('change', function () {
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
            dropzone.querySelector('.img-upload-icon').style.display = 'none';
            dropzone.querySelector('.img-upload-label').textContent = this.files[0].name;
            dropzone.querySelector('.img-upload-hint').style.display = 'none';
        };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

</x-app-layout>