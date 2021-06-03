<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StyleSeeder extends Seeder
{
    public function run()
    {
        DB::table('styles')->insert([
            [
                'name' => 'современный',
            ],
            [
                'name' => 'классика',
            ],
            [
                'name' => 'неоклассика',
            ],
            [
                'name' => 'ультра',
            ],
        ]);
    }
}