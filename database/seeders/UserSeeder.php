<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
            'name' => 'Admin',
            'email' => 'admin@cornelder.co.mz',
            'mobile' => '811234567',
            'role_id'=>1,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
    }
}
