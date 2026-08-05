<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $mappings = [
            ['Complete Solar Kits', null, 'Solar Panels', 'Monocrystalline Panels'],
            ['Battery Storage', 'Home Batteries', 'Solar Batteries', 'Home Battery Storage'],
            ['Battery Storage', 'Commercial Storage', 'Solar Batteries', 'Commercial Battery Storage'],
            ['Battery Storage', 'Portable Power', 'Portable Power Stations', 'Medium Capacity'],
            ['Inverters & Controls', 'Hybrid Inverters', 'Solar Inverters', 'Hybrid Inverters'],
            ['Inverters & Controls', 'Microinverters', 'Solar Inverters', 'Microinverters'],
            ['Inverters & Controls', 'Charge Controllers', 'Solar Inverters', 'Off-Grid Inverters'],
            ['Mounting & Electrical', 'Roof Mounting', 'Installation Services', 'Residential Installation'],
            ['Mounting & Electrical', 'Ground Mounting', 'Installation Services', 'Commercial Installation'],
            ['Mounting & Electrical', 'Electrical Protection', 'Installation Services', 'System Upgrades'],
            ['Monitoring & Maintenance', 'Energy Monitoring', 'Maintenance Plans', 'Monitoring & Repairs'],
            ['Monitoring & Maintenance', 'Panel Cleaning', 'Maintenance Plans', 'Panel Cleaning'],
            ['Monitoring & Maintenance', 'Maintenance Plans', 'Maintenance Plans', 'System Inspection'],
        ];

        foreach ($mappings as [$legacyCategory, $legacySubcategory, $category, $subcategory]) {
            DB::table('equipmentrentals')
                ->where('category', $legacyCategory)
                ->when($legacySubcategory, fn ($query) => $query->where('subcategory', $legacySubcategory))
                ->update([
                    'category' => $category,
                    'subcategory' => $subcategory,
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $mappings = [
            ['Solar Panels', 'Monocrystalline Panels', 'Complete Solar Kits', 'Grid-Tied Kits'],
            ['Solar Batteries', 'Home Battery Storage', 'Battery Storage', 'Home Batteries'],
            ['Solar Batteries', 'Commercial Battery Storage', 'Battery Storage', 'Commercial Storage'],
            ['Portable Power Stations', 'Medium Capacity', 'Battery Storage', 'Portable Power'],
            ['Solar Inverters', 'Hybrid Inverters', 'Inverters & Controls', 'Hybrid Inverters'],
            ['Solar Inverters', 'Microinverters', 'Inverters & Controls', 'Microinverters'],
            ['Solar Inverters', 'Off-Grid Inverters', 'Inverters & Controls', 'Charge Controllers'],
            ['Installation Services', 'Residential Installation', 'Mounting & Electrical', 'Roof Mounting'],
            ['Installation Services', 'Commercial Installation', 'Mounting & Electrical', 'Ground Mounting'],
            ['Installation Services', 'System Upgrades', 'Mounting & Electrical', 'Electrical Protection'],
            ['Maintenance Plans', 'Monitoring & Repairs', 'Monitoring & Maintenance', 'Energy Monitoring'],
            ['Maintenance Plans', 'Panel Cleaning', 'Monitoring & Maintenance', 'Panel Cleaning'],
            ['Maintenance Plans', 'System Inspection', 'Monitoring & Maintenance', 'Maintenance Plans'],
        ];

        foreach ($mappings as [$category, $subcategory, $legacyCategory, $legacySubcategory]) {
            DB::table('equipmentrentals')
                ->where('category', $category)
                ->when($subcategory, fn ($query) => $query->where('subcategory', $subcategory))
                ->update([
                    'category' => $legacyCategory,
                    'subcategory' => $legacySubcategory,
                ]);
        }
    }
};
