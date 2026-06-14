<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Berita Organisasi', 'slug' => 'berita-organisasi'],
            ['name' => 'Prestasi',           'slug' => 'prestasi'],
            ['name' => 'Kegiatan',           'slug' => 'kegiatan'],
            ['name' => 'Akademik',           'slug' => 'akademik'],
            ['name' => 'Sosial',             'slug' => 'sosial'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
