<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->longText('description')->nullable();

            $table->longText('problem_analysis')->nullable();
            $table->longText('system_requirement')->nullable();
            $table->longText('architecture')->nullable();
            $table->json('tech_stack')->nullable();
            $table->string('diagram_path')->nullable();

            $table->string('repository_url')->nullable();
            $table->string('demo_url')->nullable();

            $table->string('status')->default('planning');
            $table->unsignedTinyInteger('progress')->default(0);

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index(['is_published', 'is_featured']);
            $table->index(['status', 'progress']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};