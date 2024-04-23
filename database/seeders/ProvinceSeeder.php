<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('provinces')->insert(
            ['name' => 'Maputo Cidade'],
            ['name' => 'Maputo Provincia'],
            ['name' => 'Gaza'],
            ['name' => 'Inhambane'],
            ['name' => 'Sofala'],
            ['name' => 'Manica'],
            ['name' => 'Tete'],
            ['name' => 'Nampula'],
            ['name' => 'Zambezia'],
            ['name' => 'Cabo Delgado'],
            ['name' => 'Niassa'],
    );
    }
}
