<?php

use App\Http\Controllers\IdentityEvidenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IdentityEvidenceController::class, 'create'])->name('identity-evidence.create');
Route::post('/identity-evidence', [IdentityEvidenceController::class, 'store'])->name('identity-evidence.store');
Route::get('/admin/identity-evidence/pending', [IdentityEvidenceController::class, 'pending'])->name('identity-evidence.pending');
Route::post('/admin/identity-evidence/{user}/approve', [IdentityEvidenceController::class, 'approve'])->name('identity-evidence.approve');
Route::post('/admin/identity-evidence/{user}/reject', [IdentityEvidenceController::class, 'reject'])->name('identity-evidence.reject');
