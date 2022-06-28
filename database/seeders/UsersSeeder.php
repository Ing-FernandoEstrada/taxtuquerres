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
            'state' => 'A',
        ])->assignRole($admin);

        $user = User::create([
            'identification' => 'CC1143875162',
            'names' => 'Santiago',
            'surnames' => 'Ortega Rodriguez',
            'birthday' => '1998-08-02',
            'email' => 'santiortega@umariana.edu.co',
            'phone' => '3177172878',
            'address' => 'Pasto, Nariño',
            'password' => Hash::make('harascommitmateo'),
            'state' => 'A',
        ])->assignRole($admin);

        $user = User::create([
            'identification' => 'CC1087424916',
            'names' => 'Fernando',
            'surnames' => 'Estrada',
            'birthday' => '1998-01-01',
            'email' => 'edestrada@umariana.edu.co',
            'phone' => '3175517796',
            'address' => 'Pasto, Nariño',
            'password' => Hash::make('fernando'),
            'state' => 'A',
        ])->assignRole($admin);

        $user = User::create([
            'identification' => 'CC1087424916',
            'names' => 'Fernando',
            'surnames' => 'Estrada',
            'birthday' => '1998-01-01',
            'email' => 'edestrada@umariana.edu.co',
            'phone' => '3175517796',
            'address' => 'Pasto, Nariño',
            'password' => Hash::make('fernando'),
            'state' => 'A',
        ])->assignRole($admin);
    }
}
