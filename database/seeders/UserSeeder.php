<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Oleg',
            'email' => 'oleg@example.com',
            'password' => Hash::make('password'),
            'is_admin' => 0
        ], [
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]]);
    }
}
