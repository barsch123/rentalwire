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
         Schema::create('newsletter', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('status')->default('subscribed');
            $table->string('verification_token', 60)->nullable();
            $table->timestamp('last_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter');
    }
};
