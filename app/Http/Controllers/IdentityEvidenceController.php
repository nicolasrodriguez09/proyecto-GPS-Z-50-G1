<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IdentityEvidenceController extends Controller
{
    private const ALLOWED_IMAGE_MIMES = 'jpg,jpeg,png,webp';

    public function create(): View
    {
        return view('identity-evidence.create', [
            'allowedFormats' => strtoupper(str_replace(',', ', ', self::ALLOWED_IMAGE_MIMES)),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'personal_photo' => ['required', 'image', 'mimes:'.self::ALLOWED_IMAGE_MIMES, 'max:5120'],
            'identity_document' => ['required', 'image', 'mimes:'.self::ALLOWED_IMAGE_MIMES, 'max:5120'],
        ], [
            'personal_photo.required' => 'La foto personal es obligatoria.',
            'personal_photo.image' => 'La foto personal debe ser una imagen valida.',
            'personal_photo.mimes' => 'La foto personal debe estar en formato JPG, JPEG, PNG o WEBP.',
            'identity_document.required' => 'El documento de identidad es obligatorio.',
            'identity_document.image' => 'El documento de identidad debe ser una imagen valida.',
            'identity_document.mimes' => 'El documento de identidad debe estar en formato JPG, JPEG, PNG o WEBP.',
        ]);

        $user = User::query()->firstOrNew([
            'email' => $validated['email'],
        ]);

        $oldPersonalPhotoPath = $user->personal_photo_path;
        $oldIdentityDocumentPath = $user->identity_document_path;

        $personalPhotoPath = $request->file('personal_photo')->store('identity-evidence/personal-photos', 'public');
        $identityDocumentPath = $request->file('identity_document')->store('identity-evidence/identity-documents', 'public');

        if ($user->exists) {
            if ($oldPersonalPhotoPath) {
                Storage::disk('public')->delete($oldPersonalPhotoPath);
            }

            if ($oldIdentityDocumentPath) {
                Storage::disk('public')->delete($oldIdentityDocumentPath);
            }
        } else {
            $user->password = Hash::make(Str::random(40));
        }

        $user->name = $validated['name'];
        $user->personal_photo_path = $personalPhotoPath;
        $user->identity_document_path = $identityDocumentPath;
        $user->save();

        return redirect()
            ->route('identity-evidence.create')
            ->with('status', 'Las evidencias de identidad se cargaron y asociaron correctamente al usuario.');
    }
}
