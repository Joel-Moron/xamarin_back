<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinoVueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_vuelos = DB::table('vuelo')->pluck('id')->toArray();
        $ids_destino = DB::table('destino')->pluck('id')->toArray();
        
        $listDestinoVuelo = [];
        $destinosUtilizados = [];
        //PARA VARIOS PAISES
        foreach ($ids_vuelos as $vueloId) {
            $destinosDisponibles = array_diff($ids_destino, $destinosUtilizados);
        
            for ($i = 0; $i < 4; $i++) {
                // Verificar si hay destinos disponibles para este vuelo
                if (!empty($destinosDisponibles)) {
                    $desId = $destinosDisponibles[array_rand($destinosDisponibles)];
        
                    $listDestinoVuelo[] = [
                        'vue_id' => $vueloId,
                        'des_id' => $desId,
                    ];
        
                    // Agregar el destino utilizado a la lista de utilizados
                    $destinosUtilizados[] = $desId;
        
                    // Eliminar el destino utilizado de la lista de disponibles
                    $destinosDisponibles = array_diff($destinosDisponibles, [$desId]);
                } else {
                    // Si no hay destinos disponibles, romper el bucle
                    break;
                }
            }
        }


        //PARA POCOS PAISES
/*         foreach ($ids_vuelos as $vueloId) {
        
            for ($i = 0; $i < 2; $i++) {
        
                $listDestinoVuelo[] = [
                    'vue_id' => $vueloId,
                    'des_id' => $ids_destino[array_rand($ids_destino)],
                ];
            }
        } */
        
        DB::table('destino_vuelo')->insert($listDestinoVuelo);
    }
}
