<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                // User::factory(10)->create(]);

                // User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]]);
                // DB::table('operations')->insert([
                //         [
                //                 // 'id'=>1,
                //                 'name' => 'Entrega', 
                //                 'created_at' => now(),
                //                 'updated_at' => now(),
                //         ],
                //         [
                //                 // 'id'=>2,
                //                 'name' => 'Devolução', 
                //                 'created_at' => now(),
                //                 'updated_at' => now(),
                //         ],
                // ]);
                

                // DB::table('device_availabilities')->insert([
                //         [
                //                 // 'id'=>1,
                //                 'name' => 'Free', 
                //                 'created_at' => now(),
                //                 'updated_at' => now(),
                //         ],
                //         [
                //                 // 'id'=>2,
                //                 'name' => 'Busy', 'created_at' => now(),
                //                 'updated_at' => now(),
                //         ],
                // ]);
                DB::table('roles')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Admin', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>3,
                                'name' => 'Operator', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('trip_statuses')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Em curso', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Concluida', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('trelas')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'InterLink', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Triaxly', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
                DB::table('load_statuses')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Vazio', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                        [
                                // 'id'=>2,
                                'name' => 'Carregado', 
                                'created_at' => now(),
                                'updated_at' => now(),
                        ],
                ]);
             
               
                DB::table('users')->insert([
                        [
                                // 'id'=>1,
                                'name' => 'Admin',
                                'email' => 'admin@logistic.com',
                                'mobile' => '811234567',
                                'role_id' => 1,
                                'password' => Hash::make('password'),
                                'created_at' => now(),
                                'updated_at' => now(),
                        ]
                ]);
        }
}
