<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            ['code' => 'AS', 'name' => 'adulto sin identificación'],
            ['code' => 'CC', 'name' => 'cédula de ciudadanía'],
            ['code' => 'CE', 'name' => 'cédula de extranjería'],
            ['code' => 'MS', 'name' => 'menor sin identificación'],
            ['code' => 'PA', 'name' => 'pasaporte'],
            ['code' => 'RC', 'name' => 'registro civil de nacimiento'],
            ['code' => 'SI', 'name' => 'sin identificación'],
            ['code' => 'TI', 'name' => 'tarjeta de identidad'],
        ]);
    }
}
