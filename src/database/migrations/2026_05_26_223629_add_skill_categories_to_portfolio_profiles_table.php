<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('portfolio_profiles', 'skill_categories')) {
            Schema::table('portfolio_profiles', function (Blueprint $table) {
                $table->json('skill_categories')->nullable()->after('skills');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('portfolio_profiles', 'skill_categories')) {
            Schema::table('portfolio_profiles', function (Blueprint $table) {
                $table->dropColumn('skill_categories');
            });
        }
    }
};