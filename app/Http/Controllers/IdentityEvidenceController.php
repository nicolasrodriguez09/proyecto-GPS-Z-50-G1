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

    public function create(Request $request): View
    {
        $statusLookupEmail = trim($request->string('email')->toString());
        $statusUser = $statusLookupEmail !== ''
            ? User::query()->where('email', $statusLookupEmail)->first()
            : null;

        return view('identity-evidence.create', [
            'allowedFormats' => strtoupper(str_replace(',', ', ', self::ALLOWED_IMAGE_MIMES)),
            'statusLookupEmail' => $statusLookupEmail,
            'statusUser' => $statusUser,
            'statusMeta' => $statusUser ? $this->statusMeta($statusUser) : null,
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
        $user->identity_verification_status = User::IDENTITY_VERIFICATION_PENDING;
        $user->identity_verification_notes = null;
        $user->identity_verification_reviewed_at = null;
        $user->save();

        return redirect()
            ->route('identity-evidence.create', ['email' => $user->email])
            ->with('status', 'Las evidencias de identidad se cargaron y asociaron correctamente al usuario.');
    }

    public function pending(): View
    {
        $pendingUsers = User::query()
            ->where('identity_verification_status', User::IDENTITY_VERIFICATION_PENDING)
            ->whereNotNull('personal_photo_path')
            ->whereNotNull('identity_document_path')
            ->orderBy('created_at')
            ->get();

        return view('identity-evidence.pending', [
            'pendingUsers' => $pendingUsers,
        ]);
    }

    public function approve(User $user): RedirectResponse
    {
        $user->forceFill([
            'identity_verification_status' => User::IDENTITY_VERIFICATION_APPROVED,
            'identity_verification_notes' => 'Tu identidad fue validada correctamente.',
            'identity_verification_reviewed_at' => now(),
        ])->save();

        return redirect()
            ->route('identity-evidence.pending')
            ->with('status', "Se aprobo la verificacion de {$user->name}.");
    }

    public function reject(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'identity_verification_notes' => ['nullable', 'string', 'max:500'],
        ]);

        $user->forceFill([
            'identity_verification_status' => User::IDENTITY_VERIFICATION_REJECTED,
            'identity_verification_notes' => $validated['identity_verification_notes'] ?: 'La evidencia cargada no pudo ser validada. Por favor, vuelve a subir archivos mas claros.',
            'identity_verification_reviewed_at' => now(),
        ])->save();

        return redirect()
            ->route('identity-evidence.pending')
            ->with('status', "Se rechazo la verificacion de {$user->name}.");
    }

    private function statusMeta(User $user): array
    {
        return match ($user->identity_verification_status) {
            User::IDENTITY_VERIFICATION_PENDING => [
                'badge' => 'En revision',
                'title' => 'Tu verificacion esta pendiente.',
                'description' => 'Nuestro equipo revisara tu foto personal y tu documento antes de aprobar tu cuenta.',
                'classes' => 'border-amber-400/30 bg-amber-400/10 text-amber-100',
            ],
            User::IDENTITY_VERIFICATION_APPROVED => [
                'badge' => 'Aprobada',
                'title' => 'Tu identidad fue aprobada.',
                'description' => $user->identity_verification_notes ?: 'Tu perfil ya genera mayor confianza dentro de la plataforma.',
                'classes' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-100',
            ],
            User::IDENTITY_VERIFICATION_REJECTED => [
                'badge' => 'Rechazada',
                'title' => 'Tu verificacion fue rechazada.',
                'description' => $user->identity_verification_notes ?: 'Necesitamos que cargues nuevamente tus evidencias.',
                'classes' => 'border-rose-400/30 bg-rose-400/10 text-rose-100',
            ],
            default => [
                'badge' => 'Sin evidencias',
                'title' => 'Aun no has cargado evidencias.',
                'description' => 'Completa el formulario para iniciar el proceso de verificacion.',
                'classes' => 'border-slate-400/30 bg-slate-400/10 text-slate-100',
            ],
        };
    }
}
