<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //creamos el admin
       User::create([
        'name' => 'Administrador',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$7Uoyue0TlHGI/6ga6NL6s.zmVttwkyexWcEF9P/mldt.sN2bs2dMW', // @judiciales24
        'remember_token' => Str::random(10),
       ])->assignRole('Administrador');
    }
}
