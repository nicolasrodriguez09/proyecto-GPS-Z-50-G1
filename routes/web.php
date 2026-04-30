<?php

use App\Http\Controllers\ProductController;
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

Route::middleware(['auth', 'role:arrendador'])->group(function () {

    Route::get('/products/create', function () {
        return view('products.create');
    })->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/mis-productos', [ProductController::class, 'index'])
        ->name('products.index');
    Route::get('/products/{product}/edit',
    [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}',
    [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}',
    [ProductController::class, 'destroy'])
        ->name('products.destroy');


});

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

