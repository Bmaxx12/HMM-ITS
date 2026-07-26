<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $units = \App\Models\CabinetUnit::all();
        
        foreach ($units as $unit) {
            // Extract abbreviation if possible, or use full name. Let's use full name for now.
            $name = $unit->name;
            $slug = \Illuminate\Support\Str::slug($name);
            Category::firstOrCreate(['slug' => $slug], ['name' => $name]);
        }
    }
}
