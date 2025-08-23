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
        Schema::create('equipmentrentals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->decimal('price', 16, 2);
            $table->text('description');
            $table->string('photo');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipmentrentals');
    }
};
