<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AsociadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $asociados = [
            [
                'aso_direccion' => 'direccion 1',
                'aso_ruc' => 12345678910,
                'aso_rsocial' => 'empresa 1',
            ],
            [
                'aso_direccion' => 'direccion 2',
                'aso_ruc' => 12345678911,
                'aso_rsocial' => 'empresa 2',
            ],
            [
                'aso_direccion' => 'direccion 3',
                'aso_ruc' => 12345678912,
                'aso_rsocial' => 'empresa 3',
            ],
            [
                'aso_direccion' => 'direccion 4',
                'aso_ruc' => 12345678913,
                'aso_rsocial' => 'empresa 4',
            ]
            // Agrega más registros aquí
        ];

        // Insertar los datos en la tabla "productos"

            DB::table('asociado')->insert($asociados);
        
    }
}
