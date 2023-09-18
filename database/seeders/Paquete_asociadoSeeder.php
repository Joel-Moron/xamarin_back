<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Paquete_asociadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los IDs de tiposervicio y asociado
        $ids_paquete = DB::table('paquete')->pluck('id')->toArray();
        $ids_asociado_tiposervicio = DB::table('asociado_tiposervicio')->pluck('id')->toArray();

        $listPaqueteAsociados = [];

        // Generar registros aleatorios vinculando los IDs
        for ($i = 0; $i < 2; $i++) { // Cambia 10 al número deseado de registros
            $listPaqueteAsociados[] = [
                'paq_id' => $ids_paquete[array_rand($ids_paquete)],
                'aso_tip_ser_id' => $ids_asociado_tiposervicio[array_rand($ids_asociado_tiposervicio)],
            ];
        }

        // Insertar los datos en la tabla "asociado_tiposervicio"
        DB::table('paquete_asociado')->insert($listPaqueteAsociados);
    }
}
