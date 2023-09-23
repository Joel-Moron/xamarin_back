<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listVuelos = [];

        $tiempoActual = time(); // Obtener el tiempo actual en segundos

        for ($i = 0; $i < 20; $i++) {
            // Generar una fecha aleatoria entre la fecha actual y 365 días en el futuro
            $fechaAleatoria = date('Y-m-d', $tiempoActual + rand(0, 365) * 86400); // 86400 segundos en un día

            // Generar una hora aleatoria entre 0:00:00 y 23:59:59
            $horaAleatoria = date('H:i:s', rand(0, 86399)); // 86399 segundos en un día
            
            $listVuelos[] = [
                'vue_fecha' => $fechaAleatoria,
                'vue_hora' => $horaAleatoria,
            ];
        }
        
        DB::table('vuelo')->insert($listVuelos);
    }
}
