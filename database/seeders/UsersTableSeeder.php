<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'fname' => 'Admin',
                'lname' => 'Admin',
                'Username' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('1234'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'user',
                'lname' => 'user',
                'Username' => 'user User',
                'email' => 'user@example.com',
                'password' => Hash::make('1234'),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
