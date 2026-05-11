<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArrendatarioController;
use App\Http\Controllers\ArrendadorController;
use App\Http\Controllers\IdentityEvidenceController;
use App\Http\Controllers\LandlordRentalRequestController;
use App\Http\Controllers\RentalConfirmationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ── IDENTITY EVIDENCE ──────────────────────────────────────────────────────────
Route::get('/identity-evidence/create', [IdentityEvidenceController::class, 'create'])->name('identity-evidence.create');
Route::post('/identity-evidence',       [IdentityEvidenceController::class, 'store'])->name('identity-evidence.store');

// ── RAÍZ ───────────────────────────────────────────────────────────────────────
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if (!$user) return view('home');
        if ($user->role === 'admin')      return redirect('/admin');
        if ($user->role === 'arrendador') return redirect('/arrendador');

        return redirect('/arrendatario');
    }

    return view('home');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user)                       return redirect('/');
    if ($user->role === 'admin')      return redirect('/admin');
    if ($user->role === 'arrendador') return redirect('/arrendador');

    return redirect('/arrendatario');
})->middleware('auth')->name('dashboard');

// ── ADMIN ──────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin');
});

// ── ARRENDADOR ─────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:arrendador'])->group(function () {

    // Panel principal
    Route::get('/arrendador', [ArrendadorController::class, 'index'])->name('arrendador');

    // Solicitudes recibidas (HU-15)
    Route::get('/arrendador/solicitudes', [LandlordRentalRequestController::class, 'index'])
         ->name('landlord.requests.index');
    Route::patch('/arrendador/solicitudes/{transaction}', [LandlordRentalRequestController::class, 'update'])
         ->name('landlord.requests.update');

    // Productos
    Route::get('/products/create',         [ProductController::class, 'create'])->name('products.create');
    Route::post('/products',               [ProductController::class, 'store'])->name('products.store');
    Route::get('/mis-productos',           [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}',      [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}',   [ProductController::class, 'destroy'])->name('products.destroy');
});

// ── ARRENDATARIO ───────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:arrendatario'])->group(function () {

    Route::get('/arrendatario', [ArrendatarioController::class, 'index'])->name('arrendatario');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Confirmación de arriendo
    Route::get('/rentals/create', [RentalConfirmationController::class, 'index'])->name('rentals.create');
    Route::get('/rentals/terms',  [RentalConfirmationController::class, 'terms'])->name('rentals.terms');
    Route::post('/rentals',       [RentalConfirmationController::class, 'store'])->name('rentals.store');
});

// ── PERFIL ─────────────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// SOLO PARA PREVIEW — borrar después
Route::get('/preview/reset-password', function () {
    return view('auth.reset-password', ['request' => request()]);
});

require __DIR__.'/auth.php';