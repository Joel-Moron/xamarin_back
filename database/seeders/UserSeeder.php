<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'usu_nombre' => 'Isaac Stevens',
                'usu_apellidop' => 'Moron',
                'usu_apellidom' => 'Ochante',
                'usu_documento' => 72815812,
                'usu_email' => 'raiinstevens3003@gmail.com',
                'usu_emailV' => null,
                'usu_password' => Hash::make('123456'),
                'usu_targeta' => 1234567891012131,
                'rol_id' => 2,
                'usu_token' => null,
                'date_token' => null,
            ]
            // Agrega más registros aquí
        ];

        // Insertar los datos en la tabla "productos"
        foreach ($users as $user) {
            DB::table('user')->insert($users);
        }
        
    }
}
