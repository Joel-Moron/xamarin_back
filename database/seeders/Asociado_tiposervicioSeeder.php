<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Asociado_tiposervicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los IDs de tiposervicio y asociado
        $ids_tiposervicio = DB::table('tiposervicio')->pluck('id')->toArray();
        $ids_asociado = DB::table('asociado')->pluck('id')->toArray();

        $listAsociados = [];

        // Generar registros aleatorios vinculando los IDs
        for ($i = 0; $i < 10; $i++) { // Cambia 10 al número deseado de registros
            $listAsociados[] = [
                'tip_ser_id' => $ids_tiposervicio[array_rand($ids_tiposervicio)],
                'aso_id' => $ids_asociado[array_rand($ids_asociado)],
            ];
        }

        // Insertar los datos en la tabla "asociado_tiposervicio"
        DB::table('asociado_tiposervicio')->insert($listAsociados);
    }
}
