<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

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
    $user = auth()->user();

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

Route::middleware(['auth', 'role:arrendatario'])->get('/arrendatario', function () {
    return view('arrendatario');
});


// PERFIL 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

