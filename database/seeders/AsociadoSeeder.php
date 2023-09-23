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
                'aso_telefono' => 12345789,
                'aso_ruc' => 134567910,
                'aso_rsocial' => 'empresa 1',
            ],
            [
                'aso_telefono' => 12345789,
                'aso_ruc' => 123568911,
                'aso_rsocial' => 'empresa 2',
            ],
            [
                'aso_telefono' => 12345789,
                'aso_ruc' => 123567892,
                'aso_rsocial' => 'empresa 3',
            ],
            [
                'aso_telefono' => 12345789,
                'aso_ruc' => 123567813,
                'aso_rsocial' => 'empresa 4',
            ]
            // Agrega más registros aquí
        ];

        // Insertar los datos en la tabla "productos"

            DB::table('asociado')->insert($asociados);
        
    }
}
