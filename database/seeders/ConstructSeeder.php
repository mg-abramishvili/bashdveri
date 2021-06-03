<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConstructSeeder extends Seeder
{
    public function run()
    {
        DB::table('constructs')->insert([
            [
                'name' => 'царговая',
            ],
            [
                'name' => 'щитовая',
            ],
            [
                'name' => 'массив',
            ],
        ]);
    }
}