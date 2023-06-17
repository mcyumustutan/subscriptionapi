<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'code' => 'tr',
                'is_active' => 1
            ], [
                'code' => 'en',
                'is_active' => 1
            ], [
                'code' => 'ru',
                'is_active' => 1
            ], [
                'code' => 'az',
                'is_active' => 1
            ], [
                'code' => 'de',
                'is_active' => 0
            ], [
                'code' => 'fr',
                'is_active' => 0
            ],
        ];

        Language::insert($languages);
    }
}
