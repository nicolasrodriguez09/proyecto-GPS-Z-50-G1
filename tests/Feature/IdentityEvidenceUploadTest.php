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

    public function test_identity_evidence_files_are_stored_and_linked_to_the_user(): void
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

        $response->assertRedirect(route('identity-evidence.create'));
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $user = User::query()->where('email', 'laura@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('Laura Martinez', $user->name);
        $this->assertNotNull($user->personal_photo_path);
        $this->assertNotNull($user->identity_document_path);
        $this->assertNotEmpty($user->password);

        Storage::disk('public')->assertExists($user->personal_photo_path);
        Storage::disk('public')->assertExists($user->identity_document_path);
    }
}
