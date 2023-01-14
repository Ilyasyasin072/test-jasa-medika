<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin12345678'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Operator',
            'email' => 'operator@example.com',
            'password' => Hash::make('operator12345678'),
            'role_id' => 2
        ]);
    }
}
