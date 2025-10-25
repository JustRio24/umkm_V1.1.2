<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'justrio24@gmail.com',
            'password' => '12345', // sudah hash
        ]);
    }
}
