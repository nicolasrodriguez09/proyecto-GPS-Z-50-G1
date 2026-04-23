<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('personal_photo_path')->nullable()->after('password');
            $table->string('identity_document_path')->nullable()->after('personal_photo_path');
            $table->string('identity_verification_status')->default('not_submitted')->after('identity_document_path');
            $table->text('identity_verification_notes')->nullable()->after('identity_verification_status');
            $table->timestamp('identity_verification_reviewed_at')->nullable()->after('identity_verification_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'personal_photo_path',
                'identity_document_path',
                'identity_verification_status',
                'identity_verification_notes',
                'identity_verification_reviewed_at',
            ]);
        });
    }
};
