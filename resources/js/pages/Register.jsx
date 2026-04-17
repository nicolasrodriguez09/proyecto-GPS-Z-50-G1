import React, { useState } from 'react';

export default function Register() {
    const [form, setForm] = useState({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        role: '',
    });

    const [errors, setErrors] = useState({});

    const handleChange = (e) => {
        const { name, value } = e.target;

        setForm((prev) => ({
            ...prev,
            [name]: value,
        }));
    };

    const validate = () => {
        const newErrors = {};

        if (!form.name.trim()) newErrors.name = 'El nombre es obligatorio';
        if (!form.email.trim()) {
            newErrors.email = 'El correo es obligatorio';
        } else if (!/\S+@\S+\.\S+/.test(form.email)) {
            newErrors.email = 'El correo no es válido';
        }

        if (!form.password) {
            newErrors.password = 'La contraseña es obligatoria';
        } else if (form.password.length < 8) {
            newErrors.password = 'Debe tener al menos 8 caracteres';
        }

        if (!form.password_confirmation) {
            newErrors.password_confirmation = 'Debes confirmar la contraseña';
        } else if (form.password !== form.password_confirmation) {
            newErrors.password_confirmation = 'Las contraseñas no coinciden';
        }

        if (!form.role) newErrors.role = 'Debes seleccionar un tipo de usuario';

        return newErrors;
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        const validationErrors = validate();
        setErrors(validationErrors);

        if (Object.keys(validationErrors).length > 0) return;

        console.log('Formulario listo para enviar:', form);
    };

    return (
        <div style={{ minHeight: '100vh', display: 'flex', justifyContent: 'center', alignItems: 'center', background: '#f5f5f5' }}>
            <div style={{ width: '420px', padding: '24px', border: '1px solid #ddd', borderRadius: '12px', background: '#fff' }}>
                <h1 style={{ marginBottom: '20px', fontSize: '24px' }}>Crear cuenta</h1>

                <form onSubmit={handleSubmit}>
                    <div style={{ marginBottom: '12px' }}>
                        <label>Nombre</label>
                        <input
                            name="name"
                            type="text"
                            value={form.name}
                            onChange={handleChange}
                            placeholder="Tu nombre"
                            style={{ width: '100%', padding: '10px', marginTop: '4px' }}
                        />
                        {errors.name && <small style={{ color: 'red' }}>{errors.name}</small>}
                    </div>

                    <div style={{ marginBottom: '12px' }}>
                        <label>Correo</label>
                        <input
                            name="email"
                            type="email"
                            value={form.email}
                            onChange={handleChange}
                            placeholder="tucorreo@email.com"
                            style={{ width: '100%', padding: '10px', marginTop: '4px' }}
                        />
                        {errors.email && <small style={{ color: 'red' }}>{errors.email}</small>}
                    </div>

                    <div style={{ marginBottom: '12px' }}>
                        <label>Contraseña</label>
                        <input
                            name="password"
                            type="password"
                            value={form.password}
                            onChange={handleChange}
                            placeholder="********"
                            style={{ width: '100%', padding: '10px', marginTop: '4px' }}
                        />
                        {errors.password && <small style={{ color: 'red' }}>{errors.password}</small>}
                    </div>

                    <div style={{ marginBottom: '12px' }}>
                        <label>Confirmar contraseña</label>
                        <input
                            name="password_confirmation"
                            type="password"
                            value={form.password_confirmation}
                            onChange={handleChange}
                            placeholder="********"
                            style={{ width: '100%', padding: '10px', marginTop: '4px' }}
                        />
                        {errors.password_confirmation && <small style={{ color: 'red' }}>{errors.password_confirmation}</small>}
                    </div>

                    <div style={{ marginBottom: '16px' }}>
                        <label>Tipo de usuario</label>
                        <select
                            name="role"
                            value={form.role}
                            onChange={handleChange}
                            style={{ width: '100%', padding: '10px', marginTop: '4px' }}
                        >
                            <option value="">Selecciona un rol</option>
                            <option value="tenant">Arrendatario</option>
                            <option value="landlord">Arrendador</option>
                        </select>
                        {errors.role && <small style={{ color: 'red' }}>{errors.role}</small>}
                    </div>

                    <button type="submit" style={{ width: '100%', padding: '12px' }}>
                        Registrarse
                    </button>
                </form>
            </div>
        </div>
    );
}