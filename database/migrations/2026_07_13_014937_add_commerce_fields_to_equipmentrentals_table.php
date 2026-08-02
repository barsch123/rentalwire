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
        Schema::table('equipmentrentals', function (Blueprint $table) {
            $table->unsignedInteger('stock_quantity')->default(10)->after('price');
            $table->string('availability_status')->default('available')->after('stock_quantity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipmentrentals', function (Blueprint $table) {
            $table->dropColumn(['stock_quantity', 'availability_status']);
        });
    }
};
