<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'ipiales'],
            ['name' => 'samaniego'],
            ['name' => 'san juan de pasto'],
            ['name' => 'tumaco'],
            ['name' => 'túquerres'],
        ]);
    }
}
