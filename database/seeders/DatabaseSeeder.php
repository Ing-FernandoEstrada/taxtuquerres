<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([BrandsSeeder::class,CategoriesSeeder::class,CitiesSeeder::class,VehiclesSeeder::class,DocumentsSeeder::class, UsersSeeder::class]);
    }
}
