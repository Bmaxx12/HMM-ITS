<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user untuk login Filament
        User::firstOrCreate(
            ['email' => 'admin@hmmits.ac.id'],
            [
                'name'     => 'Admin HMM ITS',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            SiteSettingSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CabinetSeeder::class,
        ]);
    }
}
