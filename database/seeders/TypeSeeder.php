<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
            'id' => '1',
            'type' => 'глухая' 
            ],
            [
            'id' => '2',
            'type' => 'остекленная' 
            ],
            [
            'id' => '3',
            'type' => 'зеркало' 
            ],
            [
            'id' => '4',
            'type' => 'молдинг' 
            ],
        ]);
    }
}
