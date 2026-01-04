<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up(): void
    {
        DB::statement('CREATE DATABASE IF NOT EXISTS translation_service');
        DB::statement('USE translation_service');

        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('key')->index('idx_key');
            $table->foreignId('locale_id')->index('idx_locale')->constrained('locales');
            $table->text('value');
            $table->timestamps();

            $table->unique(['key', 'locale_id']);
        });

        DB::statement('CREATE INDEX idx_value ON translations(value(191))');

        Schema::create('tag_translation', function (Blueprint $table) {
            $table->foreignId('translation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->primary(['translation_id', 'tag_id']);
        });

        Schema::create('api_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token',64)->unique();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_translation');
        Schema::dropIfExists('translations');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('locales');
        Schema::dropIfExists('api_tokens');

        DB::statement('DROP DATABASE IF EXISTS translation_service');
    }
};
