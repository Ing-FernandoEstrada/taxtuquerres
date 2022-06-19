<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $person = Person::create([
            'document_id' => 2,
            'identification' => '1085322680',
            'names' => 'Juan David',
            'surnames' => 'Luna Matabanchoy',
            'birthday' => '1995-06-08',
        ]);

        User::create([
            'email' => 'luna.juandavid95@gmail.com',
            'phone' => '3135053624',
            'address' => 'Pasto, Nariño',
            'password' => Hash::make('utilizar'),
            'status' => 'A',
            'person_id' => $person->id,
        ])->assignRole($admin);

        DB::table('people')->insert([
            ['document_id' => 2, 'identification' => '12312312313', 'names' => 'Fernando', 'surnames' => 'Estrada', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '454556', 'names' => 'Edgar', 'surnames' => 'Arteaga', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '54655645645', 'names' => 'Juan', 'surnames' => 'Luna', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '4565445656', 'names' => 'David', 'surnames' => 'Matabanchoy', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '45645654', 'names' => 'Yuliana', 'surnames' => 'Cancimance', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '567567567', 'names' => 'Mateo', 'surnames' => 'Alvarez', 'birthday' => '1998-01-01',],
            ['document_id' => 2, 'identification' => '87878987', 'names' => 'Santiago', 'surnames' => 'Ortega', 'birthday' => '1998-01-01',],
        ]);

        DB::table('users')->insert([
            ['email' => 'sds@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 2,],
            ['email' => 'sds1@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 3,],
            ['email' => 'sds2@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 4,],
            ['email' => 'sds3@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 5,],
            ['email' => 'sds4@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 6,],
            ['email' => 'sds5@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 7,],
            ['email' => 'sds6@gmail.com', 'phone' => '3135053624', 'address' => 'Pasto, Nariño', 'password' => Hash::make('utilizar'), 'status' => 'A', 'person_id' => 8,],
        ]);

        DB::table('model_has_roles')->insert([
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 2],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 3],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 4],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 5],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 6],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 7],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 8],
        ]);
    }
}
