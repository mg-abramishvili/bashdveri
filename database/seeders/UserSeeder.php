<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'adisadmin',
            'email' => 'adis@admin',
            'password' => '$2y$10$qBDXLtZr5/QqonC5kW4vYe8kI5eGuBJz8ZOVMvahIQg4cdyXjidRG',
        ]);
    }
}