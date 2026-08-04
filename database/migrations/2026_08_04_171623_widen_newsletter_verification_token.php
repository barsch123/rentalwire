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
        Schema::table('newsletter', function (Blueprint $table): void {
            $table->string('verification_token', 64)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletter', function (Blueprint $table): void {
            $table->string('verification_token', 60)->nullable()->change();
        });
    }
};
