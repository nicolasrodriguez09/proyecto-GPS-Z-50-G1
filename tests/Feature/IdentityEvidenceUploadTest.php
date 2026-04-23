<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class IdentityEvidenceUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_identity_evidence_form_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Carga tus evidencias para validar tu perfil.');
        $response->assertSee('Formatos permitidos');
        $response->assertSee('Resultado visible para el usuario');
    }

    public function test_required_fields_are_validated_before_submitting(): void
    {
        $response = $this->from('/')->post(route('identity-evidence.store'), []);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors([
            'name',
            'email',
            'personal_photo',
            'identity_document',
        ]);
    }

    public function test_only_allowed_image_formats_can_be_uploaded(): void
    {
        Storage::fake('public');

        $response = $this->from('/')->post(route('identity-evidence.store'), [
            'name' => 'Laura Martinez',
            'email' => 'laura@example.com',
            'personal_photo' => UploadedFile::fake()->create('foto.pdf', 50, 'application/pdf'),
            'identity_document' => UploadedFile::fake()->create('documento.gif', 50, 'image/gif'),
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors([
            'personal_photo',
            'identity_document',
        ]);
    }

    public function test_identity_evidence_files_are_stored_and_linked_to_the_user_with_pending_status(): void
    {
        Storage::fake('public');

        $personalPhoto = UploadedFile::fake()->image('personal-photo.jpg');
        $identityDocument = UploadedFile::fake()->image('identity-document.png');

        $response = $this->post(route('identity-evidence.store'), [
            'name' => 'Laura Martinez',
            'email' => 'laura@example.com',
            'personal_photo' => $personalPhoto,
            'identity_document' => $identityDocument,
        ]);

        $response->assertRedirect(route('identity-evidence.create', ['email' => 'laura@example.com']));
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $user = User::query()->where('email', 'laura@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('Laura Martinez', $user->name);
        $this->assertSame(User::IDENTITY_VERIFICATION_PENDING, $user->identity_verification_status);
        $this->assertNull($user->identity_verification_reviewed_at);
        $this->assertNotNull($user->personal_photo_path);
        $this->assertNotNull($user->identity_document_path);
        $this->assertNotEmpty($user->password);

        Storage::disk('public')->assertExists($user->personal_photo_path);
        Storage::disk('public')->assertExists($user->identity_document_path);
    }

    public function test_pending_users_view_shows_uploaded_photo_and_identity_document(): void
    {
        $pendingUser = User::factory()->create([
            'name' => 'Laura Martinez',
            'email' => 'laura@example.com',
            'personal_photo_path' => 'identity-evidence/personal-photos/laura.jpg',
            'identity_document_path' => 'identity-evidence/identity-documents/laura.png',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_PENDING,
        ]);

        User::factory()->create([
            'name' => 'Usuario Aprobado',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_APPROVED,
            'personal_photo_path' => 'identity-evidence/personal-photos/aprobado.jpg',
            'identity_document_path' => 'identity-evidence/identity-documents/aprobado.png',
        ]);

        $response = $this->get(route('identity-evidence.pending'));

        $response->assertOk();
        $response->assertSee('Usuarios pendientes por verificar');
        $response->assertSee($pendingUser->name);
        $response->assertSee('storage/'.$pendingUser->personal_photo_path, false);
        $response->assertSee('storage/'.$pendingUser->identity_document_path, false);
        $response->assertDontSee('Usuario Aprobado');
    }

    public function test_admin_can_approve_a_pending_user_verification(): void
    {
        $user = User::factory()->create([
            'name' => 'Laura Martinez',
            'personal_photo_path' => 'identity-evidence/personal-photos/laura.jpg',
            'identity_document_path' => 'identity-evidence/identity-documents/laura.png',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_PENDING,
            'identity_verification_notes' => null,
            'identity_verification_reviewed_at' => null,
        ]);

        $response = $this->post(route('identity-evidence.approve', $user));

        $response->assertRedirect(route('identity-evidence.pending'));
        $response->assertSessionHas('status', 'Se aprobo la verificacion de Laura Martinez.');

        $user->refresh();

        $this->assertSame(User::IDENTITY_VERIFICATION_APPROVED, $user->identity_verification_status);
        $this->assertSame('Tu identidad fue validada correctamente.', $user->identity_verification_notes);
        $this->assertNotNull($user->identity_verification_reviewed_at);
    }

    public function test_admin_can_reject_a_pending_user_verification(): void
    {
        $user = User::factory()->create([
            'name' => 'Laura Martinez',
            'personal_photo_path' => 'identity-evidence/personal-photos/laura.jpg',
            'identity_document_path' => 'identity-evidence/identity-documents/laura.png',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_PENDING,
        ]);

        $response = $this->post(route('identity-evidence.reject', $user), [
            'identity_verification_notes' => 'La foto no coincide con el documento.',
        ]);

        $response->assertRedirect(route('identity-evidence.pending'));
        $response->assertSessionHas('status', 'Se rechazo la verificacion de Laura Martinez.');

        $user->refresh();

        $this->assertSame(User::IDENTITY_VERIFICATION_REJECTED, $user->identity_verification_status);
        $this->assertSame('La foto no coincide con el documento.', $user->identity_verification_notes);
        $this->assertNotNull($user->identity_verification_reviewed_at);
    }

    public function test_user_can_consult_approved_verification_result(): void
    {
        $user = User::factory()->create([
            'email' => 'laura@example.com',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_APPROVED,
            'identity_verification_notes' => 'Tu identidad fue validada correctamente.',
            'identity_verification_reviewed_at' => now(),
        ]);

        $response = $this->get(route('identity-evidence.create', ['email' => $user->email]));

        $response->assertOk();
        $response->assertSee('Tu identidad fue aprobada.');
        $response->assertSee('Tu identidad fue validada correctamente.');
    }

    public function test_user_can_consult_rejected_verification_result(): void
    {
        $user = User::factory()->create([
            'email' => 'laura@example.com',
            'identity_verification_status' => User::IDENTITY_VERIFICATION_REJECTED,
            'identity_verification_notes' => 'Debes subir un documento mas legible.',
            'identity_verification_reviewed_at' => now(),
        ]);

        $response = $this->get(route('identity-evidence.create', ['email' => $user->email]));

        $response->assertOk();
        $response->assertSee('Tu verificacion fue rechazada.');
        $response->assertSee('Debes subir un documento mas legible.');
    }
}
