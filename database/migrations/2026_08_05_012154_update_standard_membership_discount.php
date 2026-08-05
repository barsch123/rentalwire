<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->unsignedTinyInteger('discount_percent')->default(3)->change();
        });

        DB::table('users')
            ->where('membership_tier', 'standard')
            ->where('discount_percent', 0)
            ->update(['discount_percent' => 3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')
            ->where('membership_tier', 'standard')
            ->where('discount_percent', 3)
            ->update(['discount_percent' => 0]);

        Schema::table('users', function (Blueprint $table): void {
            $table->unsignedTinyInteger('discount_percent')->default(0)->change();
        });
    }
};
