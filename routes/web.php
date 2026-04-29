<?php

use App\Http\Controllers\IdentityEvidenceController;
use App\Http\Controllers\RentalTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RentalTransactionController::class, 'create'])->name('rental-transactions.create');
Route::post('/rental-transactions', [RentalTransactionController::class, 'store'])->name('rental-transactions.store');
Route::get('/identity-evidence', [IdentityEvidenceController::class, 'create'])->name('identity-evidence.create');
Route::post('/identity-evidence', [IdentityEvidenceController::class, 'store'])->name('identity-evidence.store');
