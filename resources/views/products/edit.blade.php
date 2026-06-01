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
.pub-container { max-width: 900px; margin: 0 auto; }

.pub-header { display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; }
.pub-header-icon {
    width: 52px; height: 52px;
    background: linear-gradient(135deg, #f97316, #ea580c);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 16px rgba(249,115,22,0.25); flex-shrink: 0;
}
.pub-header-icon svg { width: 26px; height: 26px; color: white; }
.pub-title { font-family: 'Nunito', sans-serif; font-size: 1.75rem; font-weight: 800; color: #0f2d5e; line-height: 1.1; }
.pub-subtitle { font-size: 0.875rem; color: #6b7ea4; margin-top: 2px; }

.pub-layout { display: grid; grid-template-columns: 1fr 300px; gap: 1.5rem; }
@media (max-width: 768px) { .pub-layout { grid-template-columns: 1fr; } }

.pub-card { background: white; border-radius: 18px; box-shadow: 0 2px 20px rgba(26,95,168,0.07); overflow: hidden; }
.pub-card-header {
    padding: 1.25rem 1.5rem; border-bottom: 1px solid #eef2f9;
    display: flex; align-items: center; gap: 0.75rem;
}
.pub-card-dot { width: 8px; height: 8px; border-radius: 50%; background: linear-gradient(135deg, #f97316, #1a5fa8); }
.pub-card-title { font-family: 'Nunito', sans-serif; font-size: 0.95rem; font-weight: 700; color: #1a2f5e; text-transform: uppercase; letter-spacing: 0.05em; }
.pub-card-body { padding: 1.5rem; }

.field-group { margin-bottom: 1.25rem; }
.field-group:last-child { margin-bottom: 0; }
.field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

label { display: block; font-size: 0.8rem; font-weight: 600; color: #3a5080; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.45rem; }

input[type="text"], input[type="number"], textarea, select {
    width: 100%; padding: 0.65rem 0.9rem;
    border: 1.5px solid #dce6f5; border-radius: 10px;
    font-family: 'Poppins', sans-serif; font-size: 0.9rem; color: #1a2f5e;
    background: #fafcff; outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
input:focus, textarea:focus, select:focus { border-color: #f97316; box-shadow: 0 0 0 3px rgba(249,115,22,0.1); background: white; }
textarea { resize: vertical; min-height: 110px; }
select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%231a5fa8' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 0.9rem center; padding-right: 2.5rem;
}
.price-wrap { position: relative; }
.price-prefix { position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); font-size: 0.85rem; font-weight: 600; color: #6b7ea4; pointer-events: none; }
.price-wrap input { padding-left: 2.2rem; }

/* Current image */
.current-img-wrap {
    border-radius: 12px; overflow: hidden; margin-bottom: 1rem;
    background: #f0f4fb;
    position: relative;
}
.current-img-wrap img { width: 100%; height: 160px; object-fit: cover; display: block; }
.current-img-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 0.4rem 0.75rem;
    background: rgba(15,45,94,0.65);
    color: white; font-size: 0.72rem; font-weight: 600;
}

.img-upload-zone {
    border: 2px dashed #c3d4ee; border-radius: 12px;
    padding: 1.5rem 1rem; text-align: center; cursor: pointer;
    transition: all 0.2s; background: #f8fbff; position: relative;
}
.img-upload-zone:hover { border-color: #f97316; background: #fff8f4; }
.img-upload-zone input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; border: none; padding: 0; }
.img-upload-icon { width: 40px; height: 40px; margin: 0 auto 0.6rem; background: #e8f0fb; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
.img-upload-icon svg { width: 20px; height: 20px; color: #1a5fa8; }
.img-upload-label { font-size: 0.85rem; font-weight: 600; color: #1a5fa8; }
.img-upload-hint { font-size: 0.75rem; color: #6b7ea4; margin-top: 0.2rem; }
#img-preview { display: none; width: 100%; max-height: 150px; object-fit: cover; border-radius: 10px; margin-top: 0.75rem; }

/* Sidebar */
.sidebar-info {
    background: white; border-radius: 18px;
    box-shadow: 0 2px 20px rgba(26,95,168,0.07);
    overflow: hidden; margin-bottom: 1rem;
}
.sidebar-info-header {
    padding: 1rem 1.25rem; background: linear-gradient(135deg, #0f2d5e, #1a5fa8);
    color: white;
}
.sidebar-info-title { font-family: 'Nunito', sans-serif; font-size: 0.9rem; font-weight: 800; }
.sidebar-info-body { padding: 1.25rem; }
.info-row { display: flex; justify-content: space-between; align-items: center; padding: 0.5rem 0; border-bottom: 1px solid #f0f4fb; font-size: 0.82rem; }
.info-row:last-child { border-bottom: none; }
.info-key { color: #6b7ea4; font-weight: 500; }
.info-val { color: #0f2d5e; font-weight: 600; }

.btn-submit {
    width: 100%; padding: 0.85rem;
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white; border: none; border-radius: 12px;
    font-family: 'Nunito', sans-serif; font-size: 1rem; font-weight: 800;
    cursor: pointer; box-shadow: 0 4px 16px rgba(249,115,22,0.35);
    transition: transform 0.15s, box-shadow 0.15s;
    display: flex; align-items: center; justify-content: center; gap: 0.5rem;
    margin-top: 1rem;
}
.btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(249,115,22,0.45); }
.btn-submit svg { width: 18px; height: 18px; }

.btn-danger {
    width: 100%; padding: 0.7rem;
    background: #fff1f1; color: #dc2626;
    border: 1.5px solid #fca5a5; border-radius: 12px;
    font-family: 'Nunito', sans-serif; font-size: 0.875rem; font-weight: 700;
    cursor: pointer; transition: background 0.15s;
    display: flex; align-items: center; justify-content: center; gap: 0.4rem;
    margin-top: 0.6rem;
}
.btn-danger:hover { background: #fee2e2; }
.btn-danger svg { width: 15px; height: 15px; }

.alert-success {
    background: #f0fdf4; border: 1.5px solid #86efac;
    border-radius: 10px; padding: 0.85rem 1rem;
    color: #166534; font-size: 0.875rem; font-weight: 500;
    margin-bottom: 1.5rem;
    display: flex; align-items: center; gap: 0.5rem;
}
.alert-error {
    background: #fef2f2; border: 1.5px solid #fca5a5;
    border-radius: 10px; padding: 0.85rem 1rem;
    color: #991b1b; font-size: 0.875rem; margin-bottom: 1.5rem;
}
.alert-error ul { margin: 0.3rem 0 0 1rem; }
.alert-error li { margin-bottom: 0.2rem; }
</style>

<div class="pub-wrap">
<div class="pub-container">

    <div class="pub-header">
        <div class="pub-header-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
            </svg>
        </div>
        <div>
            <div class="pub-title">Editar publicación</div>
            <div class="pub-subtitle">{{ $product->name }}</div>
        </div>
    </div>

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

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="pub-layout">

        {{-- Main --}}
        <div>

            <div class="pub-card" style="margin-bottom:1.25rem">
                <div class="pub-card-header">
                    <div class="pub-card-dot"></div>
                    <div class="pub-card-title">Información del producto</div>
                </div>
                <div class="pub-card-body">

                    <div class="field-group">
                        <label for="name">Nombre del producto</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="field-group">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="field-row">
                        <div class="field-group" style="margin-bottom:0">
                            <label for="price">Precio por día</label>
                            <div class="price-wrap">
                                <span class="price-prefix">$</span>
                                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" min="0" required>
                            </div>
                        </div>
                        <div class="field-group" style="margin-bottom:0">
                            <label for="deposit">Depósito (opcional)</label>
                            <div class="price-wrap">
                                <span class="price-prefix">$</span>
                                <input type="number" id="deposit" name="deposit" value="{{ old('deposit', $product->deposit) }}" min="0">
                            </div>
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
                    @if($product->image)
                    <div class="current-img-wrap">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="current-img-label">📷 Imagen actual</div>
                    </div>
                    @endif

                    <div class="img-upload-zone" id="dropzone">
                        <input type="file" name="image" id="imageInput" accept="image/*">
                        <div class="img-upload-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                            </svg>
                        </div>
                        <div class="img-upload-label">{{ $product->image ? 'Cambiar imagen' : 'Subir imagen' }}</div>
                        <div class="img-upload-hint">JPG, PNG, WEBP · Máx. 5MB</div>
                        <img id="img-preview" alt="Nueva imagen">
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
                                <option value="Valle del Cauca" {{ old('department', $product->department) == 'Valle del Cauca' ? 'selected' : '' }}>Valle del Cauca</option>
                            </select>
                        </div>
                        <div class="field-group" style="margin-bottom:0">
                            <label for="city">Ciudad</label>
                            <select id="city" name="city" required>
                                @foreach(['Cali','Palmira','Jamundí','Yumbo','Tuluá','Buga','La Unión','La Victoria','Toro','Bolivar','Roldanillo','Zarzal','Sevilla','Caicedonia','Ginebra','Guacarí','Obando','Pradera','Trujillo','Versalles','Yotoco','Ansermanuevo'] as $city)
                                    <option value="{{ $city }}" {{ old('city', $product->city) == $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Sidebar --}}
        <div>
            <div class="sidebar-info">
                <div class="sidebar-info-header">
                    <div class="sidebar-info-title">📋 Datos actuales</div>
                </div>
                <div class="sidebar-info-body">
                    <div class="info-row">
                        <span class="info-key">Estado</span>
                        <span class="info-val" style="color: {{ $product->available ? '#16a34a' : '#dc2626' }}">
                            {{ $product->available ? '✅ Disponible' : '❌ No disponible' }}
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Precio</span>
                        <span class="info-val">${{ number_format($product->price, 0, ',', '.') }}/día</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Depósito</span>
                        <span class="info-val">{{ $product->deposit ? '$'.number_format($product->deposit, 0, ',', '.') : 'Sin depósito' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Ubicación</span>
                        <span class="info-val">{{ $product->city }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Publicado</span>
                        <span class="info-val">{{ $product->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
                Guardar cambios
            </button>

            <a href="{{ route('products.index') }}"
               style="display:flex;align-items:center;justify-content:center;gap:0.4rem;margin-top:0.75rem;padding:0.7rem;color:#6b7ea4;font-size:0.85rem;font-weight:600;text-decoration:none;border-radius:10px;transition:background 0.15s"
               onmouseover="this.style.background='#f0f4fb'" onmouseout="this.style.background='transparent'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:15px;height:15px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Volver sin guardar
            </a>

    </form>

            {{-- Delete form (fuera del form de editar) --}}
            <form method="POST" action="{{ route('products.destroy', $product) }}"
                  onsubmit="return confirm('¿Estás seguro? Esta acción no se puede deshacer.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                    Eliminar publicación
                </button>
            </form>

        </div>

    </div>

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
            dropzone.querySelector('.img-upload-label').textContent = this.files[0].name;
            dropzone.querySelector('.img-upload-hint').style.display = 'none';
        };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

</x-app-layout>