<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("brands")->insert([
            ["name"=>"renault"],
            ["name"=>"ferrari"],
            ["name"=>"mazda"],
            ["name"=>"toyota"],
            ["name"=>"chevrolet"],
            ["name"=>"volkswagen"],
            ["name"=>"kia"],
            ["name"=>"hyundai"],
            ["name"=>"isuzu"],
            ["name"=>"ford"],
            ["name"=>"suzuki"],
            ["name"=>"tesla"],
            ["name"=>"nissan"],
            ["name"=>"honda"],
            ["name"=>"bmw"],
        ]);

    }
}
