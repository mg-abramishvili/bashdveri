<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SurfaceSeeder extends Seeder
{
    public function run()
    {
        DB::table('surfaces')->insert([
            [
                'name' => 'ламинированное',
            ],
            [
                'name' => 'пвх',
            ],
            [
                'name' => 'экошпон',
            ],
            [
                'name' => 'экокрафт',
            ],
            [
                'name' => 'эмаль',
            ],
            [
                'name' => 'шпон',
            ],
            [
                'name' => 'массив',
            ],
        ]);
    }
}