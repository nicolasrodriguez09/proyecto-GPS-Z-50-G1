<?php

use App\Http\Controllers\IdentityEvidenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IdentityEvidenceController::class, 'create'])->name('identity-evidence.create');
Route::post('/identity-evidence', [IdentityEvidenceController::class, 'store'])->name('identity-evidence.store');
