<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArrendatarioController;
use App\Http\Controllers\IdentityEvidenceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rutas de Identity Evidence
// Nota: Se cambió la ruta '/' de Identity a '/identity-evidence/create' para evitar conflicto con tu redirección de roles.
//Eliminar las dos rutas en caso de que el merge siga dando conflicto.
Route::get('/identity-evidence/create', [IdentityEvidenceController::class, 'create'])->name('identity-evidence.create');
Route::post('/identity-evidence', [IdentityEvidenceController::class, 'store'])->name('identity-evidence.store');

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if (!$user) {
            return view('home');
        }

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'arrendador') {
            return redirect('/arrendador');
        }

        return redirect('/arrendatario');
    }

    return view('home');
});


Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/');
    }

    if ($user->role === 'admin') {
        return redirect('/admin');
    }

    if ($user->role === 'arrendador') {
        return redirect('/arrendador');
    }

    return redirect('/arrendatario');
})->middleware('auth')->name('dashboard');

// 🔒 RUTAS PROTEGIDAS POR ROL

Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin');
});

Route::middleware(['auth', 'role:arrendador'])->get('/arrendador', function () {
    return view('arrendador');
});

Route::middleware(['auth', 'role:arrendatario'])->get('/arrendatario', [ArrendatarioController::class, 'index']);


// PERFIL 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// SOLO PARA PREVIEW — borrar después
Route::get('/preview/reset-password', function () {
    return view('auth.reset-password', [
        'request' => request()
    ]);
});
require __DIR__.'/auth.php';

