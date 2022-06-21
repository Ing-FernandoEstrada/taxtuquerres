<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin']);
        $dispatcher = Role::create(['name' => 'dispatcher']);
        $driver = Role::create(['name' => 'driver']);
        $user = Role::create(['name' => 'user']);

        $user = User::create([
            'identification' => 'CC1085322680',
            'names' => 'Juan David',
            'surnames' => 'Luna Matabanchoy',
            'birthday' => '1995-06-08',
            'email' => 'luna.juandavid95@gmail.com',
            'phone' => '3135053624',
            'address' => 'Pasto, Nariño',
            'password' => Hash::make('utilizar'),
            'status' => 'A',
        ])->assignRole($admin);
    }
}
