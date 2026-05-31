<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('portfolio_profiles', 'photo')) {
            Schema::table('portfolio_profiles', function (Blueprint $table) {
                $table->string('photo')->nullable()->after('headline');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('portfolio_profiles', 'photo')) {
            Schema::table('portfolio_profiles', function (Blueprint $table) {
                $table->dropColumn('photo');
            });
        }
    }
};