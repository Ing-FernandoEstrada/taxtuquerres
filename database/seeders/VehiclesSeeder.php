<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("vehicles")->insert([
            ['number' => "115", 'brand_id' => 1, 'model' => "2012", 'plate' => "adc-731", 'quota' => "20", 'category_id' => 1,],
            ['number' => "128", 'brand_id' => 1, 'model' => "2020", 'plate' => "avf-561", 'quota' => "15", 'category_id' => 1,],
            ['number' => "165", 'brand_id' => 1, 'model' => "2022", 'plate' => "ura-814", 'quota' => "10", 'category_id' => 1,],
        ]);
    }
}
