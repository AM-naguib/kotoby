<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = \App\Models\Setting::create([
            "site_title" => "Book",
            "description" => "Site Description",
            "keywords" => "Site Keywords",
        ]);
    }
}
