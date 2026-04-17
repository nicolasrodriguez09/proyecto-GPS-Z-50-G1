import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Register from './pages/Register';

const app = document.getElementById('app');

if (app) {
    ReactDOM.createRoot(app).render(
        <React.StrictMode>
            <Register />
        </React.StrictMode>
    );
}