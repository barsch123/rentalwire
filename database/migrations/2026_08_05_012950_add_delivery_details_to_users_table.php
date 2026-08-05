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
        Schema::table('users', function (Blueprint $table): void {
            $table->string('delivery_first_name')->nullable()->after('discount_percent');
            $table->string('delivery_last_name')->nullable()->after('delivery_first_name');
            $table->string('delivery_mobile_number')->nullable()->after('delivery_last_name');
            $table->string('delivery_address')->nullable()->after('delivery_mobile_number');
            $table->string('delivery_city')->nullable()->after('delivery_address');
            $table->string('delivery_parish')->nullable()->after('delivery_city');
            $table->string('delivery_postal_code')->nullable()->after('delivery_parish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'delivery_first_name',
                'delivery_last_name',
                'delivery_mobile_number',
                'delivery_address',
                'delivery_city',
                'delivery_parish',
                'delivery_postal_code',
            ]);
        });
    }
};
