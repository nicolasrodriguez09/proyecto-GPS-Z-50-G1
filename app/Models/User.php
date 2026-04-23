<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const IDENTITY_VERIFICATION_NOT_SUBMITTED = 'not_submitted';
    public const IDENTITY_VERIFICATION_PENDING = 'pending';
    public const IDENTITY_VERIFICATION_APPROVED = 'approved';
    public const IDENTITY_VERIFICATION_REJECTED = 'rejected';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'personal_photo_path',
        'identity_document_path',
        'identity_verification_status',
        'identity_verification_notes',
        'identity_verification_reviewed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'identity_verification_reviewed_at' => 'datetime',
        ];
    }
}
