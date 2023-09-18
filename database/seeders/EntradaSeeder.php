<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $entradas = [
            [
                'entrada_hora' => new DateTime('08:00:00'), // Cambia a la hora deseada en formato HH:MM:SS
                'entrada_fecha' => new DateTime('2023-09-17'), // Cambia a la fecha deseada en formato YYYY-MM-DD
                'entrada_lugar' => 'Lugar 1',
                'entrada_destino' => 'Destino 1',
                'entrada_pais' => 'Colombia',
            ],
            [
                'entrada_hora' => new DateTime('09:30:00'),
                'entrada_fecha' => new DateTime('2023-09-18'),
                'entrada_lugar' => 'Lugar 2',
                'entrada_destino' => 'Destino 2',
                'entrada_pais' => 'Venezuela',
            ],
            [
                'entrada_hora' => new DateTime('10:45:00'),
                'entrada_fecha' => new DateTime('2023-09-19'),
                'entrada_lugar' => 'Lugar 3',
                'entrada_destino' => 'Destino 3',
                'entrada_pais' => 'Paris',
            ],
            [
                'entrada_hora' => new DateTime('11:15:00'),
                'entrada_fecha' => new DateTime('2023-09-20'),
                'entrada_lugar' => 'Lugar 4',
                'entrada_destino' => 'Destino 4',
                'entrada_pais' => 'EEUU',
            ],
            // Agrega más registros aquí
        ];
        
        // Insertar los datos en la tabla "entradas"
        DB::table('entrada')->insert($entradas);
        
    }
}
