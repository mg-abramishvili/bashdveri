<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManufacturerSeeder extends Seeder
{
    public function run()
    {
        DB::table('manufacturers')->insert([
            [
                'name' => 'VFD',
            ],
            [
                'name' => 'ВДК',
            ],
            [
                'name' => 'Optima Porte',
            ],
            [
                'name' => 'ДверЛайн',
            ],
            [
                'name' => 'Гринлайн',
            ],
            [
                'name' => 'Лорд',
            ],
            [
                'name' => 'Терри',
            ],
            [
                'name' => 'Ферони',
            ],
            [
                'name' => 'Аргус',
            ],
            [
                'name' => 'Тайгер',
            ],
            [
                'name' => 'Агат',
            ],
            [
                'name' => 'Меги',
            ],
        ]);
    }
}