<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductionSeeder extends Seeder
{
    public function run()
    {
        DB::table('productions')->insert([
            [
                'name' => 'в наличии',
            ],
            [
                'name' => 'до 2-х недель',
            ],
            [
                'name' => 'до месяца',
            ],
            [
                'name' => 'более месяца',
            ],
        ]);
    }
}