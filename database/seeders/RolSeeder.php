<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'rol_nombre' => 'administrador',
                'rol_estado' => 1,
            ],
            [
                'rol_nombre' => 'cliente',
                'rol_estado' => 1,
            ]
            // Agrega más registros aquí
        ];

        // Insertar los datos en la tabla "productos"
        foreach ($roles as $rol) {
            DB::table('rol')->insert($rol);
        }
    }
}
