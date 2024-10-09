<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin'
            ],
            // advisor
            [
                'name' => 'advisor',
                'email' => 'advisor@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'advisor'
            ],
            // team
            [
                'name' => 'Team',
                'email' => 'team@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'team'
            ],
            // user
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user'
            ]
        ]);
    }
}
