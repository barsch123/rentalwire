<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('equipmentrentals')) {
            return;
        }

        $this->replaceCategories([
            'Trenchers' => ['Complete Solar Kits', 'Off-Grid Kits'],
            'Dozers' => ['Solar Panels', 'Monocrystalline Panels'],
            'Loaders' => ['Battery Storage', 'Home Batteries'],
            'Graders' => ['Inverters & Controls', 'Hybrid Inverters'],
            'Dump Trucks' => ['Mounting & Electrical', 'Roof Mounting'],
            'Compactors' => ['Monitoring & Maintenance', 'Maintenance Plans'],
            'Residential Solar' => ['Complete Solar Kits', 'Grid-Tied Kits'],
            'Commercial Solar' => ['Solar Panels', 'Bifacial Panels'],
            'Inverters' => ['Inverters & Controls', 'Hybrid Inverters'],
            'Maintenance' => ['Monitoring & Maintenance', 'Maintenance Plans'],
        ]);
    }

    public function down(): void
    {
        // Multiple legacy categories consolidate into the same solar category.
    }

    /**
     * @param  array<string, array{0: string, 1: string}>  $categories
     */
    private function replaceCategories(array $categories): void
    {
        foreach ($categories as $legacyCategory => [$category, $subcategory]) {
            DB::table('equipmentrentals')
                ->where('category', $legacyCategory)
                ->update([
                    'category' => $category,
                    'subcategory' => $subcategory,
                    'updated_at' => now(),
                ]);
        }
    }
};
