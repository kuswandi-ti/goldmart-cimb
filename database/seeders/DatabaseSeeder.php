<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolePermissionTableSeeder;
use Database\Seeders\GramasiTableSeeder;
use Database\Seeders\FormatDateTableSeeder;
use Database\Seeders\FormatTimeTableSeeder;
use Database\Seeders\SettingSystemTableSeeder;
use KodePandai\Indonesia\IndonesiaDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FormatDateTableSeeder::class);
        $this->call(FormatTimeTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(SettingSystemTableSeeder::class);
        $this->call(GramasiTableSeeder::class);
        $this->call(IndonesiaDatabaseSeeder::class);
    }
}
